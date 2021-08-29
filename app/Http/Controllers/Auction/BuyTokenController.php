<?php

namespace App\Http\Controllers\Auction;

use App\Models\Purchased_tokens_from_ref;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Token;
use App\Models\Purchased_tokens;
use App\Models\Own_token_by_emission;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;

class BuyTokenController extends Controller
{
    public function BuyNewToken(Request $request): JsonResponse
    {
        $amount =  json_decode($request->amount);

        $balance = $request->user()->balance->total_balance;
        $new_balance = $balance - $amount;

        if ($new_balance < 0) {
            return response()->json(['error'=>'Недостатньо коштів на рахунку']);
        };

        $token_rate = (float) Token::getRateTokenToday();
        $new_tokens = floatval(number_format($amount / $token_rate, 2));

        $affiliate = User::getMyAffiliate($request->user());

        if ($request->user()->role === User::$PRIME_ROLE) {

            $this->updateToken($request->user()->id, $new_tokens, $amount);

            $this->purchasedOwnTokens($request->user()->id, $new_tokens, $amount);

        } else {
            $data = $this->userAffiliateData($new_tokens, $amount);

            if ($affiliate->role === User::$PRIME_ROLE) {

                $this->updateToken($request->user()->id, $data['user_tokens'], $data['user_amount']);
                $this->updateToken($affiliate->id, $data['affiliate_token'], $data['affiliate_amount']);
                $this->purchasedOwnTokens($request->user()->id, $data['user_tokens'], $data['user_amount']);
                $this->purchasedTokensFromReferral($request->user()->id, $affiliate->id, $data['affiliate_token'], $data['affiliate_amount']);

            } else {

                if (Own_token_by_emission::checkIfUserCanGetBonus($affiliate->id)) {
                    $this->updateToken($request->user()->id, $data['user_tokens'], $data['user_amount']);
                    $this->updateToken($affiliate->id, $data['affiliate_token'], $data['affiliate_amount']);
                    $this->purchasedOwnTokens($request->user()->id, $data['user_tokens'], $data['user_amount']);
                    $this->purchasedTokensFromReferral($request->user()->id, $affiliate->id, $data['affiliate_token'], $data['affiliate_amount']);

                } else {
                    $this->updateToken($request->user()->id, $new_tokens, $amount);

                    $this->purchasedOwnTokens($request->user()->id, $new_tokens, $amount);
                }
            }
        }

        $request->user()->balance->update(['total_balance' => $new_balance]);

        return response()->json(['success'=>'Викупили нові токени'],200);
    }

    private function userAffiliateData($tokens, $amount): array
    {
        return [
            'user_amount' => number_format($amount * 0.95,2),
            'user_tokens' => number_format($tokens * 0.95,2),
            'affiliate_amount' => number_format($amount * 0.05,2),
            'affiliate_token' => number_format($tokens * 0.05,2),
        ];
    }

    private function purchasedOwnTokens($u_id, $tokens, $amount): void
    {
        $token = new Purchased_tokens();
        $token->transaction = Str::uuid();
        $token->u_id = $u_id;
        $token->new_token = $tokens;
        $token->in_cash = $amount;
        $token->save();
    }

    private function purchasedTokensFromReferral($u_id, $affiliateId, $tokens, $amount): void
    {
        $token = new Purchased_tokens_from_ref();
        $token->transaction = Str::uuid();
        $token->u_id = $u_id;
        $token->u_id_to = $affiliateId;
        $token->new_token = $tokens;
        $token->in_cash = $amount;
        $token->save();
    }

    private function updateToken($u_id, $tokens, $amount): void
    {
        $date =  date('Y.m.01');
        $ownToken = Own_token_by_emission::where('date',$date)->where('u_id', $u_id)->first();

        if ($ownToken) {
            $ownToken->investment += $amount;
            $ownToken->own_token += $tokens;

        } else {
            $ownToken = new Own_token_by_emission();
            $ownToken->u_id  = $u_id;
            $ownToken->date  = $date;
            $ownToken->token_rate  = Token::getRateTokenToday();
            $ownToken->investment  = $amount;
            $ownToken->own_token  = $tokens;
        }
        $ownToken->save();
    }
}
