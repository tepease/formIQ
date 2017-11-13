<?php

namespace App\Exceptions;

use Exception;
use InvalidArgumentException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Routes exceptions to API or HTTP handlers
     *
     * @param \Illuminate\Http\Request $request
     * @param Exception $exception
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Exception $exception)
    {
        $exception = $this->translate($request, $exception);

        return $request->is('api/*') ?
            $this->renderJson($request, $exception) :
            $this->renderHttp($request, $exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function renderHttp($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }

    /**
     * Render an exception into a JSON response.
     *
     * @param \Illuminate\Http\Request $request
     * @param Exception $exception
     * @return \Illuminate\Http\JsonResponse
     */
    public function renderJson($request, Exception $exception)
    {
        return response()->json([
            'error' => [
                'message' => $exception->getMessage(),
            ],
            'request' => [
                'method' => $request->method(),
                'path' => $request->path(),
                'body' => $request->getContent(),
            ]
        ], $exception->getCode());
    }

    /**
     * Obfuscates exception types and returns useful generic messages and codes
     *
     * @param \Illuminate\Http\Request $request
     * @param $exception
     * @return Exception
     */
    public function translate($request, $exception)
    {
        switch (true) {
            case $exception instanceof ModelNotFoundException:
            case $exception instanceof NotFoundHttpException:
                $exception = new Exception("Sorry, I can't find what you're looking for...", 404);
                break;
            case $exception instanceof MethodNotAllowedHttpException:
                $exception = new Exception("Sorry, I don't have that method", 405);
                break;
            case $exception instanceof InvalidArgumentException:
                $exception = new Exception("Invalid arguments for this request. GET " .
                    $request->getUri() . "/create for more detail.", 400);
                break;
        }

        return $exception;
    }
}
