<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBY('id', 'DESC')->get();
        return $products;
    }


    public function search_product(Request $request)
    {
        $product = Product::where('article', $request->article)->first();
        if ($product) {
            $response = [
                'response' => true,
                'product'  => $product
            ];
            return response()->json($response);
        } else {
            $response = [
                'response' => false,
                'message'  => 'Nessun prodotto esiste per questo numero di articolo',
            ];
            return response()->json($response);
        }
    }
}
