<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Hash;
use Datatables;
use Auth;

class UserController extends Controller {

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('users.index', [
            'active_menu' => 'users',
        ]);
    }

    /**
     * @return mixed
     */
    public function datatable() {
        $currentUser = Auth::user();
        $query = User::select('users.*');

        return Datatables::of($query)
            ->addColumn('action', function(User $user){
                return view('users.chunk.action', [
                    'id'        => $user->id,
                    'resource'  => 'users',
                ]);
            })
            ->editColumn('created_at', function(User $user){
                return $user->created_at->format(config('project.formatUI'));
            })
            ->make(true);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('users.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
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

        return response()->view('message.success', array('message' => trans('User has been successfully created') ));
    }

    public function edit($id) {
		$user = User::findOrFail($id);

		return view('users.update', [
            'user'          => $user,
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $input = $request->only('first_name', 'last_name', 'email', 'password', 'role');
       
        $rules = config('validations.web.user.update');
        $rules['email'] .= ','.$id;
        $this->validate($request, $rules);

        $user = User::findOrFail($id);

        if ( !empty($input['password']) ) {
            $user->password = Hash::make($input['password']);
        }

        $user->fill($input)->save();

        return response()->view('message.success', ['message' => trans('User has been updated successfully')]);
    }



    public function destroy($id) {
        $currentUser = Auth::user();

        if ( $currentUser->hasRole('admin') ) {
            if ( $currentUser->id == $id ) {
                return response( trans('You can\'t delete you\'r self'), 406 );
            }

            User::destroy($id);

            return trans('User has been successfully deleted');
        }

        return response( trans('Not enough permissions'), 406 );
    }

}
