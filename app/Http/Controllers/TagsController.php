<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Product;
use Illuminate\Support\Facades\DB;

class TagsController extends Controller
{
    //
    public function index()
    {
        $tags = Tag::all();
        $products = Product::all();
        return view('admin.tag.index', compact(['tags', 'products']));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name'  => 'required|min:3|max:255|string'
        ]);

        Tag::create($request->all());
        return back()->withSuccess('You have successfully created a Tag!');
    }

    public function show($id) {
        $products = Tag::find($id)->products;
        $tags = Tag::all();

        return view('admin.tag.index', compact(['tags', 'products']));
    }

    public function edit($id) {
        $tag = Tag::findOrFail($id);

        return view('admin.tag.edit', compact('tag'));
    }

    public function update(Request $request, $id) {

        $tag = DB::table('tags')->where('id', '=', $id)->get();
        $tagId = $id;

        $name = $request->name;

        DB::table('tags')->where('id', $tagId)->update([
            'name' => $name
        ]);
        return redirect()->back()->with('status', 'Tag updated!');
    }

    public function destroy($id) {
        Tag::findOrFail($id)->delete();
        return redirect()->back();
    }

}
