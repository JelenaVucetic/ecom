<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ImageMagick extends Model
{
    protected $table = 'images';
    protected $primaryKey = 'id';

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public static function womanWhiteTshirt($id , $image){

        $path = public_path();



          exec('magick convert '.$path.'\site-images\U-one-16.jpg 
          -resize 1500x2500
          '.$path.'\site-images\U-one-16.jpg 
           ');

           exec('magick convert   '.$path.'\site-images\U-one-16.jpg[303x322+610+531] 
           -colorspace gray 
           -blur 10x250 
           -auto-level
           '.$path.'\image\displace_map.png
            ');
  
       
  
         $imageName1 = "/" .  $image; 
  
    

            exec('magick convert   '.$path.'\design' . $imageName1 . '
            -resize 300x300
            '.$path.'\resized_pictures' . $imageName1 . '
            '); 
  
  
    
    
          exec('magick convert 
          '.$path.'\resized_pictures' . $imageName1 . '
          -bordercolor transparent -border 12x12 -thumbnail 303x322 
          '.$path.'\image\ms_temp.png
           ');

    
   exec('magick convert 
   '.$path.'\site-images\U-one-16.jpg[303x322+610+531] 
   -colorspace gray -blur 10x250 -auto-level 
   -depth 16 
   '.$path.'\image\ms_displace_map_girl_white_regular.png
    ');
        
    
   exec('magick convert 
   '.$path.'\image\ms_temp.png 
   '.$path.'\image\ms_displace_map_girl_white_regular.png 
   -alpha set -virtual-pixel transparent 
   -compose displace -set option:compose:args -5x-5 -composite 
   -depth 16 
   '.$path.'\image\ms_displaced_logo.png
    ');
  
         
         
  
    exec('magick convert 
    '.$path.'\site-images\U-one-16.jpg[303x322+610+531] 
    -colorspace gray -auto-level 
    -blur 0x4 
    -contrast-stretch 0,30%% 
    -depth 16 
    '.$path.'\image\ms_light_map_girl_white_regular.png
    ');
         
        
    
        exec('magick convert 
        '.$path.'\image\ms_displaced_logo.png 
        -channel matte -separate 
        '.$path.'\image\ms_logo_displace_mask.png
         ');
         
       
   
 exec('magick convert 
 '.$path.'\image\ms_displaced_logo.png 
 '.$path.'\image\ms_light_map_girl_white_regular.png 
 -compose Multiply -composite 
 '.$path.'\image\ms_logo_displace_mask.png 
 -compose CopyOpacity -composite 
 '.$path.'\image\ms_light_map_logo.png
 ');
        
        list($width, $height) = getimagesize($path.'\image\ms_light_map_logo.png');
  
        
        
      $X = 610 + (303-$width)/2;
      $Y = 531 +  (322-$height)/2;
      
       
       $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
       $name = mt_rand(1000000, 9999999)
           . mt_rand(1000000, 9999999)
           . $characters[rand(0, strlen($characters) - 1)];
       
       $string = str_shuffle($name);
       $string .=  round(microtime(true) * 1000);
       $imageRandom = '/' . $string . '.png';
 
 
        
  
 exec('magick convert 
 '.$path.'\site-images\U-one-16.jpg 
 '.$path.'\image\ms_light_map_logo.png 
 -geometry +'.$X.'+'.$Y.' 
 -compose over -composite 
 -depth 16 
 -composite
 '.$path.'\image' .$imageRandom. '
 ');

 

   $imageRandom = ltrim($imageRandom, '/');

   move(public_path('image'), $imageRandom );

   $check = DB::table('images')->insert([
    'name' => $imageRandom, 'product_id' => $id, 'color' => 'white', 'position' => 'front', 'gender' => 'female'
       ]);

   return $check;

    }


    public static function womanNavyTshirt($id, $image){

        $path = public_path();
  
       
      exec('magick convert  '.$path.'\site-images\U-one-13.jpg 
      -resize 1500x2500
      '.$path.'\site-images\U-one-13.jpg 
       ');
  
        
  
         
    
  exec('magick convert   '.$path.'\site-images\U-one-13.jpg[303x322+599+561] 
  -colorspace gray 
  -blur 10x250 
  -auto-level
  '.$path.'\image\displace_map.png
   ');
  
         $imageName1 = "/" .  $image; 
  
         
   exec('magick convert  '.$path.'\design' . $imageName1 . '
   -resize 300x300
   '.$path.'\resized_pictures' . $imageName1 . '
   '); 
  
  
    
        exec('magick convert 
        '.$path.'\resized_pictures' . $imageName1 . '
        -bordercolor transparent -border 12x12 -thumbnail 303x322 
        '.$path.'\image\ms_temp.png
         ');
  
        
  
    
   exec('magick convert 
   '.$path.'\site-images\U-one-13.jpg[303x322+599+561] 
   -colorspace gray -blur 10x250 -auto-level 
   -depth 16 
   '.$path.'\image\ms_displace_map_girl_navy_regular.png
    ');
        

    
    exec('magick convert 
    '.$path.'\image\ms_temp.png 
    '.$path.'\image\ms_displace_map_girl_navy_regular.png 
    -alpha set -virtual-pixel transparent 
    -compose displace -set option:compose:args -5x-5 -composite 
    -depth 16 
    '.$path.'\image\ms_displaced_logo.png
     ');
    
    
    exec('magick convert 
    '.$path.'\site-images\U-one-13.jpg[303x322+599+561] 
    -colorspace gray -auto-level 
    -blur 0x3 
    -contrast-stretch 0,50%% 
    -depth 26 
    '.$path.'\image\ms_light_map_girl_navy_regular.png
     ');
         

    
  exec('magick convert 
  '.$path.'\image\ms_displaced_logo.png 
  -channel matte -separate 
  '.$path.'\image\ms_logo_displace_mask.png
   ');
   
         
         
   
exec('magick convert 
'.$path.'\image\ms_displaced_logo.png 
'.$path.'\image\ms_light_map_girl_navy_regular.png 
-compose Multiply -composite 
'.$path.'\image\ms_logo_displace_mask.png 
-compose CopyOpacity -composite 
'.$path.'\image\ms_light_map_logo.png
');
      
        
  
  
            
      list($width, $height) = getimagesize($path.'\image\ms_light_map_logo.png');
  
      
      $X = 599 + (303-$width)/2;
      $Y = 561 +  (322-$height)/2;

      $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $name = mt_rand(1000000, 9999999)
          . mt_rand(1000000, 9999999)
          . $characters[rand(0, strlen($characters) - 1)];
      
      $string = str_shuffle($name);
      $string .=  round(microtime(true) * 1000);
      $imageRandom = '/' . $string . '.png';
  

   
        exec('magick convert 
        '.$path.'\site-images\U-one-13.jpg 
        '.$path.'\image\ms_light_map_logo.png 
        -geometry +'.$X.'+'.$Y.' 
        -compose over -composite 
        -depth 16 
        '.$path.'\image' . $imageRandom . '
        ');
            
    $imageRandom = ltrim($imageRandom, '/');

        $check = DB::table('images')->insert([
            'name' => $imageRandom, 'product_id' => $id, 'color' => 'navy', 'position' => 'front', 'gender' => 'female'
           ]);
        
           return $check;
        
  
      }





      public static function womanRedTshirt($id , $image ){

        $path = public_path();
  
        
       exec('magick convert  '.$path.'\site-images\U-one-6.jpg 
       -resize 1500x2500
       '.$path.'\site-images\U-one-6.jpg 
        ');
 
   
  exec('magick convert   '.$path.'\site-images\U-one-6.jpg[303x322+610+531] 
  -colorspace gray 
  -blur 10x250 
  -auto-level
  '.$path.'\image\displace_map_girl_red_regular.png
   ');
 
        $imageName1 = "/" .  $image; 
 
      
        
    exec('magick convert   '.$path.'\design' . $imageName1 . '
    -resize 300x300
    '.$path.'\resized_pictures' . $imageName1 . '
    '); 
 
 
   
   exec('magick convert 
   '.$path.'\resized_pictures' . $imageName1 . '
   -bordercolor transparent -border 12x12 -thumbnail 303x322 
   '.$path.'\image\ms_temp.png
    ');
 
       
 
        
   
   exec('magick convert 
   '.$path.'\site-images\U-one-6.jpg[303x322+610+531] 
   -colorspace gray -blur 10x250 -auto-level 
   -depth 16 
   '.$path.'\image\ms_displace_map_girl_red_regular.png
    ');
       
        
   
   exec('magick convert 
   '.$path.'\image\ms_temp.png 
   '.$path.'\image\ms_displace_map_girl_red_regular.png 
   -alpha set -virtual-pixel transparent 
   -compose displace -set option:compose:args -5x-5 -composite 
   -depth 16 
   '.$path.'\image\ms_displaced_logo_girl_red_regular.png
 
    ');
 
   
 
       exec('magick convert 
       '.$path.'\site-images\U-one-6.jpg[303x322+610+531] 
       -colorspace gray -auto-level 
       -blur 0x3 
       -contrast-stretch 0,30%% 
       -depth 16 
       '.$path.'\image\ms_light_map_girl_red_regular.png
        ');
        
   
   exec('magick convert 
   '.$path.'\image\ms_displaced_logo_girl_red_regular.png 
   -channel matte -separate 
   '.$path.'\image\ms_logo_displace_mask.png
    ');

  
  exec('magick convert 
  '.$path.'\image\ms_displaced_logo_girl_red_regular.png 
  '.$path.'\image\ms_light_map_girl_red_regular.png 
  -compose Multiply -composite 
  '.$path.'\image\ms_logo_displace_mask.png 
  -compose CopyOpacity -composite 
  '.$path.'\image\ms_light_map_logo.png
  ');
       
 
       list($width, $height) = getimagesize($path.'\image\ms_light_map_logo.png');
      
   $X = 610 + (303-$width)/2;
   $Y = 531 +  (322-$height)/2;
       
   $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $name = mt_rand(1000000, 9999999)
       . mt_rand(1000000, 9999999)
       . $characters[rand(0, strlen($characters) - 1)];
   
   $string = str_shuffle($name);
   $string .=  round(microtime(true) * 1000);
   $imageRandom = '/' . $string . '.png';

  
 exec('magick convert 
 '.$path.'\site-images\U-one-6.jpg 
 '.$path.'\image\ms_light_map_logo.png 
 -geometry +'.$X.'+'.$Y.' 
 -compose over -composite 
 -depth 16 
 '.$path.'\image'.$imageRandom.'
 ');

       $imageRandom = ltrim($imageRandom, '/');
       
       $check = DB::table('images')->insert([
        'name' => $imageRandom, 'product_id' => $id, 'color' => 'red', 'position' => 'front', 'gender' => 'female'
       ]);
    
       return $check;
      }


      public static function womanBlackTshirt($id, $image){

        $path = public_path();
  
         
       exec('magick convert  '.$path.'\site-images\U-one-5.jpg 
       -resize 1500x2500
       '.$path.'\site-images\U-one-5.jpg 
        ');
  
       
        
  
         $imageName1 = "/" .  $image; 
  
         
     exec('magick convert   '.$path.'\design' . $imageName1 . '
     -resize 300x300
     '.$path.'\resized_pictures' . $imageName1 . '
     ');
  
  

     exec('magick convert 
     '.$path.'\resized_pictures' . $imageName1 . '
     -bordercolor transparent -border 12x12 -thumbnail 303x322 
     '.$path.'\image\ms_temp.png
      ');

  

    
        exec('magick convert 
        '.$path.'\site-images\U-one-5.jpg[303x322+595+531] 
        -colorspace gray -blur 10x250 -auto-level 
        -depth 60 
        '.$path.'\image\ms_displace_map_girl_black_regular.png
        ');
        
    
     exec('magick convert 
     '.$path.'\image\ms_temp.png 
     '.$path.'\image\ms_displace_map_girl_black_regular.png 
     -alpha set -virtual-pixel transparent 
     -compose displace -set option:compose:args -5x-5 -composite 
     -depth 16 
     '.$path.'\image\ms_displaced_logo_girl_black_regular.png
   
      ');
  
 
  
     exec('magick convert 
     '.$path.'\site-images\U-one-5.jpg[303x322+595+531] 
     -colorspace gray -auto-level 
     -blur 0x5 
     -contrast-stretch 0,50%% 
     -depth 16 
     '.$path.'\image\ms_light_map_girl_black_regular.png
      ');
          
         
       
    
   exec('magick convert 
   '.$path.'\image\ms_displaced_logo_girl_black_regular.png 
   -channel matte -separate 
   '.$path.'\image\ms_logo_displace_mask.png
    ');
         
        
   
    exec('magick convert 
    '.$path.'\image\ms_displaced_logo_girl_black_regular.png 
    '.$path.'\image\ms_light_map_girl_black_regular.png 
    -compose Multiply -composite 
    '.$path.'\image\ms_logo_displace_mask.png 
    -compose CopyOpacity -composite 
    '.$path.'\image\ms_light_map_logo.png
    ');
        
  
        list($width, $height) = getimagesize($path.'\image\ms_light_map_logo.png');
       
    $X = 595 + (303-$width)/2;
    $Y = 531 +  (322-$height)/2;

    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $name = mt_rand(1000000, 9999999)
        . mt_rand(1000000, 9999999)
        . $characters[rand(0, strlen($characters) - 1)];
    
    $string = str_shuffle($name);
    $string .=  round(microtime(true) * 1000);
    $imageRandom = '/' . $string . '.png';
        

  exec('magick convert 
  '.$path.'\site-images\U-one-5.jpg 
  '.$path.'\image\ms_light_map_logo.png 
  -geometry +'.$X.'+'.$Y.' 
  -compose over -composite 
  -depth 16 
  '.$path.'\image'.$imageRandom.'
  ');

        $imageRandom = ltrim($imageRandom, '/');
        
        $check = DB::table('images')->insert([
            'name' => $imageRandom, 'product_id' => $id, 'color' => 'black', 'position' => 'front', 'gender' => 'female'
           ]);
        
           return $check;
    }

    

    public static function manWhiteTshirt($id, $image){
        $path = public_path();

     
         
        exec('magick convert '.$path.'\site-images\U1-Obicnamajica-Bijela-Frontalno1.jpg 
        -resize 1500x2500
        '.$path.'\site-images\U1-Obicnamajica-Bijela-Frontalno1.jpg 
         ');
    
         
    
    exec('magick convert   '.$path.'\site-images\U1-Obicnamajica-Bijela-Frontalno1.jpg[303x322+570+541] 
    -colorspace gray 
    -blur 10x250 
    -auto-level
    '.$path.'\image\displace_map.png
     ');
    
         $imageName1 = "/" .  $image; 
    
         
         
     exec('magick convert   '.$path.'\design' . $imageName1 . '
     -resize 300x300
     '.$path.'\resized_pictures' . $imageName1 . '
     '); 
    
    
        
        exec('magick convert 
        '.$path.'\resized_pictures' . $imageName1 . '
        -bordercolor transparent -border 12x12 -thumbnail 303x322 
        '.$path.'\image\ms_temp.png
        ');
    
         list($width, $height) = getimagesize($path.'\image\ms_temp.png');
    
       
         $X = 570 + (303-$width)/2;
         $Y = 541 +  (322-$height)/2;
        
    
        
    
    exec ('magick convert 
    '.$path.'\site-images\U1-Obicnamajica-Bijela-Frontalno1.jpg[303x322+570+541] 
    -colorspace gray -blur 10x250 -auto-level 
    -depth 16 
    '.$path.'\image\ms_displace_map_man_white_regular.png
     ');
        
     
    
   exec('magick convert 
   '.$path.'\image\ms_temp.png 
   '.$path.'\image\ms_displace_map_man_white_regular.png 
   -alpha set -virtual-pixel transparent 
   -compose displace -set option:compose:args -5x-5 -composite 
   -depth 16 
   '.$path.'\image\ms_displaced_logo.png
 
    ');
    
         
       
    exec('magick convert 
    '.$path.'\site-images\U1-Obicnamajica-Bijela-Frontalno1.jpg[303x322+570+541] 
    -colorspace gray -auto-level 
    -blur 0x4 
    -contrast-stretch 0,30%% 
    -depth 16 
    '.$path.'\image\ms_light_map_man_white_regular.png
     ');
         
         
    
   exec('magick convert 
   '.$path.'\image\ms_displaced_logo.png 
   -channel matte -separate 
   '.$path.'\image\ms_logo_displace_mask.png
    ');

         
    
   exec('magick convert 
   '.$path.'\image\ms_displaced_logo.png 
   '.$path.'\image\ms_light_map_man_white_regular.png 
   -compose Multiply -composite 
   '.$path.'\image\ms_logo_displace_mask.png 
   -compose CopyOpacity -composite 
   '.$path.'\image\ms_light_map_logo.png
   ');
        
       
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $name = mt_rand(1000000, 9999999)
       . mt_rand(1000000, 9999999)
       . $characters[rand(0, strlen($characters) - 1)];
   
   $string = str_shuffle($name);
   $string .=  round(microtime(true) * 1000);
   $imageRandom = '/' . $string . '.png';
    
       
    
  exec('magick convert 
  '.$path.'\site-images\U1-Obicnamajica-Bijela-Frontalno1.jpg 
  '.$path.'\image\ms_light_map_logo.png 
  -geometry +'.$X.'+'.$Y.'
  -compose over -composite 
  -depth 16 
  '.$path.'\image' .$imageRandom.'
  ');
       

        $imageRandom = ltrim($imageRandom, '/');
        
        $check = DB::table('images')->insert([
            'name' => $imageRandom, 'product_id' => $id, 'color' => 'white', 'position' => 'front', 'gender' => 'male'
           ]);
        
           return $check;

    }


   

    public static function manBlackTshirt($id, $image){
        $path = public_path();


          
        exec('magick convert '.$path.'\site-images\U1-Obicnamajica-Crna-Frontalno.jpg 
        -resize 1500x2500
        '.$path.'\site-images\U1-Obicnamajica-Crna-Frontalno.jpg 
         ');
    
    
    exec('magick convert   '.$path.'\site-images\U1-Obicnamajica-Crna-Frontalno.jpg[303x322+590+541] 
    -colorspace gray 
    -blur 10x250 
    -auto-level
    '.$path.'\image\displace_map.png
     ');
    
         $imageName1 = "/" .  $image; 
    
       
    exec('magick convert   '.$path.'\design' . $imageName1 . '
    -resize 300x300
    '.$path.'\resized_pictures' . $imageName1 . '
    '); 
    
    
      
    
  exec('magick convert 
  '.$path.'\resized_pictures' . $imageName1 . '
  -bordercolor transparent -border 12x12 -thumbnail 303x322 
  '.$path.'\image\ms_temp.png
   ');
    
    
         list($width, $height) = getimagesize($path.'\image\ms_temp.png');
    
       
         $X = 590 + (303-$width)/2;
         $Y = 541 +  (322-$height)/2;
        
    
    
   exec('magick convert 
   '.$path.'\site-images\U1-Obicnamajica-Crna-Frontalno.jpg[303x322+590+541] 
   -colorspace gray -blur 10x250 -auto-level 
   -depth 16 
   '.$path.'\image\ms_displace_map_man_white_regular.png
    ');
        

    
     exec('magick convert 
     '.$path.'\image\ms_temp.png 
     '.$path.'\image\ms_displace_map_man_white_regular.png 
     -alpha set -virtual-pixel transparent 
     -compose displace -set option:compose:args -5x-5 -composite 
     -depth 16 
     '.$path.'\image\ms_displaced_logo.png  
      ');
    
         
      
    
  exec('magick convert 
  '.$path.'\site-images\U1-Obicnamajica-Crna-Frontalno.jpg[303x322+590+541] 
  -colorspace gray -auto-level 
  -blur 0x4 
  -contrast-stretch 0,30%% 
  -depth 16 
  '.$path.'\image\ms_light_map_man_white_regular.png
   ');
         

    
    exec('magick convert 
    '.$path.'\image\ms_displaced_logo.png 
    -channel matte -separate 
    '.$path.'\image\ms_logo_displace_mask.png
     ');
         
         
  exec('magick convert 
  '.$path.'\image\ms_displaced_logo.png 
  '.$path.'\image\ms_light_map_man_white_regular.png 
  -compose Multiply -composite 
  '.$path.'\image\ms_logo_displace_mask.png 
  -compose CopyOpacity -composite 
  '.$path.'\image\ms_light_map_logo.png
  ');
        
       
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom = '/' . $string . '.png';
    

    
  exec('magick convert 
  '.$path.'\site-images\U1-Obicnamajica-Crna-Frontalno.jpg 
  '.$path.'\image\ms_light_map_logo.png 
  -geometry +'.$X.'+'.$Y.'
  -compose over -composite 
  -depth 16 
  '.$path.'\image'.$imageRandom.'
  ');
        
        $imageRandom = ltrim($imageRandom, '/');
        
        $check = DB::table('images')->insert([
            'name' => $imageRandom, 'product_id' => $id, 'color' => 'black', 'position' => 'front', 'gender' => 'male'
           ]);
        
           return $check;

    }

   

    public static function manRedTshirt($id, $image){
        $path = public_path();

     

        exec('magick convert '.$path.'\site-images\U1-Obicnamajica-Crvena-Frontalno.jpg 
        -resize 1500x2500
        '.$path.'\site-images\U1-Obicnamajica-Crvena-Frontalno.jpg 
         ');
    

    
    exec('magick convert   '.$path.'\site-images\U1-Obicnamajica-Crvena-Frontalno.jpg[303x322+590+541] 
    -colorspace gray 
    -blur 10x250 
    -auto-level
    '.$path.'\image\displace_map.png
     ');
    
         $imageName1 = "/" .  $image; 
    
         
     exec('magick convert   '.$path.'\design' . $imageName1 . '
     -resize 300x300
     '.$path.'\resized_pictures' . $imageName1 . '
     '); 
    

    
   exec('magick convert 
   '.$path.'\resized_pictures' . $imageName1 . '
   -bordercolor transparent -border 12x12 -thumbnail 303x322 
   '.$path.'\image\ms_temp.png
    ');
    
    
         list($width, $height) = getimagesize($path.'\image\ms_temp.png');
    
       
         $X = 590 + (303-$width)/2;
         $Y = 541 +  (322-$height)/2;
        
    
   exec('magick convert 
   '.$path.'\site-images\U1-Obicnamajica-Crvena-Frontalno.jpg[303x322+590+541] 
   -colorspace gray -blur 10x250 -auto-level 
   -depth 16 
   '.$path.'\image\ms_displace_map_man_white_regular.png
    ');
        
    
   exec('magick convert 
   '.$path.'\image\ms_temp.png 
   '.$path.'\image\ms_displace_map_man_white_regular.png 
   -alpha set -virtual-pixel transparent 
   -compose displace -set option:compose:args -5x-5 -composite 
   -depth 16 
   '.$path.'\image\ms_displaced_logo.png
    ');
    
    
    
   exec('magick convert 
   '.$path.'\site-images\U1-Obicnamajica-Crvena-Frontalno.jpg[303x322+590+541] 
   -colorspace gray -auto-level 
   -blur 0x4 
   -contrast-stretch 0,30%% 
   -depth 16 
   '.$path.'\image\ms_light_map_man_white_regular.png
    ');
         
  
   exec('magick convert 
   '.$path.'\image\ms_displaced_logo.png 
   -channel matte -separate 
   '.$path.'\image\ms_logo_displace_mask.png
    ');

         

    
   exec('magick convert 
   '.$path.'\image\ms_displaced_logo.png 
   '.$path.'\image\ms_light_map_man_white_regular.png 
   -compose Multiply -composite 
   '.$path.'\image\ms_logo_displace_mask.png 
   -compose CopyOpacity -composite 
   '.$path.'\image\ms_light_map_logo.png
   ');
        
       
       
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom = '/' . $string . '.png';
    

    
    exec('magick convert 
    '.$path.'\site-images\U1-Obicnamajica-Crvena-Frontalno.jpg 
    '.$path.'\image\ms_light_map_logo.png 
    -geometry +'.$X.'+'.$Y.'
    -compose over -composite 
    -depth 16 
    '.$path.'\image'.$imageRandom.'
    ');

        $imageRandom = ltrim($imageRandom, '/');
        
        $check = DB::table('images')->insert([
            'name' => $imageRandom, 'product_id' => $id, 'color' => 'red', 'position' => 'front', 'gender' => 'male'
           ]);
        
           return $check;
       
        
    }

  

    public static function manNavyTshirt($id, $image){
        $path = public_path();

     
         
        exec('magick convert '.$path.'\site-images\U1-Obicnamajica-Teget-Frontalno.jpg 
        -resize 1500x2500
        '.$path.'\site-images\U1-Obicnamajica-Teget-Frontalno.jpg 
         ');
    

    
    exec ('magick convert   '.$path.'\site-images\U1-Obicnamajica-Teget-Frontalno.jpg[303x322+610+541] 
    -colorspace gray 
    -blur 10x250 
    -auto-level
    '.$path.'\image\displace_map.png
     ');
    
         $imageName1 = "/" .  $image; 
     
         
    exec('magick convert   '.$path.'\design' . $imageName1 . '
    -resize 300x300
    '.$path.'\resized_pictures' . $imageName1 . '
    ');
    

    
   exec('magick convert 
   '.$path.'\resized_pictures' . $imageName1 . '
   -bordercolor transparent -border 12x12 -thumbnail 303x322 
   '.$path.'\image\ms_temp.png
    ');
    
    
         list($width, $height) = getimagesize($path.'\image\ms_temp.png');
    
       
         $X = 610 + (303-$width)/2;
         $Y = 541 +  (322-$height)/2;
        
    
        
    
    exec('magick convert 
    '.$path.'\site-images\U1-Obicnamajica-Teget-Frontalno.jpg[303x322+610+541] 
    -colorspace gray -blur 10x250 -auto-level 
    -depth 16 
    '.$path.'\image\ms_displace_map_man_white_regular.png
     ');
        
   exec('magick convert 
   '.$path.'\image\ms_temp.png 
   '.$path.'\image\ms_displace_map_man_white_regular.png 
   -alpha set -virtual-pixel transparent 
   -compose displace -set option:compose:args -5x-5 -composite 
   -depth 16 
   '.$path.'\image\ms_displaced_logo.png
 
    ');
    
         
     
    
 exec('magick convert 
 '.$path.'\site-images\U1-Obicnamajica-Teget-Frontalno.jpg[303x322+610+541] 
 -colorspace gray -auto-level 
 -blur 0x4 
 -contrast-stretch 0,30%% 
 -depth 16 
 '.$path.'\image\ms_light_map_man_white_regular.png
  ');
         
         
    
    exec('magick convert 
    '.$path.'\image\ms_displaced_logo.png 
    -channel matte -separate 
    '.$path.'\image\ms_logo_displace_mask.png
     ');
         
    
  exec('magick convert 
  '.$path.'\image\ms_displaced_logo.png 
  '.$path.'\image\ms_light_map_man_white_regular.png 
  -compose Multiply -composite 
  '.$path.'\image\ms_logo_displace_mask.png 
  -compose CopyOpacity -composite 
  '.$path.'\image\ms_light_map_logo.png
  ');
        
       
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom = '/' . $string . '.png';
    
    
   exec('magick convert 
   '.$path.'\site-images\U1-Obicnamajica-Teget-Frontalno.jpg 
   '.$path.'\image\ms_light_map_logo.png 
   -geometry +'.$X.'+'.$Y.'
   -compose over -composite 
   -depth 16 
   '.$path.'\image'.$imageRandom.'
   ');
        
        $imageRandom = ltrim($imageRandom, '/');
        
        $check = DB::table('images')->insert([
            'name' => $imageRandom, 'product_id' => $id, 'color' => 'navy', 'position' => 'front', 'gender' => 'male'
           ]);
        
           return $check;
    }

    public static function manNavyBackTshirt($id, $image){
        $path = public_path();

      
exec('magick convert  '.$path.'\site-images\U1-Obicnamajica-Teget-Pozadi.jpg 
-resize 1500x2500
'.$path.'\site-images\U1-Obicnamajica-Teget-Pozadi.jpg 
 ');
   
    
   
   
  exec('magick convert   '.$path.'\site-images\U1-Obicnamajica-Teget-Pozadi.jpg[303x322+590+601] 
  -colorspace gray 
  -blur 20x250 
  -auto-level
  '.$path.'\image\displace_map_man_back_white_regular.png
   ');
   
        $imageName1 = "/" .  $image; 
   
       
        
   exec('magick convert   '.$path.'\design' . $imageName1 . '
   -resize 300x300
   '.$path.'\resized_pictures' . $imageName1 . '
   ');
   
   
   
   exec('magick convert 
   '.$path.'\resized_pictures' . $imageName1 . '
   -bordercolor transparent -border 12x12 -thumbnail 303x322 
   '.$path.'\image\ms_temp.png
    ');
      
        list($width, $height) = getimagesize($path.'\image\ms_temp.png');
       
        $X = 590 + (303-$width)/2;
        $Y = 601 +  (322-$height)/2;
       
   
   
  exec('magick convert 
  '.$path.'\site-images\U1-Obicnamajica-Teget-Pozadi.jpg[303x322+590+601] 
  -colorspace gray -blur 10x250 -auto-level 
  -depth 16 
  '.$path.'\image\ms_displace_map.png
   ');
       
   
   exec('magick convert 
   '.$path.'\image\ms_temp.png 
   '.$path.'\image\ms_displace_map.png 
   -alpha set -virtual-pixel transparent 
   -compose displace -set option:compose:args -5x-5 -composite 
   -depth 16 
   '.$path.'\image\ms_displaced_logo.png
 
    ');
   
            
   
     
   
   exec ('magick convert 
   '.$path.'\site-images\U1-Obicnamajica-Teget-Pozadi.jpg[303x322+590+601] 
   -colorspace gray -auto-level 
   -blur 0x5 
   -contrast-stretch 0,80%% 
   -depth 16 
   '.$path.'\image\ms_light_map.png
    '); 
         
        

   
  exec('magick convert 
  '.$path.'\image\ms_displaced_logo.png 
  -channel matte -separate 
  '.$path.'\image\ms_logo_displace_mask.png
   ');
        
   
exec('magick convert 
'.$path.'\image\ms_displaced_logo.png 
'.$path.'\image\ms_light_map.png 
-compose Multiply -composite 
'.$path.'\image\ms_logo_displace_mask.png 
-compose CopyOpacity -composite 
'.$path.'\image\ms_light_map_logo.png
');
       
   
       $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
       $name = mt_rand(1000000, 9999999)
           . mt_rand(1000000, 9999999)
           . $characters[rand(0, strlen($characters) - 1)];
       
       $string = str_shuffle($name);
       $string .=  round(microtime(true) * 1000);
       $imageRandom = '/' . $string . '.png';
   
   
 exec('magick convert 
 '.$path.'\site-images\U1-Obicnamajica-Teget-Pozadi.jpg 
 '.$path.'\image\ms_light_map_logo.png 
 -geometry +'.$X.'+'.$Y.' 
 -compose over -composite 
 -depth 16 
 '.$path.'\image'.$imageRandom.'
 ');
        
       $imageRandom = ltrim($imageRandom, '/');
        
       $check = DB::table('images')->insert([
           'name' => $imageRandom, 'product_id' => $id, 'color' => 'navy', 'position' => 'back', 'gender' => 'male'
          ]);
       
          return $check;
    
    }

    public static function blackFrameA3($id, $image){
        
        $imageName1 = "/" .  $image; 
        
        $path = public_path();
   
   
        $src1 = new \Imagick(public_path("canvas_picture". $imageName1));
        $src1->resizeImage(200, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Framed-Prints-Art-Black-A3-Mask01-1080.png"));
        $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER,440,250);
       
   
         $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $name = mt_rand(1000000, 9999999)
             . mt_rand(1000000, 9999999)
             . $characters[rand(0, strlen($characters) - 1)];
         
         $string = str_shuffle($name);
         $string .=  round(microtime(true) * 1000);
         $imageRandom = '/' . $string . '.png';
   
         $src2->writeImage(public_path("image" . $imageRandom ));
   
   
       $imageRandom1 = ltrim($imageRandom, '/');
           
       $check = DB::table('images')->insert([
           'name' => $imageRandom1, 'product_id' => $id, 'color' => 'black', 'size' => 'A3'
          ]);
       
          return $check;

          dd();

       $imageName1 = "/" .  $image; 

     $path = public_path();


     $src1 = new \Imagick(public_path("design". $imageName1));
     $src1->resizeImage(500, null,\Imagick::FILTER_LANCZOS,1); 
     $src1->writeImage(public_path("design". $imageName1));
     $src2 = new \Imagick(public_path("\site-images\Framed-Art-Black-A3-Mask.png"));

     
     $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
     
     $process5 = new Process('magick convert 
     '.$path.'\site-images\Framed-Art-Black-A3-Mask.png 
     -channel A -blur 0x8
     -compose hardlight
     '.$path.'\image\ms_light_map-A3-black.png
     ');
     
     /* Makao sam komandu -separate proces 5   -colorspace gray -auto-level 
     -blur 0x3 
     -contrast-stretch 0,50%% 
     -depth 16   -negate  -channel A -blur 0x8*/
     
     $process5->run();
     if (!$process5->isSuccessful()) {
     throw new ProcessFailedException($process5);
     }
     echo $process5->getOutput();
     echo '<img src="\image\ms_light_map-A3-black.png">';
     
     $process6 = new Process('magick convert 
     '.$path.'\design'. $imageName1. ' 
     -channel matte -separate 
     '.$path.'\image\ms_logo_displace_mask_A3-black.png
     ');
     
     
     
     $process6->run();
     if (!$process6->isSuccessful()) {
     throw new ProcessFailedException($process6);
     }
     echo $process6->getOutput();
     echo '<img src="\image\ms_logo_displace_mask_A3-black.png">';
     
     $process7 = new Process('magick convert 
     '.$path.'\design'. $imageName1. ' 
     '.$path.'\image\ms_light_map-A3-black.png 
     -geometry -300-250 
     -compose Multiply -composite 
     '.$path.'\image\ms_logo_displace_mask_A3-black.png 
     -compose CopyOpacity -composite 
     '.$path.'\image\ms_light_map_logo_A3-black.png
     ');
     
     $process7->run();
     if (!$process7->isSuccessful()) {
     throw new ProcessFailedException($process7);
     }
     echo $process7->getOutput();
     echo '<img src="\image\ms_light_map_logo_A3-black.png">';


     $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,300,250);
     $src2->writeImage(public_path("image\image-A3-black.png"));
     echo '<img src="\image\image-A3-black.png">';
     $src4 = new \Imagick(public_path("site-images/Framed-Art-Black-A3-BG.png"));
    /*  $src4->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
     $src4->writeImage(public_path("\site-images/Textura-Canvas-mockup.png")); */
      $src3 = new \Imagick(public_path("image/image-A3-black.png"));
      $src3->compositeImage($src4, \Imagick::COMPOSITE_MULTIPLY,0,0);
      $src3->writeImage(public_path("image\multiply_A3-black.png"));

    echo '<img src="\image\multiply_A3-black.png">'; 

      
   

        dd();

        $imageName1 = "/" .  $image; 

        $path = public_path();
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(500, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
       $src2 = new \Imagick(public_path("\site-images\Poster-CrniRam-A3.jpg"));
     
       
       
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
       
        $process5 = new Process('magick convert 
       '.$path.'\site-images\Poster-CrniRam-A3.jpg 
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-crni-ram.png
         ');
       
         /* Makao sam komandu -separate proces 5   -colorspace gray -auto-level 
        -blur 0x3 
        -contrast-stretch 0,50%% 
        -depth 16   -negate  -channel A -blur 0x8*/
       
       $process5->run();
       if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
       }
        echo $process5->getOutput();
        echo '<img src="\image\ms_light_map-crni-ram.png">';
       
        $process6 = new Process('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        -channel matte -separate 
        '.$path.'\image\ms_logo_displace_mask-crni-ram.png
         ');
     
        
       
       $process6->run();
       if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
       }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask-crni-ram.png">';
       
        $process7 = new Process('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        '.$path.'\image\ms_light_map-crni-ram.png 
        -geometry -340-320 
        -compose Multiply -composite 
        '.$path.'\image\ms_logo_displace_mask-crni-ram.png 
        -compose CopyOpacity -composite 
        '.$path.'\image\ms_light_map_logo-crni-ram.png
        ');
       
       $process7->run();
       if (!$process7->isSuccessful()) {
       throw new ProcessFailedException($process7);
       }
       echo $process7->getOutput();
       echo '<img src="\image\ms_light_map_logo-crni-ram.png">';
       
       $src1->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
       $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
       $src = new \Imagick(public_path("\image\ms_light_map_logo-crni-ram.png"));
       $src2->compositeImage($src, \Imagick::COMPOSITE_ATOP , 1033, 650);

       $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
       $name = mt_rand(1000000, 9999999)
           . mt_rand(1000000, 9999999)
           . $characters[rand(0, strlen($characters) - 1)];
       
       $string = str_shuffle($name);
       $string .=  round(microtime(true) * 1000);
       $imageRandom = '/' . $string . '.png';

       $src2->writeImage(public_path("image". $imageRandom));
   
       $imageRandom1 = ltrim($imageRandom, '/');
        
       $check = DB::table('images')->insert([
           'name' => $imageRandom1, 'product_id' => $id, 'color' => 'black', 'size' => 'A3'
          ]);
       
          return $check;
    
    }

    public static function whiteFrameA3($id, $image){


        $imageName1 = "/" .  $image; 
    
         $path = public_path();
    
    
         $src1 = new \Imagick(public_path("canvas_picture". $imageName1));
         $src1->resizeImage(200, null,\Imagick::FILTER_LANCZOS,1); 
         $src1->writeImage(public_path("resized_pictures". $imageName1));
         $src2 = new \Imagick(public_path("\site-images\Framed-Prints-Art-White-A3-Mask01-1080.png"));
         $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER,440,250);
         
        

         $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $name = mt_rand(1000000, 9999999)
             . mt_rand(1000000, 9999999)
             . $characters[rand(0, strlen($characters) - 1)];
         
         $string = str_shuffle($name);
         $string .=  round(microtime(true) * 1000);
         $imageRandom = '/' . $string . '.png';

         $src2->writeImage(public_path("image" . $imageRandom));
   
         $imageRandom1 = ltrim($imageRandom, '/');
        
       $check = DB::table('images')->insert([
           'name' => $imageRandom1, 'product_id' => $id, 'color' => 'white', 'size' => 'A3'
          ]);
       
          return $check;
       
        
        dd();
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(700, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
       $src2 = new \Imagick(public_path("\site-images\Poster---Bijeli-Ram---A3.jpg"));
     
       
       
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
       
        $process5 = new Process('magick convert 
       '.$path.'\site-images\Poster---Bijeli-Ram---A3.jpg 
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-bijeli-ram.png
         ');
       
         /* Makao sam komandu -separate proces 5   -colorspace gray -auto-level 
        -blur 0x3 
        -contrast-stretch 0,50%% 
        -depth 16   -negate  -channel A -blur 0x8*/
       
       $process5->run();
       if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
       }
        echo $process5->getOutput();
        echo '<img src="\image\ms_light_map-bijeli-ram.png">';
       
        $process6 = new Process('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        -channel matte -separate 
        '.$path.'\image\ms_logo_displace_mask-bijeli-ram.png
         ');
     
        
       
       $process6->run();
       if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
       }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask-bijeli-ram.png">';
       
        $process7 = new Process('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        '.$path.'\image\ms_light_map-bijeli-ram.png 
        -geometry -700-550 
        -compose Multiply -composite 
        '.$path.'\image\ms_logo_displace_mask-bijeli-ram.png 
        -compose CopyOpacity -composite 
        '.$path.'\image\ms_light_map_logo-bijeli-ram.png
        ');
       
       $process7->run();
       if (!$process7->isSuccessful()) {
       throw new ProcessFailedException($process7);
       }
       echo $process7->getOutput();
       echo '<img src="\image\ms_light_map_logo-bijeli-ram.png">';
       
       $src1->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
       $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
       $src = new \Imagick(public_path("\image\ms_light_map_logo-bijeli-ram.png"));
       $src2->compositeImage($src, \Imagick::COMPOSITE_ATOP , 700, 550);

       $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
       $name = mt_rand(1000000, 9999999)
           . mt_rand(1000000, 9999999)
           . $characters[rand(0, strlen($characters) - 1)];
       
       $string = str_shuffle($name);
       $string .=  round(microtime(true) * 1000);
       $imageRandom = '/' . $string . '.png';

       $src2->writeImage(public_path("image". $imageRandom));
   
       $imageRandom1 = ltrim($imageRandom, '/');
        
       $check = DB::table('images')->insert([
           'name' => $imageRandom1, 'product_id' => $id, 'color' => 'white', 'size' => 'A3'
          ]);
       
          return $check;
       
    }


    public static function whiteFrameThumb($id, $image){

        $imageName1 = "/" .  $image; 

        $path = public_path();
   
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(450, 610,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Thumbnail-Framed-Art-White-A4-Mask.png"));
       /*  $src2->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src2->writeImage(public_path("\site-images\Canvas-mockup-thumbnail.png")); */
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
        $process5 = new Process('magick convert 
        '.$path.'\site-images\Thumbnail-Framed-Art-White-A4-Mask.png 
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-thumb-white.png
        ');
        
        /* Makao sam komandu -separate proces 5   -colorspace gray -auto-level 
        -blur 0x3 
        -contrast-stretch 0,50%% 
        -depth 16   -negate  -channel A -blur 0x8*/
        
        $process5->run();
        if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
        }
        echo $process5->getOutput();
        echo '<img src="\image\ms_light_map-thumb-white.png">';
        
        $process6 = new Process('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        -channel matte -separate 
        '.$path.'\image\ms_logo_displace_mask_thumb-white.png
        ');
        
        
        
        $process6->run();
        if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
        }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask_thumb-white.png">';
        
        $process7 = new Process('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        '.$path.'\image\ms_light_map-thumb-white.png 
        -geometry -310-240 
        -compose Multiply -composite 
        '.$path.'\image\ms_logo_displace_mask_thumb-white.png 
        -compose CopyOpacity -composite 
        '.$path.'\image\ms_light_map_logo_thumb-white.png
        ');
        
        $process7->run();
        if (!$process7->isSuccessful()) {
        throw new ProcessFailedException($process7);
        }
        echo $process7->getOutput();
        echo '<img src="\image\ms_light_map_logo_thumb-white.png">';
   
   
        $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,310,240);
        $src2->writeImage(public_path("image\image-thumb-white.png"));
        echo '<img src="\image\image-thumb-white.png">';
        $src4 = new \Imagick(public_path("site-images/Thumbnail-Framed-Art-White-A4-BG.png"));
       /*  $src4->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src4->writeImage(public_path("\site-images/Textura-Canvas-mockup.png")); */
         $src3 = new \Imagick(public_path("image/image-thumb-white.png"));
         $src3->compositeImage($src4, \Imagick::COMPOSITE_MULTIPLY,0,0);

         $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $name = mt_rand(1000000, 9999999)
             . mt_rand(1000000, 9999999)
             . $characters[rand(0, strlen($characters) - 1)];
         
         $string = str_shuffle($name);
         $string .=  round(microtime(true) * 1000);
         $imageRandom = '/' . $string . '.png';

         $src3->writeImage(public_path("image". $imageRandom));
   
         $imageRandom1 = ltrim($imageRandom, '/');
        
         $check = DB::table('images')->insert([
             'name' => $imageRandom1, 'product_id' => $id, 'color' => 'white', 'size' => 'thumb'
            ]);
         
            return $check;

        dd();
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(800, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
       $src2 = new \Imagick(public_path("\site-images\Poster---Bijeli-Ram---A3---B2---B1---THUMBNAIL.jpg"));
     
       
       
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
       
        $process5 = new Process('magick convert 
       '.$path.'\site-images\Poster---Bijeli-Ram---A3---B2---B1---THUMBNAIL.jpg 
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-bijeli-ram-thumb.png
         ');
       
         /* Makao sam komandu -separate proces 5   -colorspace gray -auto-level 
        -blur 0x3 
        -contrast-stretch 0,50%% 
        -depth 16   -negate  -channel A -blur 0x8*/
       
       $process5->run();
       if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
       }
        echo $process5->getOutput();
        echo '<img src="\image\ms_light_map-bijeli-ram-thumb.png">';
       
        $process6 = new Process('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        -channel matte -separate 
        '.$path.'\image\ms_logo_displace_mask-bijeli-ram-thumb.png
         ');
     
        
       
       $process6->run();
       if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
       }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask-bijeli-ram-thumb.png">';
       
        $process7 = new Process('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        '.$path.'\image\ms_light_map-bijeli-ram-thumb.png 
        -geometry -630-550 
        -compose Multiply -composite 
        '.$path.'\image\ms_logo_displace_mask-bijeli-ram-thumb.png 
        -compose CopyOpacity -composite 
        '.$path.'\image\ms_light_map_logo-bijeli-ram-thumb.png
        ');
       
       $process7->run();
       if (!$process7->isSuccessful()) {
       throw new ProcessFailedException($process7);
       }
       echo $process7->getOutput();
       echo '<img src="\image\ms_light_map_logo-bijeli-ram-thumb.png">';
       
       $src1->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
       $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
       $src = new \Imagick(public_path("\image\ms_light_map_logo-bijeli-ram-thumb.png"));
       $src2->compositeImage($src, \Imagick::COMPOSITE_ATOP , 630, 550);

       $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
       $name = mt_rand(1000000, 9999999)
           . mt_rand(1000000, 9999999)
           . $characters[rand(0, strlen($characters) - 1)];
       
       $string = str_shuffle($name);
       $string .=  round(microtime(true) * 1000);
       $imageRandom = '/' . $string . '.png';

       $src2->writeImage(public_path("image". $imageRandom));
   
       $imageRandom1 = ltrim($imageRandom, '/');
        
       $check = DB::table('images')->insert([
           'name' => $imageRandom1, 'product_id' => $id, 'color' => 'white', 'size' => 'thumb'
          ]);
       
          return $check;
    }

    public static function whiteFrameB1($id, $image){
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
   
        $src1 = new \Imagick(public_path("canvas_picture". $imageName1));
        $src1->resizeImage(620, 870,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Framed-Art-White-B1-Mask.png"));
       /*  $src2->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src2->writeImage(public_path("\site-images\Canvas-mockup-thumbnail.png")); */
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
      exec('magick convert 
        '.$path.'\site-images\Framed-Art-White-B1-Mask.png 
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-B1-white.png
        ');
        
      
        
        exec('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        -channel matte -separate 
        '.$path.'\image\ms_logo_displace_mask_B1-white.png
        ');
        
        
        
       exec('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        '.$path.'\image\ms_light_map-B1-white.png 
        -geometry -260-100 
        -compose Multiply -composite 
        '.$path.'\image\ms_logo_displace_mask_B1-white.png 
        -compose CopyOpacity -composite 
        '.$path.'\image\ms_light_map_logo_B1-white.png
        ');
        
       
   
   
        $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,260,100);
        $src2->writeImage(public_path("image\image-B1-white.png"));
        echo '<img src="\image\image-B1-white.png">';
        $src4 = new \Imagick(public_path("site-images/Framed-Art-White-B1-BG.png"));
       /*  $src4->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src4->writeImage(public_path("\site-images/Textura-Canvas-mockup.png")); */
         $src3 = new \Imagick(public_path("image/image-B1-white.png"));
         $src3->compositeImage($src4, \Imagick::COMPOSITE_MULTIPLY,0,0);

         $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $name = mt_rand(1000000, 9999999)
             . mt_rand(1000000, 9999999)
             . $characters[rand(0, strlen($characters) - 1)];
         
         $string = str_shuffle($name);
         $string .=  round(microtime(true) * 1000);
         $imageRandom = '/' . $string . '.png';

         $src3->writeImage(public_path("image". $imageRandom));
   
         $imageRandom1 = ltrim($imageRandom, '/');
        
         $check = DB::table('images')->insert([
             'name' => $imageRandom1, 'product_id' => $id, 'color' => 'white', 'size' => 'B1'
            ]);
         
            return $check;

        dd();
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(800, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
       $src2 = new \Imagick(public_path("\site-images\Poster---Bijeli-Ram---B1.jpg"));
     
       
       
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
       
        $process5 = new Process('magick convert 
       '.$path.'\site-images\Poster---Bijeli-Ram---B1.jpg 
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-bijeli-ram-b1.png
         ');
       
         /* Makao sam komandu -separate proces 5   -colorspace gray -auto-level 
        -blur 0x3 
        -contrast-stretch 0,50%% 
        -depth 16   -negate  -channel A -blur 0x8*/
       
       $process5->run();
       if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
       }
        echo $process5->getOutput();
        echo '<img src="\image\ms_light_map-bijeli-ram-b1.png">';
       
        $process6 = new Process('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        -channel matte -separate 
        '.$path.'\image\ms_logo_displace_mask-bijeli-ram-b1.png
         ');
     
        
       
       $process6->run();
       if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
       }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask-bijeli-ram-b1.png">';
       
        $process7 = new Process('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        '.$path.'\image\ms_light_map-bijeli-ram-b1.png 
        -geometry -900-550 
        -compose Multiply -composite 
        '.$path.'\image\ms_logo_displace_mask-bijeli-ram-b1.png 
        -compose CopyOpacity -composite 
        '.$path.'\image\ms_light_map_logo-bijeli-ram-b1.png
        ');
       
       $process7->run();
       if (!$process7->isSuccessful()) {
       throw new ProcessFailedException($process7);
       }
       echo $process7->getOutput();
       echo '<img src="\image\ms_light_map_logo-bijeli-ram-b1.png">';
       
       $src1->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
       $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
       $src = new \Imagick(public_path("\image\ms_light_map_logo-bijeli-ram-b1.png"));
       $src2->compositeImage($src, \Imagick::COMPOSITE_ATOP , 900, 550);

       $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
       $name = mt_rand(1000000, 9999999)
           . mt_rand(1000000, 9999999)
           . $characters[rand(0, strlen($characters) - 1)];
       
       $string = str_shuffle($name);
       $string .=  round(microtime(true) * 1000);
       $imageRandom = '/' . $string . '.png';

       $src2->writeImage(public_path("image". $imageRandom));
   
       $imageRandom1 = ltrim($imageRandom, '/');
        
       $check = DB::table('images')->insert([
           'name' => $imageRandom1, 'product_id' => $id, 'color' => 'white', 'size' => 'B1'
          ]);
       
          return $check;
    }

    public static function whiteFrameB2($id, $image){

        $imageName1 = "/" .  $image; 

        $path = public_path();
   
   
        $src1 = new \Imagick(public_path("canvas_picture". $imageName1));
        $src1->resizeImage(420, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Framed-Prints-Art-White-B2-Mask01-1080.png"));
        $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER,335,130);
      
       
     

         $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $name = mt_rand(1000000, 9999999)
             . mt_rand(1000000, 9999999)
             . $characters[rand(0, strlen($characters) - 1)];
         
         $string = str_shuffle($name);
         $string .=  round(microtime(true) * 1000);
         $imageRandom = '/' . $string . '.png';

         $src2->writeImage(public_path("image" . $imageRandom));
   
         $imageRandom1 = ltrim($imageRandom, '/');
        
       $check = DB::table('images')->insert([
           'name' => $imageRandom1, 'product_id' => $id, 'color' => 'white' , 'size' => 'B2'
          ]);
       
          return $check;
        dd();
      
    }

    public static function blackFrameA4($id, $image){
        $imageName1 = "/" .  $image; 
        $path = public_path();
   
        $src1 = new \Imagick(public_path("canvas_picture". $imageName1));
        $src1->resizeImage(140, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Framed-Prints-Art-Black-A4-Mask01-1080.png"));
        $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER,470,285);

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom = '/' . $string . '.png';

        $src2->writeImage(public_path("image" . $imageRandom));
        
        $imageRandom1 = ltrim($imageRandom, '/');
        
        $check = DB::table('images')->insert([
            'name' => $imageRandom1, 'product_id' => $id, 'color' => 'black' , 'size' => 'A4'
           ]);
        
           return $check;
    }

    public static function whiteFrameA4($id, $image){
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
   
        $src1 = new \Imagick(public_path("canvas_picture". $imageName1));
        $src1->resizeImage(140, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Framed-Prints-Art-White-A4-Mask01-1080.png"));
        $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER,470,285);
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom = '/' . $string . '.png';

        $src2->writeImage(public_path("image" . $imageRandom));
        
        $imageRandom1 = ltrim($imageRandom, '/');
        
        $check = DB::table('images')->insert([
            'name' => $imageRandom1, 'product_id' => $id, 'color' => 'white' , 'size' => 'A4'
           ]);
        
           return $check;
    }


   

    public static function blackFrameB1($id, $image){

        $imageName1 = "/" .  $image; 

        $path = public_path();
   
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(480, 630,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Framed-Art-Black-B1-Mask.png"));
       /*  $src2->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src2->writeImage(public_path("\site-images\Canvas-mockup-thumbnail.png")); */
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
       exec('magick convert 
        '.$path.'\site-images\Framed-Art-Black-B1-Mask.png 
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-B1-black.png
        ');
        
        
       exec('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        -channel matte -separate 
        '.$path.'\image\ms_logo_displace_mask_B1-black.png
        ');
           
        
        exec('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        '.$path.'\image\ms_light_map-B1-black.png 
        -geometry -320-200 
        -compose Multiply -composite 
        '.$path.'\image\ms_logo_displace_mask_B1-black.png 
        -compose CopyOpacity -composite 
        '.$path.'\image\ms_light_map_logo_B1-black.png
        ');
        
   
   
        $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,320,200);
        $src2->writeImage(public_path("image\image-B1-black.png"));
        echo '<img src="\image\image-B1-black.png">';
        $src4 = new \Imagick(public_path("site-images/Framed-Art-Black-B1-BG.png"));
         $src3 = new \Imagick(public_path("image/image-B1-black.png"));
         $src3->compositeImage($src4, \Imagick::COMPOSITE_MULTIPLY,0,0);

         $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $name = mt_rand(1000000, 9999999)
             . mt_rand(1000000, 9999999)
             . $characters[rand(0, strlen($characters) - 1)];
         
         $string = str_shuffle($name);
         $string .=  round(microtime(true) * 1000);
         $imageRandom = '/' . $string . '.png';

         $src3->writeImage(public_path("image" . $imageRandom));
   
         $imageRandom1 = ltrim($imageRandom, '/');
        
         $check = DB::table('images')->insert([
             'name' => $imageRandom1, 'product_id' => $id, 'color' => 'black' , 'size' => 'B1'
            ]);
         
            return $check;

     }


     public static function blackFrameB2($id, $image){

        $imageName1 = "/" .  $image; 

        $path = public_path();
   
   
        $src1 = new \Imagick(public_path("canvas_picture". $imageName1));
        $src1->resizeImage(420, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Framed-Prints-Art-Black-B2-Mask01-1080.png"));
        $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER,335,130);
        

         $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $name = mt_rand(1000000, 9999999)
             . mt_rand(1000000, 9999999)
             . $characters[rand(0, strlen($characters) - 1)];
         
         $string = str_shuffle($name);
         $string .=  round(microtime(true) * 1000);
         $imageRandom = '/' . $string . '.png';


         $src2->writeImage(public_path("image" . $imageRandom));


   
         $imageRandom1 = ltrim($imageRandom, '/');
        
         $check = DB::table('images')->insert([
             'name' => $imageRandom1, 'product_id' => $id, 'color' => 'black', 'size' => 'B2'
            ]);
         
            return $check;

      
     }
    

     public static function huaweiP20($id, $image){


        $imageName1 = "/" .  $image; 

        $path = public_path();
   
       
    
       
   
   $src1 = new \Imagick(public_path("canvas_picture". $imageName1));
    $src1->resizeImage(550, null,\Imagick::FILTER_LANCZOS,1); 
   $src1->writeImage(public_path("design". $imageName1)); 
   $src2 = new \Imagick(public_path("\site-images\Huawei-P20-Bezpozadinecopy.png"));
   
   
   
   $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
   
   exec('magick convert 
   '.$path.'\site-images\Huawei-P20-Bezpozadinecopy.png 
   -channel A -blur 0x8
   -compose hardlight
   '.$path.'\image\ms_light_map-phone1.png
   ');
   
  
   
   exec('magick convert 
   '.$path.'\design'. $imageName1. ' 
   -channel matte -separate 
   '.$path.'\image\ms_logo_displace_mask_phone1.png
   ');
   
   
  exec('magick convert 
   '.$path.'\design'. $imageName1. ' 
   '.$path.'\image\ms_light_map-phone1.png 
   -geometry -265-130 
   -compose Multiply -composite 
   '.$path.'\image\ms_logo_displace_mask_phone1.png 
   -compose CopyOpacity -composite 
   '.$path.'\image\ms_light_map_logo_phone1.png
   ');
   
  

   $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $name = mt_rand(1000000, 9999999)
       . mt_rand(1000000, 9999999)
       . $characters[rand(0, strlen($characters) - 1)];
   
   $string = str_shuffle($name);
   $string .=  round(microtime(true) * 1000);
   $imageRandom1 = '/' . $string . '.png'; 
   
   $src1->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
   $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
   $src = new \Imagick(public_path("\image\ms_light_map_logo_phone1.png"));
   $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 265, 130);
   $src2->writeImage(public_path("image/output1.png"));

   exec('magick  convert '.$path.'\image\output1.png 
   -flatten  '.$path.'\image'.$imageRandom1.'
   ');
   

        $imageRandom = ltrim($imageRandom1, '/');


        $check = DB::table('images')->insert([
         'name' => $imageRandom, 'product_id' => $id, 'color' => 'transparent', 'size' => "Huawei P20"
        ]);
       
      

        exec('magick  convert '.$path.'\site-images\Huawei-P20-Bezpozadinecopy.png -background "rgb(0,0,0)" 
        -flatten  '.$path.'\image\Huawei-P20-Crna.png
       ');
         
   
   
   /* $src1 = new \Imagick(public_path("\image\ms_light_map_logo_phone.png")); */
   
   $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $name = mt_rand(1000000, 9999999)
       . mt_rand(1000000, 9999999)
       . $characters[rand(0, strlen($characters) - 1)];
   
   $string = str_shuffle($name);
   $string .=  round(microtime(true) * 1000);
   $imageRandom2 = '/' . $string . '.png'; 
   
  exec('magick convert 
   '.$path.'\image\Huawei-P20-Crna.png 
   '.$path.'\image\output1.png 
   -compose ATop -composite 
   
   -depth 16 
   '.$path.'\image'.$imageRandom2.'
   ');
   
  

   $imageRandom2 = ltrim($imageRandom2, '/');

   $check2 = DB::table('images')->insert([
    'name' => $imageRandom2, 'product_id' => $id, 'color' => 'black', 'size' => "Huawei P20"
   ]);
  
   return $check2;


       
     }

    public static function samsungS20PlusPhoneCase($id, $image){

        $imageName1 = "/" .  $image; 
  
        $path = public_path();

       
    
       
 
  $src1 = new \Imagick(public_path("canvas_picture". $imageName1));
  $src1->resizeImage(550, null,\Imagick::FILTER_LANCZOS,1); 
  $src1->writeImage(public_path("resized_pictures". $imageName1));
 $src2 = new \Imagick(public_path("\site-images\Samsung-S20Plus-Bezpozadine.png"));
 
 
 
  $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
 
  exec('magick convert 
 '.$path.'\site-images\Samsung-S20Plus-Bezpozadine.png 
  -channel A -blur 0x8
  -compose hardlight
  '.$path.'\image\ms_light_map-phone1.png
   ');
 
  
 
  exec('magick convert 
  '.$path.'\resized_pictures'. $imageName1. ' 
  -channel matte -separate 
  '.$path.'\image\ms_logo_displace_mask_phone1.png
   ');

  
 
 
 
  exec('magick convert 
  '.$path.'\resized_pictures'. $imageName1. ' 
  '.$path.'\image\ms_light_map-phone1.png 
  -geometry -270-130 
  -compose Multiply -composite 
  '.$path.'\image\ms_logo_displace_mask_phone1.png 
  -compose CopyOpacity -composite 
  '.$path.'\image\ms_light_map_logo_phone1.png
  ');
 
 
 $src1->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
 $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
 $src = new \Imagick(public_path("\image\ms_light_map_logo_phone1.png"));
 $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 270, 130);
 $src2->writeImage(public_path("image/output1.png"));

 $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
 $name = mt_rand(1000000, 9999999)
     . mt_rand(1000000, 9999999)
     . $characters[rand(0, strlen($characters) - 1)];
 
 $string = str_shuffle($name);
 $string .=  round(microtime(true) * 1000);
 $imageRandom1 = '/' . $string . '.png';

 exec('magick  convert '.$path.'\image\output1.png 
  -flatten  '.$path.'\image'.$imageRandom1.'
 ');
   
        
        $imageRandom = ltrim($imageRandom1, '/');

       

        $check = DB::table('images')->insert([
        'name' => $imageRandom, 'product_id' => $id, 'color' => 'transparent', 'size' => "Samsung Galaxy S20+"
        ]);

        exec('magick  convert '.$path.'\site-images\Samsung-S20Plus-Bezpozadine.png -background "rgb(0,0,0)" 
        -flatten  '.$path.'\image\Samsung-S20Plus-Crna.png
       ');
        


 /* $src1 = new \Imagick(public_path("\image\ms_light_map_logo_phone.png")); */

 $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
 $name = mt_rand(1000000, 9999999)
     . mt_rand(1000000, 9999999)
     . $characters[rand(0, strlen($characters) - 1)];
 
 $string = str_shuffle($name);
 $string .=  round(microtime(true) * 1000);
 $imageRandom2 = '/' . $string . '.png'; 
 
 exec('magick convert 
 '.$path.'\image\Samsung-S20Plus-Crna.png 
 '.$path.'\image\output1.png 
 -compose ATop -composite 
 
 -depth 16 
 '.$path.'\image'.$imageRandom2.'
 ');
 



 $imageRandom2 = ltrim($imageRandom2, '/');

 $check2 = DB::table('images')->insert([
  'name' => $imageRandom2, 'product_id' => $id, 'color' => 'black', 'size' => "Samsung Galaxy S20+"
 ]);

 return $check2;

 }

    

    public static function samsungP20PhoneCase($id, $image){

        $imageName1 = "/" .  $image; 
      
        $path = public_path();

    
       
 
  $src1 = new \Imagick(public_path("canvas_picture". $imageName1));
  $src1->resizeImage(500, null,\Imagick::FILTER_LANCZOS,1); 
  $src1->writeImage(public_path("resized_pictures". $imageName1));
 $src2 = new \Imagick(public_path("\site-images\Samsung-P20-Bezpozadine.png"));
 
 
 
  $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
 
  exec('magick convert 
 '.$path.'\site-images\Samsung-P20-Bezpozadine.png 
  -channel A -blur 0x8
  -compose hardlight
  '.$path.'\image\ms_light_map-phone1.png
   ');
 
  
 
  exec('magick convert 
  '.$path.'\resized_pictures'. $imageName1. ' 
  -channel matte -separate 
  '.$path.'\image\ms_logo_displace_mask_phone1.png
   ');

  
 
 
  exec('magick convert 
  '.$path.'\resized_pictures'. $imageName1. ' 
  '.$path.'\image\ms_light_map-phone1.png 
  -geometry -290-180 
  -compose Multiply -composite 
  '.$path.'\image\ms_logo_displace_mask_phone1.png 
  -compose CopyOpacity -composite 
  '.$path.'\image\ms_light_map_logo_phone1.png
  ');
 
 
 
 $src1->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
 $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
 $src = new \Imagick(public_path("\image\ms_light_map_logo_phone1.png"));
 $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 290, 180);
 $src2->writeImage(public_path("image/output11.png"));

 $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
 $name = mt_rand(1000000, 9999999)
     . mt_rand(1000000, 9999999)
     . $characters[rand(0, strlen($characters) - 1)];
 
 $string = str_shuffle($name);
 $string .=  round(microtime(true) * 1000);
 $imageRandom1 = '/' . $string . '.png'; 

  exec('magick  convert '.$path.'\image\output11.png 
  -flatten  '.$path.'\image'.$imageRandom1.'
 ');
   

        $imageRandom = ltrim($imageRandom1, '/');
     
 
        $check = DB::table('images')->insert([
         'name' => $imageRandom, 'product_id' => $id, 'color' => 'transparent', 'size' => "Samsung Galaxy S20"
        ]);

        exec('magick  convert '.$path.'\site-images\Samsung-P20-Bezpozadine.png -background "rgb(0,0,0)" 
        -flatten  '.$path.'\image\SamsungGalaxy-P20-Crna.png
       ');
         


 
              $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
              $name = mt_rand(1000000, 9999999)
                  . mt_rand(1000000, 9999999)
                  . $characters[rand(0, strlen($characters) - 1)];
              
              $string = str_shuffle($name);
              $string .=  round(microtime(true) * 1000);
              $imageRandom2 = '/' . $string . '.png'; 

 
 exec('magick convert 
 '.$path.'\image\SamsungGalaxy-P20-Crna.png 
 '.$path.'\image\output11.png 
 -compose ATop -composite 
 
 -depth 16 
 '.$path.'\image'.$imageRandom2.'
 ');
 
 

 $imageRandom2 = ltrim($imageRandom2, '/');

 $check2 = DB::table('images')->insert([
  'name' => $imageRandom2, 'product_id' => $id, 'color' => 'black', 'size' => "Samsung Galaxy S20"
 ]);

 return $check2;

      
    }

    public static function iphonePhoneCase($id, $image){



     

        $imageName1 = "/" .  $image; 
  
        $path = public_path();
       
    
       
 
  $src1 = new \Imagick(public_path("canvas_picture". $imageName1));
   $src1->resizeImage(550, null,\Imagick::FILTER_LANCZOS,1); 
  $src1->writeImage(public_path("resized_pictures". $imageName1)); 
 $src2 = new \Imagick(public_path("\site-images\Iphone-II-Pro-Bezpozadine1.png"));
 $src3 = new \Imagick(public_path("\site-images\Iphone-II-Pro.jpg"));
 
 
  $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
 
  exec('magick convert 
 '.$path.'\site-images\Iphone-II-Pro.jpg 
  -channel A -blur 0x8
  -compose hardlight
  '.$path.'\image\ms_light_map-phone1.png
   ');
 
   
 
  exec('magick convert 
  '.$path.'\resized_pictures'. $imageName1. ' 
  -channel matte -separate 
  '.$path.'\image\ms_logo_displace_mask_phone1.png
   ');

  
 
 
 
  exec('magick convert 
  '.$path.'\resized_pictures'. $imageName1. ' 
  '.$path.'\image\ms_light_map-phone1.png 
  -geometry -270-170 
  -compose Multiply -composite 
  '.$path.'\image\ms_logo_displace_mask_phone1.png 
  -compose CopyOpacity -composite 
  '.$path.'\image\ms_light_map_logo_phone1.png
  ');
 
 
 $src1->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
 $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
 $src = new \Imagick(public_path("\image\ms_light_map_logo_phone1.png"));
 $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 270, 170);
 $src2->writeImage(public_path("image/output1.png"));

 $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
 $name = mt_rand(1000000, 9999999)
     . mt_rand(1000000, 9999999)
     . $characters[rand(0, strlen($characters) - 1)];
 
 $string = str_shuffle($name);
 $string .=  round(microtime(true) * 1000);
 $imageRandom1 = '/' . $string . '.png'; 

 $src2->writeImage(public_path("image". $imageRandom1));

 $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
 $name = mt_rand(1000000, 9999999)
     . mt_rand(1000000, 9999999)
     . $characters[rand(0, strlen($characters) - 1)];
 
 $string = str_shuffle($name);
 $string .=  round(microtime(true) * 1000);
 $imageRandom = '/' . $string . '.png';

  exec('magick  convert '.$path.'\image\output1.png -background "rgb(6, 6, 6)" 
  -flatten  '.$path.'\image'.$imageRandom.'
 ');
   

       exec('magick  convert '.$path.'\site-images\Iphone-II-Pro-Bezpozadine1.png -background "rgb(0,0,0)" 
        -flatten  '.$path.'\image\Iphone-II-Pro-Crna.png 
       ');
         
 
 exec('magick convert 
 '.$path.'\image\Iphone-II-Pro-Crna.png 
 '.$path.'\image\output1.png 
 -compose ATop -composite 
 
 -depth 16 
 '.$path.'\image\ms_product_phone1.png
 ');
 
 

 
 $imageRandom1 = ltrim($imageRandom1, '/');

 $check1 = DB::table('images')->insert([
  'name' => $imageRandom1, 'product_id' => $id, 'color' => 'transparent', 'size' => 'iPhone XI Pro'
 ]);

 $imageRandom = ltrim($imageRandom, '/');

 $check = DB::table('images')->insert([
  'name' => $imageRandom, 'product_id' => $id, 'color' => 'black', 'size' => 'iPhone XI Pro'
 ]);
 return $check;

      


    }


    public static function customCase($id, $image){
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
       
    
       
   
   $src1 = new \Imagick(public_path("canvas_picture". $imageName1));
    $src1->resizeImage(530, null,\Imagick::FILTER_LANCZOS,1); 
   $src1->writeImage(public_path("resized_pictures". $imageName1)); 
   $src2 = new \Imagick(public_path("\site-images\Custommaska.png"));
   
   
   
   $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
   
   exec('magick convert 
   '.$path.'\site-images\Custommaska.png 
   -channel A -blur 0x8
   -compose hardlight
   '.$path.'\image\ms_light_map-custom.png
   ');
   
   
   
  exec('magick convert 
   '.$path.'\resized_pictures'. $imageName1. ' 
   -channel matte -separate 
   '.$path.'\image\ms_logo_displace_mask_custom.png
   ');
   
   
   
   exec('magick convert 
   '.$path.'\resized_pictures'. $imageName1. ' 
   '.$path.'\image\ms_light_map-custom.png 
   -geometry -280-160 
   -compose Multiply -composite 
   '.$path.'\image\ms_logo_displace_mask_custom.png 
   -compose CopyOpacity -composite 
   '.$path.'\image\ms_light_map_logo_custom.png
   ');
   
  
   
   $src1->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
   $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
   $src = new \Imagick(public_path("\image\ms_light_map_logo_custom.png"));
   $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 280, 160);
   $src2->writeImage(public_path("image/custom1.png"));

   $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $name = mt_rand(1000000, 9999999)
       . mt_rand(1000000, 9999999)
       . $characters[rand(0, strlen($characters) - 1)];
   
   $string = str_shuffle($name);
   $string .=  round(microtime(true) * 1000);
   $imageRandom = '/' . $string . '.png';

   exec('magick  convert '.$path.'\image\custom1.png 
   -flatten  '.$path.'\image'.$imageRandom.'
   ');
   
        $imageRandom = ltrim($imageRandom, '/');

        $check = DB::table('images')->insert([
            'name' => $imageRandom, 'product_id' => $id, 'color' => 'transparent' ,'size' => 'custom'
           ]);
        

       exec('magick  convert '.$path.'\site-images\Custommaska.png -background "rgb(0,0,0)" 
        -flatten  '.$path.'\image\Custom-Crna.png
       ');
         
   
   $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $name = mt_rand(1000000, 9999999)
       . mt_rand(1000000, 9999999)
       . $characters[rand(0, strlen($characters) - 1)];
   
   $string = str_shuffle($name);
   $string .=  round(microtime(true) * 1000);
   $imageRandom1 = '/' . $string . '.png';
   
   exec('magick convert 
   '.$path.'\image\Custom-Crna.png 
   '.$path.'\image\custom1.png 
   -compose ATop -composite 
   
   -depth 16 
   '.$path.'\image'.$imageRandom1.'
   ');
   
  
   $imageRandom1 = ltrim($imageRandom1, '/');

   $check1 = DB::table('images')->insert([
    'name' => $imageRandom1, 'product_id' => $id, 'color' => 'black' ,'size' => 'custom'
   ]);


   return $check1;
   
    }

    public static function canvas($id, $image){

      
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(500, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\U1-Canvas_Slika-Maska.png"));
      
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
        exec('magick convert 
        '.$path.'\site-images\U1-Canvas_Slika-Maska.png 
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-canvas.png
        ');
        
       
        
       exec('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        -channel matte -separate 
        '.$path.'\image\ms_logo_displace_mask_canvas.png
        ');
        
        
        
        exec('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        '.$path.'\image\ms_light_map-canvas.png 
        -geometry -350-250 
        -compose Multiply -composite 
        '.$path.'\image\ms_logo_displace_mask_canvas.png 
        -compose CopyOpacity -composite 
        '.$path.'\image\ms_light_map_logo_canvas.png
        ');
    
   
   
        $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,350,250);
        $src2->writeImage(public_path("image\image-canvas.png"));
        echo '<img src="\image\image-canvas.png">';
        $src4 = new \Imagick(public_path("site-images/U1-Canvas_Slika-BG.png"));
       /*  $src4->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src4->writeImage(public_path("\site-images/Textura-Canvas-mockup.png")); */
         $src3 = new \Imagick(public_path("image/image-canvas.png"));
         $src3->compositeImage($src4, \Imagick::COMPOSITE_MULTIPLY,0,0);

         $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $name = mt_rand(1000000, 9999999)
             . mt_rand(1000000, 9999999)
             . $characters[rand(0, strlen($characters) - 1)];
         
         $string = str_shuffle($name);
         $string .=  round(microtime(true) * 1000);
         $imageRandom = '/' . $string . '.png';

         $src3->writeImage(public_path("image" . $imageRandom));

         $imageRandom = ltrim($imageRandom, '/');

         $check = DB::table('images')->insert([
          'name' => $imageRandom, 'product_id' => $id, 'size' => 'main'
         ]);
      
         return $check;
      

     
    }

    public static function canvasThumb($id, $image){
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(600, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\U1-Canvas_Slika-Maska.png"));
       /*  $src2->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src2->writeImage(public_path("\site-images\Canvas-mockup-thumbnail.png")); */
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
        exec('magick convert 
        '.$path.'\site-images\Canvas-mockup-thumbnail.png 
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-canvas-thumb.png
        ');
        
     
        exec('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        -channel matte -separate 
        '.$path.'\image\ms_logo_displace_mask_canvas_thumb.png
        ');
        
        
        
       
        
        exec('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        '.$path.'\image\ms_light_map-canvas-thumb.png 
        -geometry -300-230 
        -compose Multiply -composite 
        '.$path.'\image\ms_logo_displace_mask_canvas_thumb.png 
        -compose CopyOpacity -composite 
        '.$path.'\image\ms_light_map_logo_canvas_thumb.png
        ');
        
      
   
   
        $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,300,230);
        $src2->writeImage(public_path("image\image-canvas-thumb.png"));
        echo '<img src="\image\image-canvas-thumb.png">';
        $src4 = new \Imagick(public_path("site-images/U1-Canvas_Slika-BG.png"));
         $src3 = new \Imagick(public_path("image/image-canvas-thumb.png"));
         $src3->compositeImage($src4, \Imagick::COMPOSITE_MULTIPLY,0,0);

         $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $name = mt_rand(1000000, 9999999)
             . mt_rand(1000000, 9999999)
             . $characters[rand(0, strlen($characters) - 1)];
         
         $string = str_shuffle($name);
         $string .=  round(microtime(true) * 1000);
         $imageRandom = '/' . $string . '.png';

         $src3->writeImage(public_path("image".$imageRandom));

         $imageRandom = ltrim($imageRandom, '/');

         $check = DB::table('images')->insert([
          'name' => $imageRandom, 'product_id' => $id, 'size' => 'thumb'
         ]);
      
         return $check;
    }


    public static function wallpaperKids($id, $image){
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(1300, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_wallpaper". $imageName1));
   
        $src2 = new \Imagick(public_path("\site-images\Kids-Wall-Wallpapers-Mask.png"));
        $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER, 0, 0);

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom = '/' . $string . '.png';

        $src2->writeImage(public_path("image" . $imageRandom));
      
        $imageRandom = ltrim($imageRandom, '/');

        $check = DB::table('images')->insert([
         'name' => $imageRandom, 'product_id' => $id, 'size' => 'big', 'position' => 'kid'
        ]);
     
        return $check;
   
       
   
      
    }


    public static function wallpaperRepeatKids($id, $image){

        $imageName1 = "/" .  $image; 

        $path = public_path();

        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(200, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_wallpaper". $imageName1));
       $Y = $src1->getImageHeight()/2;

      exec('magick convert -size 2000x2000 tile:'.$path.'/resized_wallpaper'.$imageName1. ' ' .$path.'/image/Tiles.png
       ');
       
  
       $src4 = new \Imagick(public_path("\site-images\Kids-Wall-Wallpapers-Mask.png"));
  
   $src3 = new \Imagick(public_path("image/Tiles.png"));
   $src4->compositeImage($src3, \Imagick::COMPOSITE_DSTOVER, 0, 0);

   $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $name = mt_rand(1000000, 9999999)
       . mt_rand(1000000, 9999999)
       . $characters[rand(0, strlen($characters) - 1)];
   
   $string = str_shuffle($name);
   $string .=  round(microtime(true) * 1000);
   $imageRandom = '/' . $string . '.png';
   
   $src4->writeImage(public_path("image" . $imageRandom));

   $imageRandom = ltrim($imageRandom, '/');

   $check = DB::table('images')->insert([
    'name' => $imageRandom, 'product_id' => $id, 'size' => 'repeat', 'position' => 'kid'
   ]);

   return $check;

    }

    public static function wallpaperSittingRoom($id, $image){
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(1300, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_wallpaper". $imageName1));
   
        $src2 = new \Imagick(public_path("\site-images\LivingRoom-Wall-Wallpapers-Mask.png"));
        $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER, 0, 0);

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom = '/' . $string . '.png';

        $src2->writeImage(public_path("image" . $imageRandom));
      
        $imageRandom = ltrim($imageRandom, '/');

        $check = DB::table('images')->insert([
         'name' => $imageRandom, 'product_id' => $id, 'size' => 'big', 'position' => 'room'
        ]);
     
        return $check;
      
    }


    public static function wallpaperRepeatSittingRoom($id, $image){

        $imageName1 = "/" .  $image; 

        $path = public_path();

        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(200, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_wallpaper". $imageName1));
       $Y = $src1->getImageHeight()/2;
       exec('magick convert -size 2000x2000 tile:'.$path.'/resized_wallpaper'.$imageName1. ' ' .$path.'/image/Tiles.png
       ');
       
      
       $src4 = new \Imagick(public_path("\site-images\LivingRoom-Wall-Wallpapers-Mask.png"));
  
   $src3 = new \Imagick(public_path("image/Tiles.png"));
   $src4->compositeImage($src3, \Imagick::COMPOSITE_DSTOVER, 0, 0);

   $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $name = mt_rand(1000000, 9999999)
       . mt_rand(1000000, 9999999)
       . $characters[rand(0, strlen($characters) - 1)];
   
   $string = str_shuffle($name);
   $string .=  round(microtime(true) * 1000);
   $imageRandom = '/' . $string . '.png';
   
   $src4->writeImage(public_path("image" . $imageRandom));

   $imageRandom = ltrim($imageRandom, '/');

   $check = DB::table('images')->insert([
    'name' => $imageRandom, 'product_id' => $id, 'size' => 'repeat', 'position' => 'room'
   ]);

   return $check;

    }

    public static function wallpaper($id, $image){
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
       
       
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(1300, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_wallpaper". $imageName1));
   
        $src2 = new \Imagick(public_path("\site-images\Wall-Wallpapers-Mask.png"));
        $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER, 0, 0);

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom = '/' . $string . '.png';

        $src2->writeImage(public_path("image" . $imageRandom));

                $imageRandom = ltrim($imageRandom, '/');

         $check = DB::table('images')->insert([
          'name' => $imageRandom, 'product_id' => $id, 'size' => 'big', 'position' => 'office'
         ]);
      
         return $check;

     
    }

    public static function wallpaperRepeat($id, $image){

        $imageName1 = "/" .  $image; 

        $path = public_path();
   
       
       
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(200, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_wallpaper". $imageName1));
        $Y = $src1->getImageHeight()/2;

        exec('magick convert -size 2000x2000 tile:'.$path.'/resized_wallpaper'.$imageName1. ' ' .$path.'/image/Tiles.png
   ');
   
   
   $src2 = new \Imagick(public_path("\site-images\Wall-Wallpapers-Mask.png"));

   
   $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
   
  exec('magick convert 
   '.$path.'\site-images\Wall-Wallpapers-Mask.png 
   -channel A -blur 0x8
   -compose hardlight
   '.$path.'\image\ms_light_map-tapeta.png
   ');
   
   
  exec('magick convert 
   '.$path.'/image/Tiles.png 
   
   '.$path.'\image\ms_logo_displace_mask_tapeta.png
   ');
   
   
   
 
   
  exec('magick convert 
   '.$path.'\image/Tiles.png 
   '.$path.'\image\ms_light_map-tapeta.png 
   -geometry -0-0 
   -compose Multiply -composite 
   '.$path.'\image\ms_logo_displace_mask_tapeta.png 
   -compose CopyOpacity -composite 
   '.$path.'\image\ms_light_map_logo_tapeta.png
   ');
   
   
   $src1->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
   $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
   $src = new \Imagick(public_path("\image\ms_light_map_logo_tapeta.png"));
   $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 0, 0);
   $src2->writeImage(public_path("image/output1.png"));


  exec('magick  convert '.$path.'\image\output1.png 
   -flatten  '.$path.'\image\out.png 
   ');
   
   
   
        $src7 = new \Imagick(public_path("\image\out.png"));
        $src8 = new \Imagick(public_path("\site-images\Wall-Wallpapers-BG.png"));
        $src7->compositeImage($src8, \Imagick::COMPOSITE_MULTIPLY, 0, 0);

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom = '/' . $string . '.png';

        $src7->writeImage(public_path("image" . $imageRandom));

        
        $imageRandom = ltrim($imageRandom, '/');

        $check = DB::table('images')->insert([
         'name' => $imageRandom, 'product_id' => $id, 'size' => 'repeat', 'position' => 'office'
        ]);
     
        return $check;

      
    }


    public static function backpack($id, $image){
        $path = public_path();

       exec('magick convert   '.$path.'\site-images\Backpack-black-BG.jpg[403x422+470+391] 
       -colorspace gray 
       -blur 10x250 
       -auto-level
       '.$path.'\image\displace_map.png
        ');
  
  
       $imageName1 = "/" .  $image; 
  
      exec('magick convert   '.$path.'\canvas_picture' . $imageName1 . '
       -resize 400x400
       '.$path.'\canvas_picture' . $imageName1 . '
       '); 
       
   
  
      exec('magick convert 
       '.$path.'\canvas_picture' . $imageName1 . '
       -bordercolor transparent -border 12x12 -thumbnail 403x422 
       '.$path.'\image\ms_temp.png
        ');
  
  
  
  
       list($width, $height) = getimagesize($path.'\image\ms_temp.png');
  
     
       $X = 470 + (303-$width)/2;
       $Y = 391 +  (422-$height)/2;
      
  
       exec('magick convert 
       '.$path.'\site-images\Backpack-black-BG.jpg[403x422+470+391] 
       -colorspace gray -blur 10x250 -auto-level 
       -depth 16 
       '.$path.'\image\ms_displace_map_girl_white_regular.png
        ');
  
      
       exec('magick convert 
       '.$path.'\image\ms_temp.png 
       '.$path.'\image\ms_displace_map_girl_white_regular.png 
       -alpha set -virtual-pixel transparent 
       -compose displace -set option:compose:args -5x-5 -composite 
       -depth 16 
       '.$path.'\image\ms_displaced_logo.png
     
        ');
  
  
       
       exec('magick convert 
       '.$path.'\site-images\Backpack-black-BG.jpg[403x422+470+391] 
       -colorspace gray -auto-level 
       -blur 0x4 
       -contrast-stretch 0,30%% 
       -depth 16 
       '.$path.'\image\ms_light_map_girl_white_regular.png
        ');
  

       
      exec('magick convert 
       '.$path.'\image\ms_displaced_logo.png 
       -channel matte -separate 
       '.$path.'\image\ms_logo_displace_mask.png
        ');
  
       
      exec('magick convert 
       '.$path.'\image\ms_displaced_logo.png 
       '.$path.'\image\ms_light_map_girl_white_regular.png 
       -compose Multiply -composite 
       '.$path.'\image\ms_logo_displace_mask.png 
       -compose CopyOpacity -composite 
       '.$path.'\image\ms_light_map_logo.png
       ');
  
  
      $src1 = new \Imagick(public_path("\image\ms_light_map_logo.png"));
      $src2 = new \Imagick(public_path("site-images/Backpack-black-Mask.png"));
      $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,$X,$Y);
      $src2->writeImage(public_path("image\image-backpacks.png"));
  
    
      echo '<img src="\image\image-backpacks.png">';
    
      $src7 = new \Imagick(public_path("\image\ms_light_map_logo.png"));
      $src8 = new \Imagick(public_path("site-images/Backpack-red-Mask.png"));
      $src8->compositeImage($src7, \Imagick::COMPOSITE_DSTOVER ,$X,$Y);
      $src8->writeImage(public_path("image\image-backpacks1.png"));
  
  
      $src6 = new \Imagick(public_path("image\image-backpacks1.png"));
      $src4 = new \Imagick(public_path("site-images/Backpack-black-BG.jpg"));
      $src5 = new \Imagick(public_path("site-images/Backpack-red-BG.jpg"));
       $src3 = new \Imagick(public_path("image/image-backpacks.png"));
       $src4->compositeImage($src3, \Imagick::COMPOSITE_OVER,0,0);

       $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
       $name = mt_rand(1000000, 9999999)
           . mt_rand(1000000, 9999999)
           . $characters[rand(0, strlen($characters) - 1)];
       
       $string = str_shuffle($name);
       $string .=  round(microtime(true) * 1000);
       $imageRandom = '/' . $string . '.png';
    
       $src4->writeImage(public_path("image" . $imageRandom));

       $imageRandom = ltrim($imageRandom, '/');

       

       $check = DB::table('images')->insert([
        'name' => $imageRandom, 'product_id' => $id, 'color' => 'black'
       ]);

       $src5->compositeImage($src6, \Imagick::COMPOSITE_OVER,0,0);


       $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
       $name = mt_rand(1000000, 9999999)
           . mt_rand(1000000, 9999999)
           . $characters[rand(0, strlen($characters) - 1)];
       
       $string = str_shuffle($name);
       $string .=  round(microtime(true) * 1000);
       $imageRandom1 = '/' . $string . '.png';

       $src5->writeImage(public_path("image" . $imageRandom1));
     
       $imageRandom1 = ltrim($imageRandom1, '/');

       $check1 = DB::table('images')->insert([
        'name' => $imageRandom1, 'product_id' => $id, 'color' => 'red'
       ]);

       return $check1;
    }


    public static function kidsBibs($id, $image){
        $path = public_path();

 

        exec('magick convert   '.$path.'\site-images\New-bibs-BG.jpg[503x522+550+501] 
       -colorspace gray 
       -blur 10x250 
       -auto-level
       '.$path.'\image\displace_map.png
        ');
  
  
       $imageName1 = "/" .  $image; 
  
      exec('magick convert   '.$path.'\canvas_picture' . $imageName1 . '
       -resize 500x500
       '.$path.'\resized_pictures' . $imageName1 . '
       '); 
       
   
  
       exec('magick convert 
       '.$path.'\resized_pictures' . $imageName1 . '
       -bordercolor transparent -border 12x12 -thumbnail 503x522 
       '.$path.'\image\ms_temp.png
        ');
  
  
  
  
       list($width, $height) = getimagesize($path.'\image\ms_temp.png');
  
     
       $X = 550 + (503-$width)/2;
       $Y = 501 +  (522-$height)/2;
      
  
        exec('magick convert 
       '.$path.'\site-images\New-bibs-BG.jpg[503x522+550+501] 
       -colorspace gray -blur 10x250 -auto-level 
       -depth 16 
       '.$path.'\image\ms_displace_map_girl_white_regular.png
        ');
  
      
       exec('magick convert 
       '.$path.'\image\ms_temp.png 
       '.$path.'\image\ms_displace_map_girl_white_regular.png 
       -alpha set -virtual-pixel transparent 
       -compose displace -set option:compose:args -5x-5 -composite 
       -depth 16 
       '.$path.'\image\ms_displaced_logo.png
     
        ');
  
       
       exec('magick convert 
       '.$path.'\site-images\New-bibs-BG.jpg[503x522+550+501] 
       -colorspace gray -auto-level 
       -blur 0x4 
       -contrast-stretch 0,30%% 
       -depth 16 
       '.$path.'\image\ms_light_map_girl_white_regular.png
        ');
  
       
      exec('magick convert 
       '.$path.'\image\ms_displaced_logo.png 
       -channel matte -separate 
       '.$path.'\image\ms_logo_displace_mask.png
        ');
  
       
       exec('magick convert 
       '.$path.'\image\ms_displaced_logo.png 
       '.$path.'\image\ms_light_map_girl_white_regular.png 
       -compose Multiply -composite 
       '.$path.'\image\ms_logo_displace_mask.png 
       -compose CopyOpacity -composite 
       '.$path.'\image\ms_light_map_logo.png
       ');
  
  
  
      $src1 = new \Imagick(public_path("\image\ms_light_map_logo.png"));
      $src2 = new \Imagick(public_path("site-images/New-Bibs-Mask.png"));
     
      $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,$X,$Y);
      $src2->writeImage(public_path("image\image-bibs.png"));
  
  
     
      $src4 = new \Imagick(public_path("site-images/New-bibs-BG.jpg"));
  
       $src3 = new \Imagick(public_path("image/image-bibs.png"));
       $src4->compositeImage($src3, \Imagick::COMPOSITE_OVER,0,0);

       $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
       $name = mt_rand(1000000, 9999999)
           . mt_rand(1000000, 9999999)
           . $characters[rand(0, strlen($characters) - 1)];
       
       $string = str_shuffle($name);
       $string .=  round(microtime(true) * 1000);
       $imageRandom = '/' . $string . '.png';

       $src4->writeImage(public_path("image". $imageRandom));
      
       $imageRandom = ltrim($imageRandom, '/');

       $check = DB::table('images')->insert([
        'name' => $imageRandom, 'product_id' => $id, 'color' => 'black'
       ]);
    }

    public static function blackClock($id, $image){
        $imageName1 = "/" .  $image; 
   
        $path = public_path();
   
       $src1 = new \Imagick(public_path("canvas_picture". $imageName1));
   
       $src3 = new \Imagick(public_path("\site-images\SatCrni-BG.png"));
       $src3->compositeImage($src1, \Imagick::COMPOSITE_MULTIPLY, 260, 210);
       $src3->writeImage(public_path("image/clock-black-final.png"));
       echo '<img src="\image/clock-black-final.png">';

       $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
       $name = mt_rand(1000000, 9999999)
           . mt_rand(1000000, 9999999)
           . $characters[rand(0, strlen($characters) - 1)];
       
       $string = str_shuffle($name);
       $string .=  round(microtime(true) * 1000);
       $imageRandom = '/' . $string . '.png';
   
       $src2 = new \Imagick(public_path("\site-images\SatCrni-Maska.png"));
       $src2->compositeImage($src3, \Imagick::COMPOSITE_DSTOVER, 0, 0);
       $src2->writeImage(public_path("image" . $imageRandom));

       $imageRandom = ltrim($imageRandom, '/');

       $check = DB::table('images')->insert([
        'name' => $imageRandom, 'product_id' => $id, 'color' => 'black'
       ]);
      }
    
      public static function whiteClock($id, $image){
        $imageName1 = "/" .  $image; 
   
        $path = public_path();
   
        $src1 = new \Imagick(public_path("canvas_picture". $imageName1));
        $src3 = new \Imagick(public_path("\site-images\Sat-Bijeli-BG.jpg"));
        $src3->compositeImage($src1, \Imagick::COMPOSITE_MULTIPLY,   260, 210);
        $src3->writeImage(public_path("image/clock-white-final.png"));
        echo '<img src="\image/clock-white-final.png">';

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom = '/' . $string . '.png';
   
        $src2 = new \Imagick(public_path("\site-images\Sat-Bijeli-Maska.png"));
        $src2->compositeImage($src3, \Imagick::COMPOSITE_DSTOVER, 0, 0);
        $src2->writeImage(public_path("image" . $imageRandom));

        
       $imageRandom = ltrim($imageRandom, '/');

       $check = DB::table('images')->insert([
        'name' => $imageRandom, 'product_id' => $id, 'color' => 'white'
       ]);
    
       
      }
    
      public static function redClock($id, $image){
    
        $imageName1 = "/" .  $image; 
   
        $path = public_path();
   
        $src1 = new \Imagick(public_path("canvas_picture". $imageName1));
      
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom = '/' . $string . '.png';
   
        $src3 = new \Imagick(public_path("\site-images\Sat-Crveni-BG.jpg"));
        $src3->compositeImage($src1, \Imagick::COMPOSITE_MULTIPLY,   260, 210);
        $src3->writeImage(public_path("image/clock-red-final.png"));
        echo '<img src="\image/clock-red-final.png">';
   
        $src2 = new \Imagick(public_path("\site-images\Sat-Crveni-Maska.png"));
        $src2->compositeImage($src3, \Imagick::COMPOSITE_DSTOVER, 0, 0);
        $src2->writeImage(public_path("image" . $imageRandom));

       $imageRandom = ltrim($imageRandom, '/');

       $check = DB::table('images')->insert([
        'name' => $imageRandom, 'product_id' => $id, 'color' => 'red'
       ]);
    
      }
    
      public static function blueClock($id, $image){
      
        $imageName1 = "/" .  $image; 
   
        $path = public_path();
   
        $src1 = new \Imagick(public_path("canvas_picture". $imageName1));
   
        $src3 = new \Imagick(public_path("\site-images\Sat-Plavi-BG.jpg"));
        $src3->compositeImage($src1, \Imagick::COMPOSITE_MULTIPLY,   260, 210);
        $src3->writeImage(public_path("image/clock-blue-final.png"));

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom = '/' . $string . '.png';
   
        $src2 = new \Imagick(public_path("\site-images\Sat-Plavi-Maska.png"));
        $src2->compositeImage($src3, \Imagick::COMPOSITE_DSTOVER, 0, 0);
        $src2->writeImage(public_path("image" . $imageRandom));
       
        
       $imageRandom = ltrim($imageRandom, '/');

       $check = DB::table('images')->insert([
        'name' => $imageRandom, 'product_id' => $id, 'color' => 'blue'
       ]);
      }

 

    public static function cegerThumb($id, $image){
        $path = public_path();

     
         exec('magick convert '.$path.'\site-images\Torbaobicnasalinijom.jpg
         -resize 1200x2000
         '.$path.'\site-images\Torbaobicnasalinijom.jpg
          ');
         
    
         exec('magick convert '.$path.'\site-images\Torbaobicnasalinijom.jpg
          -resize 1200x2000
          '.$path.'\site-images\Torbaobicnasalinijom.jpg
           ');
         
    
         exec('magick convert   '.$path.'\site-images\Torbaobicnasalinijom.jpg[403x422+390+481] 
         -colorspace gray 
         -blur 10x250 
         -auto-level
         '.$path.'\image\displace_map.png
          ');
    
   
    
         $imageName1 = "/" .  $image; 
    
         exec('magick convert   '.$path.'\canvas_picture' . $imageName1 . '
         -resize 400x400
         '.$path.'\resized_pictures' . $imageName1 . '
         '); 
         
    
    
         exec('magick convert 
         '.$path.'\resized_pictures' . $imageName1 . '
         -bordercolor transparent -border 12x12 -thumbnail 403x422 
         '.$path.'\image\ms_temp.png
          ');
    
    
    
    
         list($width, $height) = getimagesize($path.'\image\ms_temp.png');
    
       
         $X = 390 + (403-$width)/2;
         $Y = 481 +  (422-$height)/2;
        
    
          exec('magick convert 
         '.$path.'\site-images\Torbaobicnasalinijom.jpg[403x422+390+481] 
         -colorspace gray -blur 10x250 -auto-level 
         -depth 16 
         '.$path.'\image\ms_displace_map_girl_white_regular.png
          ');
    
        
        exec('magick convert 
         '.$path.'\image\ms_temp.png 
         '.$path.'\image\ms_displace_map_girl_white_regular.png 
         -alpha set -virtual-pixel transparent 
         -compose displace -set option:compose:args -5x-5 -composite 
         -depth 16 
         '.$path.'\image\ms_displaced_logo.png
       
          ');
    
    
         
          exec('magick convert 
         '.$path.'\site-images\Torbaobicnasalinijom.jpg[403x422+390+481] 
         -colorspace gray -auto-level 
         -blur 0x4 
         -contrast-stretch 0,30%% 
         -depth 16 
         '.$path.'\image\ms_light_map_girl_white_regular.png
          ');
    
 
         
         exec('magick convert 
         '.$path.'\image\ms_displaced_logo.png 
         -channel matte -separate 
         '.$path.'\image\ms_logo_displace_mask.png
          ');
    
         
         exec('magick convert 
         '.$path.'\image\ms_displaced_logo.png 
         '.$path.'\image\ms_light_map_girl_white_regular.png 
         -compose Multiply -composite 
         '.$path.'\image\ms_logo_displace_mask.png 
         -compose CopyOpacity -composite 
         '.$path.'\image\ms_light_map_logo.png
         ');
    
        
       
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $name = mt_rand(1000000, 9999999)
        . mt_rand(1000000, 9999999)
        . $characters[rand(0, strlen($characters) - 1)];
    
    $string = str_shuffle($name);
    $string .=  round(microtime(true) * 1000);
    $imageRandom = '/' . $string . '.png';
    
         exec('magick convert 
         '.$path.'\site-images\Torbaobicnasalinijom.jpg
         '.$path.'\image\ms_light_map_logo.png 
         -geometry +'.$X.'+'.$Y.'
         -compose over -composite 
         -depth 16 
         '.$path.'\image'.$imageRandom.'
         ');
    
   

        $imageRandom = ltrim($imageRandom, '/');

        $check = DB::table('images')->insert([
         'name' => $imageRandom, 'product_id' => $id, 'size' => 'thumb'
        ]);
    
        return $check;
    }


    public static function sacksHo2($id, $image){

        $path = public_path();

      
    
          exec('magick convert   '.$path.'\site-images\PapirnakesaDinaHo2.jpg[303x322+430+431] 
         -colorspace gray 
         -blur 10x250 
         -auto-level
         '.$path.'\image\displace_map.png
          ');
     
    
         $imageName1 = "/" .  $image; 
    
         exec('magick convert   '.$path.'\canvas_picture' . $imageName1 . '
         -resize 300x300
         '.$path.'\resized_pictures' . $imageName1 . '
         '); 
         
     
    
         exec('magick convert 
         '.$path.'\resized_pictures' . $imageName1 . '
         -bordercolor transparent -border 12x12 -thumbnail 303x322 
         '.$path.'\image\ms_temp.png
          ');
    
    
    
         list($width, $height) = getimagesize($path.'\image\ms_temp.png');
    
        
         $X = 430 + (303-$width)/2;
         $Y = 431 +  (322-$height)/2;
        
    
          exec('magick convert 
         '.$path.'\site-images\PapirnakesaDinaHo2.jpg[303x322+430+431] 
         -colorspace gray -blur 10x250 -auto-level 
         -depth 16 
         '.$path.'\image\ms_displace_map_girl_white_regular.png
          ');
    
    
        
         exec('magick convert 
         '.$path.'\image\ms_temp.png 
         '.$path.'\image\ms_displace_map_girl_white_regular.png 
         -alpha set -virtual-pixel transparent 
         -compose displace -set option:compose:args -5x-5 -composite 
         -depth 16 
         '.$path.'\image\ms_displaced_logo.png
       
          ');
    
    
         
          exec('magick convert 
         '.$path.'\site-images\PapirnakesaDinaHo2.jpg[303x322+430+431] 
         -colorspace gray -auto-level 
         -blur 0x4 
         -contrast-stretch 0,30%% 
         -depth 16 
         '.$path.'\image\ms_light_map_girl_white_regular.png
          ');
    
 
         
         exec('magick convert 
         '.$path.'\image\ms_displaced_logo.png 
         -channel matte -separate 
         '.$path.'\image\ms_logo_displace_mask.png
          ');
    
    
         
         exec('magick convert 
         '.$path.'\image\ms_displaced_logo.png 
         '.$path.'\image\ms_light_map_girl_white_regular.png 
         -compose Multiply -composite 
         '.$path.'\image\ms_logo_displace_mask.png 
         -compose CopyOpacity -composite 
         '.$path.'\image\ms_light_map_logo.png
         ');
    
        
       
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom = '/' . $string . '.png';
    
         exec('magick convert 
         '.$path.'\site-images\PapirnakesaDinaHo2.jpg 
         '.$path.'\image\ms_light_map_logo.png 
         -geometry +'.$X.'+'.$Y.'
         -compose over    -composite 
         -depth 24 
         '.$path.'\image'.$imageRandom.'
         ');
    
   

        $imageRandom = ltrim($imageRandom, '/');

        $check = DB::table('images')->insert([
         'name' => $imageRandom, 'product_id' => $id, 'color' => 'white' , 'size' => "H02"
        ]);
    
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom1 = '/' . $string . '.png';
    
    
       exec('magick convert 
        '.$path.'\site-images\PapirnakesaDinaHocrn.jpg 
        '.$path.'\image\ms_light_map_logo.png 
        -geometry +'.$X.'+'.$Y.'
        -compose over -composite 
        -depth 16 
        '.$path.'\image'.$imageRandom1.'
        ');
    
   

       $imageRandom1 = ltrim($imageRandom1, '/');

       $check1 = DB::table('images')->insert([
        'name' => $imageRandom1, 'product_id' => $id, 'color' => 'black' , 'size' => "H02"
       ]);
    
        return $check1;
   

    }

    public static function sacks($id, $image){

        $path = public_path();

        exec('magick convert   '.$path.'\site-images\Gift-Bag-Big-White-BG.png[443x382+375+381] 
       -colorspace gray 
       -blur 10x250 
       -auto-level
       '.$path.'\test_picture\displace_map_a.png
        ');
  
  
  
       $imageName1 = "/" .  $image; 
  
       exec('magick convert   '.$path.'\canvas_picture' . $imageName1 . '
       
       '.$path.'\resized_pictures' . $imageName1 . '
       '); 
       

  
      exec('magick convert 
       '.$path.'\resized_pictures' . $imageName1 . '
       -bordercolor transparent -border 12x12 -thumbnail 443x382 
       '.$path.'\test_picture\ms_temp_sacks.png
        ');
  
 
  
  
       list($width, $height) = getimagesize($path.'\test_picture\ms_temp_sacks.png');
  
     
       $X = 375 + (443-$width)/2;
       $Y = 381 +  (382-$height)/2;
      
  
       exec('magick convert 
       '.$path.'\site-images\Gift-Bag-Big-White-BG.png[443x382+375+381] 
      
       -depth 16 
       '.$path.'\test_picture\ms_displace_map_sacks.png
        ');
  
  
      
      exec('magick convert 
       '.$path.'\test_picture\ms_temp_sacks.png 
       '.$path.'\test_picture\ms_displace_map_sacks.png 
       -alpha set -virtual-pixel transparent 
       -compose displace -set option:compose:args -5x-5 -composite 
       -depth 16 
       '.$path.'\test_picture\ms_displaced_logo_sacks.png
     
        ');
  
  
  
       
        exec('magick convert 
       '.$path.'\site-images\Gift-Bag-Big-White-BG.png[443x382+375+381] 
      
       -depth 16 
       '.$path.'\test_picture\ms_light_map_sacks.png
        ');
  
  
       
      exec('magick convert 
       '.$path.'\test_picture\ms_displaced_logo_sacks.png 
       -channel matte -separate 
       '.$path.'\test_picture\ms_logo_displace_mask_sacks.png
        ');
  

       
      exec('magick convert 
       '.$path.'\test_picture\ms_displaced_logo_sacks.png 
       '.$path.'\test_picture\ms_light_map_sacks.png 
       -compose Multiply -composite 
       '.$path.'\test_picture\ms_logo_displace_mask_sacks.png 
       -compose CopyOpacity -composite 
       '.$path.'\test_picture\ms_light_map_logo_sacks.png
       ');
  
 
  
      $src1 = new \Imagick(public_path("test_picture\ms_light_map_logo_sacks.png"));
      $src2 = new \Imagick(public_path("site-images/Gift-Bag-Big-White-Mask.png"));
      $src6 = new \Imagick(public_path("site-images/Gift-Bag-Big-Black-Mask.png"));
      $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,375,381);
      $src2->writeImage(public_path("test_picture\image-tote.png"));
  
      $src6->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,375,381);
      $src6->writeImage(public_path("test_picture\image-tote-black.png")); 
      echo '<img src="\test_picture\image-tote.png">';
      echo '<img src="\test_picture\image-tote-black.png">';
      $src7 = new \Imagick(public_path("test_picture\image-tote-black.png"));
  
     
      $src4 = new \Imagick(public_path("site-images/Gift-Bag-Big-White-BG.png"));
      $src5 = new \Imagick(public_path("site-images/Gift-Bag-Big-Black-BG.png"));
       $src3 = new \Imagick(public_path("test_picture/image-tote.png"));
       $src4->compositeImage($src3, \Imagick::COMPOSITE_SRCOVER,0,0);

       $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
       $name = mt_rand(1000000, 9999999)
           . mt_rand(1000000, 9999999)
           . $characters[rand(0, strlen($characters) - 1)];
       
       $string = str_shuffle($name);
       $string .=  round(microtime(true) * 1000);
       $imageRandom = '/' . $string . '.png';

       $src4->writeImage(public_path("image" . $imageRandom));

       $imageRandom = ltrim($imageRandom, '/');

       $check = DB::table('images')->insert([
        'name' => $imageRandom, 'product_id' => $id, 'color' => 'white' , 'size' => 'H'
       ]);

        $src5->compositeImage($src7, \Imagick::COMPOSITE_SRCOVER,0,0);

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom1 = '/' . $string . '.png';

       $src5->writeImage(public_path("image" . $imageRandom1));


          $imageRandom1 = ltrim($imageRandom1, '/');

          $check1 = DB::table('images')->insert([
           'name' => $imageRandom1, 'product_id' => $id, 'color' => 'black' , 'size' => 'H'
          ]);
    
          return $check1;


       

    }


    public static function notes($id, $image){
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
       
    
       
        $src1 = new \Imagick(public_path("canvas_picture". $imageName1));
        $src1->resizeImage(300, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_notes". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Notes.png"));
       
        
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
        exec('magick convert 
        '.$path.'\site-images\Notescrni.png 
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-notes.png
        ');
        
     
        
        exec('magick convert 
        '.$path.'\resized_notes'. $imageName1. ' 
        -channel matte -separate 
        '.$path.'\image\ms_logo_displace_mask_notes.png
        ');
        
        
        
       exec('magick convert 
        '.$path.'\resized_notes'. $imageName1. ' 
        '.$path.'\image\ms_light_map-notes.png 
        -geometry -425-360 
        -compose Multiply -composite 
        '.$path.'\image\ms_logo_displace_mask_notes.png 
        -compose CopyOpacity -composite 
        '.$path.'\image\ms_light_map_logo_notes.png
        ');
      
        
        $src1->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
        $src = new \Imagick(public_path("\image\ms_light_map_logo_notes.png"));
        $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 425, 360);
        $src2->writeImage(public_path("image/notes1.png"));

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom = '/' . $string . '.png';

        exec('magick  convert '.$path.'\image\notes1.png  
        -flatten  '.$path.'\image'.$imageRandom.'
        ');
        
            
              $imageRandom = ltrim($imageRandom, '/');

             $check = DB::table('images')->insert([
                'name' => $imageRandom, 'product_id' => $id, 'color' => 'white'
               ]); 
         
               
       
        
             $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 425, 380);
             $src2->writeImage(public_path("image/notes1.png"));

             exec('magick  convert '.$path.'\site-images\Notes.png  
             -flatten  '.$path.'\image\notes1.png 
             ');
            
                  $src3 = new \Imagick(public_path("\site-images\Notescrni.png"));
                $src3->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 425, 360);
                $src3->setImageBackgroundColor('#fad888');
                $src3->writeImage(public_path("image/notes3.png"));

                $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $name = mt_rand(1000000, 9999999)
                    . mt_rand(1000000, 9999999)
                    . $characters[rand(0, strlen($characters) - 1)];
                
                $string = str_shuffle($name);
                $string .=  round(microtime(true) * 1000);
                $imageRandom1 = '/' . $string . '.png';

                exec('magick  convert '.$path.'\image\notes3.png -background "rgb(0,0,0)" 
        -flatten  '.$path.'\image'.$imageRandom1.'
        ');
       
          
             $imageRandom1 = ltrim($imageRandom1, '/');
       
             $check1 = DB::table('images')->insert([
                'name' => $imageRandom1, 'product_id' => $id, 'color' => 'black'
               ]);
         
               return $check1;
    }



    public static function magnetRectangle($id, $image){
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
       
    
       
        $src1 = new \Imagick(public_path("canvas_picture". $imageName1));
        $src1->resizeImage(660, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Karticni.png"));
       
        
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
        exec('magick convert 
        '.$path.'\site-images\Karticni.png 
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-phone1.png
        ');
        

        
        exec('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        -channel matte -separate 
        '.$path.'\image\ms_logo_displace_mask_phone1.png
        ');
        
        
        
        exec('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        '.$path.'\image\ms_light_map-phone1.png 
        -geometry -270-300 
        -compose Multiply -composite 
        '.$path.'\image\ms_logo_displace_mask_phone1.png 
        -compose CopyOpacity -composite 
        '.$path.'\image\ms_light_map_logo_phone1.png
        ');
        

        
        $src1->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
        $src = new \Imagick(public_path("\image\ms_light_map_logo_phone1.png"));
        $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 270, 300);
        $src2->writeImage(public_path("image/output1.png"));

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom = '/' . $string . '.png';

        exec('magick  convert '.$path.'\image\output1.png  
        -flatten  '.$path.'\image'.$imageRandom.'
        ');
        
    
             $imageRandom = ltrim($imageRandom, '/');
             
             $check = DB::table('images')->insert([
                'name' => $imageRandom, 'product_id' => $id, 'size' => 'Square'
               ]);
         
               return $check;
    }

    public static function magnetCircle($id, $image){
        $imageName1 = "/" .  $image; 

     $path = public_path();

    
 
    
     $src1 = new \Imagick(public_path("canvas_picture". $imageName1));
     $src1->resizeImage(500, null,\Imagick::FILTER_LANCZOS,1); 
     $src1->writeImage(public_path("resized_pictures". $imageName1));
     $src2 = new \Imagick(public_path("\site-images\Okrugli.png"));
    
     
     
     $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
     
     exec('magick convert 
     '.$path.'\site-images\Okrugli.png 
     -channel A -blur 0x8
     -compose hardlight
     '.$path.'\image\ms_light_map-phone1.png
     ');
     
    
     
     exec('magick convert 
     '.$path.'\resized_pictures'. $imageName1. ' 
     -channel matte -separate 
     '.$path.'\image\ms_logo_displace_mask_phone1.png
     ');
     
     
     exec('magick convert 
     '.$path.'\resized_pictures'. $imageName1. ' 
     '.$path.'\image\ms_light_map-phone1.png 
     -geometry -370-330 
     -compose Multiply -composite 
     '.$path.'\image\ms_logo_displace_mask_phone1.png 
     -compose CopyOpacity -composite 
     '.$path.'\image\ms_light_map_logo_phone1.png
     ');
     
    
     
     $src1->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
     $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
     $src = new \Imagick(public_path("\image\ms_light_map_logo_phone1.png"));
     $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 370, 330);
     $src2->writeImage(public_path("image/output1.png"));

     $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
     $name = mt_rand(1000000, 9999999)
         . mt_rand(1000000, 9999999)
         . $characters[rand(0, strlen($characters) - 1)];
     
     $string = str_shuffle($name);
     $string .=  round(microtime(true) * 1000);
     $imageRandom = '/' . $string . '.png';

    exec('magick  convert '.$path.'\image\output1.png  
     -flatten  '.$path.'\image'.$imageRandom.'
     ');
      $process5->run();
         if (!$process5->isSuccessful()) {
          throw new ProcessFailedException($process5);
         }
          echo $process5->getOutput();

          $imageRandom = ltrim($imageRandom, '/');
         
          $check = DB::table('images')->insert([
            'name' => $imageRandom, 'product_id' => $id, 'size' => 'Rounded'
           ]);
     
           return $check;
    }


    public static function masksBlack($id, $image){
        $path = public_path();

           $process = new Process('magick convert   '.$path.'\site-images\Face-Mask-Black-BG.png[203x222+640+421] 
          
          '.$path.'\image\displace_map.png
           ');
      
      $process->run();
      if (!$process->isSuccessful()) {
          throw new ProcessFailedException($process);
      }
          echo $process->getOutput();
          echo '<img src="\image\displace_map.png">'; 
      
          $imageName1 = "/" .  $image; 
      
          $process1 = new Process('magick convert   '.$path.'\design' . $imageName1 . '
          -resize 200x200
          '.$path.'\design' . $imageName1 . '
          '); 
          
       $process1->run();
        if (!$process1->isSuccessful()) {
            throw new ProcessFailedException($process1);    
      } 
      
      
          $process2 = new Process('magick convert 
          '.$path.'\design' . $imageName1 . '
          -bordercolor transparent -border 12x12 -thumbnail 203x222 
          '.$path.'\image\ms_temp.png
           ');
      
      $process2->run();
      if (!$process1->isSuccessful()) {
          throw new ProcessFailedException($process2);
      }
          echo $process2->getOutput();
          echo '<img src="\image\ms_temp.png">';
      
      
          list($width, $height) = getimagesize($path.'\image\ms_temp.png');
      
      
          $X = 640 + (203-$width)/2;
          $Y = 421 +  (222-$height)/2;
         
      
           $process3 = new Process('magick convert 
          '.$path.'\site-images\Face-Mask-Black-BG.png[203x222+640+421] 
          -colorspace gray -blur 10x250 -auto-level 
          -depth 16 
          '.$path.'\image\ms_displace_map_girl_white_regular.png
           ');
      
      $process3->run();
      if (!$process3->isSuccessful()) {
          throw new ProcessFailedException($process3);
      }
          echo $process3->getOutput();
          echo '<img src="\image\ms_displace_map_girl_white_regular.png">'; 
         
          $process4 = new Process('magick convert 
          '.$path.'\image\ms_temp.png 
          '.$path.'\image\ms_displace_map_girl_white_regular.png 
          -alpha set -virtual-pixel transparent 
          -compose displace -set option:compose:args -5x-5 -composite 
          -depth 16 
          '.$path.'\image\ms_displaced_logo.png
        
           ');
      
      $process4->run();
      if (!$process4->isSuccessful()) {
          throw new ProcessFailedException($process4);
      }
          echo $process4->getOutput();
          echo '<img src="\image\ms_displaced_logo.png">';
      
          $process7 = new Process('magick convert 
          '.$path.'\image\ms_displaced_logo.png 
          -matte                     
          -virtual-pixel transparent 
          -distort Perspective       
          "10,10,10,-20 10,210,10,210 210,210,190,190 210,10,190,30" 
          '.$path.'\image\ms_displaced_logo_perspective.png
        
           ');
      
      $process7->run();
      if (!$process7->isSuccessful()) {
          throw new ProcessFailedException($process7);
      }
      
      echo '<img src="\image\ms_displaced_logo_perspective.png">'; 
      
      
           $process5 = new Process('magick convert 
          '.$path.'\site-images\Face-Mask-Black-BG.png[203x222+640+421] 
          -colorspace gray -auto-level 
          -blur 0x4 
          -contrast-stretch 0,30%% 
          -depth 16 
          '.$path.'\image\ms_light_map_girl_white_regular.png
           ');
      
      /*         Makao sam komandu -separate proces 5 */
      
      $process5->run();
      if (!$process5->isSuccessful()) {
          throw new ProcessFailedException($process5);
      }
          echo $process5->getOutput();
          echo '<img src="\image\ms_light_map_girl_white_regular.png">'; 
          
          $process6 = new Process('magick convert 
          '.$path.'\image\ms_displaced_logo_perspective.png 
          -channel matte -separate 
          '.$path.'\image\ms_logo_displace_mask.png
           ');
      
      $process6->run();
      if (!$process6->isSuccessful()) {
          throw new ProcessFailedException($process6);
      }
          echo $process6->getOutput();
          echo '<img src="\image\ms_logo_displace_mask.png">';
          
      
          $src1 = new \Imagick(public_path("\image\ms_displaced_logo_perspective.png"));
          $src2 = new \Imagick(public_path("site-images/Face-Mask-Black-Mask.png"));
          $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,640,421);
          $src2->writeImage(public_path("image\image-mask-black.png"));
          echo '<img src="\image\image-mask-black.png">';
      

          $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $name = mt_rand(1000000, 9999999)
              . mt_rand(1000000, 9999999)
              . $characters[rand(0, strlen($characters) - 1)];
          
          $string = str_shuffle($name);
          $string .=  round(microtime(true) * 1000);
          $imageRandom1 = '/' . $string . '.png';
      
          $process8 = new Process('magick convert 
          '.$path.'\site-images\Face-Mask-Black-BG.png 
          '.$path.'\image\image-mask-black.png 
          -geometry +0+0
          -compose over    -composite 
          -depth 24 
          '.$path.'\image'.$imageRandom1.'
          ');
      
      $process8->run();
      if (!$process8->isSuccessful()) {
         throw new ProcessFailedException($process8);
      }
         echo $process8->getOutput();

         $imageRandom1 = ltrim($imageRandom1, '/');
         
         $check1 = DB::table('images')->insert([
           'name' => $imageRandom1, 'product_id' => $id, 'color' => 'black'
          ]);
    
          return $check1;
    }

    public static function masks($id, $image){

        $path = public_path();

           $process = new Process('magick convert   '.$path.'\site-images\Face-Mask-White-BG.png[203x222+620+401] 
          
          '.$path.'\image\displace_map.png
           ');
      
      $process->run();
      if (!$process->isSuccessful()) {
          throw new ProcessFailedException($process);
      }
          echo $process->getOutput();
          echo '<img src="\image\displace_map.png">'; 
      
          $imageName1 = "/" .  $image; 
      
          $process1 = new Process('magick convert   '.$path.'\design' . $imageName1 . '
          -resize 200x200
          '.$path.'\resized_pictures' . $imageName1 . '
          '); 
          
       $process1->run();
        if (!$process1->isSuccessful()) {
            throw new ProcessFailedException($process1);    
      } 
      
      
          $process2 = new Process('magick convert 
          '.$path.'\resized_pictures' . $imageName1 . '
          -bordercolor transparent -border 12x12 -thumbnail 203x222 
          '.$path.'\image\ms_temp.png
           ');
      
      $process2->run();
      if (!$process1->isSuccessful()) {
          throw new ProcessFailedException($process2);
      }
          echo $process2->getOutput();
          echo '<img src="\image\ms_temp.png">';
      
      
          list($width, $height) = getimagesize($path.'\image\ms_temp.png');
      
      
          $X = 620 + (203-$width)/2;
          $Y = 401 +  (222-$height)/2;
         
      
           $process3 = new Process('magick convert 
          '.$path.'\site-images\Face-Mask-White-BG.png[203x222+620+401] 
          -colorspace gray -blur 10x250 -auto-level 
          -depth 16 
          '.$path.'\image\ms_displace_map_girl_white_regular.png
           ');
      
      $process3->run();
      if (!$process3->isSuccessful()) {
          throw new ProcessFailedException($process3);
      }
          echo $process3->getOutput();
          echo '<img src="\image\ms_displace_map_girl_white_regular.png">'; 
         
          $process4 = new Process('magick convert 
          '.$path.'\image\ms_temp.png 
          '.$path.'\image\ms_displace_map_girl_white_regular.png 
          -alpha set -virtual-pixel transparent 
          -compose displace -set option:compose:args -5x-5 -composite 
          -depth 16 
          '.$path.'\image\ms_displaced_logo.png
        
           ');
      
      $process4->run();
      if (!$process4->isSuccessful()) {
          throw new ProcessFailedException($process4);
      }
          echo $process4->getOutput();
          echo '<img src="\image\ms_displaced_logo.png">';
      
          $process7 = new Process('magick convert 
          '.$path.'\image\ms_displaced_logo.png 
          -matte                     
          -virtual-pixel transparent 
          -distort Perspective       
          "10,10,10,-20 10,210,10,210 210,210,190,190 210,10,190,30" 
          '.$path.'\image\ms_displaced_logo_perspective.png
        
           ');
      
      $process7->run();
      if (!$process7->isSuccessful()) {
          throw new ProcessFailedException($process7);
      }
      
      echo '<img src="\image\ms_displaced_logo_perspective.png">'; 
      
      
           $process5 = new Process('magick convert 
          '.$path.'\site-images\Face-Mask-White-BG.png[203x222+620+401] 
          -colorspace gray -auto-level 
          -blur 0x4 
          -contrast-stretch 0,30%% 
          -depth 16 
          '.$path.'\image\ms_light_map_girl_white_regular.png
           ');
      
      /*         Makao sam komandu -separate proces 5 */
      
      $process5->run();
      if (!$process5->isSuccessful()) {
          throw new ProcessFailedException($process5);
      }
          echo $process5->getOutput();
          echo '<img src="\image\ms_light_map_girl_white_regular.png">'; 
          
          $process6 = new Process('magick convert 
          '.$path.'\image\ms_displaced_logo_perspective.png 
          -channel matte -separate 
          '.$path.'\image\ms_logo_displace_mask.png
           ');
      
      $process6->run();
      if (!$process6->isSuccessful()) {
          throw new ProcessFailedException($process6);
      }
          echo $process6->getOutput();
          echo '<img src="\image\ms_logo_displace_mask.png">';
          
      
          $src1 = new \Imagick(public_path("\image\ms_displaced_logo_perspective.png"));
          $src2 = new \Imagick(public_path("site-images/Face-Mask-White-Canvas.png"));
          $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,620,401);
          $src2->writeImage(public_path("image\image-mask-black.png"));
          echo '<img src="\image\image-mask-black.png">';
      
      
          $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $name = mt_rand(1000000, 9999999)
              . mt_rand(1000000, 9999999)
              . $characters[rand(0, strlen($characters) - 1)];
          
          $string = str_shuffle($name);
          $string .=  round(microtime(true) * 1000);
          $imageRandom = '/' . $string . '.png';

          $process8 = new Process('magick convert 
          '.$path.'\site-images\Face-Mask-White-BG.png 
          '.$path.'\image\image-mask-black.png 
          -geometry +0+0
          -compose over    -composite 
          -depth 24 
          '.$path.'\image'.$imageRandom.'
          ');
      
      $process8->run();
      if (!$process8->isSuccessful()) {
         throw new ProcessFailedException($process8);
      }
         echo $process8->getOutput();

         $imageRandom = ltrim($imageRandom, '/');
         
         $check = DB::table('images')->insert([
           'name' => $imageRandom, 'product_id' => $id, 'color' => 'white'
          ]);

          return $check;

        dd();
        $path = public_path();
   
       $imageName1 = "/" .  $image; 
   
       $process1 = new Process('magick convert   '.$path.'\design' . $imageName1 . '
       -resize 200x200
       '.$path.'\resized_pictures' . $imageName1 . '
       '); 
       
    $process1->run();
     if (!$process1->isSuccessful()) {
         throw new ProcessFailedException($process1);    
   } 
   
   
       $process2 = new Process('magick convert 
       '.$path.'\resized_pictures' . $imageName1 . '
       -bordercolor transparent -border 12x12 -thumbnail 303x322 
       '.$path.'\image\ms_temp.png
        ');
   
   $process2->run();
   if (!$process1->isSuccessful()) {
       throw new ProcessFailedException($process2);
   }
       echo $process2->getOutput();
       echo '<img src="\image\ms_temp.png">';
   
   
       list($width, $height) = getimagesize($path.'\image\ms_temp.png');
   
     
       $X = 130 + (303-$width)/2;
       $Y = 501 +  (322-$height)/2;
      
   
        $process3 = new Process('magick convert 
       '.$path.'\site-images\maskabijela.jpg[303x322+130+501] 
       -colorspace gray -blur 10x250 -auto-level 
       -depth 16 
       '.$path.'\image\ms_displace_map_girl_white_regular.png
        ');
   
   $process3->run();
   if (!$process3->isSuccessful()) {
       throw new ProcessFailedException($process3);
   }
       echo $process3->getOutput();
       echo '<img src="\image\ms_displace_map_girl_white_regular.png">'; 
      
       $process4 = new Process('magick convert 
       '.$path.'\image\ms_temp.png 
       '.$path.'\image\ms_displace_map_girl_white_regular.png 
       -alpha set -virtual-pixel transparent 
       -compose displace -set option:compose:args -5x-5 -composite 
       -depth 16 
       '.$path.'\image\ms_displaced_logo.png
     
        ');
   
   $process4->run();
   if (!$process4->isSuccessful()) {
       throw new ProcessFailedException($process4);
   }
       echo $process4->getOutput();
       echo '<img src="\image\ms_displaced_logo.png">';
   
       $process7 = new Process('magick convert 
       '.$path.'\image\ms_displaced_logo.png 
       -matte                     
       -virtual-pixel transparent 
       -distort Perspective       
       "0,0,0,0 200,0,220,30 0,200,30,250 200,200,220,170" 
       '.$path.'\image\ms_displaced_logo_perspective.png
     
        ');
   
   $process7->run();
   if (!$process7->isSuccessful()) {
       throw new ProcessFailedException($process7);
   }
   
       
        $process5 = new Process('magick convert 
       '.$path.'\site-images\maskabijela.jpg[303x322+130+501] 
       -colorspace gray -auto-level 
       -blur 0x4 
       -contrast-stretch 0,30%% 
       -depth 16 
       '.$path.'\image\ms_light_map_girl_white_regular.png
        ');
   
   /*         Makao sam komandu -separate proces 5 */
   
   $process5->run();
   if (!$process5->isSuccessful()) {
       throw new ProcessFailedException($process5);
   }
       echo $process5->getOutput();
       echo '<img src="\image\ms_light_map_girl_white_regular.png">'; 
       
       $process6 = new Process('magick convert 
       '.$path.'\image\ms_displaced_logo_perspective.png 
       -channel matte -separate 
       '.$path.'\image\ms_logo_displace_mask.png
        ');
   
   $process6->run();
   if (!$process6->isSuccessful()) {
       throw new ProcessFailedException($process6);
   }
       echo $process6->getOutput();
       echo '<img src="\image\ms_logo_displace_mask.png">';
       
       $process7 = new Process('magick convert 
       '.$path.'\image\ms_displaced_logo_perspective.png 
       '.$path.'\image\ms_light_map_girl_white_regular.png 
       -compose Multiply -composite 
       '.$path.'\image\ms_logo_displace_mask.png 
       -compose CopyOpacity -composite 
       '.$path.'\image\ms_light_map_logo.png
       ');
   
   $process7->run();
   if (!$process7->isSuccessful()) {
      throw new ProcessFailedException($process7);
   }
      echo $process7->getOutput();
      echo '<img src="\image\ms_light_map_logo.png">';
      
     
      $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom = '/' . $string . '.png';
   
       $process8 = new Process('magick convert 
       '.$path.'\site-images\maskabijela.jpg 
       '.$path.'\image\ms_light_map_logo.png 
       -geometry +'.$X.'+'.$Y.'
       -compose over    -composite 
       -depth 24 
       '.$path.'\image'.$imageRandom.'
       ');
   
   $process8->run();
   if (!$process8->isSuccessful()) {
      throw new ProcessFailedException($process8);
   }
      echo $process8->getOutput();

      $imageRandom = ltrim($imageRandom, '/');
         
      $check = DB::table('images')->insert([
        'name' => $imageRandom, 'product_id' => $id, 'color' => 'white'
       ]);
 

      $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $name = mt_rand(1000000, 9999999)
          . mt_rand(1000000, 9999999)
          . $characters[rand(0, strlen($characters) - 1)];
      
      $string = str_shuffle($name);
      $string .=  round(microtime(true) * 1000);
      $imageRandom1 = '/' . $string . '.png';
   
   
      $process9 = new Process('magick convert 
      '.$path.'\site-images\maskacrna.jpg 
      '.$path.'\image\ms_light_map_logo.png 
      -geometry +550+630
      -compose over -composite 
      -depth 16 
      '.$path.'\image'.$imageRandom1.'
      ');
   
   $process9->run();
   if (!$process9->isSuccessful()) {
     throw new ProcessFailedException($process9);
   }
     echo $process9->getOutput();
    
     $imageRandom1 = ltrim($imageRandom1, '/');
         
     $check1 = DB::table('images')->insert([
       'name' => $imageRandom1, 'product_id' => $id, 'color' => 'black'
      ]);

      return $check1;

    }


    public static function mugThumb($id, $image){
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
   
        $src1 = new \Imagick(public_path("canvas_picture". $imageName1));
       /*  $src1->resizeImage(380, null,\Imagick::FILTER_LANCZOS,1);  */
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Solja.png"));
      /*   $src2->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src2->writeImage(public_path("\site-images\Solja.jpg")); */
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
        $process5 = new Process('magick convert 
        '.$path.'\site-images\Solja.png 
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-canvas.png
        ');
        
        /* Makao sam komandu -separate proces 5   -colorspace gray -auto-level 
        -blur 0x3 
        -contrast-stretch 0,50%% 
        -depth 16   -negate  -channel A -blur 0x8*/
        
        $process5->run();
        if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
        }
        echo $process5->getOutput();
        echo '<img src="\image\ms_light_map-canvas.png">';
        
        $process6 = new Process('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        -channel matte -separate 
        '.$path.'\image\ms_logo_displace_mask_canvas.png
        ');
        
        
        
        $process6->run();
        if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
        }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask_canvas.png">';
        
        $process7 = new Process('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        '.$path.'\image\ms_light_map-canvas.png 
        -geometry -380-325 
        -compose Multiply -composite 
        '.$path.'\image\ms_logo_displace_mask_canvas.png 
        -compose CopyOpacity -composite 
        '.$path.'\image\ms_light_map_logo_canvas.png
        ');
        
        $process7->run();
        if (!$process7->isSuccessful()) {
        throw new ProcessFailedException($process7);
        }
        echo $process7->getOutput();
        echo '<img src="\image\ms_light_map_logo_canvas.png">';
   
        
        /* $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,390,450);
        $src2->writeImage(public_path("image\image-canvas.png")); */
   
        $src2->compositeImage($src1, \Imagick::COMPOSITE_MULTIPLY  ,380,325);
        $src2->writeImage(public_path("image\image-canvas.png"));
        echo '<img src="\image\image-canvas.png">';
        $src4 = new \Imagick(public_path("site-images/Mug-Mask.png"));
     /*    $src4->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src4->writeImage(public_path("\site-images/Textura-Canvas-mockup.png")); */
         $src3 = new \Imagick(public_path("image/image-canvas.png"));
         $src3->compositeImage($src4, \Imagick::COMPOSITE_OVER ,0,0);

         $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $name = mt_rand(1000000, 9999999)
             . mt_rand(1000000, 9999999)
             . $characters[rand(0, strlen($characters) - 1)];
         
         $string = str_shuffle($name);
         $string .=  round(microtime(true) * 1000);
         $imageRandom1 = '/' . $string . '.png';

         $src3->writeImage(public_path("image". $imageRandom1));
 
         $imageRandom1 = ltrim($imageRandom1, '/');
   
         $check1 = DB::table('images')->insert([
            'name' => $imageRandom1, 'product_id' => $id, 'color' => 'white','size' => 'thumb'
           ]);
     
           return $check1;

        dd();
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(400, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Solja.jpg"));
      /*   $src2->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src2->writeImage(public_path("\site-images\Solja.jpg")); */
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
        $process5 = new Process('magick convert 
        '.$path.'\site-images\Solja.jpg 
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-canvas.png
        ');
        
        /* Makao sam komandu -separate proces 5   -colorspace gray -auto-level 
        -blur 0x3 
        -contrast-stretch 0,50%% 
        -depth 16   -negate  -channel A -blur 0x8*/
        
        $process5->run();
        if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
        }
        echo $process5->getOutput();
        echo '<img src="\image\ms_light_map-canvas.png">';
        
        $process6 = new Process('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        -channel matte -separate 
        '.$path.'\image\ms_logo_displace_mask_canvas.png
        ');
        
        
        
        $process6->run();
        if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
        }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask_canvas.png">';
        
        $process7 = new Process('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        '.$path.'\image\ms_light_map-canvas.png 
        -geometry -690-450 
        -compose Multiply -composite 
        '.$path.'\image\ms_logo_displace_mask_canvas.png 
        -compose CopyOpacity -composite 
        '.$path.'\image\ms_light_map_logo_canvas.png
        ');
        
        $process7->run();
        if (!$process7->isSuccessful()) {
        throw new ProcessFailedException($process7);
        }
        echo $process7->getOutput();
        echo '<img src="\image\ms_light_map_logo_canvas.png">';
   
   
        $src2->compositeImage($src1, \Imagick::COMPOSITE_DEFAULT  ,690,450);
        $src2->writeImage(public_path("image\image-canvas.png"));
        echo '<img src="\image\image-canvas.png">';
        $src4 = new \Imagick(public_path("site-images/Solja.jpg"));
     /*    $src4->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src4->writeImage(public_path("\site-images/Textura-Canvas-mockup.png")); */
         $src3 = new \Imagick(public_path("image/image-canvas.png"));
         $src3->compositeImage($src4, \Imagick::COMPOSITE_MULTIPLY,0,0);

         $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $name = mt_rand(1000000, 9999999)
             . mt_rand(1000000, 9999999)
             . $characters[rand(0, strlen($characters) - 1)];
         
         $string = str_shuffle($name);
         $string .=  round(microtime(true) * 1000);
         $imageRandom1 = '/' . $string . '.png';
      
         $src3->writeImage(public_path("image". $imageRandom1));

         $imageRandom1 = ltrim($imageRandom1, '/');
   
         $check1 = DB::table('images')->insert([
            'name' => $imageRandom1, 'product_id' => $id, 'size' => 'thumb'
           ]);
     
           return $check1;
    }


    public static function mugMain($id, $image){
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
   
        $src1 = new \Imagick(public_path("canvas_picture". $imageName1));
      /*   $src1->resizeImage(420, null,\Imagick::FILTER_LANCZOS,1);  */
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Solja-Mockup-BG.png"));
      
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
        $process5 = new Process('magick convert 
        '.$path.'\site-images\Solja-Mockup-BG.png 
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-canvas.png
        ');
        
        /* Makao sam komandu -separate proces 5   -colorspace gray -auto-level 
        -blur 0x3 
        -contrast-stretch 0,50%% 
        -depth 16   -negate  -channel A -blur 0x8*/
        
        $process5->run();
        if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
        }
        echo $process5->getOutput();
        echo '<img src="\image\ms_light_map-canvas.png">';
        
        $process6 = new Process('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        -channel matte -separate 
        '.$path.'\image\ms_logo_displace_mask_canvas.png
        ');
        
        
        
        $process6->run();
        if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
        }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask_canvas.png">';
        
        $process7 = new Process('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        '.$path.'\image\ms_light_map-canvas.png 
        -geometry -370-350 
        -compose Multiply -composite 
        '.$path.'\image\ms_logo_displace_mask_canvas.png 
        -compose CopyOpacity -composite 
        '.$path.'\image\ms_light_map_logo_canvas.png
        ');
        
        $process7->run();
        if (!$process7->isSuccessful()) {
        throw new ProcessFailedException($process7);
        }
        echo $process7->getOutput();
        echo '<img src="\image\ms_light_map_logo_canvas.png">';
   
        $src6 = new \Imagick(public_path("site-images/Solja-Mockup-Mask.png"));
        $src6->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,370,350);
        $src6->writeImage(public_path("image\image-mug.png"));
   
        $src7 = new \Imagick(public_path("image/image-mug.png"));
       
    /*     $src2->compositeImage($src1, \Imagick::COMPOSITE_DEFAULT  ,580,350);
        $src2->writeImage(public_path("image\image-canvas.png"));
        echo '<img src="\image\image-canvas.png">'; */
        $src4 = new \Imagick(public_path("site-images/Solja-Mockup-BG.png"));
   
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom1 = '/' . $string . '.png';

         $src4->compositeImage($src7, \Imagick::COMPOSITE_MULTIPLY,0,0);

         $src4->writeImage(public_path("image" . $imageRandom1));

        $imageRandom1 = ltrim($imageRandom1, '/');
   
         $check1 = DB::table('images')->insert([
            'name' => $imageRandom1, 'product_id' => $id,'color' => 'white', 'size' => 'main'
           ]);
     
           return $check1;

        dd();
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(370, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Solja2.png"));
      /*   $src2->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src2->writeImage(public_path("\site-images\Solja.jpg")); */
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
        $process5 = new Process('magick convert 
        '.$path.'\site-images\Solja2.png 
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-canvas.png
        ');
        
        /* Makao sam komandu -separate proces 5   -colorspace gray -auto-level 
        -blur 0x3 
        -contrast-stretch 0,50%% 
        -depth 16   -negate  -channel A -blur 0x8*/
        
        $process5->run();
        if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
        }
        echo $process5->getOutput();
        echo '<img src="\image\ms_light_map-canvas.png">';
        
        $process6 = new Process('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        -channel matte -separate 
        '.$path.'\image\ms_logo_displace_mask_canvas.png
        ');
        
        
        
        $process6->run();
        if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
        }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask_canvas.png">';
        
        $process7 = new Process('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        '.$path.'\image\ms_light_map-canvas.png 
        -geometry -680-440 
        -compose Multiply -composite 
        '.$path.'\image\ms_logo_displace_mask_canvas.png 
        -compose CopyOpacity -composite 
        '.$path.'\image\ms_light_map_logo_canvas.png
        ');
        
        $process7->run();
        if (!$process7->isSuccessful()) {
        throw new ProcessFailedException($process7);
        }
        echo $process7->getOutput();
        echo '<img src="\image\ms_light_map_logo_canvas.png">';
   
   
        $src2->compositeImage($src1, \Imagick::COMPOSITE_DEFAULT  ,680,440);
        $src2->writeImage(public_path("image\image-canvas.png"));
        echo '<img src="\image\image-canvas.png">';
        $src4 = new \Imagick(public_path("site-images/Solja2.png"));
     /*    $src4->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src4->writeImage(public_path("\site-images/Textura-Canvas-mockup.png")); */
         $src3 = new \Imagick(public_path("image/image-canvas.png"));
         $src3->compositeImage($src4, \Imagick::COMPOSITE_MULTIPLY,0,0);

         $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $name = mt_rand(1000000, 9999999)
             . mt_rand(1000000, 9999999)
             . $characters[rand(0, strlen($characters) - 1)];
         
         $string = str_shuffle($name);
         $string .=  round(microtime(true) * 1000);
         $imageRandom1 = '/' . $string . '.png';

         $src3->writeImage(public_path("image". $imageRandom1));
   
         $imageRandom1 = ltrim($imageRandom1, '/');
   
         $check1 = DB::table('images')->insert([
            'name' => $imageRandom1, 'product_id' => $id, 'size' => 'main'
           ]);
     
           return $check1;

    }


    public static function thermos($id, $image){
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
       
    
       
   
   $src1 = new \Imagick(public_path("canvas_picture". $imageName1));
   $src1->resizeImage(450, null,\Imagick::FILTER_LANCZOS,1); 
   $src1->writeImage(public_path("resized_pictures". $imageName1));
   $src2 = new \Imagick(public_path("\site-images\TermosThumbnail.png"));
   /* $src3 = new \Imagick(public_path("\image\Iphone-II-Pro.jpg")); */
   
   
   $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
   
   $process5 = new Process('magick convert 
   '.$path.'\site-images\TermosThumbnail.png 
   -channel A -blur 0x8
   -compose hardlight
   '.$path.'\image\ms_light_map-thermos.png
   ');
   

   
   $process5->run();
   if (!$process5->isSuccessful()) {
   throw new ProcessFailedException($process5);
   }
   echo $process5->getOutput();
   echo '<img src="\image\ms_light_map-thermos.png">';
   
   $process6 = new Process('magick convert 
   '.$path.'\resized_pictures'. $imageName1. ' 
   -channel matte -separate 
   '.$path.'\image\ms_logo_displace_mask_thermos.png
   ');
   
   
   
   $process6->run();
   if (!$process6->isSuccessful()) {
   throw new ProcessFailedException($process6);
   }
   echo $process6->getOutput();
   echo '<img src="\image\ms_logo_displace_mask_thermos.png">';
   
   $process7 = new Process('magick convert 
   '.$path.'\resized_pictures'. $imageName1. ' 
   '.$path.'\image\ms_light_map-thermos.png 
   -geometry -690-390 
   -compose Multiply -composite 
   '.$path.'\image\ms_logo_displace_mask_thermos.png 
   -compose CopyOpacity -composite 
   '.$path.'\image\ms_light_map_logo_thermos.png
   ');
   
   $process7->run();
   if (!$process7->isSuccessful()) {
   throw new ProcessFailedException($process7);
   }
   echo $process7->getOutput();
   echo '<img src="\image\ms_light_map_logo_thermos.png">';
   
   $src1->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
   $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
   $src = new \Imagick(public_path("\image\ms_light_map_logo_thermos.png"));
   $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 690, 390);

   $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $name = mt_rand(1000000, 9999999)
       . mt_rand(1000000, 9999999)
       . $characters[rand(0, strlen($characters) - 1)];
   
   $string = str_shuffle($name);
   $string .=  round(microtime(true) * 1000);
   $imageRandom1 = '/' . $string . '.png';


   $src2->writeImage(public_path("image".$imageRandom1));

                $imageRandom1 = ltrim($imageRandom1, '/');
   
         $check1 = DB::table('images')->insert([
            'name' => $imageRandom1, 'product_id' => $id
           ]);
     
           return $check1;
    }

    public static function puzzle($id, $image){
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
       
    
       
        $src1 = new \Imagick(public_path("canvas_picture". $imageName1));
         $src1->resizeImage(650, null,\Imagick::FILTER_LANCZOS,1);  
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Puzle.png"));
       
        
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
        $process5 = new Process('magick convert 
        '.$path.'\site-images\Puzle.png 
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-puzle.png
        ');
        

        
        $process5->run();
        if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
        }
        echo $process5->getOutput();
        echo '<img src="\image\ms_light_map-puzle.png">';
        
        $process6 = new Process('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        -channel matte -separate 
        '.$path.'\image\ms_logo_displace_mask_puzle.png
        ');
        
        
        
        $process6->run();
        if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
        }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask_puzle.png">';
        
        $process7 = new Process('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        '.$path.'\image\ms_light_map-puzle.png 
        -geometry -400-320 
        -compose Multiply -composite 
        '.$path.'\image\ms_logo_displace_mask_puzle.png 
        -compose CopyOpacity -composite 
        '.$path.'\image\ms_light_map_logo_puzle.png
        ');
        
        $process7->run();
        if (!$process7->isSuccessful()) {
        throw new ProcessFailedException($process7);
        }
        echo $process7->getOutput();
        echo '<img src="\image\ms_light_map_logo_puzle.png">';
        
        $src1->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
        $src = new \Imagick(public_path("\image\ms_light_map_logo_puzle.png"));
        $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 400, 320);
        $src2->writeImage(public_path("image/output1.png"));

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom = '/' . $string . '.png';

        $process5 = new Process('magick  convert '.$path.'\image\output1.png  
        -flatten  '.$path.'\image'.$imageRandom.'
        ');
         $process5->run();
            if (!$process5->isSuccessful()) {
             throw new ProcessFailedException($process5);
            }
             echo $process5->getOutput();

             $imageRandom = ltrim($imageRandom, '/');

             $check = DB::table('images')->insert([
                'name' => $imageRandom, 'product_id' => $id
               ]);
         
               return $check;
    }


    public static function makeupBags($id, $image){


    
        $path = public_path();



      $process = new Process('magick convert   '.$path.'\site-images\Makeup-Bags-Zipper-Case-Black-BG01-1200.png[413x302+380+341] 
     -colorspace gray 
     -blur 10x250 
     -auto-level
     '.$path.'\image\displace_map.png
      ');

 $process->run();
 if (!$process->isSuccessful()) {
     throw new ProcessFailedException($process);
 }
     echo $process->getOutput();
     echo '<img src="\image\displace_map.png">'; 

     $imageName1 = "/" .  $image; 
 
     $process1 = new Process('magick convert   '.$path.'\canvas_picture' . $imageName1 . '
     
     '.$path.'\resized_pictures' . $imageName1 . '
     '); 
     
  $process1->run();
   if (!$process1->isSuccessful()) {
       throw new ProcessFailedException($process1);    
 }  

 
     $process2 = new Process('magick convert 
     '.$path.'\resized_pictures' . $imageName1 . '
     -bordercolor transparent -border 12x12 -thumbnail 413x302 
     '.$path.'\image\ms_temp.png
      ');

 $process2->run();
 if (!$process2->isSuccessful()) {
     throw new ProcessFailedException($process2);
 }
     echo $process2->getOutput();
     echo '<img src="\image\ms_temp.png">';


     list($width, $height) = getimagesize($path.'\image\ms_temp.png');

   
     $X = 380 + (413-$width)/2;
     $Y = 341 +  (302-$height)/2;
    

      $process3 = new Process('magick convert 
     '.$path.'\site-images\Makeup-Bags-Zipper-Case-Black-BG01-1200.png[413x302+380+341] 
     -colorspace gray -blur 10x250 -auto-level 
     -depth 16 
     '.$path.'\image\ms_displace_map_girl_white_regular.png
      ');

 $process3->run();
 if (!$process3->isSuccessful()) {
     throw new ProcessFailedException($process3);
 }
     echo $process3->getOutput();
     echo '<img src="\image\ms_displace_map_girl_white_regular.png">'; 
    
     $process4 = new Process('magick convert 
     '.$path.'\image\ms_temp.png 
     '.$path.'\image\ms_displace_map_girl_white_regular.png 
     -alpha set -virtual-pixel transparent 
     -compose displace -set option:compose:args -5x-5 -composite 
     -depth 16 
     '.$path.'\image\ms_displaced_logo.png
   
      ');

 $process4->run();
 if (!$process4->isSuccessful()) {
     throw new ProcessFailedException($process4);
 }
     echo $process4->getOutput();
     echo '<img src="\image\ms_displaced_logo.png">';

     $process7 = new Process('magick convert 
     '.$path.'\image\ms_displaced_logo.png 
     -matte                     
     -virtual-pixel transparent 
     -distort Perspective       
     "0,0,0,0 400,0,390,30 0,400,30,400 400,400,400,380" 
     '.$path.'\image\ms_displaced_logo_perspective.png
   
      ');

 $process7->run();
 if (!$process7->isSuccessful()) {
     throw new ProcessFailedException($process7);
 }
     echo $process7->getOutput();
     echo '<img src="\image\ms_displaced_logo_perspective.png">';

     
      $process5 = new Process('magick convert 
     '.$path.'\site-images\Makeup-Bags-Zipper-Case-Black-BG01-1200.png[413x302+380+341]  
     -colorspace gray -auto-level 
     -blur 0x4 
     -contrast-stretch 0,30%% 
     -depth 16 
     '.$path.'\image\ms_light_map_girl_white_regular.png
      ');

/*         Makao sam komandu -separate proces 5 */

 $process5->run();
 if (!$process5->isSuccessful()) {
     throw new ProcessFailedException($process5);
 }
     echo $process5->getOutput();
     echo '<img src="\image\ms_light_map_girl_white_regular.png">'; 
     
     $process6 = new Process('magick convert 
     '.$path.'\image\ms_displaced_logo_perspective.png 
     -channel matte -separate 
     '.$path.'\image\ms_logo_displace_mask.png
      ');

 $process6->run();
 if (!$process6->isSuccessful()) {
     throw new ProcessFailedException($process6);
 }
     echo $process6->getOutput();
     echo '<img src="\image\ms_logo_displace_mask.png">';

     $src1 = new \Imagick(public_path("\image\ms_displaced_logo_perspective.png"));
     $src2 = new \Imagick(public_path("site-images/Makeup-Bags-Zipper-Case-Red-Mask01-1200.png"));
     $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,380,341);
     $src2->writeImage(public_path("image\image-zip-red.png"));



     $src3 = new \Imagick(public_path("\image\ms_displaced_logo_perspective.png"));
     $src4 = new \Imagick(public_path("site-images/Makeup-Bags-Zipper-Case-Pink-Mask01-1200.png"));
     $src4->compositeImage($src3, \Imagick::COMPOSITE_DSTOVER ,380,341);
     $src4->writeImage(public_path("image\image-zip-pink.png"));

     $src5 = new \Imagick(public_path("\image\ms_displaced_logo_perspective.png"));
     $src6 = new \Imagick(public_path("site-images/Makeup-Bags-Zipper-Case-Black-Mask01-1200.png"));
     $src6->compositeImage($src5, \Imagick::COMPOSITE_DSTOVER ,380,341);
     $src6->writeImage(public_path("image\image-zip-black.png"));


     $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
     $name = mt_rand(1000000, 9999999)
         . mt_rand(1000000, 9999999)
         . $characters[rand(0, strlen($characters) - 1)];
     
     $string = str_shuffle($name);
     $string .=  round(microtime(true) * 1000);
     $imageRandom = '/' . $string . '.png';

     $process8 = new Process('magick convert 
     '.$path.'\site-images\Makeup-Bags-Zipper-Case-Black-BG01-1200.png 
     '.$path.'\image\image-zip-black.png 
     -compose over    -composite 
     -depth 24 
     '.$path.'\image'.$imageRandom.'
     ');

$process8->run();
if (!$process8->isSuccessful()) {
    throw new ProcessFailedException($process8);
}
    echo $process8->getOutput();

    
    $imageRandom = ltrim($imageRandom, '/');

    $check = DB::table('images')->insert([
        'name' => $imageRandom, 'product_id' => $id , 'color' => 'black'
       ]); 
 
       $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
       $name = mt_rand(1000000, 9999999)
           . mt_rand(1000000, 9999999)
           . $characters[rand(0, strlen($characters) - 1)];
       
       $string = str_shuffle($name);
       $string .=  round(microtime(true) * 1000);
       $imageRandom1 = '/' . $string . '.png';

    $process9 = new Process('magick convert 
    '.$path.'\site-images\Makeup-Bags-Zipper-Case-Red-BG01-1200.png  
    '.$path.'\image\image-zip-red.png 
    -compose over    -composite 
    -depth 24 
    '.$path.'\image'.$imageRandom1.'
    ');

$process9->run();
if (!$process9->isSuccessful()) {
   throw new ProcessFailedException($process9);
}
   echo $process9->getOutput();
   
   $imageRandom1 = ltrim($imageRandom1, '/');

   $check1 = DB::table('images')->insert([
       'name' => $imageRandom1, 'product_id' => $id , 'color' => 'red'
      ]); 

      $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $name = mt_rand(1000000, 9999999)
          . mt_rand(1000000, 9999999)
          . $characters[rand(0, strlen($characters) - 1)];
      
      $string = str_shuffle($name);
      $string .=  round(microtime(true) * 1000);
      $imageRandom2 = '/' . $string . '.png';

   $process10 = new Process('magick convert 
   '.$path.'\site-images\Makeup-Bags-Zipper-Case-Pink-BG01-1200.png 
   '.$path.'\image\image-zip-pink.png 
   -compose over    -composite 
   -depth 24 
   '.$path.'\image'.$imageRandom2.'
   ');

$process10->run();
if (!$process10->isSuccessful()) {
  throw new ProcessFailedException($process10);
}
  echo $process10->getOutput();

  $imageRandom2 = ltrim($imageRandom2, '/');

  $check2 = DB::table('images')->insert([
      'name' => $imageRandom2, 'product_id' => $id , 'color' => 'pink'
     ]);

     return $check2;
        dd();
        $path = public_path();


    
          $process = new Process('magick convert   '.$path.'\site-images\Neseser.jpg[303x322+630+481] 
         -colorspace gray 
         -blur 10x250 
         -auto-level
         '.$path.'\image\displace_map.png
          ');
    
     $process->run();
     if (!$process->isSuccessful()) {
         throw new ProcessFailedException($process);
     }
         echo $process->getOutput();
         echo '<img src="\image\displace_map.png">'; 
    
         $imageName1 = "/" .  $image; 
    
         $process1 = new Process('magick convert   '.$path.'\design' . $imageName1 . '
         -resize 200x200
         '.$path.'\resized_pictures' . $imageName1 . '
         '); 
         
      $process1->run();
       if (!$process1->isSuccessful()) {
           throw new ProcessFailedException($process1);    
     } 
    
    
         $process2 = new Process('magick convert 
         '.$path.'\resized_pictures' . $imageName1 . '
         -bordercolor transparent -border 12x12 -thumbnail 303x322 
         '.$path.'\image\ms_temp.png
          ');
    
     $process2->run();
     if (!$process1->isSuccessful()) {
         throw new ProcessFailedException($process2);
     }
         echo $process2->getOutput();
         echo '<img src="\image\ms_temp.png">';
    
    
         list($width, $height) = getimagesize($path.'\image\ms_temp.png');
    
        
         $X = 630 + (303-$width)/2;
         $Y = 481 +  (322-$height)/2;
        
    
          $process3 = new Process('magick convert 
         '.$path.'\site-images\Neseser.jpg[303x322+630+481] 
         -colorspace gray -blur 10x250 -auto-level 
         -depth 16 
         '.$path.'\image\ms_displace_map_girl_white_regular.png
          ');
    
     $process3->run();
     if (!$process3->isSuccessful()) {
         throw new ProcessFailedException($process3);
     }
         echo $process3->getOutput();
         echo '<img src="\image\ms_displace_map_girl_white_regular.png">'; 
        
         $process4 = new Process('magick convert 
         '.$path.'\image\ms_temp.png 
         '.$path.'\image\ms_displace_map_girl_white_regular.png 
         -alpha set -virtual-pixel transparent 
         -compose displace -set option:compose:args -5x-5 -composite 
         -depth 16 
         '.$path.'\image\ms_displaced_logo.png
       
          ');
    
     $process4->run();
     if (!$process4->isSuccessful()) {
         throw new ProcessFailedException($process4);
     }
         echo $process4->getOutput();
         echo '<img src="\image\ms_displaced_logo.png">';
    
         $process7 = new Process('magick convert 
         '.$path.'\image\ms_displaced_logo.png 
         -matte                     
         -virtual-pixel transparent 
         -distort Perspective       
         "0,0,0,0 200,0,220,30 0,200,30,200 200,200,220,180" 
         '.$path.'\image\ms_displaced_logo_perspective.png
       
          ');
    
     $process7->run();
     if (!$process7->isSuccessful()) {
         throw new ProcessFailedException($process7);
     }
         echo $process7->getOutput();
         echo '<img src="\image\ms_displaced_logo_perspective.png">';
    
         
          $process5 = new Process('magick convert 
         '.$path.'\site-images\Neseser.jpg[303x322+630+481] 
         -colorspace gray -auto-level 
         -blur 0x4 
         -contrast-stretch 0,30%% 
         -depth 16 
         '.$path.'\image\ms_light_map_girl_white_regular.png
          ');
    
    /*         Makao sam komandu -separate proces 5 */
    
     $process5->run();
     if (!$process5->isSuccessful()) {
         throw new ProcessFailedException($process5);
     }
         echo $process5->getOutput();
         echo '<img src="\image\ms_light_map_girl_white_regular.png">'; 
         
         $process6 = new Process('magick convert 
         '.$path.'\image\ms_displaced_logo_perspective.png 
         -channel matte -separate 
         '.$path.'\image\ms_logo_displace_mask.png
          ');
    
     $process6->run();
     if (!$process6->isSuccessful()) {
         throw new ProcessFailedException($process6);
     }
         echo $process6->getOutput();
         echo '<img src="\image\ms_logo_displace_mask.png">';
         
         $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $name = mt_rand(1000000, 9999999)
             . mt_rand(1000000, 9999999)
             . $characters[rand(0, strlen($characters) - 1)];
         
         $string = str_shuffle($name);
         $string .=  round(microtime(true) * 1000);
         $imageRandom = '/' . $string . '.png';
    
         $process8 = new Process('magick convert 
         '.$path.'\site-images\Neseser.jpg 
         '.$path.'\image\ms_displaced_logo_perspective.png 
         -geometry +'.$X.'+'.$Y.'
         -compose over    -composite 
         -depth 24 
         '.$path.'\image'.$imageRandom.'
         ');
    
    $process8->run();
    if (!$process8->isSuccessful()) {
        throw new ProcessFailedException($process8);
    }
        echo $process8->getOutput();

        $imageRandom = ltrim($imageRandom, '/');

        $check = DB::table('images')->insert([
            'name' => $imageRandom, 'product_id' => $id
           ]);
     
           return $check;
    }

    public static function ceger($id, $image){
        $path = public_path();

        $process = new Process('magick convert   '.$path.'\site-images\1Tote-Bag-Black-handle-BG-Redlined.jpg[403x422+340+451] 
        -colorspace gray 
        -blur 10x250 
        -auto-level
        '.$path.'\image\displace_map.png
         ');
   
    $process->run();
    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }
        echo $process->getOutput();
        echo '<img src="\image\displace_map.png">'; 
   
        $imageName1 = "/" .  $image; 
   
        $process1 = new Process('magick convert   '.$path.'\canvas_picture' . $imageName1 . '
        -resize 400x400
        '.$path.'\canvas_picture' . $imageName1 . '
        '); 
        
     $process1->run();
      if (!$process1->isSuccessful()) {
          throw new ProcessFailedException($process1);    
    } 
   
   
        $process2 = new Process('magick convert 
        '.$path.'\canvas_picture' . $imageName1 . '
        -bordercolor transparent -border 12x12 -thumbnail 403x422 
        '.$path.'\image\ms_temp.png
         ');
   
    $process2->run();
    if (!$process1->isSuccessful()) {
        throw new ProcessFailedException($process2);
    }
        echo $process2->getOutput();
        echo '<img src="\image\ms_temp.png">';
   
   
        list($width, $height) = getimagesize($path.'\image\ms_temp.png');
   
      
        $X = 340 + (403-$width)/2;
        $Y = 451 +  (422-$height)/2;
       
   
         $process3 = new Process('magick convert 
        '.$path.'\site-images\1Tote-Bag-Black-handle-BG-Redlined.jpg[403x422+340+451] 
        -colorspace gray -blur 10x250 -auto-level 
        -depth 16 
        '.$path.'\image\ms_displace_map_girl_white_regular.png
         ');
   
    $process3->run();
    if (!$process3->isSuccessful()) {
        throw new ProcessFailedException($process3);
    }
        echo $process3->getOutput();
        echo '<img src="\image\ms_displace_map_girl_white_regular.png">'; 
       
        $process4 = new Process('magick convert 
        '.$path.'\image\ms_temp.png 
        '.$path.'\image\ms_displace_map_girl_white_regular.png 
        -alpha set -virtual-pixel transparent 
        -compose displace -set option:compose:args -5x-5 -composite 
        -depth 16 
        '.$path.'\image\ms_displaced_logo.png
      
         ');
   
    $process4->run();
    if (!$process4->isSuccessful()) {
        throw new ProcessFailedException($process4);
    }
        echo $process4->getOutput();
        echo '<img src="\image\ms_displaced_logo.png">';
   
        
         $process5 = new Process('magick convert 
        '.$path.'\site-images\1Tote-Bag-Black-handle-BG-Redlined.jpg[403x422+340+451] 
        -colorspace gray -auto-level 
        -blur 0x4 
        -contrast-stretch 0,30%% 
        -depth 16 
        '.$path.'\image\ms_light_map_girl_white_regular.png
         ');
   
   /*         Makao sam komandu -separate proces 5 */
   
    $process5->run();
    if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
    }
        echo $process5->getOutput();
        echo '<img src="\image\ms_light_map_girl_white_regular.png">'; 
        
        $process6 = new Process('magick convert 
        '.$path.'\image\ms_displaced_logo.png 
        -channel matte -separate 
        '.$path.'\image\ms_logo_displace_mask.png
         ');
   
    $process6->run();
    if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
    }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask.png">';
        
        $process7 = new Process('magick convert 
        '.$path.'\image\ms_displaced_logo.png 
        '.$path.'\image\ms_light_map_girl_white_regular.png 
        -compose Multiply -composite 
        '.$path.'\image\ms_logo_displace_mask.png 
        -compose CopyOpacity -composite 
        '.$path.'\image\ms_light_map_logo.png
        ');
   
   $process7->run();
   if (!$process7->isSuccessful()) {
       throw new ProcessFailedException($process7);
   }
       echo $process7->getOutput();
       echo '<img src="\image\ms_light_map_logo.png">';
   
       $src1 = new \Imagick(public_path("\image\ms_light_map_logo.png"));
       $src2 = new \Imagick(public_path("site-images/2Tote-Bag-Red-handle-Mask.png"));
       $src6 = new \Imagick(public_path("site-images/1Tote-Bag-Black-handle-Mask.png"));
       $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,$X,$Y);
       $src2->writeImage(public_path("image\image-ceger.png"));
   
       $src6->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,$X,$Y);
       $src6->writeImage(public_path("image\image-cager-red.png"));
       echo '<img src="\image\image-ceger.png">';
   /*    
       $process10 = new Process('magick convert 
       '.$path.'\image\ms_light_map_logo.png 
       '.$path.'\site-images\2Tote-Bag-Red-handle-Mask.png 
       -geometry +'.$X.'+'.$Y.'
       -compose DstOver -composite 
       '.$path.'\image\ms_light_map_logo_croped.png
       ');
   
   $process10->run();
   if (!$process10->isSuccessful()) {
      throw new ProcessFailedException($process10);
   }
      echo $process10->getOutput();
      echo '<img src="\imageimage-ceger.png">';
       */
      
       $src4 = new \Imagick(public_path("site-images/1Tote-Bag-Black-handle-BG-Redlined.jpg"));
       $src5 = new \Imagick(public_path("site-images/1Tote-Bag-Black-handle-BG-Redlined.jpg"));
     /*   $src4->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
       $src4->writeImage(public_path("\site-images/Textura-Canvas-mockup.png")); */
        $src3 = new \Imagick(public_path("image/image-ceger.png"));
        $src4->compositeImage($src3, \Imagick::COMPOSITE_OVER,0,0);

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom1 = '/' . $string . '.png';
    
        $src4->writeImage(public_path("image".  $imageRandom1));

        $imageRandom1 = ltrim($imageRandom1, '/');

        $check = DB::table('images')->insert([
         'name' => $imageRandom1, 'product_id' => $id, 'color' => 'red'
        ]);

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom = '/' . $string . '.png';

        $src5->compositeImage($src6, \Imagick::COMPOSITE_OVER,0,0);
        $src5->writeImage(public_path("image" . $imageRandom));
     
        $imageRandom = ltrim($imageRandom, '/');

        $check1 = DB::table('images')->insert([
         'name' => $imageRandom, 'product_id' => $id, 'color' => 'black'
        ]);
     
        return $check1;

        dd();


 
    $process9 = new Process('magick convert 
    '.$path.'\site-images\proba.jpg 
    '.$path.'\image\ms_light_map_logo.png 
    -geometry +'.$X.'+'.$Y.'
    -compose over -composite 
    -depth 16 
    '.$path.'\image'.$imageRandom1.'
    ');

$process9->run();
if (!$process9->isSuccessful()) {
   throw new ProcessFailedException($process9);
}
   echo $process9->getOutput();
 
   $imageRandom1 = ltrim($imageRandom1, '/');

   $check1 = DB::table('images')->insert([
    'name' => $imageRandom1, 'product_id' => $id, 'color' => 'black'
   ]);

   return $check1;
    }




    public static function kidsTShirts($id, $image){
        $path = public_path();

 

        $process = new Process('magick convert   '.$path.'\site-images\Kids-T-Shirt-White-BG.jpg[703x702+270+151] 
       -colorspace gray 
       -blur 10x250 
       -auto-level
       '.$path.'\image\displace_map.png
        ');
  
   $process->run();
   if (!$process->isSuccessful()) {
       throw new ProcessFailedException($process);
   }
       echo $process->getOutput();
       echo '<img src="\image\displace_map.png">'; 
  
       $imageName1 = "/" .  $image; 
  
       $process1 = new Process('magick convert  '.$path.'\canvas_picture' . $imageName1 . '
       -resize 700x700
       '.$path.'\resized_pictures' . $imageName1 . '
       '); 
       
    $process1->run();
     if (!$process1->isSuccessful()) {
         throw new ProcessFailedException($process1);    
   } 
  
  
       $process2 = new Process('magick convert 
       '.$path.'\resized_pictures' . $imageName1 . '
       -bordercolor transparent -border 12x12 -thumbnail 703x702 
       '.$path.'\image\ms_temp.png
        ');
  
   $process2->run();
   if (!$process1->isSuccessful()) {
       throw new ProcessFailedException($process2);
   }
       echo $process2->getOutput();
       echo '<img src="\image\ms_temp.png">';
  
  
       list($width, $height) = getimagesize($path.'\image\ms_temp.png');
  
     
       $X = 270 + (703-$width)/2;
       $Y = 151 +  (702-$height)/2;
      
  
        $process3 = new Process('magick convert 
       '.$path.'\site-images\Kids-T-Shirt-White-BG.jpg[703x702+270+151] 
       -colorspace gray -blur 10x250 -auto-level 
       -depth 16 
       '.$path.'\image\ms_displace_map_girl_white_regular.png
        ');
  
   $process3->run();
   if (!$process3->isSuccessful()) {
       throw new ProcessFailedException($process3);
   }
       echo $process3->getOutput();
       echo '<img src="\image\ms_displace_map_girl_white_regular.png">'; 
      
       $process4 = new Process('magick convert 
       '.$path.'\image\ms_temp.png 
       '.$path.'\image\ms_displace_map_girl_white_regular.png 
       -alpha set -virtual-pixel transparent 
       -compose displace -set option:compose:args -5x-5 -composite 
       -depth 16 
       '.$path.'\image\ms_displaced_logo.png
     
        ');
  
   $process4->run();
   if (!$process4->isSuccessful()) {
       throw new ProcessFailedException($process4);
   }
       echo $process4->getOutput();
       echo '<img src="\image\ms_displaced_logo.png">';
  
       
        $process5 = new Process('magick convert 
       '.$path.'\site-images\Kids-T-Shirt-White-BG.jpg[703x702+270+151] 
       -colorspace gray -auto-level 
       -blur 0x4 
       -contrast-stretch 0,30%% 
       -depth 16 
       '.$path.'\image\ms_light_map_girl_white_regular.png
        ');
  
  /*         Makao sam komandu -separate proces 5 */
  
   $process5->run();
   if (!$process5->isSuccessful()) {
       throw new ProcessFailedException($process5);
   }
       echo $process5->getOutput();
       echo '<img src="\image\ms_light_map_girl_white_regular.png">'; 
       
       $process6 = new Process('magick convert 
       '.$path.'\image\ms_displaced_logo.png 
       -channel matte -separate 
       '.$path.'\image\ms_logo_displace_mask.png
        ');
  
   $process6->run();
   if (!$process6->isSuccessful()) {
       throw new ProcessFailedException($process6);
   }
       echo $process6->getOutput();
       echo '<img src="\image\ms_logo_displace_mask.png">';
       
       $process7 = new Process('magick convert 
       '.$path.'\image\ms_displaced_logo.png 
       '.$path.'\image\ms_light_map_girl_white_regular.png 
       -compose Multiply -composite 
       '.$path.'\image\ms_logo_displace_mask.png 
       -compose CopyOpacity -composite 
       '.$path.'\image\ms_light_map_logo.png
       ');
  
  $process7->run();
  if (!$process7->isSuccessful()) {
      throw new ProcessFailedException($process7);
  }
      echo $process7->getOutput();
      echo '<img src="\image\ms_light_map_logo.png">';

      $src1 = new \Imagick(public_path("\image\ms_light_map_logo.png"));
      $src2 = new \Imagick(public_path("site-images/Kids-T-Shirt-White-Mask.png"));
    /*   $src6 = new \Imagick(public_path("site-images/1Tote-Bag-Black-handle-Mask-Red-lined.png")); */
      $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,270,151);
      $src2->writeImage(public_path("image\image-kids-tshirt.png"));
  
     /*  $src6->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,450,451);
      $src6->writeImage(public_path("image\image-cager-red.png")); */
      echo '<img src="\image\image-kids-tshirt.png">';
    
      $src4 = new \Imagick(public_path("site-images/Kids-T-Shirt-White-BG.jpg"));
      /*    $src5 = new \Imagick(public_path("site-images/Backpack-red-BG.jpg"));
     $src4->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
       $src4->writeImage(public_path("\site-images/Textura-Canvas-mockup.png")); */
        $src3 = new \Imagick(public_path("image/image-kids-tshirt.png"));
        $src4->compositeImage($src3, \Imagick::COMPOSITE_OVER,0,0);
  
        

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom1 = '/' . $string . '.png';
  
        $src4->writeImage(public_path("image" .$imageRandom1));

        $imageRandom1 = ltrim($imageRandom1, '/');

        $check1 = DB::table('images')->insert([
         'name' => $imageRandom1, 'product_id' => $id, 'size' => 'kids T-shirt'
        ]);
     
        return $check1;

        dd();
        $path = public_path();

 

        $process = new Process('magick convert   '.$path.'\site-images\Kids-T-Shirt-White-BG.jpg[403x522+400+181] 
       -colorspace gray 
       -blur 10x250 
       -auto-level
       '.$path.'\image\displace_map.png
        ');
  
   $process->run();
   if (!$process->isSuccessful()) {
       throw new ProcessFailedException($process);
   }
       echo $process->getOutput();
       echo '<img src="\image\displace_map.png">'; 
  
       $imageName1 = "/" .  $image; 
  
       $process1 = new Process('magick convert   '.$path.'\design' . $imageName1 . '
       -resize 400x400
       '.$path.'\resized_pictures' . $imageName1 . '
       '); 
       
    $process1->run();
     if (!$process1->isSuccessful()) {
         throw new ProcessFailedException($process1);    
   } 
  
  
       $process2 = new Process('magick convert 
       '.$path.'\resized_pictures' . $imageName1 . '
       -bordercolor transparent -border 12x12 -thumbnail 403x422 
       '.$path.'\image\ms_temp.png
        ');
  
   $process2->run();
   if (!$process1->isSuccessful()) {
       throw new ProcessFailedException($process2);
   }
       echo $process2->getOutput();
       echo '<img src="\image\ms_temp.png">';
  
  
       list($width, $height) = getimagesize($path.'\image\ms_temp.png');
  
     
       $X = 400 + (403-$width)/2;
       $Y = 181 +  (522-$height)/2;
      
  
        $process3 = new Process('magick convert 
       '.$path.'\site-images\Kids-T-Shirt-White-BG.jpg[403x522+400+181] 
       -colorspace gray -blur 10x250 -auto-level 
       -depth 16 
       '.$path.'\image\ms_displace_map_girl_white_regular.png
        ');
  
   $process3->run();
   if (!$process3->isSuccessful()) {
       throw new ProcessFailedException($process3);
   }
       echo $process3->getOutput();
       echo '<img src="\image\ms_displace_map_girl_white_regular.png">'; 
      
       $process4 = new Process('magick convert 
       '.$path.'\image\ms_temp.png 
       '.$path.'\image\ms_displace_map_girl_white_regular.png 
       -alpha set -virtual-pixel transparent 
       -compose displace -set option:compose:args -5x-5 -composite 
       -depth 16 
       '.$path.'\image\ms_displaced_logo.png
     
        ');
  
   $process4->run();
   if (!$process4->isSuccessful()) {
       throw new ProcessFailedException($process4);
   }
       echo $process4->getOutput();
       echo '<img src="\image\ms_displaced_logo.png">';
  
       
        $process5 = new Process('magick convert 
       '.$path.'\site-images\Kids-T-Shirt-White-BG.jpg[403x522+400+181] 
       -colorspace gray -auto-level 
       -blur 0x4 
       -contrast-stretch 0,30%% 
       -depth 16 
       '.$path.'\image\ms_light_map_girl_white_regular.png
        ');
  
  /*         Makao sam komandu -separate proces 5 */
  
   $process5->run();
   if (!$process5->isSuccessful()) {
       throw new ProcessFailedException($process5);
   }
       echo $process5->getOutput();
       echo '<img src="\image\ms_light_map_girl_white_regular.png">'; 
       
       $process6 = new Process('magick convert 
       '.$path.'\image\ms_displaced_logo.png 
       -channel matte -separate 
       '.$path.'\image\ms_logo_displace_mask.png
        ');
  
   $process6->run();
   if (!$process6->isSuccessful()) {
       throw new ProcessFailedException($process6);
   }
       echo $process6->getOutput();
       echo '<img src="\image\ms_logo_displace_mask.png">';
       
       $process7 = new Process('magick convert 
       '.$path.'\image\ms_displaced_logo.png 
       '.$path.'\image\ms_light_map_girl_white_regular.png 
       -compose Multiply -composite 
       '.$path.'\image\ms_logo_displace_mask.png 
       -compose CopyOpacity -composite 
       '.$path.'\image\ms_light_map_logo.png
       ');
  
  $process7->run();
  if (!$process7->isSuccessful()) {
      throw new ProcessFailedException($process7);
  }
      echo $process7->getOutput();
      echo '<img src="\image\ms_light_map_logo.png">';
  
      $src1 = new \Imagick(public_path("\image\ms_light_map_logo.png"));
      $src2 = new \Imagick(public_path("site-images/Kids-T-Shirt-White-Mask.png"));
    /*   $src6 = new \Imagick(public_path("site-images/1Tote-Bag-Black-handle-Mask-Red-lined.png")); */
      $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,$X,$Y);
      $src2->writeImage(public_path("image\image-kids-tshirt.png"));
  
     /*  $src6->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,450,451);
      $src6->writeImage(public_path("image\image-cager-red.png")); */
      echo '<img src="\image\image-kids-tshirt.png">';
    
      $src4 = new \Imagick(public_path("site-images/Kids-T-Shirt-White-BG.jpg"));
      /*    $src5 = new \Imagick(public_path("site-images/Backpack-red-BG.jpg"));
     $src4->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
       $src4->writeImage(public_path("\site-images/Textura-Canvas-mockup.png")); */
        $src3 = new \Imagick(public_path("image/image-kids-tshirt.png"));
        $src4->compositeImage($src3, \Imagick::COMPOSITE_OVER,0,0);

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom1 = '/' . $string . '.png';

        $src4->writeImage(public_path("image" . $imageRandom1));
     
        $imageRandom1 = ltrim($imageRandom1, '/');

        $check1 = DB::table('images')->insert([
         'name' => $imageRandom1, 'product_id' => $id
        ]);
     
        return $check1;
    }

    public static function coastersSquare($id, $image){

        $imageName1 = "/" .  $image; 

        $path = public_path();
   
   
        $src1 = new \Imagick(public_path("canvas_picture". $imageName1));
        $src1->resizeImage(430, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Podmetac-Kvadrat-Maska.png"));
       /*  $src2->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src2->writeImage(public_path("\site-images\Canvas-mockup-thumbnail.png")); */
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
        $process5 = new Process('magick convert 
        '.$path.'\site-images\Podmetac-Kvadrat-Maska.png 
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-coaster-square.png
        ');
        
        /* Makao sam komandu -separate proces 5   -colorspace gray -auto-level 
        -blur 0x3 
        -contrast-stretch 0,50%% 
        -depth 16   -negate  -channel A -blur 0x8*/
        
        $process5->run();
        if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
        }
        echo $process5->getOutput();
        echo '<img src="\image\ms_light_map-coaster-square.png">';
        
        $process6 = new Process('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        -channel matte -separate 
        '.$path.'\image\ms_logo_displace_mask_coaster-square.png
        ');
        
        
        
        $process6->run();
        if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
        }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask_coaster-square.png">';
        
        $process7 = new Process('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        '.$path.'\image\ms_light_map-coaster-square.png 
        -geometry -450-300 
        -compose Multiply -composite 
        '.$path.'\image\ms_logo_displace_mask_coaster-square.png 
        -compose CopyOpacity -composite 
        '.$path.'\image\ms_light_map_logo_coaster-square.png
        ');
        
        $process7->run();
        if (!$process7->isSuccessful()) {
        throw new ProcessFailedException($process7);
        }
        echo $process7->getOutput();
        echo '<img src="\image\ms_light_map_logo_coaster-square.png">';
   
   
        $process7 = new Process('magick convert 
        '.$path.'\image\ms_light_map_logo_coaster-square.png 
        -matte                     
        -virtual-pixel transparent 
        -distort Perspective       
        "0,0,-20,20 0,300,20,320 300,300,320,280 300,0,280,-20" 
        '.$path.'\image\ms_displaced_logo_perspective.png
      
         ');
   
    $process7->run();
    if (!$process7->isSuccessful()) {
        throw new ProcessFailedException($process7);
    }
        echo $process7->getOutput();
        echo '<img src="\image\ms_displaced_logo_perspective.png">';
   
        $src1 = new \Imagick(public_path("\image\ms_displaced_logo_perspective.png"));
   
        $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,450,300);
        $src2->writeImage(public_path("image\image-coaster-square.png"));
        echo '<img src="\image\image-coaster-square.png">';
        $src4 = new \Imagick(public_path("site-images/Podmetac-Kvadrat-BG.png"));
       /*  $src4->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src4->writeImage(public_path("\site-images/Textura-Canvas-mockup.png")); */
         $src3 = new \Imagick(public_path("image/image-coaster-square.png"));
         $src3->compositeImage($src4, \Imagick::COMPOSITE_DSTOVER ,0,0);

         $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $name = mt_rand(1000000, 9999999)
             . mt_rand(1000000, 9999999)
             . $characters[rand(0, strlen($characters) - 1)];
         
         $string = str_shuffle($name);
         $string .=  round(microtime(true) * 1000);
         $imageRandom1 = '/' . $string . '.png';

         $src3->writeImage(public_path("image" . $imageRandom1));

         $imageRandom1 = ltrim($imageRandom1, '/');

         $check1 = DB::table('images')->insert([
          'name' => $imageRandom1, 'product_id' => $id, 'size' => 'square'
         ]);
      
         return $check1;
        dd();

        $imageName1 = "/" .  $image; 

        $path = public_path();
   
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(400, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\podmetackvadratasti.jpg"));
        $src2->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src2->writeImage(public_path("\site-images\podmetackvadratasti.jpg"));
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
        $process5 = new Process('magick convert 
        '.$path.'\site-images\podmetackvadratasti.jpg 
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-podmetac.jpg
        ');
        
        /* Makao sam komandu -separate proces 5   -colorspace gray -auto-level 
        -blur 0x3 
        -contrast-stretch 0,50%% 
        -depth 16   -negate  -channel A -blur 0x8*/
        
        $process5->run();
        if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
        }
        echo $process5->getOutput();
        echo '<img src="\image\ms_light_map-podmetac.jpg">';
        
        $process6 = new Process('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        -channel matte -separate 
        '.$path.'\image\ms_logo_displace_mask_podmetac.png
        ');
        
        
        
        $process6->run();
        if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
        }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask_podmetac.png">';
        
        $process7 = new Process('magick convert 
        '.$path.'\resized_pictures'. $imageName1. ' 
        '.$path.'\image\ms_light_map-podmetac.jpg 
        -geometry -675-3420 
        -compose Multiply -composite 
        '.$path.'\image\ms_logo_displace_mask_podmetac.png 
        -compose CopyOpacity -composite 
        '.$path.'\image\ms_light_map_logo_podmetac.png
        ');
        
        $process7->run();
        if (!$process7->isSuccessful()) {
        throw new ProcessFailedException($process7);
        }
        echo $process7->getOutput();
        echo '<img src="\image\ms_light_map_logo_podmetac.png">';
   
   
        $src2->compositeImage($src1, \Imagick::COMPOSITE_DEFAULT  ,675,420);
        $src2->writeImage(public_path("image\image-podmetac.png"));
        echo '<img src="\image\image-podmetac.png">';
        $src4 = new \Imagick(public_path("site-images/podmetackvadratasti.jpg"));
        $src4->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src4->writeImage(public_path("\site-images/podmetackvadratasti.jpg"));
         $src3 = new \Imagick(public_path("image/image-podmetac.png"));
         $src3->compositeImage($src4, \Imagick::COMPOSITE_MULTIPLY,0,0);

         $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $name = mt_rand(1000000, 9999999)
             . mt_rand(1000000, 9999999)
             . $characters[rand(0, strlen($characters) - 1)];
         
         $string = str_shuffle($name);
         $string .=  round(microtime(true) * 1000);
         $imageRandom1 = '/' . $string . '.png';

         $src3->writeImage(public_path("image" . $imageRandom1));
   

       $imageRandom1 = ltrim($imageRandom1, '/');

       $check1 = DB::table('images')->insert([
        'name' => $imageRandom1, 'product_id' => $id, 'size' => 'square'
       ]);
    
       return $check1;

        }


        public static function coastersCircle($id, $image){

            $imageName1 = "/" .  $image; 

            $path = public_path();
       
       
            $src1 = new \Imagick(public_path("canvas_picture". $imageName1));
            $src1->resizeImage(420, null,\Imagick::FILTER_LANCZOS,1); 
            $src1->writeImage(public_path("resized_pictures". $imageName1));
            $src2 = new \Imagick(public_path("\site-images\Podmetac-Kruzni-Mask.png"));
           /*  $src2->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
            $src2->writeImage(public_path("\site-images\Canvas-mockup-thumbnail.png")); */
            
            $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
            
            $process5 = new Process('magick convert 
            '.$path.'\site-images\Podmetac-Kruzni-Mask.png 
            -channel A -blur 0x8
            -compose hardlight
            '.$path.'\image\ms_light_map-coaster.png
            ');
            
            /* Makao sam komandu -separate proces 5   -colorspace gray -auto-level 
            -blur 0x3 
            -contrast-stretch 0,50%% 
            -depth 16   -negate  -channel A -blur 0x8*/
            
            $process5->run();
            if (!$process5->isSuccessful()) {
            throw new ProcessFailedException($process5);
            }
            echo $process5->getOutput();
            echo '<img src="\image\ms_light_map-coaster.png">';
            
            $process6 = new Process('magick convert 
            '.$path.'\resized_pictures'. $imageName1. ' 
            -channel matte -separate 
            '.$path.'\image\ms_logo_displace_mask_coaster.png
            ');
            
            
            
            $process6->run();
            if (!$process6->isSuccessful()) {
            throw new ProcessFailedException($process6);
            }
            echo $process6->getOutput();
            echo '<img src="\image\ms_logo_displace_mask_coaster.png">';
            
            $process7 = new Process('magick convert 
            '.$path.'\resized_pictures'. $imageName1. ' 
            '.$path.'\image\ms_light_map-coaster.png 
            -geometry -405-330 
            -compose Multiply -composite 
            '.$path.'\image\ms_logo_displace_mask_coaster.png 
            -compose CopyOpacity -composite 
            '.$path.'\image\ms_light_map_logo_coaster.png
            ');
            
            $process7->run();
            if (!$process7->isSuccessful()) {
            throw new ProcessFailedException($process7);
            }
            echo $process7->getOutput();
            echo '<img src="\image\ms_light_map_logo_coaster.png">';
       
       
            $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,405,330);
            $src2->writeImage(public_path("image\image-coaster.png"));
            echo '<img src="\image\image-coaster.png">';
            $src4 = new \Imagick(public_path("site-images/Podmetac-Kruznit-BG.png"));
           /*  $src4->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
            $src4->writeImage(public_path("\site-images/Textura-Canvas-mockup.png")); */
             $src3 = new \Imagick(public_path("image/image-coaster.png"));
             $src3->compositeImage($src4, \Imagick::COMPOSITE_DSTOVER           ,0,0);

             $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
             $name = mt_rand(1000000, 9999999)
                 . mt_rand(1000000, 9999999)
                 . $characters[rand(0, strlen($characters) - 1)];
             
             $string = str_shuffle($name);
             $string .=  round(microtime(true) * 1000);
             $imageRandom1 = '/' . $string . '.png';

             $src3->writeImage(public_path("image" . $imageRandom1));

             $imageRandom1 = ltrim($imageRandom1, '/');

             $check1 = DB::table('images')->insert([
              'name' => $imageRandom1, 'product_id' => $id, 'size' => 'Rounded'
             ]);
          
             return $check1;

            dd();
            $imageName1 = "/" .  $image; 

            $path = public_path();
       
       
            $src1 = new \Imagick(public_path("design". $imageName1));
            $src1->resizeImage(300, null,\Imagick::FILTER_LANCZOS,1); 
            $src1->writeImage(public_path("resized_pictures". $imageName1));
            $src2 = new \Imagick(public_path("\site-images\podmetacokrugli.jpg"));
            $src2->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
            $src2->writeImage(public_path("\site-images\podmetacokrugli.jpg"));
            
            $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
            
            $process5 = new Process('magick convert 
            '.$path.'\site-images\podmetacokrugli.jpg 
            -channel A -blur 0x8
            -compose hardlight
            '.$path.'\image\ms_light_map-podmetac.jpg
            ');
            
            /* Makao sam komandu -separate proces 5   -colorspace gray -auto-level 
            -blur 0x3 
            -contrast-stretch 0,50%% 
            -depth 16   -negate  -channel A -blur 0x8*/
            
            $process5->run();
            if (!$process5->isSuccessful()) {
            throw new ProcessFailedException($process5);
            }
            echo $process5->getOutput();
            echo '<img src="\image\ms_light_map-podmetac.jpg">';
            
            $process6 = new Process('magick convert 
            '.$path.'\resized_pictures'. $imageName1. ' 
            -channel matte -separate 
            '.$path.'\image\ms_logo_displace_mask_podmetac.png
            ');
            
            
            
            $process6->run();
            if (!$process6->isSuccessful()) {
            throw new ProcessFailedException($process6);
            }
            echo $process6->getOutput();
            echo '<img src="\image\ms_logo_displace_mask_podmetac.png">';
            
            $process7 = new Process('magick convert 
            '.$path.'\resized_pictures'. $imageName1. ' 
            '.$path.'\image\ms_light_map-podmetac.jpg 
            -geometry -640-740 
            -compose Multiply -composite 
            '.$path.'\image\ms_logo_displace_mask_podmetac.png 
            -compose CopyOpacity -composite 
            '.$path.'\image\ms_light_map_logo_podmetac.png
            ');
            
            $process7->run();
            if (!$process7->isSuccessful()) {
            throw new ProcessFailedException($process7);
            }
            echo $process7->getOutput();
            echo '<img src="\image\ms_light_map_logo_podmetac.png">';
       
       
            $src2->compositeImage($src1, \Imagick::COMPOSITE_DEFAULT  ,640,740);
            $src2->writeImage(public_path("image\image-podmetac.png"));
            echo '<img src="\image\image-podmetac.png">';
            $src4 = new \Imagick(public_path("site-images/podmetacokrugli.jpg"));
            $src4->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
            $src4->writeImage(public_path("\site-images/podmetacokrugli.jpg"));
             $src3 = new \Imagick(public_path("image/image-podmetac.png"));
             $src3->compositeImage($src4, \Imagick::COMPOSITE_MULTIPLY,0,0);

             $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
             $name = mt_rand(1000000, 9999999)
                 . mt_rand(1000000, 9999999)
                 . $characters[rand(0, strlen($characters) - 1)];
             
             $string = str_shuffle($name);
             $string .=  round(microtime(true) * 1000);
             $imageRandom1 = '/' . $string . '.png';

             $src3->writeImage(public_path("image" . $imageRandom1));
       

             $imageRandom1 = ltrim($imageRandom1, '/');

             $check1 = DB::table('images')->insert([
              'name' => $imageRandom1, 'product_id' => $id, 'size' => 'circle'
             ]);
          
             return $check1;
         
        }
}
