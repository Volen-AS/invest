<?php

namespace App\Http\Controllers\UserPage;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Ticker;
use App\Models\User;

class UserProfileController extends Controller
{
    public function showProfile(User $user)
    {
        return view('user.profile')
            ->with('profile', $user->profile)
            ->with('ticker', Ticker::getTicker());
    }

    public function editProfile(ProfileRequest $request)
    {
        $user = $request->user();

        $user->profile()->updateOrCreate(['user_id' => $user->id], [
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'second_name' => $request->get('second_name'),
            'phone_number' => $request->get('phone_number'),
            'reserve_phone_number' => $request->get('reserve_phone_number'),
            'reserve_mail' => $request->get('reserve_mail'),
            'skype' => $request->get('skype'),
        ]);

        return redirect()->route('profile', $user)
            ->with('profile', $user->profile)
            ->with('ticker', Ticker::getTicker());
    }
}
