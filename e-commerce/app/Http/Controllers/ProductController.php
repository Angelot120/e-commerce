<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view("products.list", ["products" => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view("products.create", ["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name; 
        $product->price = $request->price; 
        $product->description = $request->description; 
        $product->category_id = $request->category_id; 
        
        if ($request->hasFile("file")) {
            move_uploaded_file($_FILES['file']['tmp_name'], 'db/products/' . $_FILES['file']['name']);
            $product->file = $_FILES['file']['name'];
        } else {
            $product->file = '';
        }

        $product->save();
        return redirect()->route("product.list");
        // return view("products.list")->with('success', 'Produit ajouter avec succes.');
        // Un produit du même nom existe déjà
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $product = Product::find($id);
        // $categories = Category::all()->Product::find($id);
        $categories = Category::all();
        return view("products.edit", ["product" => $product, "categories" => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $product = Product::find($id);
        $product->name = $request->name; 
        $product->price = $request->price; 
        $product->description = $request->description;
        $product->save();
        return redirect()->route("product.list");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = Product::find($id);
        $product->delete();
        return back()->with('success', 'Votre produit a été supprimé avec succès!');
    }
}
