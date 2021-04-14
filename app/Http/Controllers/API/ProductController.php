<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Models\Product as ModelsProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $dependencies = new ProductCollection(ModelsProduct::all());
        return response()->json($dependencies, 200);
    }
}
