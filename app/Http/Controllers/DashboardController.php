<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $countBrand = Brand::all()->count();
        $countProduct = Product::all()->count();

        return view('dashboard', compact('countBrand', 'countProduct'));
    }
}
