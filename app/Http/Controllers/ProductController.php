<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Brand;
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
        $brands = Brand::all();

        return view('products.create', compact("brands"));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(ProductRequest $request)
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
    public function edit(Product $product)
    {
        $brands = Brand::all();

        return view("products.edit", compact('product', 'brands'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $product
     * @return void
     */
    public function update(ProductRequest $request, Product $product)
    {
        $request['slug'] = Str::slug($request->name);

        $product->update($request->all());
        return redirect()->route("products.index");
    }

    /**
     * destroy
     *
     * @param  mixed $product
     * @return void
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route("products.index");
    }

}