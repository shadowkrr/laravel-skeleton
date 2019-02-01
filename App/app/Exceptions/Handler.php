<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        $code = $exception->getCode();
        $message = $exception->getMessage();
        $trace = $exception->getTrace();

         if(count($trace) == 0){
            parent::report($exception);
            return;
        }

        if(!array_key_exists('line', $trace[0]) || !array_key_exists('file', $trace[0])){
            parent::report($exception);
            return;
        }

        Log::error('['.$exception->getCode().'] "'.$exception->getMessage().'" on line '.$exception->getTrace()[0]['line'].' of file '.$exception->getTrace()[0]['file']);

        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }
}
