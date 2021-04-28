<?php

namespace App\Http\Controllers\Auth;

use App\Models\Ticker;
use App\Models\User;
use App\Models\Referral;
use App\Models\Statistic;
use App\Models\Chat_id;
use App\Models\Chat_list_user;
use App\Models\Chat_list_messegde;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;


class RegisterController extends Controller
{
    //7 - user, 4 - admin, 9 - catch all new users for referral system
    private const USER_ROLE = 7;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->redirectTo = route('cabinet');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function create(array $data)
    {
        $user = new User();
        $user->name  = $data['name'];
        $user->role = self::USER_ROLE;
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->code = (string)Uuid::uuid1();
        $user->save();

        //=============================
        $user->u_id = $user->id;
        $user->update();
        //=============================

        if(Session::has('affiliate-user')){
            $this->setReferrals($user->id, Session::get('affiliate-user'));
            Session::forget('affiliate-user');
        }

        if(Session::has('affiliate-mail')){
            $this->saveReferrals($user->id, Session::get('affiliate-mail'), Session::get('affiliate-mail'));
            $this->getChatAffiliat($user->id, Session::get('affiliate-mail'));
            Session::forget('affiliate-mail');
        }
        $this->addStatistic($user->id);
        $this->addChat($user->id); //new chat for referral group
        $this->YouWelcome($user);

        return $user;
    }

    protected function YouWelcome($user) :void
    {
        $myAfill = Referral::where('u_id',$user->id)->latest()->first();
        $affiliate = User::find($myAfill->reSendTo);
        $affilChat = Chat_id::where('u_id', $affiliate->id)->first();
        $msg="$user->name joined the group of $affiliate->name";

        $message = new Chat_list_messegde();
        $message->chat_id = $affilChat->chat_id;
        $message->u_id = $user->id;
        $message->message = $msg;
        $message->save();
    }

    protected function addChat($userId) :void
    {
        $chat = new Chat_id();
        $chat->chat_id = '000'.$userId;
        $chat->u_id = $userId;
        $chat->save();
    }

    protected function addStatistic($userId)  :void
    {
        Statistic::create([
            'u_id' => $userId,
            'total_balance' => 0,
        ]);
    }

    protected function getChatAffiliat($userId, $affiliateId) :void
    {
        $chat = Chat_id::where('u_id', $affiliateId)->first();

        $chat_list  = new Chat_list_user();
        $chat_list->chat_id = $chat->chat_id;
        $chat_list->u_id = $userId;
        $chat_list->save();
    }


    protected function setReferrals($userId,$affiliateId) :void
    {
        $countReferral = Referral::where('referred_by', $affiliateId)->count();
        if($countReferral==1 || $countReferral==2){

            while($countReferral<3){
                $masterAffiliat = Referral::where('u_id', $affiliateId)->latest()->first();
                $countReferral = Referral::where('referred_by', $masterAffiliat->reSendTo)->count();
                $masteraffiliatRole = User::where('u_id', $masterAffiliat->reSendTo)->first();
                if($masteraffiliatRole->role == 9){
                    break;
                }
                if($countReferral<3){
                    $this->saveReferrals($userId, $affiliateId, $masterAffiliat->reSendTo);
                    $affiliateId = $masterAffiliat->reSendTo;
                }
            }
            $this->saveReferrals($userId, $affiliateId, $masterAffiliat->reSendTo);
            $this->getChatAffiliat($userId,$masterAffiliat->reSendTo);

        }else{
            $this->saveReferrals($userId, $affiliateId, $affiliateId);
            $this->getChatAffiliat($userId, $affiliateId);
        }
    }

    protected function saveReferrals($curUser, $affiliateId, $reSendTo) :void
    {

        $referral = new Referral();
        $referral->u_id = $curUser;
        $referral->referred_by = $affiliateId;
        $referral->reSendTo = $reSendTo;
        $referral->save();
    }

    public function showRegistrationForm(Request $request)
    {
        if($request->has('ref')){
            $affiliate = User::where('code', $request->get('ref'))->first();
            Session::put('affiliate-user', $affiliate->id);
            return view('auth.register')->with([
                'ticker'=> Ticker::getTicker()
            ]);
        }
        else{
            $primeAffiliat = User::where('role', 9)->first();
            Session::put('affiliate-mail', $primeAffiliat->id);
            return view('auth.register')->with([
                'ticker'=> Ticker::getTicker()
            ]);
        }

    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectTo);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }


}





