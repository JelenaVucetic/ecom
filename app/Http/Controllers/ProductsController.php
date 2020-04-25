<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\Tag;
use App\ProductProperty;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function index()
    {
  /*       if(request('tag'))
        {
            $products = DB::table('categories')->rightJoin('product', 'product.category_id', '=', 'categories.id')->get();
            $products = Tag::where('name', request('tag'))->firstOrFail()->products;
            


           dd($products);
        } else { */
           /*  $products = DB::table('categories')->rightJoin('product', 'product.category_id', '=', 'categories.id')
            ->rightJoin('product_tag', 'product_tag.product_id', '=', 'categories.id')->get(); */
            $products = Product::all();
            $categories = Category::where('parent_id',NULL)->get();
         //   dd($products);
    /*     }
 */
        return view('admin.product.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::where('parent_id',NULL)->get();
       // dd($categories);
       $tags = Tag::all();
        return view('admin.product.create', compact(['categories', 'tags']));
    }

    public function store(Request $request)
    {
 
        $formInput = $request->except('image');
        

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'tags' => 'exists:tags,id',
            'price' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,svg|max:10000',
            'spl_price' => 'required'
        ]);

         $image = $request->image;

        if($image) {
            $imageName = $image-> getClientOriginalName();
            $image->move('images', $imageName);
            $formInput['image'] = $imageName;
        }

        $categories = Category::all();
        Product::create($formInput)->tags()->attach(request('tags'));
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
        $tags = Tag::all();
        return view('admin.product.edit', compact(['product', 'categories', 'tags']));
    }

    public function update(Request $request, $id)
    {

        $products = DB::table('product')->where('id', '=', $id)->get();

        $proId =$id;
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

        return redirect()->back()->with('status', 'Product updated!');
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

    public function addSale(Request $request) {

        $salePrice = $request->salePrice;
        $pro_id = $request->pro_id;
        DB::table('product')->where('id', $pro_id)->update(['spl_price' => $salePrice]);

        echo "added successfully";
    }
}
