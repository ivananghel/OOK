<?php

namespace App\Providers;

use Exception;
use Illuminate\Support\Facades\Request;
use App\Exceptions\AuthenticationException;
use App\Exceptions\PermissionException;
use App\Exceptions\ValidationException as AppValidationException;
use Dingo\Api\Exception\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Validation\ValidationException;
use Illuminate\Http\Response;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ExceptionServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(){
        // ...
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app(ExceptionHandler::class)->register(function(AuthenticationException $e){
            return new Response([
                'status_code' => 401,
                'errors' => [
                    $e->getMessage()
                ]
            ], 401);
        });

        app(ExceptionHandler::class)->register(function(PermissionException $e){
            return new Response([
                'status_code' => 403,
                'errors' => [
                    $e->getMessage()
                ]
            ], 403);
        });

        app(ExceptionHandler::class)->register(function(AppValidationException $e){
            return new Response([
                'status_code' => 406,
                'errors' => $e->getErrors()
            ], 406);
        });

        app(ExceptionHandler::class)->register(function(ValidationException $e){
            return new Response([
                'status_code' => 406,
                'errors' => $e->validator->errors()->all()
            ], 406);
        });

        app(ExceptionHandler::class)->register(function(ModelNotFoundException $e){
            return new Response([
                'status_code' => 404,
                'errors' => [
                    'The requested ' . mb_strtolower(basename($e->getModel())) . ' has not been found'
                ]
            ], 404);
        });

        app(ExceptionHandler::class)->register(function(NotFoundHttpException $e){

            return new Response([
                'status_code' => 404,
                'errors' => [
                    'The requested URL "' . Request::url() . '" was not found'
                ]
            ], 404);
        });

        app(ExceptionHandler::class)->register(function(HttpException $e){
            return new Response([
                'status_code' => $e->getStatusCode(),
                'errors' => [
                    $e->getMessage() ?: Response::$statusTexts[$e->getStatusCode()]
                ]
            ], $e->getStatusCode());
        });

        app(ExceptionHandler::class)->register(function(Exception $e){
            return new Response([
                'status_code' => 500,
                'errors' => [
                    $e->getMessage()
                ]
            ], 500);
        });
    }

}
