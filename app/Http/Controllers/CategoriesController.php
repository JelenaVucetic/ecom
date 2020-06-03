<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{

    public function __construct() 
    {
        $this->middleware('admin', ['except' => ['index', 'show']]); 
    }
    //
    public function index() {
        $categories = Category::where('parent_id',NULL)->get();
        $products = Product::all();
        return view('admin.category.index', compact(['categories', 'products']));
    }

    public function create() {
        $categories = Category::where('parent_id',NULL)->get();
        return view('admin.category.create', compact('categories'));
    } 

    public function store(Request $request) {
        $this->validate($request, [
            'name'  => 'required|min:3|max:255|string'
        ]);

        Category::create($request->all());
        return back()->withSuccess('You have successfully created a Category!');
    }



    public function show(Request $request,$id) {
        
        $number = substr($request->fullUrl(),-1);
    
        $products = Category::find($id)->products;
        
        $categories = Category::where('parent_id',NULL)->get();

        /* return response()->json([
            'prodcuts' => $products,
            'categories' => $categories
         ]);  */
        return view('admin.category.show', compact(['categories', 'products','number']));
    }

    public function edit($id) {
        $category = Category::findOrFail($id);

        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id) {

        $category = DB::table('categories')->where('id', '=', $id)->get();
        $catId = $id;

        $name = $request->name;

        DB::table('categories')->where('id', $catId)->update([
            'name' => $name
        ]);
        return redirect()->back()->with('status', 'Category updated!');
    }

    public function destroy($id) {
        Category::findOrFail($id)->delete();
        return redirect()->back();
    }

  
}
