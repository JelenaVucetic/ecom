<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use App\Image as ImageModel;
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
               
                $image_resize = Image::make(public_path('image/'. $image))->resize(300, 150, function ($c) {
                    $c->aspectRatio();
                });
                $image_resize->save();
              
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
      $originalImagePath = $data['originalImagePath'];
      $canvasImage = $data['canvasImage'];
      $gender = $data['gedner'];
      $category = $data['category'];
      
       if($canvasImage!==null && $canvasImage!=="0"){
        $canvasImage = explode(";" ,  $canvasImage)[1];  
        $canvasImage = explode("," ,  $canvasImage)[1];
        $canvasImage = str_replace(" ", "+",  $canvasImage);
        $canvasImage = base64_decode( $canvasImage);
        $characters1 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name1 = mt_rand(1000000, 9999999)
        . mt_rand(1000000, 9999999)
        . $characters1[rand(0, strlen($characters1) - 1)];
        $string1 = str_shuffle($name1);
        $string1 .=  round(microtime(true) * 1000);
        
        file_put_contents("canvas/". $string1 . ".png", $canvasImage);
    }  

    
 /*    if($canvasImage!=="0"){
        
       if( $canvasImage = explode(";" ,  $canvasImage)[1]){
        $canvasImage = explode("," ,  $canvasImage)[1];
        $canvasImage = str_replace(" ", "+",  $canvasImage);
        $canvasImage = base64_decode( $canvasImage);
        $characters1 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name1 = mt_rand(1000000, 9999999)
        . mt_rand(1000000, 9999999)
        . $characters1[rand(0, strlen($characters1) - 1)];
        $string1 = str_shuffle($name1);
        file_put_contents("canvas/". $string1 . ".png", $canvasImage);
    } 
    } */

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
    $checkImage = $image;
    $image = explode(";" , $image)[1];  
    $image = explode("," , $image)[1];
    $image = str_replace(" ", "+", $image);

    $image = base64_decode($image);

$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$name = mt_rand(1000000, 9999999)
    . mt_rand(1000000, 9999999)
    . $characters[rand(0, strlen($characters) - 1)];

$string = str_shuffle($name);
$string .=  round(microtime(true) * 1000);

file_put_contents("images/". $string . ".png", $image);

 
$row = DB::table('design')->where('name',  $originalImagePath)->first();

if($row==null){
    $idDesign = DB::table('design')->insertGetId([
        'name' => $originalImagePath
    ]);  
} else {
    $idDesign = $row->id;
}


 $idProduct = DB::table('product')->insertGetId([
'name'=> $title, 'description'=> $description, 'price'=>$price,'image'=> $string.'.png', 'design_id' => $idDesign, 'gender' => $gender, 'category_id' => $category
]); 

if($original=='T-shirt' && ($gender == "female" || $gender == "unisex")){
    ImageModel::womanWhiteTshirt($idProduct, $originalImagePath);
    ImageModel::womanNavyTshirt($idProduct, $originalImagePath);
    ImageModel::womanRedTshirt($idProduct, $originalImagePath);
    ImageModel::womanBlackTshirt($idProduct, $originalImagePath);
    ImageModel::womanRedBackTshirt($idProduct, $originalImagePath);
    ImageModel::womanNavyBackTshirt($idProduct, $originalImagePath);
    ImageModel::womanBlackBackTshirt($idProduct, $originalImagePath);
    ImageModel::womanWhiteBackTshirt($idProduct, $originalImagePath);
}
if($original=='T-shirt' && ($gender == "male" || $gender == "unisex")){

}
if($original=='Phone Case'){
    ImageModel::iphonePhoneCase($idProduct, $originalImagePath);
    ImageModel::samsungP20PhoneCase($idProduct, $originalImagePath);
}


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

