<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use DB;


class Image extends Model
{
    protected $table = 'images';
    protected $primaryKey = 'id';

    public function product() {
        return $this->belongsTo(Product::class);
    }

   public static function womanWhiteTshirt($id , $image){

        $path = public_path();


 

        $process0 = new Process('magick convert '.$path.'\image\U-one-16.jpg 
        -resize 2500x3500
        '.$path.'\image\U-one-16.jpg 
         ');
         $process0->run();
         if (!$process0->isSuccessful()) {
             throw new ProcessFailedException($process0);
         } 
 
        $process = new Process('magick convert   '.$path.'\image\U-one-16.jpg[403x422+984+1101] 
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
        '.$path.'\design' . $imageName1 . '
        '); 
        
     $process1->run();
      if (!$process1->isSuccessful()) {
          throw new ProcessFailedException($process1);    
    } 
 
 
        $process2 = new Process('magick convert 
        '.$path.'\design' . $imageName1 . '
        -bordercolor transparent -border 12x12 -thumbnail 403x422 
        '.$path.'\image\ms_temp.png
         ');
   
    $process2->run();
    if (!$process1->isSuccessful()) {
        throw new ProcessFailedException($process2);
    }
        echo $process2->getOutput();
        echo '<img src="\image\ms_temp.png">';
 
       
 
        $process3 = new Process('magick convert 
        '.$path.'\image\U-one-16.jpg[403x422+984+1101] 
        -colorspace gray -blur 10x250 -auto-level 
        -depth 16 
        '.$path.'\image\ms_displace_map.png
         ');
   
    $process3->run();
    if (!$process3->isSuccessful()) {
        throw new ProcessFailedException($process3);
    }
        echo $process3->getOutput();
        echo '<img src="\image\ms_displace_map.png">';
       
        $process4 = new Process('magick convert ^
        '.$path.'\image\ms_temp.png ^
        '.$path.'\image\ms_displace_map.png ^
        -alpha set -virtual-pixel transparent ^
        -compose displace -set option:compose:args -5x-5 -composite ^
        -depth 16 ^
        '.$path.'\image\ms_displaced_logo.png
      
         ');
   
    $process4->run();
    if (!$process4->isSuccessful()) {
        throw new ProcessFailedException($process4);
    }
        echo $process4->getOutput();
        echo '<img src="\image\ms_displaced_logo.png">';
 
        
        $process5 = new Process('magick convert ^
        '.$path.'\image\U-one-16.jpg[403x422+984+1101] ^
        -colorspace gray -auto-level ^
        -blur 0x3 ^
        -contrast-stretch 0,50%% ^
        -depth 16 ^
        '.$path.'\image\ms_light_map.png
         ');
 
         /* Makao sam komandu -separate proces 5 */
   
    $process5->run();
    if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
    }
        echo $process5->getOutput();
        echo '<img src="\image\ms_light_map.png">';
        
        $process6 = new Process('magick convert ^
        '.$path.'\image\ms_displaced_logo.png ^
        -channel matte -separate ^
        '.$path.'\image\ms_logo_displace_mask.png
         ');
   
    $process6->run();
    if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
    }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask.png">';
        
        $process7 = new Process('magick convert ^
        '.$path.'\image\ms_displaced_logo.png ^
        '.$path.'\image\ms_light_map.png ^
        -compose Multiply -composite ^
        '.$path.'\image\ms_logo_displace_mask.png ^
        -compose CopyOpacity -composite ^
        '.$path.'\image\ms_light_map_logo.png
        ');
  
   $process7->run();
   if (!$process7->isSuccessful()) {
       throw new ProcessFailedException($process7);
   }
       echo $process7->getOutput();
       echo '<img src="\image\ms_light_map_logo.png">';

       list($width, $height) = getimagesize($path.'\image\ms_light_map_logo.png');

      
    $X = 540 + (403-$width)/2;
    $Y = 561 +  (422-$height)/2;
       
       $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
       $name = mt_rand(1000000, 9999999)
           . mt_rand(1000000, 9999999)
           . $characters[rand(0, strlen($characters) - 1)];
       
       $string = str_shuffle($name);
       $string .=  round(microtime(true) * 1000);
       $imageRandom = '/' . $string . '.png';
 
      /*  */
 
        $process8 = new Process('magick convert ^
        '.$path.'\image\U-one-16.jpg ^
        '.$path.'\image\ms_light_map_logo.png ^
        -geometry +'.$X.'+'.$Y.' ^
        -compose over -composite ^
        -depth 16 ^
        '.$path.'\image' .$imageRandom. '
        ');
  
   $process8->run();
   if (!$process8->isSuccessful()) {
       throw new ProcessFailedException($process8);
   }

   


   $check = DB::table('images')->insert([
    'name' => $imageRandom, 'product_id' => $id
   ]);

   return $check;

    }


    public static function womanNavyTshirt($id, $image){

        $path = public_path();
  
          $process0 = new Process('magick convert  '.$path.'\image\U-one-13.jpg 
         -resize 1500x2500
         '.$path.'\image\U-one-13.jpg 
          ');
          $process0->run();
          if (!$process0->isSuccessful()) {
              throw new ProcessFailedException($process0);
          } 
  
        
  
         $process = new Process('magick convert   '.$path.'\image\U-one-13.jpg[403x422+540+561] 
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
  
         $process1 = new Process('magick convert  '.$path.'\design' . $imageName1 . '
         -resize 400x400
         '.$path.'\design' . $imageName1 . '
         '); 
         
      $process1->run();
       if (!$process1->isSuccessful()) {
           throw new ProcessFailedException($process1);    
     } 
  
  
         $process2 = new Process('magick convert 
         '.$path.'\design' . $imageName1 . '
         -bordercolor transparent -border 12x12 -thumbnail 403x422 
         '.$path.'\image\ms_temp.png
          ');
    
     $process2->run();
     if (!$process1->isSuccessful()) {
         throw new ProcessFailedException($process2);
     }
    
  
        
  
         $process3 = new Process('magick convert 
         '.$path.'\image\U-one-13.jpg[403x422+540+561] 
         -colorspace gray -blur 10x250 -auto-level 
         -depth 16 
         '.$path.'\image\ms_displace_map_girl_navy_regular.png
          ');
    
     $process3->run();
     if (!$process3->isSuccessful()) {
         throw new ProcessFailedException($process3);
     }
         echo $process3->getOutput();
         echo '<img src="\image\ms_displace_map_girl_navy_regular.png">'; 
        
         $process4 = new Process('magick convert ^
         '.$path.'\image\ms_temp.png ^
         '.$path.'\image\ms_displace_map_girl_navy_regular.png ^
         -alpha set -virtual-pixel transparent ^
         -compose displace -set option:compose:args -5x-5 -composite ^
         -depth 16 ^
         '.$path.'\image\ms_displaced_logo.png
       
          ');
    
     $process4->run();
     if (!$process4->isSuccessful()) {
         throw new ProcessFailedException($process4);
     }
    
  
         
          $process5 = new Process('magick convert ^
         '.$path.'\image\U-one-13.jpg[403x422+540+561] ^
         -colorspace gray -auto-level ^
         -blur 0x3 ^
         -contrast-stretch 0,50%% ^
         -depth 26 ^
         '.$path.'\image\ms_light_map_girl_navy_regular.png
          ');
  
        /*    Makao sam komandu -separate proces 5  */
    
     $process5->run();
     if (!$process5->isSuccessful()) {
         throw new ProcessFailedException($process5);
     }
         echo $process5->getOutput();
         echo '<img src="\image\ms_light_map_girl_navy_regular.png">'; 
         
         $process6 = new Process('magick convert ^
         '.$path.'\image\ms_displaced_logo.png ^
         -channel matte -separate ^
         '.$path.'\image\ms_logo_displace_mask.png
          ');
    
     $process6->run();
     if (!$process6->isSuccessful()) {
         throw new ProcessFailedException($process6);
     }
   
         
         $process7 = new Process('magick convert ^
         '.$path.'\image\ms_displaced_logo.png ^
         '.$path.'\image\ms_light_map_girl_navy_regular.png ^
         -compose Multiply -composite ^
         '.$path.'\image\ms_logo_displace_mask.png ^
         -compose CopyOpacity -composite ^
         '.$path.'\image\ms_light_map_logo.png
         ');
   
    $process7->run();
    if (!$process7->isSuccessful()) {
        throw new ProcessFailedException($process7);
    }
      
        
  
  
            
      list($width, $height) = getimagesize($path.'\image\ms_light_map_logo.png');
  
        
      $X = 540 + (403-$width)/2;
      $Y = 561 +  (422-$height)/2;

      $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $name = mt_rand(1000000, 9999999)
          . mt_rand(1000000, 9999999)
          . $characters[rand(0, strlen($characters) - 1)];
      
      $string = str_shuffle($name);
      $string .=  round(microtime(true) * 1000);
      $imageRandom = '/' . $string . '.png';
  
         $process8 = new Process('magick convert ^
         '.$path.'\image\U-one-13.jpg ^
         '.$path.'\image\ms_light_map_logo.png ^
         -geometry +'.$X.'+'.$Y.' ^
         -compose over -composite ^
         -depth 16 ^
         '.$path.'\image' . $imageRandom . '
         ');
   
    $process8->run();
    if (!$process8->isSuccessful()) {
        throw new ProcessFailedException($process8);
    }
       
  
        $check = DB::table('images')->insert([
            'name' => $imageRandom, 'product_id' => $id
           ]);
        
           return $check;
        
  
      }
}
