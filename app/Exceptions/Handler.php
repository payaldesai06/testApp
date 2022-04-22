<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\JWTException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (\Illuminate\Auth\AuthenticationException $e, $request) {
            if ($request->is('api/*')) {
                $res = [
                    'success' => false,
                    'message' => 'Not authenticated'
                ];
                return response()->json($res, 200);
            }
        });
    }

    /* Report or log an exception.
    *
    * @param  \Exception  $exception
    * @return void
    */
   public function report(Throwable $exception)
   {
       parent::report($exception);
   }

   /**
    * Render an exception into an HTTP response.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Exception  $exception
    * @return \Illuminate\Http\Response
    */
   public function render($request, Throwable $exception)
   {
       if ($exception instanceof ModelNotFoundException && $request->wantsJson()) {
           return response()->json(['message' => 'Not Found!'], 404);
       }

       if ($request->wantsJson()) {
           //add Accept: application/json in request
           return $this->handleApiException($request, $exception);
       }

       return parent::render($request, $exception);
   }

   private function handleApiException($request, Throwable $exception) {
       $exception = $this->prepareException($exception);

       if ($exception instanceof \Illuminate\Http\Exception\HttpResponseException) {
           $exception = $exception->getResponse();
       }

       if ($exception instanceof \Illuminate\Auth\AuthenticationException) {
           $exception = $this->unauthenticated($request, $exception);
       }

       if ($exception instanceof \Illuminate\Validation\ValidationException) {
           $exception = $this->convertValidationExceptionToResponse($exception, $request);
       }

       return $this->customApiResponse($exception);
   }


   private function customApiResponse($exception) {
       if (method_exists($exception, 'getStatusCode')) {
           $statusCode = $exception->getStatusCode();
       }

       $response = [];

       switch ($statusCode) {
       case 401:
           $response['message'] = 'Unauthorized';
           break;
       case 403:
           $response['message'] = 'Forbidden';
           break;
       case 404:
           $response['message'] = 'Not Found';
           break;
       case 405:
           $response['message'] = 'Method Not Allowed';
           break;
       case 422:
           $response['message'] = $exception->original['message'];
           $response['errors'] = $exception->original['errors'];
           break;
       case 500:
           $response['message'] = $exception->getMessage();
           break;
       default:
           break;
       }

       $response['code'] = $statusCode;

       $response['data'] = (object)[];

       return response()->json($response, 200);
   }
}

