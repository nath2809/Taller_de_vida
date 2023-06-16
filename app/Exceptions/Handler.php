<?php

namespace App\Exceptions;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Auth\Access\AuthorizationException;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{

    protected $levels = [
        //
    ];


    protected $dontReport = [
        //
    ];

 
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];


    public function register(): void
    {
        $this->renderable(function (NotFoundHttpException $e, $request) {
            return response()->view('errors.404', [], 404);
        });

        $this->renderable(function (AuthorizationException $e, $request) {
            return response()->view('errors.403', [], 403);
        });
    }
}
