<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CategoriesController extends Controller
{
    //
    public function index() {
        $categories = Category::all();
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

    }

    public function update(Request $request, $id) {

    }

    public function destroy($id) {

    }
}
