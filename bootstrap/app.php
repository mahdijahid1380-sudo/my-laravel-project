<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        
        // ۱. استانداردسازی خطای ۴۰۴ از هفته ششم
        $exceptions->render(function (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'error' => 'Resource Not Found',
                    'message' => 'آیتم یا مسیر مورد نظر در سیستم پیدا نشد.'
                ], 404);
            }
        });

        // ۲. استانداردسازی خطای ۴۰۱ عدم احراز هویت برای هفته هفتم
        $exceptions->render(function (\Illuminate\Auth\AuthenticationException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Authentication required',
                    'errors'  => new \stdClass(),
                ], 401);
            }
        });
        
    })->create();
