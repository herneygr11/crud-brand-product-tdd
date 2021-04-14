<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product as ModelsProduct;
use Illuminate\Http\Request;

/**
* @OA\Info(title="API CRUD", version="1.0")
*
* @OA\Server(url="http://127.0.0.1:8000/")
*/
class ProductController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/products",
    *     summary="Mostrar Productos",
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar todos los productos."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */
    public function index()
    {
        $dependencies = new ProductCollection(ModelsProduct::all());
        return response()->json($dependencies, 200);
    }

        /**
    * @OA\Get(
        *     path="/api/products/{slug}",
        *     summary="Mostrar un Producto",
        *     @OA\Response(
        *         response=200,
        *         description="Mostrar uno de las Productos."
        *     ),
        *     @OA\Parameter(
        *       description="Slug del producto",
        *       in="path",
        *       name="slug",
        *       required=true,
        *       example="iapple",
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
    public function show(ModelsProduct $product)
    {
        return response()->json(new ProductResource($product), 200);
    }

}
