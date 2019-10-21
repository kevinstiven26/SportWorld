<?php

namespace App\Exceptions;

use Exception;
use App\Traits\ApiResponser;
// use Asm89\Stack\CorsService;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    use ApiResponser;
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
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        $response =  $this->handleException($request,$exception);

        // app(CorsService::class)->addActualRequestHeaders($response, $request); // con el app hago una instancia de la clase CorsService es decir que ya puedo usar sus metodos

        return $response;
    }

    //cambiamos el contenido de render para handleException por el tema de que los cors no se ejecutan bien cuando la url es invalida
    public function handleException($request, Exception $exception) {
        
        if($exception instanceof ValidationException) {
            return $this->convertValidationExceptionToResponse($exception, $request);
        }
        
        if($exception instanceof AuthenticationException) {
            return $this->unauthenticated($request,$exception);
        }

        if($exception instanceof ModelNotFoundException) {
            $modelName = class_basename($exception->getModel());
            return $this->errorResponse("Does not exists any instance of {$modelName} with the speciefied id",404);
        }
        
        if($exception instanceof NotFoundHttpException) {
            return $this->errorResponse('Does not exists any endpoint matching with that URL',$exception->getStatusCode());
        }
        
        if($exception instanceof MethodNotAllowedHttpException) {
            return $this->errorResponse('Http methos does not match with any endpoint',$exception->getStatusCode());
        }

        if($exception instanceof HttpException) {
            return $this->errorResponse($exception->getMessage(),$exception->getStatusCode());
        }

        //return $this->errorResponse("Unexpected error",500); 
        // Es mas para cuando se despliega la api en producción ya que no se deben mostrar los errores con mucho detalle

        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into a response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        // con este metodo lo que se quiere hacer es que si escriben en la url home sin iniciar la sesión que lo envie a login
        if($this->isFronted($request)) {
            return redirect()->guest(route('login'));
        }

        return $this->errorResponse('Unathenticated', 401);
        
    }

    protected function convertValidationExceptionToResponse(ValidationException $exception, $request)
    {
        $errors = $exception->validator->errors()->getMessages();

        if($this->isFronted($request)) { // para saber si muestro el error en html por lo que ya es web y no en json como en los servicios
            // en la siguiente linea estamos retornando html con el error como tal
            return $request->ajax() ? response()->json($errors, 422) : 
                redirect()
                ->back()
                ->withInput($request->input())
                ->withErrors($errors);
        }

        return $this->errorResponse($errors, 422);

        //return $request->expectsJSON() ? $this->invalidJSON($request,$e) : $this->invalid($request,$e);
    }

    function isFronted($request) {
        return $request->acceptsHtml() && collect($request->route()->middleware())->contains('web'); // dice que la ruta se esta dirigiendo a una que pertenece a web
    }

}
