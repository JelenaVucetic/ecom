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

      $picture = $data['picture'];

      if($picture!==null && $picture!=="0"){
        $picture = explode(";" ,  $picture)[1];
        $picture = explode("," ,  $picture)[1];
        $picture = str_replace(" ", "+",  $picture);
        $picture = base64_decode( $picture);
        $characters1 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name1 = mt_rand(1000000, 9999999)
        . mt_rand(1000000, 9999999)
        . $characters1[rand(0, strlen($characters1) - 1)];
        $string2 = str_shuffle($name1);
        $string2 .=  round(microtime(true) * 1000);

        file_put_contents("canvas_picture/". $string2 . ".png", $picture);
    }

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
$price = 6.90;
}else if($original=='T-shirt'){
$price = 12.90;
}else if($original=='Mugs'){
$price = 12;
}else if($original=='Hoodie'){
$price = 22.90;
}else if($original == "Poster"){
$price = 11;
$priceB1 = 18;
$priceB2 = 15;
}else if($original == "Canvas"){
$price = 37;
$priceB2 = 20;
$priceB1 = 28;
}else if($original == "Wallpapers"){
$price = 15;
}else if($original == "Samsung"){
$price = 6.90;
}else if($original == "Huawei"){
$price = 6.90;
}else if($original == "Custom"){
$price = 6.90;
}else if($original == "Magnets"){
$price = 1.90;
}else if($original == "Makeup Bags"){
$price = 3.90;
}else if($original == "Puzzles"){
$price = 2.90;
}else if($original == "Coasters"){
$price = 0.99;
}else if($original == "Termos"){
$price = 5.99;
}else if($original == "Mugs"){
$price = 4.90;
}else if($original == "Tote Bags"){
$price = 3.90;
}else if($original == "Notes"){
$price = 4.90;
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

if($original == "Poster"){
 $idProduct = DB::table('product')->insertGetId([
'name'=> $title, 'description'=> $description, 'price'=>$price,'image'=> $string.'.png', 'design_id' => $idDesign, 'gender' => $gender, 'category_id' => $category, 'price_b2' => $priceB2 , 'price_b1' => $priceB1
]);
 }else if($original == "Canvas"){
    $idProduct = DB::table('product')->insertGetId([
        'name'=> $title, 'description'=> $description, 'price'=>$price,'image'=> $string.'.png', 'design_id' => $idDesign, 'gender' => $gender, 'category_id' => $category, 'price_b1' => $priceB1, 'price_b2' => $priceB2
        ]);
 }else{
    $idProduct = DB::table('product')->insertGetId([
        'name'=> $title, 'description'=> $description, 'price'=>$price,'image'=> $string.'.png', 'design_id' => $idDesign, 'gender' => $gender, 'category_id' => $category
        ]);
 }

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
    ImageModel::manWhiteTshirt($idProduct, $originalImagePath);
    ImageModel::manNavyTshirt($idProduct, $originalImagePath);
    ImageModel::manRedTshirt($idProduct, $originalImagePath);
    ImageModel::manBlackTshirt($idProduct, $originalImagePath);
    ImageModel::manRedBackTshirt($idProduct, $originalImagePath);
    ImageModel::manNavyBackTshirt($idProduct, $originalImagePath);
    ImageModel::manBlackBackTshirt($idProduct, $originalImagePath);
    ImageModel::manWhiteBackTshirt($idProduct, $originalImagePath);
}
if($original=='Phone Case'){
    ImageModel::iphonePhoneCase($idProduct, $originalImagePath);

}
if($original == 'Samsung'){
    ImageModel::samsungP20PhoneCase($idProduct, $originalImagePath);
    ImageModel::samsungS20PlusPhoneCase($idProduct, $originalImagePath);
}
if($original == "Huawei"){
    ImageModel::huaweiP20($idProduct, $originalImagePath);
}
if($original == "Poster"){
    ImageModel::whiteFrameThumb($idProduct, $originalImagePath);
    ImageModel::blackFrameA3($idProduct, $originalImagePath);
    ImageModel::blackFrameB1($idProduct, $originalImagePath);
    ImageModel::blackFrameB2($idProduct, $originalImagePath);
    ImageModel::blackFrameThumb($idProduct, $originalImagePath);
    ImageModel::whiteFrameA3($idProduct, $originalImagePath);
    ImageModel::whiteFrameB1($idProduct, $originalImagePath);
    ImageModel::whiteFrameB2($idProduct, $originalImagePath);
}
if($original == "Canvas"){
    ImageModel::canvasThumb($idProduct, $originalImagePath);
    ImageModel::canvas($idProduct, $originalImagePath);
}
if($original == "Wallpapers"){
    ImageModel::wallpaperRepeat($idProduct, $originalImagePath);
    ImageModel::wallpaper($idProduct, $originalImagePath);
}
if($original == "Clocks"){
    ImageModel::clock($idProduct, $originalImagePath);
}
if($original == "Bags"){
    ImageModel::cegerThumb($idProduct, $originalImagePath);
    ImageModel::ceger($idProduct, $originalImagePath);
}
if($original == "Coasters"){
    ImageModel::coastersSquare($idProduct, $originalImagePath);
    ImageModel::coastersCircle($idProduct, $originalImagePath);
}
if($original == "Sacks"){
    ImageModel::sacksHo2($idProduct, $originalImagePath);
    ImageModel::sacks($idProduct, $originalImagePath);
}
if($original == "Notes"){
    ImageModel::notes($idProduct, $originalImagePath);
}
if($original == "Puzzles"){
    ImageModel::puzzle($idProduct, $originalImagePath);
}
if($original == "Makeup Bags"){
    ImageModel::makeupBags($idProduct, $originalImagePath);
}
if($original == "Magnets"){
    ImageModel::magnetRectangle($idProduct, $originalImagePath);
    ImageModel::magnetCircle($idProduct, $originalImagePath);
}
if($original == "Mugs"){
    ImageModel::mugThumb($idProduct, $originalImagePath);
     ImageModel::mugMain($idProduct, $originalImagePath);  
}
if($original == "Termos"){
    ImageModel::thermos($idProduct, $originalImagePath);
}
if($original == "Masks"){
    ImageModel::masks($idProduct, $originalImagePath);
}
if($original == "Custom"){
    ImageModel::customCase($idProduct, $originalImagePath);
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
