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
    public function store()
    {
        $rules = [
            "title"=> ["required", "max:255"],
            "description"=> ["required","max:1000"],
            "price"=>["required","min:1"],
            "stock"=> ["required", "min:0"],
            "status"=>["required", "in:available,unavailable"]
        ];
        request()->validate($rules);
        //
        if(request()->stock == 0 && request()->status =="available"){
            // //going to put the element in the section until the next request
            // session()->flash("error","If available must have stock");
            return redirect()
            ->back()
            //if we fail the create rules it wont let to lose the typed form datas
            ->withInput(request()->all())
            ->withErrors("If availalble must have stock");
        }
        //if these rules fails automatically redirect->back
        $product = Product::create(request()->all());
    
        return redirect()
        ->route("products.index")
        ->withSuccess("New product with id  {$product->id} was created");
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
        $rules = [
            "title"=> ["required", "max:255"],
            "description"=> ["required","max:1000"],
            "price"=>["required","min:1"],
            "stock"=> ["required", "min:0"],
            "status"=>["required", "in:available,unavailable"]
        ];
        request()->validate($rules);
        //update request
        $product = Product::findOrFail($productId);
        $product->update(request()->all());
        return redirect()->route("products.index")
        ->withSuccess("The product with id {$product->id} was updated");
    }
    
    public function destroy($productId){
        $product = Product::findOrFail($productId);
        //i remove from database , not from memory
        $product->delete();
        //in the memory this is still accessable, thats why we can return the deleted element
        return redirect()->route("products.index")
        ->withSuccess("The product with id {$product->id} was removed");
    }
}
