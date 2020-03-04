<?php

namespace App\Http\Controllers;

//use Request;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator,Redirect,Response,File;
use Illuminate\Support\Facades\Input;
//use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function index() {
        return view('admin.upload_design.work');
    }
  
    public function upload(Request $request){
          
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048|jfif',

        ],
        ['file.required' => 'Morate izabrati fajl',
         'file.mimes' => 'Fajl mora biti: jpeg, png, jpg, gif',
         'file.jfif' => 'Fajl mora biti: jpeg, png, jpg, gif']
    );

        $file = $request->file('file');
        $image =  $file->getClientOriginalName();
        $file->move('image', $file->getClientOriginalName());
        $image1 = Image::make(public_path('image/' . $image));
        if($image1->width() > 400) {
            $image1->resize(200,100, function($constraint){
                $constraint->aspectRatio();
            }); 
        }

        $image1->save();

        $path = pathinfo($image);
        $ext = $path['extension'];

        return view('admin.upload_design.work', compact(['image', 'ext']));

}
  
      
}
