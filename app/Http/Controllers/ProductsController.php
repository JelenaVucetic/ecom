<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function index() 
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function create() 
    {
        $categories = Category::pluck('name', 'id');
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        
        $formInput = $request->except('image');
        //dd($formInput);

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg,svg|max:10000',
            'spl_price' => 'required'
        ]);
       
         $image = $request->image;
        
        if($image) {
            $imageName = $image-> getClientOriginalName();
            $image->move('images', $imageName);
            $formInput['image'] = $imageName;
        } 

        $categories = Category::all();
        Product::create($formInput);
        return redirect()->back();
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.show', compact('product'));
    }

    public function destroy()
    {
        
    }
}
