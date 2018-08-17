<?php
/**
 * Created by PhpStorm.
 * User: Adminis
 * Date: 17-Aug-18
 * Time: 4:51 PM
 */
namespace App\Exceptions;

use Exception;
class AdminException extends Exception
{
    /**
     * Report the exception.
     *
     * @return void
     */
    public function report()
    {
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof \App\Exceptions\AdminException)  {
            return $exception->render($request);
        }

        return parent::render($request, $exception);
    }
}