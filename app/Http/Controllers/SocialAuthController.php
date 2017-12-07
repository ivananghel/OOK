<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Socialite;
use App\Models\User;
use App\Models\Role;
use App\Like;

class SocialAuthController extends Controller
{
	public function redirect()
	{
		return Socialite::driver('facebook')->redirect();
	}   

	public function callback()
	{
		try {
			$Socialuser = Socialite::driver('facebook')->user();
		} catch (Exception $e) {
			return redirect('/');
		}

		$user = User::where('facebook_id' , $Socialuser->id)->first();
		if(!$user){
			$user = User::create([
				'facebook_id'	=> $Socialuser->id,
				'email'			=> $Socialuser->email,
				'first_name'	=> explode(" ", $Socialuser->name)[0],
				'last_name'		=> explode(" ", $Socialuser->name)[1],
				'status'		=> User::USER_STATUS_ACTIVE,
				]);

			$user->attachRole(2);
			$user->save();
		}
		auth()->login($user);
		return redirect('post');
	}
}