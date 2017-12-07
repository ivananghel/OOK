<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
		AuthorizationException::class,
		HttpException::class,
		ModelNotFoundException::class,
		ValidationException::class,
		AuthenticationException::class,
		PermissionException::class,
		TokenExpiredException::class
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
		// AJAX space
		if($request->ajax()){

			// Model missing errors handler
			if($e instanceof ModelNotFoundException){
				return view('message.error', [
					'errors' => 'The requested ' . $e->getModel() . ' has not been found',
				]);
			}

			// Validation errors handler
			else if($e instanceof ValidationException){
				return view('message.error', [
					'errors' => $e->validator->errors()->all(),
				]);
			}

			// Unexpected errors handler
			else if($e instanceof Exception){
				return response()->view('message.error', [
					'errors' => [
						(env('APP_DEBUG')) ? $e->getMessage() : 'Internal Server Error',
					]
				]);
			}

		}

		return parent::render($request, $e);
    }
}
