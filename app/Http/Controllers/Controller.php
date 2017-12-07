<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManagerStatic;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
	
	
	protected function validateWithResponseAjax($rules, Request $request, $messages = array())
	{
		$validator = Validator::make($request->all(), $rules, $messages);
		
		if ($validator->fails()) {
			
			$messages	= "";
			$errors		= $validator->errors();
			
			foreach ($errors->all() as $message) {

				$messages .= '<p>' . $message . '</p>';
				
			}

			exit(view('layouts.messages.error', array('messages' => $messages)));
		}
	}

}
