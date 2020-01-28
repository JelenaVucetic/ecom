<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\ProductProperty;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function index() 
    {   
        $products = DB::table('categories')->rightJoin('product', 'product.category_id', '=', 'categories.id')->get();
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
            'stock' => 'required',
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

    public function edit($id) 
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        //dd($request);
        $products = DB::table('product')->where('id', '=', $id)->get();
        $proId =$id;
        //dd($id);
        $name = $request->name;
        $category_id = $request->cat_id;
        $description = $request->description;
        $price = $request->price;
        $spl_price = $request->spl_price;

        DB::table('product')->where('id', $proId)->update([
            'name' => $name,
            'category_id' => $category_id,
            'description' => $description,
            'price'=> $price,
            'spl_price' => $spl_price
        ]);

        return view('admin.product.index', compact('products', 'category'));
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function ImageEditForm($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.ImageEditForm', compact('product'));
    }

    public function editProImage(Request $request)
    {
        
        $proid = $request->id;

        $image = $request->image;
        if($image) {
            $imageName = $image->getClientOriginalName();
            $image->move('images', $imageName);
            $formInput['image'] = $imageName;
        }

        DB::table('product')->where('id', $proid)->update(['image' => $imageName]);

        return redirect()->back();
    }

    public function addProperty($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.addProperty', compact('product'));
    }

    public function submitProperty(Request $request)
    {
        $properties = new ProductProperty;
        $properties->pro_id = $request->pro_id;
        $properties->size = $request->size;
        $properties->color = $request->color;
        $properties->p_price =  $request->p_price;
        $properties->save();
        return back();
    }
}
