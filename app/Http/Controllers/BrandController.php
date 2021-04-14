<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(BrandRequest $request)
    {
        $request['slug'] = Str::slug($request->name);

        Brand::create($request->all());
        return redirect()->route("brands.index");
    }

    /**
     * edit
     *
     * @param  mixed $request
     * @param  mixed $brand
     * @return void
     */
    public function edit(Request $request, Brand $brand)
    {
        return view("brands.edit", compact('brand'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $brand
     * @return void
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        $request['slug'] = Str::slug($request->name);

        $brand->update($request->all());
        return redirect()->route("brands.index");
    }

    /**
     * destroy
     *
     * @param  mixed $brand
     * @return void
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route("brands.index");
    }

}
