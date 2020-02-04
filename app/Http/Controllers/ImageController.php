<?php

namespace App\Http\Controllers;

//use Request;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator,Redirect,Response,File;
use Illuminate\Support\Facades\Input;

class ImageController extends Controller
{
    public function index() {
        return view('admin.upload_design.work');
    }
  
    public function upload(Request $request){
          
        $this->validate($request, [
            'file' => 'required|mimes:jpeg,png,jpg,svg,ico|max:2048',
        ],
        ['file.required' => 'Fajl mora biti: jpeg, png, svg, jpg, ico']
    );

        $file = $request->file('file');
        
        $file->move('image', $file->getClientOriginalName());
        $image =  $file->getClientOriginalName();
    
        $path = pathinfo($image);
        $ext = $path['extension'];

        return view('admin.upload_design.work', compact(['image', 'ext']));

}
  
      
}
