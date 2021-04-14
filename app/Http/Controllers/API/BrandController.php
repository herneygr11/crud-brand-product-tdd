<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BrandCollection;
use App\Http\Resources\BrandResource;
use App\Models\Brand as ModelsBrand;
use Illuminate\Http\Request;

/**
* @OA\Server(url="http://127.0.0.1:8000/")
*/
class BrandController extends Controller
{
    /**
    * @OA\Get(
        *     path="/api/brands",
        *     summary="Mostrar Marcas",
        *     @OA\Response(
        *         response=200,
        *         description="Mostrar todos las Marcas."
        *     ),
        *     @OA\Response(
        *         response="default",
        *         description="Ha ocurrido un error."
        *     )
        * )
    */
    public function index()
    {
        $dependencies = new BrandCollection(ModelsBrand::all());
        return response()->json($dependencies, 200);
    }

    /**
    * @OA\Get(
        *     path="/api/brands/{slug}",
        *     summary="Mostrar una Marca",
        *     @OA\Response(
        *         response=200,
        *         description="Mostrar una de las Marcas."
        *     ),
        *     @OA\Parameter(
        *       description="Slug de la marca",
        *       in="path",
        *       name="slug",
        *       required=true,
        *       example="xiaomi",
        *       @OA\Schema(
        *          type="string"
        *       )
        *     ),
        *     @OA\Response(
        *         response="default",
        *         description="Ha ocurrido un error."
        *     )
        * )
    */
    public function show(ModelsBrand $brand)
    {
        return response()->json(new BrandResource($brand), 200);
    }

}
