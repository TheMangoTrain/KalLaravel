<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{



    public function index()
    {
       return new ProductCollection(Product::all());
    }

    public function view($id)
    {

        $get = Product::find($id);
        return response()->json($get);    

    }

    public function store(Request $request)
    {
        $post = new Product([
            'sku' => $request->get('sku'),
            'title' => $request->get('title'),
            'size' => $request->get('size'),
            'price' => $request->get('price'),
            'inventory' => $request->get('inventory'),
        ]);

        $post->save();

        return response()->json('successfully added');
    }

    public function edit($id)
    {
        $post = Product::find($id);
        return response()->json($post);
    }

    public function update($id, Request $request)
    {
        $post = Product::find($id);

        $post->update($request->all());

        return response()->json('successfully updated');
    }

    public function delete($id)
    {
        $post = Product::find($id);

        $post->delete();

        return response()->json('successfully deleted');
    }
}
