<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Exception;
use URL;
use Validator;
use App\Exceptions\PermissionException;
use App\Exceptions\AuthenticationException;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use DB;
use Hash;
use Datatables;



class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }


    public function registration(){
        return view('auth.register');
    }


    public function store(Request $request){

        $input = $request->all();
        $rules = config('validations.web.user.create');
        $this->validate($request, $rules);

        DB::transaction(function() use ($input, $request) {

            $input['password'] = \Illuminate\Support\Facades\Hash::make($input['password']);
            $user = User::create($input);
            $user->status = User::USER_STATUS_ACTIVE;
            $user->attachRole(2);
            $user->save();

        });

        return response()->view('message.success', array('message' => trans('User has been successfully created'),'redirect'=>'login' ));
    


    }

	public function login(Request $request){

        try {

            $data = $request->only('email', 'password');

            if(!Auth::attempt($data, $request->has('remember'))){
                throw new AuthenticationException('Incorrect password or Email. Please, try again.');
            }

            $user = Auth::user();
                return view('message.success', [
                    'message' => trans('Going to dashboard'),
                    'redirect' => '/'
                ]);

        }

        catch(AuthenticationException $e){
            return view('message.error', [
                'errors' => [
                    $e->getMessage()
                ],
            ]);
        }

        catch(PermissionException $e){
            return view('message.error', [
                'errors' => [
                    $e->getMessage()
                ],
            ]);
        }

        catch(Exception $e){
            return view('message.error', [
                'errors' => [
                    (env('APP_DEBUG')) ? $e->getMessage() : trans('Internal Server Error')
                ],
            ]);
        }
	}
	
}
