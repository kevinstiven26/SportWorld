<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

trait ApiResponser
{
    function successResponse($data, $code = 200) // 200 es el mensaje de OK en HTTP o 201 el de create
    {
        return $data->response()->setStatusCode($code);
        //return response()->json($data, $code);
    }

    function errorResponse($message, $code)
    {
        return response()->json(['error' => ['message' => $message, 'code' => $code]], $code);
    }

    function showAll($collection, $code = 200)
    {
        if($collection->isEmpty()) {
            return $this->successResponse(['data' => $collection], $code);
        }

        if($collection instanceof Collection) {
            $collection = $this->paginateCollection($collection); // se pagina la colección
        }
        
        $resource = $collection->first()->resource;

        $transformedCollection = $resource::collection($collection); // para pasar la colección transformada
        //return $this->successResponse(['data' => $transformCollection], $code);
        return $this->successResponse($transformedCollection, $code);
    }

    function showOne (Model $instance, $code = 200)
    {
        $resource = $instance->resource;
        $transformedInstance = new $resource($instance);

        //return $this->successResponse(['data' => $transformedInstance], $code);
        return $this->successResponse($transformedInstance, $code);
    }

    function showMessage($message, $code = 200)
    {
        return $this->successResponse($message, $code);
    }

    function paginateCollection (Collection $collection) {
        $perPage = $this->determinePageSize();

        $page = LengthAwarePaginator::resolveCurrentPage(); // cual es la pagina que debe servir en el momento

        //dd($perPage,$page); // imprimir las variables al ejecutar la url del servicio

        $results = $collection->slice(($page -1) * $perPage, $perPage)->values();

        $paginated = new LengthAwarePaginator($results, $collection->count(), $perPage, $page, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        $paginated->appends(request()->query());

        return $paginated;
    }

    function determinePageSize() {
        $rules = [
            'per_page' => 'integer|min:2|max:50',
        ];

        $perPage = request()->validate($rules);

        return isset($perPage['per_page']) ? (int)$perPage['per_page']: 5;
    }
}