<?php

namespace App\Http\Controllers\UserPage;

use App\Http\Controllers\Controller;
use App\Ticker;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Auth;




class UserResetAuthDataController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }


	public function showResetAuthData()
	{
	    	return view('user.UserAuthData')->with([
                'ticker'=> Ticker::getTicker(),
            ]);
	}

	public function updateNickName(Request $request)
	{
		$validator = Validator::make($request->all(), [
	        'nickName' => ['required', 'string', 'max:255'],

        ]);

        $u_id = Auth::id();

        $user_nick = User::where('u_id', $u_id)->update([
        	 'name' => $request->nickName,
        ]);


        return Redirect::to('cabinet/edit-auth');
	}

	public function updateEmail(Request $request)
	{
		$validator = Validator::make($request->all(), [
	        'new_email' => ['required', 'string', 'email', 'max:255', 'min:6', 'unique:email'],
	       ]);

        $u_id = Auth::id();

        $user_email = User::where('u_id', $u_id)->update([
        	 'email' => $request->new_email,
        ]);


        return Redirect::to('cabinet/edit-auth');
	}

	public function changePassword(Request $request){

		if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return Redirect::to('cabinet/edit-auth')->with("error","Старий пароль введено не вірно");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return Redirect::to('cabinet/edit-auth')->with("error","Новий пароль має відрізнятися від старого пароля.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
		$u_id = Auth::id();
        $user_password = User::where('u_id', $u_id)->update([
        	'password' => Hash::make($request->get('new-password')),
        ]);
        return Redirect::to('cabinet/edit-auth')->with("success", "Ви успішно змінили пароль");
	}


}
