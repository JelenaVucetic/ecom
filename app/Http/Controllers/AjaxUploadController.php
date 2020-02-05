<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class AjaxUploadController extends Controller
{
    
    function action(Request $request){
        $validation = Validator::make($request->all(), [
            'file1' => 'required|mimes:jpeg,png,jpg,svg,ico|max:2048',
        ]);
        if($validation->passes()){

            $file = $request->file('file1');
            $file->move('image', $file->getClientOriginalName());
            $image =  $file->getClientOriginalName();

            return response()->json([
                'message' => 'Image uploaded',
                'upload_image' => $image
            ]);
        }else{
            return response()->json([
                'message'  => $validation->errors()->all()
            ]);
        }
    }


}