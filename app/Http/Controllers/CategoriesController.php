<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    //
    public function index() {
        $categories = Category::all();
        $products = Product::all();
        return view('admin.category.index', compact(['categories', 'products']));
    }
/*
    public function create() {
        return view('admin.category.create');
    } */

    public function store(Request $request) {
        Category::create($request->all());
        return back();
    }

    public function show($id) {
        $products = Category::find($id)->products;
        $categories = Category::all();

        return view('admin.category.index', compact(['categories', 'products']));
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
