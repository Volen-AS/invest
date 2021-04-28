<?php

namespace App\Http\Controllers\UserPage;

use App\Models\Ticker;
use App\Http\Requests\ProfileRequest;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


class UserProfileController extends Controller
{
    public function showProfile(User $user)
    {
        return view('user.profile')
            ->with('profile', $user->profile)
            ->with('ticker', Ticker::getTicker());
    }

    public function editProfile(ProfileRequest $request, Profile $profile)
    {
        $user = $request->user();
        
        $profile->first_name =$request->get('first_name');
        $profile->last_name = $request->get('last_name');
        $profile->second_name = $request->get('second_name');
        $profile->phone_number = $request->get('phone_number');
        $profile->reserve_phone_number = $request->get('reserve_phone_number');
        $profile->reserve_mail = $request->get('reserve_mail');
        $profile->skype = $request->get('skype');

        $user->profile()->save($profile);

        return view('user.profile')
            ->with('profile', $user->profile)
            ->with('ticker', Ticker::getTicker());
    }
}
