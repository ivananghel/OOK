<?php

namespace App\Api\V1\Controllers;

use App\Helpers\JWT;
use App\Http\Controllers\Controller;
use App\Models\DeviceToken;
use App\Models\User;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\ArraySerializer;
use Tymon\JWTAuth\Facades\JWTAuth;
use Hash;
use Socialite;
class AuthController extends Controller {

	use Helpers;

	/**
	 * Sign into the system
	 *
	 * @route POST /api/auth/login
	 *
	 * @param Request $request
	 * @return array
	 */
 public function login(Request $request){
		// Validation
		$this->validate($request, [
			'email'         => 'required|string|exists:users,email',
			'password'      => 'required|string',
		]);

		// Authentication
		$token  = JWT::login($request->email, $request->password);

		return [
			'data' => ['token' => $token],
		];

	}

	public function loginfacebook(Request $request){

		$data = Socialite::driver('facebook')->userFromToken($request->token);

		$user = User::where(['email'=> $data->email,'facebook_id'=>$data->id,'status'=>User::USER_STATUS_ACTIVE])->first();

        if(!$user1){
           abort(404 ,'Not Font User');
        }

        $token  = JWT::loginfacebook($user);
        
        return [
            'data' => ['token' => $token],
        ];

    }


}