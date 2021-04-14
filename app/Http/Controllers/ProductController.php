<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $request['slug'] = Str::slug($request->name);

        Product::create($request->all());
        return redirect()->route("products.index");
    }

    /**
     * edit
     *
     * @param  mixed $request
     * @param  mixed $product
     * @return void
     */
    public function edit(Request $request, Product $product)
    {
        return view("products.edit", compact('product'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $product
     * @return void
     */
    public function update(Request $request, Product $product)
    {
        $request['slug'] = Str::slug($request->name);

        $product->update($request->all());
        return redirect()->route("products.index");
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route("products.index");
    }
}