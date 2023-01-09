<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view("products.index")->with([
            "products"=>$products
        ]);
    }

    public function create(){
        return view("products.create");
    }

    //post request
    public function store(){
        $product = Product::create(request()->all());
        return redirect()->route("products.index");
    }

    public function show($productId){
        //if the passed id is ot exits return 404 not found page
       $product = Product::findOrFail($productId);
        return view("products.show")->with([
            "product"=>$product,
            "subtitle"=>"<h2>Alma</h2>"
        ]);
    }

    public function edit($product){
        return view("products.edit")->with([
            "product"=> Product::findOrFail($product)
        ]);
    }
    
    public function update($productId){
        //update request
        $product = Product::findOrFail($productId);
        $product->update(request()->all());
        return redirect()->route("products.index");
    }
    
    public function destroy($productId){
        $product = Product::findOrFail($productId);
        //i remove from database , not from memory
        $product->delete();
        //in the memory this is still accessable, thats why we can return the deleted element
        return redirect()->route("products.index");
    }
}