echo $checkImage;

    }


    

    function save1(Request $request){

        $data = $request->all();
       
      
        $title = $data['name'];
        $image = $data['image'];;
        $tags = $data['tag'];
        $description = $data['description1'];
        $original = $data['originalName1'];
        $originalImagePath = $data['originalImagePath'];
        $canvasImage = $data['canvasImage'];
        $gender = $data['gedner'];
        $category = $data['category'];

        $file = $request->file('file');
        $imageName =  $file->getClientOriginalName();
        $imageName = preg_replace('/\s+/', '', $imageName);
        $filename = pathinfo($imageName, PATHINFO_FILENAME);
        
        $extension =  $request->file('file')->getClientOriginalExtension();
       // dd($extension);
        $image = $originalImagePath;
         $file->move('design/', $image); 
  
         $process0 = new Process('magick convert  C:\xampp\htdocs\www\imageMagick\public\image\U-one-16.jpg 
         -resize 1500x2500
         C:\xampp\htdocs\www\imageMagick\public\image\U-one-16.jpg 
          ');
          $process0->run();
          if (!$process0->isSuccessful()) {
              throw new ProcessFailedException($process0);
          } 
  
         $process = new Process('magick convert  C:\xampp\htdocs\www\imageMagick\public\image\U-one-16.jpg[403x422+584+601] 
         -colorspace gray 
         -blur 10x250 
         -auto-level
         C:\xampp\htdocs\www\imageMagick\public\image\displace_map.png
          ');
    
     $process->run();
     if (!$process->isSuccessful()) {
         throw new ProcessFailedException($process);
     }
        /*  echo $process->getOutput();
         echo '<img src="\image\displace_map.png">'; */
  
         $imageName1 = "/" .  $image; 
  
         $process1 = new Process('magick convert  C:\xampp\htdocs\www\imageMagick\public\design' . $imageName1 . '
      
         -resize 300x300
         C:\xampp\htdocs\www\imageMagick\public\design' . $imageName1 . '
         '); 
         
      $process1->run();
       if (!$process1->isSuccessful()) {
           throw new ProcessFailedException($process1);    
     } 
  
  
         $process2 = new Process('magick convert 
         C:\xampp\htdocs\www\imageMagick\public\design' . $imageName1 . '
         -bordercolor transparent -border 12x12 -thumbnail 403x422 
         C:\xampp\htdocs\www\imageMagick\public\image\ms_temp.png
          ');
    
     $process2->run();
     if (!$process1->isSuccessful()) {
         throw new ProcessFailedException($process2);
     }
        /*  echo $process2->getOutput();
         echo '<img src="\image\ms_temp.png">'; */
  
        
  
         $process3 = new Process('magick convert 
         C:\xampp\htdocs\www\imageMagick\public\image\U-one-16.jpg[403x422+584+601] 
         -colorspace gray -blur 10x250 -auto-level 
         -depth 16 
         C:\xampp\htdocs\www\imageMagick\public\image\ms_displace_map.png
          ');
    
     $process3->run();
     if (!$process3->isSuccessful()) {
         throw new ProcessFailedException($process3);
     }
        /*  echo $process3->getOutput();
         echo '<img src="\image\ms_displace_map.png">'; */
        
         $process4 = new Process('magick convert ^
         C:\xampp\htdocs\www\imageMagick\public\image\ms_temp.png ^
         C:\xampp\htdocs\www\imageMagick\public\image\ms_displace_map.png ^
         -alpha set -virtual-pixel transparent ^
         -compose displace -set option:compose:args -5x-5 -composite ^
         -depth 16 ^
         C:\xampp\htdocs\www\imageMagick\public\image\ms_displaced_logo.png
       
          ');
    
     $process4->run();
     if (!$process4->isSuccessful()) {
         throw new ProcessFailedException($process4);
     }
        /*  echo $process4->getOutput();
         echo '<img src="\image\ms_displaced_logo.png">'; */
  
         
         $process5 = new Process('magick convert ^
         C:\xampp\htdocs\www\imageMagick\public\image\U-one-16.jpg[403x422+584+601] ^
         -colorspace gray -auto-level ^
         -blur 0x3 ^
         -contrast-stretch 0,50%% ^
         -depth 16 ^
         C:\xampp\htdocs\www\imageMagick\public\image\ms_light_map.png
          ');
  
          /* Makao sam komandu -separate proces 5 */
    
     $process5->run();
     if (!$process5->isSuccessful()) {
         throw new ProcessFailedException($process5);
     }
       /*   echo $process5->getOutput();
         echo '<img src="\image\ms_light_map.png">';
          */
         $process6 = new Process('magick convert ^
         C:\xampp\htdocs\www\imageMagick\public\image\ms_displaced_logo.png ^
         -channel matte -separate ^
         C:\xampp\htdocs\www\imageMagick\public\image\ms_logo_displace_mask.png
          ');
    
     $process6->run();
     if (!$process6->isSuccessful()) {
         throw new ProcessFailedException($process6);
     }
       /*   echo $process6->getOutput();
         echo '<img src="\image\ms_logo_displace_mask.png">'; */
         
         $process7 = new Process('magick convert ^
         C:\xampp\htdocs\www\imageMagick\public\image\ms_displaced_logo.png ^
         C:\xampp\htdocs\www\imageMagick\public\image\ms_light_map.png ^
         -compose Multiply -composite ^
         C:\xampp\htdocs\www\imageMagick\public\image\ms_logo_displace_mask.png ^
         -compose CopyOpacity -composite ^
         C:\xampp\htdocs\www\imageMagick\public\image\ms_light_map_logo.png
         ');
   
    $process7->run();
    if (!$process7->isSuccessful()) {
        throw new ProcessFailedException($process7);
    }
       /*  echo $process7->getOutput();
        echo '<img src="\image\ms_light_map_logo.png">'; */
        
  
  
        
  
         $process8 = new Process('magick convert ^
         C:\xampp\htdocs\www\imageMagick\public\image\U-one-16.jpg ^
         C:\xampp\htdocs\www\imageMagick\public\image\ms_light_map_logo.png ^
         -geometry +584+601 ^
         -compose over -composite ^
         -depth 16 ^
         C:\xampp\htdocs\www\imageMagick\public\image\ms_product.png
         ');
   
    $process8->run();
    if (!$process8->isSuccessful()) {
        throw new ProcessFailedException($process8);
    }
       /*  echo $process8->getOutput();
        echo '<img src="\image\ms_product.png">'; */
        

      
       if($canvasImage!==null && $canvasImage!=="0"){
        $canvasImage = explode(";" ,  $canvasImage)[1];  
        $canvasImage = explode("," ,  $canvasImage)[1];
        $canvasImage = str_replace(" ", "+",  $canvasImage);
        $canvasImage = base64_decode( $canvasImage);
        $characters1 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name1 = mt_rand(1000000, 9999999)
        . mt_rand(1000000, 9999999)
        . $characters1[rand(0, strlen($characters1) - 1)];
        $string1 = str_shuffle($name1);
        $string1 .=  round(microtime(true) * 1000);
        
        file_put_contents("canvas/". $string1 . ".png", $canvasImage);
    }  

    
 /*    if($canvasImage!=="0"){
        
       if( $canvasImage = explode(";" ,  $canvasImage)[1]){
        $canvasImage = explode("," ,  $canvasImage)[1];
        $canvasImage = str_replace(" ", "+",  $canvasImage);
        $canvasImage = base64_decode( $canvasImage);
        $characters1 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name1 = mt_rand(1000000, 9999999)
        . mt_rand(1000000, 9999999)
        . $characters1[rand(0, strlen($characters1) - 1)];
        $string1 = str_shuffle($name1);
        file_put_contents("canvas/". $string1 . ".png", $canvasImage);
    } 
    } */

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
    $checkImage = $image;
    $image = explode(";" , $image)[1];  
    $image = explode("," , $image)[1];
    $image = str_replace(" ", "+", $image);

    $image = base64_decode($image);

$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$name = mt_rand(1000000, 9999999)
    . mt_rand(1000000, 9999999)
    . $characters[rand(0, strlen($characters) - 1)];

$string = str_shuffle($name);
$string .=  round(microtime(true) * 1000);

file_put_contents("images/". $string . ".png", $image);

 
$row = DB::table('design')->where('name',  $originalImagePath)->first();

if($row==null){
    $idDesign = DB::table('design')->insertGetId([
        'name' => $originalImagePath
    ]);  
} else {
    $idDesign = $row->id;
}


 $idProduct = DB::table('product')->insertGetId([
'name'=> $title, 'description'=> $description, 'price'=>$price,'image'=> $string.'.png', 'design_id' => $idDesign, 'gender' => $gender, 'category_id' => $category
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

echo $checkImage;

    }



}
