<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->redirectTo(
            guests: '/admin/login',
            users: '/admin/dashboard'
        );
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*'),
        );
        $exceptions->render(function (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e, Request $request) {
            if ($request->is('admin/*') || $request->is('admin')) {
                if ($request->expectsJson()) {
                    return response()->json([
                        'error' => 'The requested resource or page was not found.'
                    ], 404);
                }
                return response()->view('admin.errors.404', [
                    'message' => 'The requested reservation, record, or page could not be found.'
                ], 404);
            }
        });
    })->create();
