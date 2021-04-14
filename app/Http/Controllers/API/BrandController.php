<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BrandCollection;
use App\Models\Brand as ModelsBrand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $dependencies = new BrandCollection(ModelsBrand::all());
        return response()->json($dependencies, 200);
    }
}
