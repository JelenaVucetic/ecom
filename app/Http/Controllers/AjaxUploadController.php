<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use App\Tag;
//use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\Facades\Image;

class AjaxUploadController extends Controller
{

    function action(Request $request){
        $validation = Validator::make($request->all(), [
            'file1' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if($validation->passes()){

            $file = $request->file('file1');

            
            $file->move('image', $file->getClientOriginalName());
            $image =  $file->getClientOriginalName();
                $filename    = $image;
               
                $image_resize = Image::make(public_path('image/'. $image))->resize(200, 150, function ($c) {
                    $c->aspectRatio();
                });
                $image_resize->save();
              /*   dd(response()->json([
                    'message' => 'Image uploaded',
                    'upload_image' => $image
                ])); */
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


    function save(Request $request){
        $data = $request->all();
       
      $title = $data['name'];
      $image = $data['image'];;
      $tags = $data['tag'];
      $description = $data['description1'];
      $original = $data['originalName1'];

     
       

$price = 0;

if($original=='Phone Case'){
    $price = 10;
}else if($original=='T-shirt'){
    $price = 15;
}else if($original=='Mugs'){
    $price = 12;
}else if($original=='Hoodie'){
    $price = 25;
}else{
    $price = 0;
}
 
    $image = explode(";" , $image)[1];  
    $image = explode("," , $image)[1];
    $image = str_replace(" ", "+", $image);

    $image = base64_decode($image);

$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$name = mt_rand(1000000, 9999999)
    . mt_rand(1000000, 9999999)
    . $characters[rand(0, strlen($characters) - 1)];

$string = str_shuffle($name);

file_put_contents("images/". $string . ".png", $image);



 DB::table('product')->insert([
'name'=> $title, 'description'=> $description, 'price'=>$price,'image'=> $string.'.png'
]); 

$products = DB::table('product')->where([
    ['name', '=' , $title],
    ['image', '=', $string.'.png']
])->get();

 $productId = 0;
 foreach($products as $product){
    $productId =  $product->id;
 }


$tagsComma = explode("," , $tags);

foreach($tagsComma as $tag){
    Tag::firstOrCreate([
        'name'=> $tag . " " . $original,
        ]); 
    $tagId = DB::table('tags')->where('name',$tag)->get('id');    
        foreach($tagId as $Id){
            
        DB::table('product_tag')->insert([
            'product_id'=> $productId,
            'tag_id'=> $Id->id
            ]); 
        }

}

echo 'Done';

    }

}
