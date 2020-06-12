<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\DB;
use Image;
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
            'name'  => 'required|min:3|max:255|string',
            'image' => 'required',
            'cover_image' => 'required'
        ]);

        if($request->hasFile('image')){
    		$image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image);
           
    		$img->save( public_path('/site-images/' . $filename ) );
        }

        if($request->hasFile('cover_image')){
    		$cover_image = $request->file('cover_image');
            $filename_cover = time() . 'second' . '.' . $cover_image->getClientOriginalExtension();
            $cover_img = Image::make($cover_image);
           
    		$cover_img->save( public_path('/site-images/' . $filename_cover ) );
    
        }

          DB::table('categories')->insert([
            'name' => $request->input('name'),
            'image' => $filename,
            'cover_image' => $filename_cover,
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        return back()->withSuccess('You have successfully created a Category!');
    }



    public function show(Request $request,$id) {
        //dd($request);
        $number = substr($request->fullUrl(),-1);
    
        $products = Category::find($id)->products;
        
        $categories = Category::where('parent_id',NULL)->get();
        $cat = Category::where('id',$id)->first("name");
        $cat = $cat->name;
        /* return response()->json([
            'prodcuts' => $products,
            'categories' => $categories
         ]);  */

               
        $clothingIds = Category::where('parent_id', $parentId = Category::where('name', $cat)
                ->value('id'))
                ->pluck('id')
                ->all();
                if(is_int($number)){

                }
        $mainCategory = Category::where("id",$id)->first();
        $clothingProducts =  Product::whereIn('category_id', $clothingIds)->get();
            
        return view('admin.category.show', compact('categories', 'products','number', 'cat' , 'id', 'clothingProducts', 'mainCategory'));
    }

    public function edit($id) {
        $categories = Category::where('parent_id',NULL)->get();
        $category = Category::findOrFail($id);

        return view('admin.category.edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id) {

        $category = DB::table('categories')->where('id', '=', $id)->get();
        $catId = $id;

        $name = $request->name;

        if($request->hasFile('image')){
    		$image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image);
           
            $img->save( public_path('/site-images/' . $filename ) );
            
            
        DB::table('categories')->where('id', $catId)->update([
            'image' => $filename
        ]);
        }

        if($request->hasFile('cover_image')){
    		$cover_image = $request->file('cover_image');
            $filename_cover = time() . 'second' . '.' . $cover_image->getClientOriginalExtension();
            $cover_img = Image::make($cover_image);
           
            $cover_img->save( public_path('/site-images/' . $filename_cover ) );

            DB::table('categories')->where('id', $catId)->update([
                'cover_image' => $filename_cover
            ]);
        }

        DB::table('categories')->where('id', $catId)->update([
            'name' => $name,
        ]);
        return redirect()->back()->with('status', 'Category updated!');
    }

    public function destroy($id) {
        Category::findOrFail($id)->delete();
        return redirect()->back();
    }

  
}
