<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
                'name' => 'required',
                 'price' => 'required|numeric',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            $input = $request->all();
    
            if ($image = $request->file('image')) {
                $destinationPath = 'image/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['image'] = $profileImage;
            }
    
            Product::create($input);
    
            return redirect()->route('products.index')->with('success', 'Product created successfully');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('products.show')->with('product', Product::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('products.edit')->with('product', Product::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $product = Product::find($id);
        $product->update($input);

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success','Product deleted successfully');
    }
}
