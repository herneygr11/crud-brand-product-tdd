<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $brands = Brand::all();

        return view('brands.index', compact('brands'));
    }
}
