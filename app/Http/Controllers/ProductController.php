<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        return view('pages.product.index', [
            'products' => Product::orderBY('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image'   => 'required|image',
            'article' => 'required',
            'description'  => 'required',
            'cuts'         => 'required',
            'price'        => 'required|numeric',
        ]);
        $destination = 'product-images/';
        $image = $request->file('image');
        $image_new_name = time() . $image->getClientOriginalName();
        $image->move($destination, $image_new_name);
        Product::create([
            'image'   => env('APP_URL') . $destination . $image_new_name,
            'article' => $request->article,
            'description' => $request->description,
            'cuts'    => $request->cuts,
            'price'   => $request->price,
        ]);
        $request->session()->flash('message', 'Product added succesfully.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('pages.product.update', [
            'product' =>  $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'article' => 'required',
            'image'   => 'nullable|image',
            'description'  => 'required',
            'cuts'         => 'required',
            'price'        => 'required|numeric',
        ]);

        if ($request->hasFile('image')) {

            $destination = 'product-images/';
            $image = $request->file('image');
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move($destination, $image_new_name);

            $product->image = env('APP_URL') . $destination . $image_new_name;
            $product->article = $request->article;
            $product->description = $request->description;
            $product->cuts = $request->cuts;
            $product->price = $request->price;
            $product->save();
        } else {
            $product->article = $request->article;
            $product->description = $request->description;
            $product->cuts = $request->cuts;
            $product->price = $request->price;
            $product->save();
        }
        $request->session()->flash('message', 'Product updated succesfully.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Request $request)
    {
        $product->delete();
        $request->session()->flash('message', 'Product deleted successfully.');
        return back();
    }
}
