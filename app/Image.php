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


  
        /*  $process0 = new Process(' convert -version
          ');
          $process0->run();
          if (!$process0->isSuccessful()) {
              throw new ProcessFailedException($process0);
          } 
          echo $process0->getOutput();
  
          dd(); */
         $process0 = new Process('magick convert '.$path.'\site-images\U-one-16.jpg 
         -resize 1500x2500
         '.$path.'\site-images\U-one-16.jpg 
          ');
          $process0->run();
          if (!$process0->isSuccessful()) {
              throw new ProcessFailedException($process0);
          } 
  
          $process = new Process('magick convert   '.$path.'\site-images\U-one-16.jpg[303x322+610+531] 
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
         -resize 300x300
         '.$path.'\design' . $imageName1 . '
         '); 
         
      $process1->run();
       if (!$process1->isSuccessful()) {
           throw new ProcessFailedException($process1);    
     } 
  
  
         $process2 = new Process('magick convert 
         '.$path.'\design' . $imageName1 . '
         -bordercolor transparent -border 12x12 -thumbnail 303x322 
         '.$path.'\image\ms_temp.png
          ');
    
     $process2->run();
     if (!$process1->isSuccessful()) {
         throw new ProcessFailedException($process2);
     }
         echo $process2->getOutput();
         echo '<img src="\image\ms_temp.png">';
  
        
  
          $process3 = new Process('magick convert 
         '.$path.'\site-images\U-one-16.jpg[303x322+610+531] 
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
        
         $process4 = new Process('magick convert ^
         '.$path.'\image\ms_temp.png ^
         '.$path.'\image\ms_displace_map_girl_white_regular.png ^
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
         '.$path.'\site-images\U-one-16.jpg[303x322+610+531] ^
         -colorspace gray -auto-level ^
         -blur 0x4 ^
         -contrast-stretch 0,30%% ^
         -depth 16 ^
         '.$path.'\image\ms_light_map_girl_white_regular.png
          ');
  
  /*         Makao sam komandu -separate proces 5 */
    
     $process5->run();
     if (!$process5->isSuccessful()) {
         throw new ProcessFailedException($process5);
     }
         echo $process5->getOutput();
         echo '<img src="\image\ms_light_map_girl_white_regular.png">'; 
         
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
         '.$path.'\image\ms_light_map_girl_white_regular.png ^
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
  
        
        
      $X = 610 + (303-$width)/2;
      $Y = 531 +  (322-$height)/2;
      
       
       $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
       $name = mt_rand(1000000, 9999999)
           . mt_rand(1000000, 9999999)
           . $characters[rand(0, strlen($characters) - 1)];
       
       $string = str_shuffle($name);
       $string .=  round(microtime(true) * 1000);
       $imageRandom = '/' . $string . '.png';
 
      /*  */
 
        $process8 = new Process('magick convert ^
        '.$path.'\site-images\U-one-16.jpg ^
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

   
   $imageRandom = ltrim($imageRandom, '/');

   $check = DB::table('images')->insert([
    'name' => $imageRandom, 'product_id' => $id, 'color' => 'white', 'position' => 'front', 'gender' => 'female'
       ]);

   return $check;

    }


    public static function womanNavyTshirt($id, $image){

        $path = public_path();
  
          $process0 = new Process('magick convert  '.$path.'\site-images\U-one-13.jpg 
         -resize 1500x2500
         '.$path.'\site-images\U-one-13.jpg 
          ');
          $process0->run();
          if (!$process0->isSuccessful()) {
              throw new ProcessFailedException($process0);
          } 
  
        
  
         $process = new Process('magick convert   '.$path.'\site-images\U-one-13.jpg[303x322+599+561] 
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
         -resize 300x300
         '.$path.'\design' . $imageName1 . '
         '); 
         
      $process1->run();
       if (!$process1->isSuccessful()) {
           throw new ProcessFailedException($process1);    
     } 
  
  
         $process2 = new Process('magick convert 
         '.$path.'\design' . $imageName1 . '
         -bordercolor transparent -border 12x12 -thumbnail 303x322 
         '.$path.'\image\ms_temp.png
          ');
    
     $process2->run();
     if (!$process1->isSuccessful()) {
         throw new ProcessFailedException($process2);
     }
    
  
        
  
         $process3 = new Process('magick convert 
         '.$path.'\site-images\U-one-13.jpg[303x322+599+561] 
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
         '.$path.'\site-images\U-one-13.jpg[303x322+599+561] ^
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
  
      
      $X = 599 + (303-$width)/2;
      $Y = 561 +  (322-$height)/2;

      $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $name = mt_rand(1000000, 9999999)
          . mt_rand(1000000, 9999999)
          . $characters[rand(0, strlen($characters) - 1)];
      
      $string = str_shuffle($name);
      $string .=  round(microtime(true) * 1000);
      $imageRandom = '/' . $string . '.png';
  
         $process8 = new Process('magick convert ^
         '.$path.'\site-images\U-one-13.jpg ^
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
       
    $imageRandom = ltrim($imageRandom, '/');

        $check = DB::table('images')->insert([
            'name' => $imageRandom, 'product_id' => $id, 'color' => 'navy', 'position' => 'front', 'gender' => 'female'
           ]);
        
           return $check;
        
  
      }





      public static function womanRedTshirt($id , $image ){

        $path = public_path();
  
        $process0 = new Process('magick convert  '.$path.'\site-images\U-one-6.jpg 
        -resize 1500x2500
        '.$path.'\site-images\U-one-6.jpg 
         ');
         $process0->run();
         if (!$process0->isSuccessful()) {
             throw new ProcessFailedException($process0);
         }
 
         $process = new Process('magick convert   '.$path.'\site-images\U-one-6.jpg[303x322+610+531] 
        -colorspace gray 
        -blur 10x250 
        -auto-level
        '.$path.'\image\displace_map_girl_red_regular.png
         ');
   
    $process->run();
    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }
        echo $process->getOutput();
        echo '<img src="\image\displace_map_girl_red_regular.png">'; 
 
        $imageName1 = "/" .  $image; 
 
        $process1 = new Process('magick convert   '.$path.'\design' . $imageName1 . '
     
        -resize 300x300
        '.$path.'\design' . $imageName1 . '
        '); 
        
     $process1->run();
      if (!$process1->isSuccessful()) {
          throw new ProcessFailedException($process1);    
    } 
 
 
        $process2 = new Process('magick convert 
        '.$path.'\design' . $imageName1 . '
        -bordercolor transparent -border 12x12 -thumbnail 303x322 
        '.$path.'\image\ms_temp.png
         ');
   
    $process2->run();
    if (!$process1->isSuccessful()) {
        throw new ProcessFailedException($process2);
    }
        echo $process2->getOutput();
        echo '<img src="\image\ms_temp.png">';
 
       
 
         $process3 = new Process('magick convert 
        '.$path.'\site-images\U-one-6.jpg[303x322+610+531] 
        -colorspace gray -blur 10x250 -auto-level 
        -depth 16 
        '.$path.'\image\ms_displace_map_girl_red_regular.png
         ');
   
    $process3->run();
    if (!$process3->isSuccessful()) {
        throw new ProcessFailedException($process3);
    }
        echo $process3->getOutput();
        echo '<img src="\image\ms_displace_map_girl_red_regular.png">'; 
       
        $process4 = new Process('magick convert ^
        '.$path.'\image\ms_temp.png ^
        '.$path.'\image\ms_displace_map_girl_red_regular.png ^
        -alpha set -virtual-pixel transparent ^
        -compose displace -set option:compose:args -5x-5 -composite ^
        -depth 16 ^
        '.$path.'\image\ms_displaced_logo_girl_red_regular.png
      
         ');
   
    $process4->run();
    if (!$process4->isSuccessful()) {
        throw new ProcessFailedException($process4);
    }
        echo $process4->getOutput();
        echo '<img src="\image\ms_displaced_logo_girl_red_regular.png">';
 
        
         $process5 = new Process('magick convert ^
        '.$path.'\site-images\U-one-6.jpg[303x322+610+531] ^
        -colorspace gray -auto-level ^
        -blur 0x3 ^
        -contrast-stretch 0,30%% ^
        -depth 16 ^
        '.$path.'\image\ms_light_map_girl_red_regular.png
         ');
 
         /*  Makao sam komandu -separate proces 5  */
   
    $process5->run();
    if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
    }
        echo $process5->getOutput();
        echo '<img src="\image\ms_light_map_girl_red_regular.png">'; 
        
        $process6 = new Process('magick convert ^
        '.$path.'\image\ms_displaced_logo_girl_red_regular.png ^
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
        '.$path.'\image\ms_displaced_logo_girl_red_regular.png ^
        '.$path.'\image\ms_light_map_girl_red_regular.png ^
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
      
   $X = 610 + (303-$width)/2;
   $Y = 531 +  (322-$height)/2;
       
   $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $name = mt_rand(1000000, 9999999)
       . mt_rand(1000000, 9999999)
       . $characters[rand(0, strlen($characters) - 1)];
   
   $string = str_shuffle($name);
   $string .=  round(microtime(true) * 1000);
   $imageRandom = '/' . $string . '.png';


        $process8 = new Process('magick convert ^
        '.$path.'\site-images\U-one-6.jpg ^
        '.$path.'\image\ms_light_map_logo.png ^
        -geometry +'.$X.'+'.$Y.' ^
        -compose over -composite ^
        -depth 16 ^
        '.$path.'\image'.$imageRandom.'
        ');
  
   $process8->run();
   if (!$process8->isSuccessful()) {
       throw new ProcessFailedException($process8);
   }
       echo $process8->getOutput();

       $imageRandom = ltrim($imageRandom, '/');
       
       $check = DB::table('images')->insert([
        'name' => $imageRandom, 'product_id' => $id, 'color' => 'red', 'position' => 'front', 'gender' => 'female'
       ]);
    
       return $check;
      }


      public static function womanBlackTshirt($id, $image){

        $path = public_path();
  
         $process0 = new Process('magick convert  '.$path.'\site-images\U-one-5.jpg 
         -resize 1500x2500
         '.$path.'\site-images\U-one-5.jpg 
          ');
          $process0->run();
          if (!$process0->isSuccessful()) {
              throw new ProcessFailedException($process0);
          }
  
         /*  $process = new Process('magick convert   '.$path.'\image\U-one-5.jpg[403x422+545+601] 
         -colorspace gray 
         -blur 10x250 
         -auto-level
         '.$path.'\image\displace_map_girl_black_regular.png
          ');
    
     $process->run();
     if (!$process->isSuccessful()) {
         throw new ProcessFailedException($process);
     }
         echo $process->getOutput(); */
        
  
         $imageName1 = "/" .  $image; 
  
         $process1 = new Process('magick convert   '.$path.'\design' . $imageName1 . '
         -resize 300x300
         '.$path.'\design' . $imageName1 . '
         '); 
         
      $process1->run();
       if (!$process1->isSuccessful()) {
           throw new ProcessFailedException($process1);    
     } 
  
  
         $process2 = new Process('magick convert 
         '.$path.'\design' . $imageName1 . '
         -bordercolor transparent -border 12x12 -thumbnail 303x322 
         '.$path.'\image\ms_temp.png
          ');
    
     $process2->run();
     if (!$process1->isSuccessful()) {
         throw new ProcessFailedException($process2);
     }
         echo $process2->getOutput();
         echo '<img src="\image\ms_temp.png">';
  
        
  
           $process3 = new Process('magick convert 
         '.$path.'\site-images\U-one-5.jpg[303x322+595+531] 
         -colorspace gray -blur 10x250 -auto-level 
         -depth 60 
         '.$path.'\image\ms_displace_map_girl_black_regular.png
          ');
    
     $process3->run();
     if (!$process3->isSuccessful()) {
         throw new ProcessFailedException($process3);
     }
         echo $process3->getOutput();
         echo '<img src="\image\ms_displace_map_girl_black_regular.png">';  
        
         $process4 = new Process('magick convert ^
         '.$path.'\image\ms_temp.png ^
         '.$path.'\image\ms_displace_map_girl_black_regular.png ^
         -alpha set -virtual-pixel transparent ^
         -compose displace -set option:compose:args -5x-5 -composite ^
         -depth 16 ^
         '.$path.'\image\ms_displaced_logo_girl_black_regular.png
       
          ');
    
     $process4->run();
     if (!$process4->isSuccessful()) {
         throw new ProcessFailedException($process4);
     }
         echo $process4->getOutput();
         echo '<img src="\image\ms_displaced_logo_girl_black_regular.png">';
  
             
        $process5 = new Process('magick convert ^
         '.$path.'\site-images\U-one-5.jpg[303x322+595+531] ^
         -colorspace gray -auto-level ^
         -blur 0x5 ^
         -contrast-stretch 0,50%% ^
         -depth 16 ^
         '.$path.'\image\ms_light_map_girl_black_regular.png
          ');
  
       /*   Makao sam komandu -separate proces 5 */
    
     $process5->run();
     if (!$process5->isSuccessful()) {
         throw new ProcessFailedException($process5);
     }
         echo $process5->getOutput();
         echo '<img src="\image\ms_light_map_girl_black_regular.png">'; 
          
         
         $process6 = new Process('magick convert ^
         '.$path.'\image\ms_displaced_logo_girl_black_regular.png ^
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
         '.$path.'\image\ms_displaced_logo_girl_black_regular.png ^
         '.$path.'\image\ms_light_map_girl_black_regular.png ^
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
       
    $X = 595 + (303-$width)/2;
    $Y = 531 +  (322-$height)/2;

    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $name = mt_rand(1000000, 9999999)
        . mt_rand(1000000, 9999999)
        . $characters[rand(0, strlen($characters) - 1)];
    
    $string = str_shuffle($name);
    $string .=  round(microtime(true) * 1000);
    $imageRandom = '/' . $string . '.png';
        
  
         $process8 = new Process('magick convert ^
         '.$path.'\site-images\U-one-5.jpg ^
         '.$path.'\image\ms_light_map_logo.png ^
         -geometry +'.$X.'+'.$Y.' ^
         -compose over -composite ^
         -depth 16 ^
         '.$path.'\image'.$imageRandom.'
         ');
   
    $process8->run();
    if (!$process8->isSuccessful()) {
        throw new ProcessFailedException($process8);
    }
        echo $process8->getOutput();
        echo '<img src="\image\ms_product.png">';

        $imageRandom = ltrim($imageRandom, '/');
        
        $check = DB::table('images')->insert([
            'name' => $imageRandom, 'product_id' => $id, 'color' => 'black', 'position' => 'front', 'gender' => 'female'
           ]);
        
           return $check;
    }

    public static function womanBlackBackTshirt($id, $image){
        $path = public_path();
  
        $process0 = new Process('magick convert  '.$path.'\site-images\U-one-3.jpg 
        -resize 1500x2500
        '.$path.'\site-images\U-one-3.jpg 
         ');
         $process0->run();
         if (!$process0->isSuccessful()) {
             throw new ProcessFailedException($process0);
         }

      /*    $process12 = new Process('magick convert  '.$path.'\image\U-one-23-edit.jpg 
         -resize 2000x3000
         '.$path.'\image\U-one-23-edit.jpg 
          ');
          $process12->run();
          if (!$process12->isSuccessful()) {
              throw new ProcessFailedException($process12);
          } */

         /*   */
 
        $process = new Process('magick convert   '.$path.'\site-images\U-one-3.jpg[303x322+595+551] 
        -colorspace gray 
        -blur 20x250 
        -auto-level
        '.$path.'\image\displace_map_girl_black_back_regular.png
         ');
   
    $process->run();
    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }
        echo $process->getOutput();
        echo '<img src="\image\displace_map_girl_black_back_regular.png">';
 
        $imageName1 = "/" .  $image; 
 
        $process1 = new Process('magick convert   '.$path.'\design' . $imageName1 . '
        -resize 300x300
        '.$path.'\design' . $imageName1 . '
        '); 
        
     $process1->run();
      if (!$process1->isSuccessful()) {
          throw new ProcessFailedException($process1);    
    } 
 
 
        $process2 = new Process('magick convert 
        '.$path.'\design' . $imageName1 . '
        -bordercolor transparent -border 12x12 -thumbnail 303x322 
        '.$path.'\image\ms_temp.png
         ');
   
    $process2->run();
    if (!$process1->isSuccessful()) {
        throw new ProcessFailedException($process2);
    }
        echo $process2->getOutput();
        echo '<img src="\image\ms_temp.png">';
 
       
 
           $process3 = new Process('magick convert 
        '.$path.'\site-images\U-one-3.jpg[303x322+595+551] 
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
        '.$path.'\site-images\U-one-3.jpg[303x322+595+551] ^
        -colorspace gray -auto-level ^
        -blur 0x5 ^
        -contrast-stretch 0,80%% ^
        -depth 16 ^
        '.$path.'\image\ms_light_map.png
         ');
 
     
   
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
       
   $X = 595 + (303-$width)/2;
   $Y = 551 +  (322-$height)/2;

   $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $name = mt_rand(1000000, 9999999)
       . mt_rand(1000000, 9999999)
       . $characters[rand(0, strlen($characters) - 1)];
   
   $string = str_shuffle($name);
   $string .=  round(microtime(true) * 1000);
   $imageRandom = '/' . $string . '.png';
 
        $process8 = new Process('magick convert ^
        '.$path.'\site-images\U-one-3.jpg ^
        '.$path.'\image\ms_light_map_logo.png ^
        -geometry +'.$X.'+'.$Y.' ^
        -compose over -composite ^
        -depth 16 ^
        '.$path.'\image'.$imageRandom.'
        ');
  
   $process8->run();
   if (!$process8->isSuccessful()) {
       throw new ProcessFailedException($process8);
   }
       echo $process8->getOutput();
       echo '<img src="\image\ms_product.png">';


       $imageRandom = ltrim($imageRandom, '/');
        
       $check = DB::table('images')->insert([
           'name' => $imageRandom, 'product_id' => $id, 'color' => 'black', 'position' => 'back', 'gender' => 'female'
          ]);
       
          return $check;
    }


    public static function womanNavyBackTshirt($id, $image){
        $path = public_path();
  
        $process0 = new Process('magick convert  '.$path.'\site-images\U-one-15.jpg 
        -resize 1500x2500
        '.$path.'\site-images\U-one-15.jpg 
         ');
         $process0->run();
         if (!$process0->isSuccessful()) {
             throw new ProcessFailedException($process0);
         }

      /*    $process12 = new Process('magick convert  '.$path.'\image\U-one-23-edit.jpg 
         -resize 2000x3000
         '.$path.'\image\U-one-23-edit.jpg 
          ');
          $process12->run();
          if (!$process12->isSuccessful()) {
              throw new ProcessFailedException($process12);
          } */

         /*   */
 
        $process = new Process('magick convert   '.$path.'\site-images\U-one-15.jpg[303x322+625+601] 
        -colorspace gray 
        -blur 20x250 
        -auto-level
        '.$path.'\image\displace_map_girl_black_navy_regular.png
         ');
   
    $process->run();
    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }
        echo $process->getOutput();
        echo '<img src="\image\displace_map_girl_black_navy_regular.png">';
 
        $imageName1 = "/" .  $image; 
 
        $process1 = new Process('magick convert   '.$path.'\design' . $imageName1 . '
        -resize 300x300
        '.$path.'\design' . $imageName1 . '
        '); 
        
     $process1->run();
      if (!$process1->isSuccessful()) {
          throw new ProcessFailedException($process1);    
    } 
 
 
        $process2 = new Process('magick convert 
        '.$path.'\design' . $imageName1 . '
        -bordercolor transparent -border 12x12 -thumbnail 303x322 
        '.$path.'\image\ms_temp.png
         ');
   
    $process2->run();
    if (!$process1->isSuccessful()) {
        throw new ProcessFailedException($process2);
    }
        echo $process2->getOutput();
        echo '<img src="\image\ms_temp.png">';
 
       
 
           $process3 = new Process('magick convert 
        '.$path.'\site-images\U-one-15.jpg[303x322+625+601] 
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
        '.$path.'\site-images\U-one-15.jpg[303x322+625+601] ^
        -colorspace gray -auto-level ^
        -blur 0x5 ^
        -contrast-stretch 0,80%% ^
        -depth 16 ^
        '.$path.'\image\ms_light_map.png
         ');
 
     
   
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
    
   $X = 625 + (303-$width)/2;
   $Y = 601 +  (322-$height)/2;

   $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $name = mt_rand(1000000, 9999999)
       . mt_rand(1000000, 9999999)
       . $characters[rand(0, strlen($characters) - 1)];
   
   $string = str_shuffle($name);
   $string .=  round(microtime(true) * 1000);
   $imageRandom = '/' . $string . '.png';
       
 
        $process8 = new Process('magick convert ^
        '.$path.'\site-images\U-one-15.jpg ^
        '.$path.'\image\ms_light_map_logo.png ^
        -geometry +'.$X.'+'.$Y.' ^
        -compose over -composite ^
        -depth 16 ^
        '.$path.'\image'.$imageRandom.'
        ');
  
   $process8->run();
   if (!$process8->isSuccessful()) {
       throw new ProcessFailedException($process8);
   }
       echo $process8->getOutput();
  

       $imageRandom = ltrim($imageRandom, '/');
        
       $check = DB::table('images')->insert([
           'name' => $imageRandom, 'product_id' => $id, 'color' => 'navy', 'position' => 'back', 'gender' => 'female'
          ]);
       
          return $check;
       
    }

    public static function womanRedBackTshirt($id, $image){
        $path = public_path();
  
        $process0 = new Process('magick convert  '.$path.'\site-images\U-one-8.jpg 
        -resize 1500x2500
        '.$path.'\site-images\U-one-8.jpg 
         ');
         $process0->run();
         if (!$process0->isSuccessful()) {
             throw new ProcessFailedException($process0);
         }

      /*    $process12 = new Process('magick convert  '.$path.'\image\U-one-23-edit.jpg 
         -resize 2000x3000
         '.$path.'\image\U-one-23-edit.jpg 
          ');
          $process12->run();
          if (!$process12->isSuccessful()) {
              throw new ProcessFailedException($process12);
          } */

         /*   */
 
        $process = new Process('magick convert   '.$path.'\site-images\U-one-8.jpg[303x322+625+601] 
        -colorspace gray 
        -blur 20x250 
        -auto-level
        '.$path.'\image\displace_map_girl_black_red_regular.png
         ');
   
    $process->run();
    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }
        echo $process->getOutput();
        echo '<img src="\image\displace_map_girl_black_red_regular.png">';
 
        $imageName1 = "/" .  $image; 
 
        $process1 = new Process('magick convert   '.$path.'\design' . $imageName1 . '
        -resize 300x300
        '.$path.'\design' . $imageName1 . '
        '); 
        
     $process1->run();
      if (!$process1->isSuccessful()) {
          throw new ProcessFailedException($process1);    
    } 
 
 
        $process2 = new Process('magick convert 
        '.$path.'\design' . $imageName1 . '
        -bordercolor transparent -border 12x12 -thumbnail 303x322 
        '.$path.'\image\ms_temp.png
         ');
   
    $process2->run();
    if (!$process1->isSuccessful()) {
        throw new ProcessFailedException($process2);
    }
        echo $process2->getOutput();
        echo '<img src="\image\ms_temp.png">';
 
       
 
           $process3 = new Process('magick convert 
        '.$path.'\site-images\U-one-8.jpg[303x322+625+601] 
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
        '.$path.'\site-images\U-one-8.jpg[303x322+625+601] ^
        -colorspace gray -auto-level ^
        -blur 0x5 ^
        -contrast-stretch 0,50%% ^
        -depth 16 ^
        '.$path.'\image\ms_light_map.png
         ');
 
     
   
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
       
   $X = 625 + (303-$width)/2;
   $Y = 601 +  (322-$height)/2;

   $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $name = mt_rand(1000000, 9999999)
       . mt_rand(1000000, 9999999)
       . $characters[rand(0, strlen($characters) - 1)];
   
   $string = str_shuffle($name);
   $string .=  round(microtime(true) * 1000);
   $imageRandom = '/' . $string . '.png';
       
 
        $process8 = new Process('magick convert ^
        '.$path.'\site-images\U-one-8.jpg ^
        '.$path.'\image\ms_light_map_logo.png ^
        -geometry +'.$X.'+'.$Y.' ^
        -compose over -composite ^
        -depth 16 ^
        '.$path.'\image'.$imageRandom.'
        ');
  
   $process8->run();
   if (!$process8->isSuccessful()) {
       throw new ProcessFailedException($process8);
   }
       echo $process8->getOutput();
     

       $imageRandom = ltrim($imageRandom, '/');
        
       $check = DB::table('images')->insert([
           'name' => $imageRandom, 'product_id' => $id, 'color' => 'red', 'position' => 'back', 'gender' => 'female'
          ]);
       
          return $check;
    }


    public static function womanWhiteBackTshirt($id, $image){
        $path = public_path();
  
        $process0 = new Process('magick convert  '.$path.'\site-images\U-one-18.jpg 
        -resize 1500x2500
        '.$path.'\site-images\U-one-18.jpg 
         ');
         $process0->run();
         if (!$process0->isSuccessful()) {
             throw new ProcessFailedException($process0);
         }

      /*    $process12 = new Process('magick convert  '.$path.'\image\U-one-23-edit.jpg 
         -resize 2000x3000
         '.$path.'\image\U-one-23-edit.jpg 
          ');
          $process12->run();
          if (!$process12->isSuccessful()) {
              throw new ProcessFailedException($process12);
          } */

         /*   */
 
        $process = new Process('magick convert   '.$path.'\site-images\U-one-18.jpg[303x322+620+590] 
        -colorspace gray 
        -blur 20x250 
        -auto-level
        '.$path.'\image\displace_map_girl_back_white_regular.png
         ');
   
    $process->run();
    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }
        echo $process->getOutput();
        echo '<img src="\image\displace_map_girl_back_white_regular.png">';
 
        $imageName1 = "/" .  $image; 
 
        $process1 = new Process('magick convert   '.$path.'\design' . $imageName1 . '
        -resize 300x300
        '.$path.'\design' . $imageName1 . '
        '); 
        
     $process1->run();
      if (!$process1->isSuccessful()) {
          throw new ProcessFailedException($process1);    
    } 
 
 
        $process2 = new Process('magick convert 
        '.$path.'\design' . $imageName1 . '
        -bordercolor transparent -border 12x12 -thumbnail 303x322 
        '.$path.'\image\ms_temp.png
         ');
   
    $process2->run();
    if (!$process1->isSuccessful()) {
        throw new ProcessFailedException($process2);
    }
        echo $process2->getOutput();
        echo '<img src="\image\ms_temp.png">';
 
       
 
           $process3 = new Process('magick convert 
        '.$path.'\site-images\U-one-18.jpg[303x322+620+590] 
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
        '.$path.'\site-images\U-one-18.jpg[303x322+620+590] ^
        -colorspace gray -auto-level ^
        -blur 0x5 ^
        -contrast-stretch 0,50%% ^
        -depth 16 ^
        '.$path.'\image\ms_light_map.png
         ');
 
     
   
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

        list($width, $height) = getimagesize($path.'\image\ms_displaced_logo.png');
        
        $X = 620 + (303-$width)/2;
        $Y = 590 +  (322-$height)/2;
        
        $process7 = new Process('magick convert ^
        '.$path.'\image\ms_displaced_logo.png ^
        '.$path.'\image\ms_light_map.png ^
        -compose Multiply  -composite ^ -geometry +'.$X.'+'.$Y.' ^
        '.$path.'\image\ms_logo_displace_mask.png ^
        -compose CopyOpacity  -composite ^ -geometry +'.$X.'+'.$Y.' ^
        '.$path.'\image\ms_light_map_logo.png
        ');
  
   $process7->run();
   if (!$process7->isSuccessful()) {
       throw new ProcessFailedException($process7);
   }
       echo $process7->getOutput();
       echo '<img src="\image\ms_light_map_logo.png">';
       
   /*     
       list($width, $height) = getimagesize($path.'\image\ms_light_map_logo.png');
       
   $X = 625 + (303-$width)/2;
   $Y = 731 +  (322-$height)/2; */
       
   $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $name = mt_rand(1000000, 9999999)
       . mt_rand(1000000, 9999999)
       . $characters[rand(0, strlen($characters) - 1)];
   
   $string = str_shuffle($name);
   $string .=  round(microtime(true) * 1000);
   $imageRandom = '/' . $string . '.png';
 
        $process8 = new Process('magick convert ^
        '.$path.'\site-images\U-one-18.jpg ^
        '.$path.'\image\ms_light_map_logo.png ^
        -geometry +'.$X.'+'.$Y.' ^
        -compose over -composite ^
        -depth 16 ^
        '.$path.'\image'. $imageRandom .'
        ');
  
   $process8->run();
   if (!$process8->isSuccessful()) {
       throw new ProcessFailedException($process8);
   }
       echo $process8->getOutput();
      
       $imageRandom = ltrim($imageRandom, '/');
        
       $check = DB::table('images')->insert([
           'name' => $imageRandom, 'product_id' => $id, 'color' => 'white', 'position' => 'back', 'gender' => 'female'
          ]);
       
          return $check;
       
       
    }

    public static function manWhiteTshirt($id, $image){
        $path = public_path();

     
         $process0 = new Process('magick convert '.$path.'\site-images\U1-Obicnamajica-Bijela-Frontalno1.jpg 
         -resize 1500x2500
         '.$path.'\site-images\U1-Obicnamajica-Bijela-Frontalno1.jpg 
          ');
          $process0->run();
          if (!$process0->isSuccessful()) {
              throw new ProcessFailedException($process0);
          } 
    
          $process = new Process('magick convert   '.$path.'\site-images\U1-Obicnamajica-Bijela-Frontalno1.jpg[303x322+570+541] 
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
         -resize 300x300
         '.$path.'\design' . $imageName1 . '
         '); 
         
      $process1->run();
       if (!$process1->isSuccessful()) {
           throw new ProcessFailedException($process1);    
     } 
    
    
         $process2 = new Process('magick convert 
         '.$path.'\design' . $imageName1 . '
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
    
       
         $X = 570 + (303-$width)/2;
         $Y = 541 +  (322-$height)/2;
        
    
          $process3 = new Process('magick convert 
         '.$path.'\site-images\U1-Obicnamajica-Bijela-Frontalno1.jpg[303x322+570+541] 
         -colorspace gray -blur 10x250 -auto-level 
         -depth 16 
         '.$path.'\image\ms_displace_map_man_white_regular.png
          ');
    
     $process3->run();
     if (!$process3->isSuccessful()) {
         throw new ProcessFailedException($process3);
     }
         echo $process3->getOutput();
         echo '<img src="\image\ms_displace_map_man_white_regular.png">'; 
        
         $process4 = new Process('magick convert ^
         '.$path.'\image\ms_temp.png ^
         '.$path.'\image\ms_displace_map_man_white_regular.png ^
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
         '.$path.'\site-images\U1-Obicnamajica-Bijela-Frontalno1.jpg[303x322+570+541] ^
         -colorspace gray -auto-level ^
         -blur 0x4 ^
         -contrast-stretch 0,30%% ^
         -depth 16 ^
         '.$path.'\image\ms_light_map_man_white_regular.png
          ');
    
    /*         Makao sam komandu -separate proces 5 */
    
     $process5->run();
     if (!$process5->isSuccessful()) {
         throw new ProcessFailedException($process5);
     }
         echo $process5->getOutput();
         echo '<img src="\image\ms_light_map_man_white_regular.png">'; 
         
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
         '.$path.'\image\ms_light_map_man_white_regular.png ^
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
        
       
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $name = mt_rand(1000000, 9999999)
       . mt_rand(1000000, 9999999)
       . $characters[rand(0, strlen($characters) - 1)];
   
   $string = str_shuffle($name);
   $string .=  round(microtime(true) * 1000);
   $imageRandom = '/' . $string . '.png';
    
         $process8 = new Process('magick convert ^
         '.$path.'\site-images\U1-Obicnamajica-Bijela-Frontalno1.jpg ^
         '.$path.'\image\ms_light_map_logo.png ^
         -geometry +'.$X.'+'.$Y.'
         -compose over -composite ^
         -depth 16 ^
         '.$path.'\image' .$imageRandom.'
         ');
    
    $process8->run();
    if (!$process8->isSuccessful()) {
        throw new ProcessFailedException($process8);
    }
        echo $process8->getOutput();
       

        $imageRandom = ltrim($imageRandom, '/');
        
        $check = DB::table('images')->insert([
            'name' => $imageRandom, 'product_id' => $id, 'color' => 'white', 'position' => 'front', 'gender' => 'male'
           ]);
        
           return $check;

    }


    public static function manWhiteBackTshirt($id, $image){
        $path = public_path();

        $process0 = new Process('magick convert  '.$path.'\site-images\U1-Obicnamajica-Bijela-Pozadi.jpg 
        -resize 1500x2500
        '.$path.'\site-images\U1-Obicnamajica-Bijela-Pozadi.jpg 
         ');
         $process0->run();
         if (!$process0->isSuccessful()) {
             throw new ProcessFailedException($process0);
         }
   
      /*    $process12 = new Process('magick convert  '.$path.'\image\U-one-23-edit.jpg 
         -resize 2000x3000
         '.$path.'\image\U-one-23-edit.jpg 
          ');
          $process12->run();
          if (!$process12->isSuccessful()) {
              throw new ProcessFailedException($process12);
          } */
   
         
   
        $process = new Process('magick convert   '.$path.'\site-images\U1-Obicnamajica-Bijela-Pozadi.jpg[303x322+600+601] 
        -colorspace gray 
        -blur 20x250 
        -auto-level
        '.$path.'\image\displace_map_man_back_white_regular.png
         ');
   
    $process->run();
    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }
        echo $process->getOutput();
        echo '<img src="\image\displace_map_man_back_white_regular.png">';
   
        $imageName1 = "/" .  $image; 
   
        $process1 = new Process('magick convert   '.$path.'\design' . $imageName1 . '
        -resize 300x300
        '.$path.'\design' . $imageName1 . '
        '); 
        
     $process1->run();
      if (!$process1->isSuccessful()) {
          throw new ProcessFailedException($process1);    
    } 
   
   
        $process2 = new Process('magick convert 
        '.$path.'\design' . $imageName1 . '
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
       
        $X = 600 + (303-$width)/2;
        $Y = 601 +  (322-$height)/2;
       
   
           $process3 = new Process('magick convert 
        '.$path.'\site-images\U1-Obicnamajica-Bijela-Pozadi.jpg[303x322+600+601] 
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
        '.$path.'\site-images\U1-Obicnamajica-Bijela-Pozadi.jpg[303x322+600+601] ^
        -colorspace gray -auto-level ^
        -blur 0x5 ^
        -contrast-stretch 0,80%% ^
        -depth 16 ^
        '.$path.'\image\ms_light_map.png
         ');
   
     
   
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
       
       $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
       $name = mt_rand(1000000, 9999999)
           . mt_rand(1000000, 9999999)
           . $characters[rand(0, strlen($characters) - 1)];
       
       $string = str_shuffle($name);
       $string .=  round(microtime(true) * 1000);
       $imageRandom = '/' . $string . '.png';
       
   
        $process8 = new Process('magick convert ^
        '.$path.'\site-images\U1-Obicnamajica-Bijela-Pozadi.jpg ^
        '.$path.'\image\ms_light_map_logo.png ^
        -geometry +'.$X.'+'.$Y.' ^
        -compose over -composite ^
        -depth 16 ^
        '.$path.'\image'.$imageRandom.'
        ');
   
   $process8->run();
   if (!$process8->isSuccessful()) {
       throw new ProcessFailedException($process8);
   }
       echo $process8->getOutput();
    

       $imageRandom = ltrim($imageRandom, '/');
        
       $check = DB::table('images')->insert([
           'name' => $imageRandom, 'product_id' => $id, 'color' => 'white', 'position' => 'back', 'gender' => 'male'
          ]);
       
          return $check;
    }

    public static function manBlackTshirt($id, $image){
        $path = public_path();

        /*  $process0 = new Process(' convert -version
          ');
          $process0->run();
          if (!$process0->isSuccessful()) {
              throw new ProcessFailedException($process0);
          } 
          echo $process0->getOutput();
    
          dd(); */
         $process0 = new Process('magick convert '.$path.'\site-images\U1-Obicnamajica-Crna-Frontalno.jpg 
         -resize 1500x2500
         '.$path.'\site-images\U1-Obicnamajica-Crna-Frontalno.jpg 
          ');
          $process0->run();
          if (!$process0->isSuccessful()) {
              throw new ProcessFailedException($process0);
          } 
    
          $process = new Process('magick convert   '.$path.'\site-images\U1-Obicnamajica-Crna-Frontalno.jpg[303x322+590+541] 
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
         -resize 300x300
         '.$path.'\design' . $imageName1 . '
         '); 
         
      $process1->run();
       if (!$process1->isSuccessful()) {
           throw new ProcessFailedException($process1);    
     } 
    
    
         $process2 = new Process('magick convert 
         '.$path.'\design' . $imageName1 . '
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
    
       
         $X = 590 + (303-$width)/2;
         $Y = 541 +  (322-$height)/2;
        
    
          $process3 = new Process('magick convert 
         '.$path.'\site-images\U1-Obicnamajica-Crna-Frontalno.jpg[303x322+590+541] 
         -colorspace gray -blur 10x250 -auto-level 
         -depth 16 
         '.$path.'\image\ms_displace_map_man_white_regular.png
          ');
    
     $process3->run();
     if (!$process3->isSuccessful()) {
         throw new ProcessFailedException($process3);
     }
         echo $process3->getOutput();
         echo '<img src="\image\ms_displace_map_man_white_regular.png">'; 
        
         $process4 = new Process('magick convert ^
         '.$path.'\image\ms_temp.png ^
         '.$path.'\image\ms_displace_map_man_white_regular.png ^
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
         '.$path.'\site-images\U1-Obicnamajica-Crna-Frontalno.jpg[303x322+590+541] ^
         -colorspace gray -auto-level ^
         -blur 0x4 ^
         -contrast-stretch 0,30%% ^
         -depth 16 ^
         '.$path.'\image\ms_light_map_man_white_regular.png
          ');
    
    /*         Makao sam komandu -separate proces 5 */
    
     $process5->run();
     if (!$process5->isSuccessful()) {
         throw new ProcessFailedException($process5);
     }
         echo $process5->getOutput();
         echo '<img src="\image\ms_light_map_man_white_regular.png">'; 
         
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
         '.$path.'\image\ms_light_map_man_white_regular.png ^
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
        
       
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom = '/' . $string . '.png';
    
         $process8 = new Process('magick convert ^
         '.$path.'\site-images\U1-Obicnamajica-Crna-Frontalno.jpg ^
         '.$path.'\image\ms_light_map_logo.png ^
         -geometry +'.$X.'+'.$Y.'
         -compose over -composite ^
         -depth 16 ^
         '.$path.'\image'.$imageRandom.'
         ');
    
    $process8->run();
    if (!$process8->isSuccessful()) {
        throw new ProcessFailedException($process8);
    }
        echo $process8->getOutput();
        
        $imageRandom = ltrim($imageRandom, '/');
        
        $check = DB::table('images')->insert([
            'name' => $imageRandom, 'product_id' => $id, 'color' => 'black', 'position' => 'front', 'gender' => 'male'
           ]);
        
           return $check;

    }

    public static function manBlackBackTshirt($id, $image){
        $path = public_path();

        $process0 = new Process('magick convert  '.$path.'\site-images\U1-Obicnamajica-Crna-Pozadi.jpg 
        -resize 1500x2500
        '.$path.'\site-images\U1-Obicnamajica-Crna-Pozadi.jpg 
         ');
         $process0->run();
         if (!$process0->isSuccessful()) {
             throw new ProcessFailedException($process0);
         }
   
      /*    $process12 = new Process('magick convert  '.$path.'\image\U-one-23-edit.jpg 
         -resize 2000x3000
         '.$path.'\image\U-one-23-edit.jpg 
          ');
          $process12->run();
          if (!$process12->isSuccessful()) {
              throw new ProcessFailedException($process12);
          } */
   
         
   
        $process = new Process('magick convert   '.$path.'\site-images\U1-Obicnamajica-Crna-Pozadi.jpg[303x322+600+601] 
        -colorspace gray 
        -blur 20x250 
        -auto-level
        '.$path.'\image\displace_map_man_back_white_regular.png
         ');
   
    $process->run();
    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }
        echo $process->getOutput();
        echo '<img src="\image\displace_map_man_back_white_regular.png">';
   
        $imageName1 = "/" .  $image; 
   
        $process1 = new Process('magick convert   '.$path.'\design' . $imageName1 . '
        -resize 300x300
        '.$path.'\design' . $imageName1 . '
        '); 
        
     $process1->run();
      if (!$process1->isSuccessful()) {
          throw new ProcessFailedException($process1);    
    } 
   
   
        $process2 = new Process('magick convert 
        '.$path.'\design' . $imageName1 . '
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
       
        $X = 600 + (303-$width)/2;
        $Y = 601 +  (322-$height)/2;
       
   
           $process3 = new Process('magick convert 
        '.$path.'\site-images\U1-Obicnamajica-Crna-Pozadi.jpg[303x322+600+601] 
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
        '.$path.'\site-images\U1-Obicnamajica-Crna-Pozadi.jpg[303x322+600+601] ^
        -colorspace gray -auto-level ^
        -blur 0x5 ^
        -contrast-stretch 0,80%% ^
        -depth 16 ^
        '.$path.'\image\ms_light_map.png
         ');
   
     
   
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
       
   
       $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
       $name = mt_rand(1000000, 9999999)
           . mt_rand(1000000, 9999999)
           . $characters[rand(0, strlen($characters) - 1)];
       
       $string = str_shuffle($name);
       $string .=  round(microtime(true) * 1000);
       $imageRandom = '/' . $string . '.png';
       
   
        $process8 = new Process('magick convert ^
        '.$path.'\site-images\U1-Obicnamajica-Crna-Pozadi.jpg ^
        '.$path.'\image\ms_light_map_logo.png ^
        -geometry +'.$X.'+'.$Y.' ^
        -compose over -composite ^
        -depth 16 ^
        '.$path.'\image'.$imageRandom.'
        ');
   
   $process8->run();
   if (!$process8->isSuccessful()) {
       throw new ProcessFailedException($process8);
   }
       echo $process8->getOutput();

       $imageRandom = ltrim($imageRandom, '/');
        
       $check = DB::table('images')->insert([
           'name' => $imageRandom, 'product_id' => $id, 'color' => 'black', 'position' => 'back', 'gender' => 'male'
          ]);
       
          return $check;
      
    }

    public static function manRedTshirt($id, $image){
        $path = public_path();

        /*  $process0 = new Process(' convert -version
          ');
          $process0->run();
          if (!$process0->isSuccessful()) {
              throw new ProcessFailedException($process0);
          } 
          echo $process0->getOutput();
    
          dd(); */
         $process0 = new Process('magick convert '.$path.'\site-images\U1-Obicnamajica-Crvena-Frontalno.jpg 
         -resize 1500x2500
         '.$path.'\site-images\U1-Obicnamajica-Crvena-Frontalno.jpg 
          ');
          $process0->run();
          if (!$process0->isSuccessful()) {
              throw new ProcessFailedException($process0);
          } 
    
          $process = new Process('magick convert   '.$path.'\site-images\U1-Obicnamajica-Crvena-Frontalno.jpg[303x322+590+541] 
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
         -resize 300x300
         '.$path.'\design' . $imageName1 . '
         '); 
         
      $process1->run();
       if (!$process1->isSuccessful()) {
           throw new ProcessFailedException($process1);    
     } 
    
    
         $process2 = new Process('magick convert 
         '.$path.'\design' . $imageName1 . '
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
    
       
         $X = 590 + (303-$width)/2;
         $Y = 541 +  (322-$height)/2;
        
    
          $process3 = new Process('magick convert 
         '.$path.'\site-images\U1-Obicnamajica-Crvena-Frontalno.jpg[303x322+590+541] 
         -colorspace gray -blur 10x250 -auto-level 
         -depth 16 
         '.$path.'\image\ms_displace_map_man_white_regular.png
          ');
    
     $process3->run();
     if (!$process3->isSuccessful()) {
         throw new ProcessFailedException($process3);
     }
         echo $process3->getOutput();
         echo '<img src="\image\ms_displace_map_man_white_regular.png">'; 
        
         $process4 = new Process('magick convert ^
         '.$path.'\image\ms_temp.png ^
         '.$path.'\image\ms_displace_map_man_white_regular.png ^
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
         '.$path.'\site-images\U1-Obicnamajica-Crvena-Frontalno.jpg[303x322+590+541] ^
         -colorspace gray -auto-level ^
         -blur 0x4 ^
         -contrast-stretch 0,30%% ^
         -depth 16 ^
         '.$path.'\image\ms_light_map_man_white_regular.png
          ');
    
    /*         Makao sam komandu -separate proces 5 */
    
     $process5->run();
     if (!$process5->isSuccessful()) {
         throw new ProcessFailedException($process5);
     }
         echo $process5->getOutput();
         echo '<img src="\image\ms_light_map_man_white_regular.png">'; 
         
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
         '.$path.'\image\ms_light_map_man_white_regular.png ^
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
        
       
       
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom = '/' . $string . '.png';
    
         $process8 = new Process('magick convert ^
         '.$path.'\site-images\U1-Obicnamajica-Crvena-Frontalno.jpg ^
         '.$path.'\image\ms_light_map_logo.png ^
         -geometry +'.$X.'+'.$Y.'
         -compose over -composite ^
         -depth 16 ^
         '.$path.'\image'.$imageRandom.'
         ');
    
    $process8->run();
    if (!$process8->isSuccessful()) {
        throw new ProcessFailedException($process8);
    }
        echo $process8->getOutput();

        $imageRandom = ltrim($imageRandom, '/');
        
        $check = DB::table('images')->insert([
            'name' => $imageRandom, 'product_id' => $id, 'color' => 'red', 'position' => 'front', 'gender' => 'male'
           ]);
        
           return $check;
       
        
    }

    public static function manRedBackTshirt($id, $image){
        $path = public_path();

     $process0 = new Process('magick convert  '.$path.'\site-images\U1-Obicnamajica-Crvena-Pozadi.jpg 
     -resize 1500x2500
     '.$path.'\site-images\U1-Obicnamajica-Crvena-Pozadi.jpg 
      ');
      $process0->run();
      if (!$process0->isSuccessful()) {
          throw new ProcessFailedException($process0);
      }

   /*    $process12 = new Process('magick convert  '.$path.'\image\U-one-23-edit.jpg 
      -resize 2000x3000
      '.$path.'\image\U-one-23-edit.jpg 
       ');
       $process12->run();
       if (!$process12->isSuccessful()) {
           throw new ProcessFailedException($process12);
       } */

      

     $process = new Process('magick convert   '.$path.'\site-images\U1-Obicnamajica-Crvena-Pozadi.jpg[303x322+610+601] 
     -colorspace gray 
     -blur 20x250 
     -auto-level
     '.$path.'\image\displace_map_man_back_white_regular.png
      ');

 $process->run();
 if (!$process->isSuccessful()) {
     throw new ProcessFailedException($process);
 }
     echo $process->getOutput();
     echo '<img src="\image\displace_map_man_back_white_regular.png">';

     $imageName1 = "/" .  $image; 

     $process1 = new Process('magick convert   '.$path.'\design' . $imageName1 . '
     -resize 300x300
     '.$path.'\design' . $imageName1 . '
     '); 
     
  $process1->run();
   if (!$process1->isSuccessful()) {
       throw new ProcessFailedException($process1);    
 } 


     $process2 = new Process('magick convert 
     '.$path.'\design' . $imageName1 . '
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
    
     $X = 610 + (303-$width)/2;
     $Y = 601 +  (322-$height)/2;
    

        $process3 = new Process('magick convert 
     '.$path.'\site-images\U1-Obicnamajica-Crvena-Pozadi.jpg[303x322+610+601] 
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
     '.$path.'\site-images\U1-Obicnamajica-Crvena-Pozadi.jpg[303x322+610+601] ^
     -colorspace gray -auto-level ^
     -blur 0x5 ^
     -contrast-stretch 0,80%% ^
     -depth 16 ^
     '.$path.'\image\ms_light_map.png
      ');

  

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
    
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $name = mt_rand(1000000, 9999999)
        . mt_rand(1000000, 9999999)
        . $characters[rand(0, strlen($characters) - 1)];
    
    $string = str_shuffle($name);
    $string .=  round(microtime(true) * 1000);
    $imageRandom = '/' . $string . '.png';
    

     $process8 = new Process('magick convert ^
     '.$path.'\site-images\U1-Obicnamajica-Crvena-Pozadi.jpg ^
     '.$path.'\image\ms_light_map_logo.png ^
     -geometry +'.$X.'+'.$Y.' ^
     -compose over -composite ^
     -depth 16 ^
     '.$path.'\image'.$imageRandom.'
     ');

$process8->run();
if (!$process8->isSuccessful()) {
    throw new ProcessFailedException($process8);
}
    echo $process8->getOutput();

    $imageRandom = ltrim($imageRandom, '/');
        
    $check = DB::table('images')->insert([
        'name' => $imageRandom, 'product_id' => $id, 'color' => 'red', 'position' => 'back', 'gender' => 'male'
       ]);
    
       return $check;

    }

    public static function manNavyTshirt($id, $image){
        $path = public_path();

        /*  $process0 = new Process(' convert -version
          ');
          $process0->run();
          if (!$process0->isSuccessful()) {
              throw new ProcessFailedException($process0);
          } 
          echo $process0->getOutput();
    
          dd(); */
         $process0 = new Process('magick convert '.$path.'\site-images\U1-Obicnamajica-Teget-Frontalno.jpg 
         -resize 1500x2500
         '.$path.'\site-images\U1-Obicnamajica-Teget-Frontalno.jpg 
          ');
          $process0->run();
          if (!$process0->isSuccessful()) {
              throw new ProcessFailedException($process0);
          } 
    
          $process = new Process('magick convert   '.$path.'\site-images\U1-Obicnamajica-Teget-Frontalno.jpg[303x322+610+541] 
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
         -resize 300x300
         '.$path.'\design' . $imageName1 . '
         '); 
         
      $process1->run();
       if (!$process1->isSuccessful()) {
           throw new ProcessFailedException($process1);    
     } 
    
    
         $process2 = new Process('magick convert 
         '.$path.'\design' . $imageName1 . '
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
    
       
         $X = 610 + (303-$width)/2;
         $Y = 541 +  (322-$height)/2;
        
    
          $process3 = new Process('magick convert 
         '.$path.'\site-images\U1-Obicnamajica-Teget-Frontalno.jpg[303x322+610+541] 
         -colorspace gray -blur 10x250 -auto-level 
         -depth 16 
         '.$path.'\image\ms_displace_map_man_white_regular.png
          ');
    
     $process3->run();
     if (!$process3->isSuccessful()) {
         throw new ProcessFailedException($process3);
     }
         echo $process3->getOutput();
         echo '<img src="\image\ms_displace_map_man_white_regular.png">'; 
        
         $process4 = new Process('magick convert ^
         '.$path.'\image\ms_temp.png ^
         '.$path.'\image\ms_displace_map_man_white_regular.png ^
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
         '.$path.'\site-images\U1-Obicnamajica-Teget-Frontalno.jpg[303x322+610+541] ^
         -colorspace gray -auto-level ^
         -blur 0x4 ^
         -contrast-stretch 0,30%% ^
         -depth 16 ^
         '.$path.'\image\ms_light_map_man_white_regular.png
          ');
    
    /*         Makao sam komandu -separate proces 5 */
    
     $process5->run();
     if (!$process5->isSuccessful()) {
         throw new ProcessFailedException($process5);
     }
         echo $process5->getOutput();
         echo '<img src="\image\ms_light_map_man_white_regular.png">'; 
         
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
         '.$path.'\image\ms_light_map_man_white_regular.png ^
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
        
       
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom = '/' . $string . '.png';
    
         $process8 = new Process('magick convert ^
         '.$path.'\site-images\U1-Obicnamajica-Teget-Frontalno.jpg ^
         '.$path.'\image\ms_light_map_logo.png ^
         -geometry +'.$X.'+'.$Y.'
         -compose over -composite ^
         -depth 16 ^
         '.$path.'\image'.$imageRandom.'
         ');
    
    $process8->run();
    if (!$process8->isSuccessful()) {
        throw new ProcessFailedException($process8);
    }
        echo $process8->getOutput();
        
        $imageRandom = ltrim($imageRandom, '/');
        
        $check = DB::table('images')->insert([
            'name' => $imageRandom, 'product_id' => $id, 'color' => 'navy', 'position' => 'front', 'gender' => 'male'
           ]);
        
           return $check;
    }

    public static function manNavyBackTshirt($id, $image){
        $path = public_path();

        $process0 = new Process('magick convert  '.$path.'\site-images\U1-Obicnamajica-Teget-Pozadi.jpg 
        -resize 1500x2500
        '.$path.'\site-images\U1-Obicnamajica-Teget-Pozadi.jpg 
         ');
         $process0->run();
         if (!$process0->isSuccessful()) {
             throw new ProcessFailedException($process0);
         }
   
      /*    $process12 = new Process('magick convert  '.$path.'\image\U-one-23-edit.jpg 
         -resize 2000x3000
         '.$path.'\image\U-one-23-edit.jpg 
          ');
          $process12->run();
          if (!$process12->isSuccessful()) {
              throw new ProcessFailedException($process12);
          } */
   
         
   
        $process = new Process('magick convert   '.$path.'\site-images\U1-Obicnamajica-Teget-Pozadi.jpg[303x322+610+601] 
        -colorspace gray 
        -blur 20x250 
        -auto-level
        '.$path.'\image\displace_map_man_back_white_regular.png
         ');
   
    $process->run();
    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }
        echo $process->getOutput();
        echo '<img src="\image\displace_map_man_back_white_regular.png">';
   
        $imageName1 = "/" .  $image; 
   
        $process1 = new Process('magick convert   '.$path.'\design' . $imageName1 . '
        -resize 300x300
        '.$path.'\design' . $imageName1 . '
        '); 
        
     $process1->run();
      if (!$process1->isSuccessful()) {
          throw new ProcessFailedException($process1);    
    } 
   
   
        $process2 = new Process('magick convert 
        '.$path.'\design' . $imageName1 . '
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
       
        $X = 610 + (303-$width)/2;
        $Y = 601 +  (322-$height)/2;
       
   
           $process3 = new Process('magick convert 
        '.$path.'\site-images\U1-Obicnamajica-Teget-Pozadi.jpg[303x322+610+601] 
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
        '.$path.'\site-images\U1-Obicnamajica-Teget-Pozadi.jpg[303x322+610+601] ^
        -colorspace gray -auto-level ^
        -blur 0x5 ^
        -contrast-stretch 0,80%% ^
        -depth 16 ^
        '.$path.'\image\ms_light_map.png
         ');
   
     
   
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
       
   
       $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
       $name = mt_rand(1000000, 9999999)
           . mt_rand(1000000, 9999999)
           . $characters[rand(0, strlen($characters) - 1)];
       
       $string = str_shuffle($name);
       $string .=  round(microtime(true) * 1000);
       $imageRandom = '/' . $string . '.png';
   
        $process8 = new Process('magick convert ^
        '.$path.'\site-images\U1-Obicnamajica-Teget-Pozadi.jpg ^
        '.$path.'\image\ms_light_map_logo.png ^
        -geometry +'.$X.'+'.$Y.' ^
        -compose over -composite ^
        -depth 16 ^
        '.$path.'\image'.$imageRandom.'
        ');
   
   $process8->run();
   if (!$process8->isSuccessful()) {
       throw new ProcessFailedException($process8);
   }
       echo $process8->getOutput();
        
       $imageRandom = ltrim($imageRandom, '/');
        
       $check = DB::table('images')->insert([
           'name' => $imageRandom, 'product_id' => $id, 'color' => 'navy', 'position' => 'back', 'gender' => 'male'
          ]);
       
          return $check;
    
    }

    public static function blackFrameA3($id, $image){
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(500, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("canvas_picture". $imageName1));
       $src2 = new \Imagick(public_path("\site-images\Poster-CrniRam-A3.jpg"));
     
       
       
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
       
        $process5 = new Process('magick convert ^
       '.$path.'\site-images\Poster-CrniRam-A3.jpg ^
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-crni-ram.png
         ');
       
         /* Makao sam komandu -separate proces 5   -colorspace gray -auto-level ^
        -blur 0x3 ^
        -contrast-stretch 0,50%% ^
        -depth 16 ^  -negate  -channel A -blur 0x8*/
       
       $process5->run();
       if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
       }
        echo $process5->getOutput();
        echo '<img src="\image\ms_light_map-crni-ram.png">';
       
        $process6 = new Process('magick convert ^
        '.$path.'\canvas_picture'. $imageName1. ' ^
        -channel matte -separate ^
        '.$path.'\image\ms_logo_displace_mask-crni-ram.png
         ');
     
        
       
       $process6->run();
       if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
       }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask-crni-ram.png">';
       
        $process7 = new Process('magick convert ^
        '.$path.'\canvas_picture'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-crni-ram.png ^
        -geometry -340-320 ^
        -compose Multiply -composite ^
        '.$path.'\image\ms_logo_displace_mask-crni-ram.png ^
        -compose CopyOpacity -composite ^
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
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(700, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("canvas_picture". $imageName1));
       $src2 = new \Imagick(public_path("\site-images\Poster---Bijeli-Ram---A3.jpg"));
     
       
       
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
       
        $process5 = new Process('magick convert ^
       '.$path.'\site-images\Poster---Bijeli-Ram---A3.jpg ^
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-bijeli-ram.png
         ');
       
         /* Makao sam komandu -separate proces 5   -colorspace gray -auto-level ^
        -blur 0x3 ^
        -contrast-stretch 0,50%% ^
        -depth 16 ^  -negate  -channel A -blur 0x8*/
       
       $process5->run();
       if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
       }
        echo $process5->getOutput();
        echo '<img src="\image\ms_light_map-bijeli-ram.png">';
       
        $process6 = new Process('magick convert ^
        '.$path.'\canvas_picture'. $imageName1. ' ^
        -channel matte -separate ^
        '.$path.'\image\ms_logo_displace_mask-bijeli-ram.png
         ');
     
        
       
       $process6->run();
       if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
       }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask-bijeli-ram.png">';
       
        $process7 = new Process('magick convert ^
        '.$path.'\canvas_picture'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-bijeli-ram.png ^
        -geometry -700-550 ^
        -compose Multiply -composite ^
        '.$path.'\image\ms_logo_displace_mask-bijeli-ram.png ^
        -compose CopyOpacity -composite ^
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
        $src1->resizeImage(800, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("canvas_picture". $imageName1));
       $src2 = new \Imagick(public_path("\site-images\Poster---Bijeli-Ram---A3---B2---B1---THUMBNAIL.jpg"));
     
       
       
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
       
        $process5 = new Process('magick convert ^
       '.$path.'\site-images\Poster---Bijeli-Ram---A3---B2---B1---THUMBNAIL.jpg ^
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-bijeli-ram-thumb.png
         ');
       
         /* Makao sam komandu -separate proces 5   -colorspace gray -auto-level ^
        -blur 0x3 ^
        -contrast-stretch 0,50%% ^
        -depth 16 ^  -negate  -channel A -blur 0x8*/
       
       $process5->run();
       if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
       }
        echo $process5->getOutput();
        echo '<img src="\image\ms_light_map-bijeli-ram-thumb.png">';
       
        $process6 = new Process('magick convert ^
        '.$path.'\canvas_picture'. $imageName1. ' ^
        -channel matte -separate ^
        '.$path.'\image\ms_logo_displace_mask-bijeli-ram-thumb.png
         ');
     
        
       
       $process6->run();
       if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
       }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask-bijeli-ram-thumb.png">';
       
        $process7 = new Process('magick convert ^
        '.$path.'\canvas_picture'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-bijeli-ram-thumb.png ^
        -geometry -630-550 ^
        -compose Multiply -composite ^
        '.$path.'\image\ms_logo_displace_mask-bijeli-ram-thumb.png ^
        -compose CopyOpacity -composite ^
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
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(800, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("canvas_picture". $imageName1));
       $src2 = new \Imagick(public_path("\site-images\Poster---Bijeli-Ram---B1.jpg"));
     
       
       
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
       
        $process5 = new Process('magick convert ^
       '.$path.'\site-images\Poster---Bijeli-Ram---B1.jpg ^
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-bijeli-ram-b1.png
         ');
       
         /* Makao sam komandu -separate proces 5   -colorspace gray -auto-level ^
        -blur 0x3 ^
        -contrast-stretch 0,50%% ^
        -depth 16 ^  -negate  -channel A -blur 0x8*/
       
       $process5->run();
       if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
       }
        echo $process5->getOutput();
        echo '<img src="\image\ms_light_map-bijeli-ram-b1.png">';
       
        $process6 = new Process('magick convert ^
        '.$path.'\canvas_picture'. $imageName1. ' ^
        -channel matte -separate ^
        '.$path.'\image\ms_logo_displace_mask-bijeli-ram-b1.png
         ');
     
        
       
       $process6->run();
       if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
       }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask-bijeli-ram-b1.png">';
       
        $process7 = new Process('magick convert ^
        '.$path.'\canvas_picture'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-bijeli-ram-b1.png ^
        -geometry -900-550 ^
        -compose Multiply -composite ^
        '.$path.'\image\ms_logo_displace_mask-bijeli-ram-b1.png ^
        -compose CopyOpacity -composite ^
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
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(700, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("canvas_picture". $imageName1));
       $src2 = new \Imagick(public_path("\site-images\Poster---Bijeli-Ram---B2.jpg"));
     
       
       
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
       
        $process5 = new Process('magick convert ^
       '.$path.'\site-images\Poster---Bijeli-Ram---B2.jpg ^
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-bijeli-ram-b2.png
         ');
       
         /* Makao sam komandu -separate proces 5   -colorspace gray -auto-level ^
        -blur 0x3 ^
        -contrast-stretch 0,50%% ^
        -depth 16 ^  -negate  -channel A -blur 0x8*/
       
       $process5->run();
       if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
       }
        echo $process5->getOutput();
        echo '<img src="\image\ms_light_map-bijeli-ram-b2.png">';
       
        $process6 = new Process('magick convert ^
        '.$path.'\canvas_picture'. $imageName1. ' ^
        -channel matte -separate ^
        '.$path.'\image\ms_logo_displace_mask-bijeli-ram-b2.png
         ');
     
        
       
       $process6->run();
       if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
       }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask-bijeli-ram-b2.png">';
       
        $process7 = new Process('magick convert ^
        '.$path.'\canvas_picture'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-bijeli-ram-b2.png ^
        -geometry -670-820 ^
        -compose Multiply -composite ^
        '.$path.'\image\ms_logo_displace_mask-bijeli-ram-b2.png ^
        -compose CopyOpacity -composite ^
        '.$path.'\image\ms_light_map_logo-bijeli-ram-b2.png
        ');
       
       $process7->run();
       if (!$process7->isSuccessful()) {
       throw new ProcessFailedException($process7);
       }
       echo $process7->getOutput();
       echo '<img src="\image\ms_light_map_logo-bijeli-ram-b2.png">';
       
       $src1->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
       $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
       $src = new \Imagick(public_path("\image\ms_light_map_logo-bijeli-ram-b2.png"));
       $src2->compositeImage($src, \Imagick::COMPOSITE_ATOP , 670, 820);
       
   
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
           'name' => $imageRandom1, 'product_id' => $id, 'color' => 'white' , 'size' => 'B2'
          ]);
       
          return $check;
    }


    public static function blackFrameThumb($id, $image){
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(700, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("canvas_picture". $imageName1));
       $src2 = new \Imagick(public_path("\site-images\Poster---Crni-Ram---A3---B2---B1---THUMBNAIL.jpg"));
     
       
       
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
       
        $process5 = new Process('magick convert ^
       '.$path.'\site-images\Poster---Crni-Ram---A3---B2---B1---THUMBNAIL.jpg ^
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-crni-ram-thumb.png
         ');
       
         /* Makao sam komandu -separate proces 5   -colorspace gray -auto-level ^
        -blur 0x3 ^
        -contrast-stretch 0,50%% ^
        -depth 16 ^  -negate  -channel A -blur 0x8*/
       
       $process5->run();
       if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
       }
        echo $process5->getOutput();
        echo '<img src="\image\ms_light_map-crni-ram-thumb.png">';
       
        $process6 = new Process('magick convert ^
        '.$path.'\canvas_picture'. $imageName1. ' ^
        -channel matte -separate ^
        '.$path.'\image\ms_logo_displace_mask-crni-ram-thumb.png
         ');
     
        
       
       $process6->run();
       if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
       }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask-crni-ram-thumb.png">';
       
        $process7 = new Process('magick convert ^
        '.$path.'\canvas_picture'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-crni-ram-thumb.png ^
        -geometry -670-650 ^
        -compose Multiply -composite ^
        '.$path.'\image\ms_logo_displace_mask-crni-ram-thumb.png ^
        -compose CopyOpacity -composite ^
        '.$path.'\image\ms_light_map_logo-crni-ram-thumb.png
        ');
       
       $process7->run();
       if (!$process7->isSuccessful()) {
       throw new ProcessFailedException($process7);
       }
       echo $process7->getOutput();
       echo '<img src="\image\ms_light_map_logo-crni-ram-thumb.png">';
       
       $src1->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
       $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
       $src = new \Imagick(public_path("\image\ms_light_map_logo-crni-ram-thumb.png"));
       $src2->compositeImage($src, \Imagick::COMPOSITE_ATOP , 670, 650);
      
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
           'name' => $imageRandom1, 'product_id' => $id, 'color' => 'black' , 'size' => 'thumb'
          ]);
       
          return $check;
    }

    public static function blackFrameB1($id, $image){
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(700, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("canvas_picture". $imageName1));
       $src2 = new \Imagick(public_path("\site-images\Poster---Crni-Ram---B1.jpg"));
     
       
       
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
       
        $process5 = new Process('magick convert ^
       '.$path.'\site-images\Poster---Crni-Ram---B1.jpg ^
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-crni-ram-b1.png
         ');
       
         /* Makao sam komandu -separate proces 5   -colorspace gray -auto-level ^
        -blur 0x3 ^
        -contrast-stretch 0,50%% ^
        -depth 16 ^  -negate  -channel A -blur 0x8*/
       
       $process5->run();
       if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
       }
        echo $process5->getOutput();
        echo '<img src="\image\ms_light_map-crni-ram-b1.png">';
       
        $process6 = new Process('magick convert ^
        '.$path.'\canvas_picture'. $imageName1. ' ^
        -channel matte -separate ^
        '.$path.'\image\ms_logo_displace_mask-crni-ram-b1.png
         ');
     
        
       
       $process6->run();
       if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
       }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask-crni-ram-b1.png">';
       
        $process7 = new Process('magick convert ^
        '.$path.'\canvas_picture'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-crni-ram-b1.png ^
        -geometry -270-250 ^
        -compose Multiply -composite ^
        '.$path.'\image\ms_logo_displace_mask-crni-ram-b1.png ^
        -compose CopyOpacity -composite ^
        '.$path.'\image\ms_light_map_logo-crni-ram-b1.png
        ');
       
       $process7->run();
       if (!$process7->isSuccessful()) {
       throw new ProcessFailedException($process7);
       }
       echo $process7->getOutput();
       echo '<img src="\image\ms_light_map_logo-crni-ram-b1.png">';
       
       $src1->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
       $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
       $src = new \Imagick(public_path("\image\ms_light_map_logo-crni-ram-b1.png"));
       $src2->compositeImage($src, \Imagick::COMPOSITE_ATOP , 270, 250);
           
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
           'name' => $imageRandom1, 'product_id' => $id, 'color' => 'black' , 'size' => 'B1'
          ]);
       
          return $check;
     }


     public static function blackFrameB2($id, $image){
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(550, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("canvas_picture". $imageName1));
       $src2 = new \Imagick(public_path("\site-images\Poster---Crni-Ram---B2.jpg"));
     
       
       
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
       
        $process5 = new Process('magick convert ^
       '.$path.'\site-images\Poster---Crni-Ram---B2.jpg ^
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-crni-ram-b2.png
         ');
       
         /* Makao sam komandu -separate proces 5   -colorspace gray -auto-level ^
        -blur 0x3 ^
        -contrast-stretch 0,50%% ^
        -depth 16 ^  -negate  -channel A -blur 0x8*/
       
       $process5->run();
       if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
       }
        echo $process5->getOutput();
        echo '<img src="\image\ms_light_map-crni-ram-b2.png">';
       
        $process6 = new Process('magick convert ^
        '.$path.'\canvas_picture'. $imageName1. ' ^
        -channel matte -separate ^
        '.$path.'\image\ms_logo_displace_mask-crni-ram-b2.png
         ');
     
        
       
       $process6->run();
       if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
       }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask-crni-ram-b2.png">';
       
        $process7 = new Process('magick convert ^
        '.$path.'\canvas_picture'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-crni-ram-b2.png ^
        -geometry -680-230 ^
        -compose Multiply -composite ^
        '.$path.'\image\ms_logo_displace_mask-crni-ram-b2.png ^
        -compose CopyOpacity -composite ^
        '.$path.'\image\ms_light_map_logo-crni-ram-b2.png
        ');
       
       $process7->run();
       if (!$process7->isSuccessful()) {
       throw new ProcessFailedException($process7);
       }
       echo $process7->getOutput();
       echo '<img src="\image\ms_light_map_logo-crni-ram-b2.png">';
       
       $src1->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
       $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
       $src = new \Imagick(public_path("\image\ms_light_map_logo-crni-ram-b2.png"));
       $src2->compositeImage($src, \Imagick::COMPOSITE_ATOP , 680, 230);

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
           'name' => $imageRandom1, 'product_id' => $id, 'color' => 'black', 'size' => 'B2'
          ]);
       
          return $check;
     }
    

     public static function huaweiP20($id, $image){
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
       
    
       
   
   $src1 = new \Imagick(public_path("design". $imageName1));
   $src1->resizeImage(400, null,\Imagick::FILTER_LANCZOS,1); 
   $src1->writeImage(public_path("design". $imageName1));
   $src2 = new \Imagick(public_path("\site-images\Huawei-P20-Bezpozadinecopy.png"));
   
   
   
   $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
   
   $process5 = new Process('magick convert ^
   '.$path.'\site-images\Huawei-P20-Bezpozadinecopy.png ^
   -channel A -blur 0x8
   -compose hardlight
   '.$path.'\image\ms_light_map-phone1.png
   ');
   
   /* Makao sam komandu -separate proces 5   -colorspace gray -auto-level ^
   -blur 0x3 ^
   -contrast-stretch 0,50%% ^
   -depth 16 ^  -negate  -channel A -blur 0x8*/
   
   $process5->run();
   if (!$process5->isSuccessful()) {
   throw new ProcessFailedException($process5);
   }
   echo $process5->getOutput();
   echo '<img src="\image\ms_light_map-phone1.png">';
   
   $process6 = new Process('magick convert ^
   '.$path.'\design'. $imageName1. ' ^
   -channel matte -separate ^
   '.$path.'\image\ms_logo_displace_mask_phone1.png
   ');
   
   
   
   $process6->run();
   if (!$process6->isSuccessful()) {
   throw new ProcessFailedException($process6);
   }
   echo $process6->getOutput();
   echo '<img src="\image\ms_logo_displace_mask_phone1.png">';
   
   $process7 = new Process('magick convert ^
   '.$path.'\design'. $imageName1. ' ^
   '.$path.'\image\ms_light_map-phone1.png ^
   -geometry -340-320 ^
   -compose Multiply -composite ^
   '.$path.'\image\ms_logo_displace_mask_phone1.png ^
   -compose CopyOpacity -composite ^
   '.$path.'\image\ms_light_map_logo_phone1.png
   ');
   
   $process7->run();
   if (!$process7->isSuccessful()) {
   throw new ProcessFailedException($process7);
   }
   echo $process7->getOutput();
   echo '<img src="\image\ms_light_map_logo_phone1.png">';

   
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
   $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 340, 320);
   $src2->writeImage(public_path("image/output1.png"));
   $process5 = new Process('magick  convert '.$path.'\image\output1.png 
   -flatten  '.$path.'\image'.$imageRandom1.' 
   ');
    $process5->run();
       if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
       }
        echo $process5->getOutput();
        
        $imageRandom = ltrim($imageRandom1, '/');

        $check1 = DB::table('images')->insert([
         'name' => $imageRandom, 'product_id' => $id, 'color' => 'transparent'
        ]);
   
        $process10 = new Process('magick  convert '.$path.'\site-images\Huawei-P20-Bezpozadinecopy.png -background "rgb(0,0,0)" 
        -flatten  '.$path.'\image\Huawei-P20-Crna.png
       ');
          $process10->run();
             if (!$process10->isSuccessful()) {
              throw new ProcessFailedException($process10);
             }
              echo $process10->getOutput();
              echo '<img src="\image\Huawei-P20-Crna.png">'; 
   
              $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
              $name = mt_rand(1000000, 9999999)
                  . mt_rand(1000000, 9999999)
                  . $characters[rand(0, strlen($characters) - 1)];
              
              $string = str_shuffle($name);
              $string .=  round(microtime(true) * 1000);
              $imageRandom2 = '/' . $string . '.png'; 
  
   
   
   $process8 = new Process('magick convert ^
   '.$path.'\image\Huawei-P20-Crna.png ^
   '.$path.'\image\output1.png ^
   -compose ATop -composite ^
   
   -depth 16 ^
   '.$path.'\image'.$imageRandom2.'
   ');
   
   $process8->run();
   if (!$process8->isSuccessful()) {
   throw new ProcessFailedException($process8);
   }
   echo $process8->getOutput();
   
   $imageRandom2 = ltrim($imageRandom2, '/');

 $check2 = DB::table('images')->insert([
  'name' => $imageRandom2, 'product_id' => $id, 'color' => 'black'
 ]);

 return $check2;
     }

    public static function samsungS20PlusPhoneCase($id, $image){
        $imageName1 = "/" .  $image; 
  
        $path = public_path();
 
  $src1 = new \Imagick(public_path("design". $imageName1));
  $src1->resizeImage(400, null,\Imagick::FILTER_LANCZOS,1); 
  $src1->writeImage(public_path("design". $imageName1));
 $src2 = new \Imagick(public_path("\site-images\Samsung-S20Plus-Bezpozadine.png"));
 
 
 
  $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
 
  $process5 = new Process('magick convert ^
 '.$path.'\site-images\Samsung-S20Plus-Bezpozadine.png ^
  -channel A -blur 0x8
  -compose hardlight
  '.$path.'\image\ms_light_map-phone1.png
   ');
 
   /* Makao sam komandu -separate proces 5   -colorspace gray -auto-level ^
  -blur 0x3 ^
  -contrast-stretch 0,50%% ^
  -depth 16 ^  -negate  -channel A -blur 0x8*/
 
 $process5->run();
 if (!$process5->isSuccessful()) {
  throw new ProcessFailedException($process5);
 }
  echo $process5->getOutput();
  echo '<img src="\image\ms_light_map-phone1.png">';
 
  $process6 = new Process('magick convert ^
  '.$path.'\design'. $imageName1. ' ^
  -channel matte -separate ^
  '.$path.'\image\ms_logo_displace_mask_phone1.png
   ');

  
 
 $process6->run();
 if (!$process6->isSuccessful()) {
  throw new ProcessFailedException($process6);
 }
  echo $process6->getOutput();
  echo '<img src="\image\ms_logo_displace_mask_phone1.png">';
 
  $process7 = new Process('magick convert ^
  '.$path.'\design'. $imageName1. ' ^
  '.$path.'\image\ms_light_map-phone1.png ^
  -geometry -340-320 ^
  -compose Multiply -composite ^
  '.$path.'\image\ms_logo_displace_mask_phone1.png ^
  -compose CopyOpacity -composite ^
  '.$path.'\image\ms_light_map_logo_phone1.png
  ');
 
 $process7->run();
 if (!$process7->isSuccessful()) {
 throw new ProcessFailedException($process7);
 }
 echo $process7->getOutput();
 echo '<img src="\image\ms_light_map_logo_phone1.png">';

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
 $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 340, 320);
 $src2->writeImage(public_path("image/output1.png"));
  $process5 = new Process('magick  convert '.$path.'\image\output1.png 
  -flatten  '.$path.'\image'.$imageRandom1.'
 ');
    $process5->run();
       if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
       }
        echo $process5->getOutput();
       

        
        $imageRandom = ltrim($imageRandom1, '/');

        $check1 = DB::table('images')->insert([
         'name' => $imageRandom, 'product_id' => $id, 'color' => 'transparent', 'size' => "Samsung Galaxy S20+"
        ]);

        $process10 = new Process('magick  convert '.$path.'\site-images\Samsung-S20Plus-Bezpozadine.png -background "rgb(0,0,0)" 
        -flatten  '.$path.'\image\Samsung-S20Plus-Crna.png
       ');
          $process10->run();
             if (!$process10->isSuccessful()) {
              throw new ProcessFailedException($process10);
             }
              echo $process10->getOutput();
              echo '<img src="\image\Samsung-S20Plus-Crna.png">'; 


 /* $src1 = new \Imagick(public_path("\image\ms_light_map_logo_phone.png")); */

 $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
 $name = mt_rand(1000000, 9999999)
     . mt_rand(1000000, 9999999)
     . $characters[rand(0, strlen($characters) - 1)];
 
 $string = str_shuffle($name);
 $string .=  round(microtime(true) * 1000);
 $imageRandom2 = '/' . $string . '.png'; 
 

 
 $process8 = new Process('magick convert ^
 '.$path.'\image\Samsung-S20Plus-Crna.png ^
 '.$path.'\image\output1.png ^
 -compose ATop -composite ^
 
 -depth 16 ^
 '.$path.'\image'.$imageRandom2.'
 ');
 
 $process8->run();
 if (!$process8->isSuccessful()) {
 throw new ProcessFailedException($process8);
 }
 echo $process8->getOutput();
 
 $imageRandom2 = ltrim($imageRandom2, '/');

 $check2 = DB::table('images')->insert([
  'name' => $imageRandom2, 'product_id' => $id, 'color' => 'black', 'size' => "Samsung Galaxy S20+"
 ]);

 return $check2;
 }

    

    public static function samsungP20PhoneCase($id, $image){
        $imageName1 = "/" .  $image; 
      
        $path = public_path();

  $src1 = new \Imagick(public_path("design". $imageName1));
  $src1->resizeImage(400, null,\Imagick::FILTER_LANCZOS,1); 
  $src1->writeImage(public_path("design". $imageName1));
 $src2 = new \Imagick(public_path("\site-images\Samsung-P20-Bezpozadine.png"));
 
 
 
  $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
 
  $process5 = new Process('magick convert ^
 '.$path.'\site-images\Samsung-P20-Bezpozadine.png ^
  -channel A -blur 0x8
  -compose hardlight
  '.$path.'\image\ms_light_map-phone1.png
   ');
 
   /* Makao sam komandu -separate proces 5   -colorspace gray -auto-level ^
  -blur 0x3 ^
  -contrast-stretch 0,50%% ^
  -depth 16 ^  -negate  -channel A -blur 0x8*/
 
 $process5->run();
 if (!$process5->isSuccessful()) {
  throw new ProcessFailedException($process5);
 }
  echo $process5->getOutput();
  echo '<img src="\image\ms_light_map-phone1.png">';
 
  $process6 = new Process('magick convert ^
  '.$path.'\design'. $imageName1. ' ^
  -channel matte -separate ^
  '.$path.'\image\ms_logo_displace_mask_phone1.png
   ');

  
 
 $process6->run();
 if (!$process6->isSuccessful()) {
  throw new ProcessFailedException($process6);
 }
  echo $process6->getOutput();
  echo '<img src="\image\ms_logo_displace_mask_phone1.png">';
 
  $process7 = new Process('magick convert ^
  '.$path.'\design'. $imageName1. ' ^
  '.$path.'\image\ms_light_map-phone1.png ^
  -geometry -340-320 ^
  -compose Multiply -composite ^
  '.$path.'\image\ms_logo_displace_mask_phone1.png ^
  -compose CopyOpacity -composite ^
  '.$path.'\image\ms_light_map_logo_phone1.png
  ');
 
 $process7->run();
 if (!$process7->isSuccessful()) {
 throw new ProcessFailedException($process7);
 }
 echo $process7->getOutput();
 echo '<img src="\image\ms_light_map_logo_phone1.png">';

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
 $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 340, 320);
 $src2->writeImage(public_path("image/output1.png"));
  $process5 = new Process('magick  convert '.$path.'\image\output1.png 
  -flatten  '.$path.'\image'.$imageRandom1.'
 ');
    $process5->run();
       if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
       }
        echo $process5->getOutput();

        $imageRandom = ltrim($imageRandom1, '/');

        $check1 = DB::table('images')->insert([
         'name' => $imageRandom, 'product_id' => $id, 'color' => 'transparent', 'size' => "Samsung Galaxy S20"
        ]);
     
     

        $process10 = new Process('magick  convert '.$path.'\site-images\Samsung-P20-Bezpozadine.png -background "rgb(0,0,0)" 
        -flatten  '.$path.'\site-images\SamsungGalaxy-P20-Crna.png
       ');
          $process10->run();
             if (!$process10->isSuccessful()) {
              throw new ProcessFailedException($process10);
             }
              echo $process10->getOutput();
         


 
 $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
 $name = mt_rand(1000000, 9999999)
     . mt_rand(1000000, 9999999)
     . $characters[rand(0, strlen($characters) - 1)];
 
 $string = str_shuffle($name);
 $string .=  round(microtime(true) * 1000);
 $imageRandom2 = '/' . $string . '.png'; 
 
 $process8 = new Process('magick convert ^
 '.$path.'\site-images\SamsungGalaxy-P20-Crna.png ^
 '.$path.'\image\output1.png ^
 -compose ATop -composite ^
 -depth 16 ^
 '.$path.'\image'.$imageRandom2.'
 ');
 
 $process8->run();
 if (!$process8->isSuccessful()) {
 throw new ProcessFailedException($process8);
 }
 echo $process8->getOutput();

 $imageRandom2 = ltrim($imageRandom2, '/');

 $check2 = DB::table('images')->insert([
  'name' => $imageRandom2, 'product_id' => $id, 'color' => 'black', 'size' => "Samsung Galaxy S20"
 ]);

 return $check2;
     
    }

    public static function iphonePhoneCase($id, $image){
        $path = public_path();
        $imageName1 = "/" .  $image; 
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(400, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("design". $imageName1));
       $src2 = new \Imagick(public_path("\site-images\Iphone-II-Pro-Bezpozadine1.png"));
       $src3 = new \Imagick(public_path("\site-images\Iphone-II-Pro.jpg"));
       
       
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
       
        $process5 = new Process('magick convert ^
       '.$path.'\site-images\Iphone-II-Pro.jpg ^
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-phone1.png
         ');
     
       
       $process5->run();
       if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
       }
        echo $process5->getOutput();
        echo '<img src="\image\ms_light_map-phone1.png">';
       
        $process6 = new Process('magick convert ^
        '.$path.'\design'. $imageName1. ' ^
        -channel matte -separate ^
        '.$path.'\image\ms_logo_displace_mask_phone1.png
         ');
     
        
       
       $process6->run();
       if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
       }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask_phone1.png">';
       
        $process7 = new Process('magick convert ^
        '.$path.'\design'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-phone1.png ^
        -geometry -340-320^
        -compose Multiply -composite ^
        '.$path.'\image\ms_logo_displace_mask_phone1.png ^
        -compose CopyOpacity -composite ^
        '.$path.'\image\ms_light_map_logo_phone1.png
        ');
       
       $process7->run();
       if (!$process7->isSuccessful()) {
       throw new ProcessFailedException($process7);
       }
       echo $process7->getOutput();
       echo '<img src="\image\ms_light_map_logo_phone1.png">';
       
       $src1->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
       $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
       $src = new \Imagick(public_path("\image\ms_light_map_logo_phone1.png"));
       $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 340, 320);
       $src2->writeImage(public_path("image/output1.png"));
        
       $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
       $name = mt_rand(1000000, 9999999)
           . mt_rand(1000000, 9999999)
           . $characters[rand(0, strlen($characters) - 1)];
       
       $string = str_shuffle($name);
       $string .=  round(microtime(true) * 1000);
       $imageRandom1 = '/' . $string . '.png'; 

       $src2->writeImage(public_path("image".$imageRandom1));

       $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
       $name = mt_rand(1000000, 9999999)
           . mt_rand(1000000, 9999999)
           . $characters[rand(0, strlen($characters) - 1)];
       
       $string = str_shuffle($name);
       $string .=  round(microtime(true) * 1000);
       $imageRandom = '/' . $string . '.png';

        $process5 = new Process('magick  convert '.$path.'\image\output1.png -background "rgb(0,0,0)"
         -flatten  '.$path.'\image'.$imageRandom.' 
       ');
          $process5->run();
             if (!$process5->isSuccessful()) {
              throw new ProcessFailedException($process5);
             }
              echo $process5->getOutput();
              echo '<img src="\image'.$imageRandom.'">'; 
     
      
              $imageRandom = ltrim($imageRandom, '/');

       $check = DB::table('images')->insert([
        'name' => $imageRandom, 'product_id' => $id, 'color' => 'black', 'size' => 'iPhone XI Pro'
       ]);

       $imageRandom1 = ltrim($imageRandom1, '/');

       $check1 = DB::table('images')->insert([
        'name' => $imageRandom1, 'product_id' => $id, 'color' => 'transparent', 'size' => 'iPhone XI Pro'
       ]);
    
       return $check;
       dd();
       
       $process8 = new Process('magick convert ^
       '.$path.'\image\ms_light_map-phone1.png ^
       '.$path.'\image\output1.png ^
       -compose ATop -composite ^
       
       -depth 16 ^
       '.$path.'\image\ms_product_phone1.png
       ');
       
       $process8->run();
       if (!$process8->isSuccessful()) {
       throw new ProcessFailedException($process8);
       }
       echo $process8->getOutput();
       echo '<img src="\image\ms_product_phone1.png">';


    }

    public static function canvas($id, $image){
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(700, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("canvas_picture". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Canvas-mockup-thumbnail.png"));
        $src2->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src2->writeImage(public_path("\site-images\Canvas-mockup-thumbnail.png"));
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
        $process5 = new Process('magick convert ^
        '.$path.'\site-images\Canvas-mockup-thumbnail.png ^
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-canvas.png
        ');
        
        /* Makao sam komandu -separate proces 5   -colorspace gray -auto-level ^
        -blur 0x3 ^
        -contrast-stretch 0,50%% ^
        -depth 16 ^  -negate  -channel A -blur 0x8*/
        
        $process5->run();
        if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
        }
        echo $process5->getOutput();
        echo '<img src="\image\ms_light_map-canvas.png">';
        
        $process6 = new Process('magick convert ^
        '.$path.'\canvas_picture'. $imageName1. ' ^
        -channel matte -separate ^
        '.$path.'\image\ms_logo_displace_mask_canvas.png
        ');
        
        
        
        $process6->run();
        if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
        }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask_canvas.png">';
        
        $process7 = new Process('magick convert ^
        '.$path.'\canvas_picture'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-canvas.png ^
        -geometry -390-450 ^
        -compose Multiply -composite ^
        '.$path.'\image\ms_logo_displace_mask_canvas.png ^
        -compose CopyOpacity -composite ^
        '.$path.'\image\ms_light_map_logo_canvas.png
        ');
        
        $process7->run();
        if (!$process7->isSuccessful()) {
        throw new ProcessFailedException($process7);
        }
        echo $process7->getOutput();
        echo '<img src="\image\ms_light_map_logo_canvas.png">';
   
   
        $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,390,450);
        $src2->writeImage(public_path("image\image-canvas.png"));
        echo '<img src="\image\image-canvas.png">';
        $src4 = new \Imagick(public_path("site-images/Textura-Canvas-mockup.png"));
        $src4->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src4->writeImage(public_path("\site-images/Textura-Canvas-mockup.png"));
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
          'name' => $imageRandom, 'product_id' => $id
         ]);
      
         return $check;

     
    }

    public static function wallpaper($id, $image){
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
       
       
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(80, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("canvas_picture". $imageName1));
       $Y = $src1->getImageHeight()/2;
        $process = new Process('magick convert '.$path.'/canvas_picture'.$imageName1.' -roll +0+'. $Y . ' ' .$path.'/image/_orange_270_r.png
   ');
   
   $process->run();
   if (!$process->isSuccessful()) {
   throw new ProcessFailedException($process);
   }
   echo $process->getOutput();
   echo '<img src="\image\_orange_270_r.png">';
   
   $process1 = new Process('magick  montage  '.$path.'/canvas_picture'.$imageName1.' +clone +clone +clone -tile x4 
   -geometry +0+0  '.$path.'/image/_1col.png
   ');
   
   $process1->run();
   if (!$process1->isSuccessful()) {
   throw new ProcessFailedException($process1);
   }
   echo $process1->getOutput();
   echo '<img src="\image\_1col.png">';
   
   $process2 = new Process('magick  montage  '.$path.'/image/_orange_270_r.png +clone +clone +clone
    -tile x4 -geometry +0+0  '.$path.'/image/_2col.png
   
   
   ');
   
   $process2->run();
   if (!$process2->isSuccessful()) {
   throw new ProcessFailedException($process2);
   }
   echo $process2->getOutput();
   echo '<img src="\image\_2col.png">';
   
   $process3 = new Process('magick  montage -geometry +0+0 '.$path.'/image/_1col.png '.$path.'/image/_2col.png '.$path.'/image/_2cols.png
   ');
   
   $process3->run();
   if (!$process3->isSuccessful()) {
   throw new ProcessFailedException($process3);
   }
   echo $process3->getOutput();
   echo '<img src="\image\_2cols.png">';
   
   $process4 = new Process('magick  convert '.$path.'/image/_2cols.png -write mpr:tile  +delete -size 1920x1080 tile:mpr:tile '.$path.'/image/_wallpap.png
   ');
   
   $process4->run();
   if (!$process4->isSuccessful()) {
   throw new ProcessFailedException($process4);
   }
   echo $process3->getOutput();
   echo '<img src="\image\_wallpap.png">';
   
   $src2 = new \Imagick(public_path("\site-images\Tapete-Thumbnail-mockup-2.png"));
   $src2->resizeImage(1000, null,\Imagick::FILTER_LANCZOS,1); 
   $src2->writeImage(public_path("\site-images\Tapete-Thumbnail-mockup-2.png"));
   
   
   
   $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
   
   $process5 = new Process('magick convert ^
   '.$path.'\site-images\Tapete-Thumbnail-mockup-2.png ^
   -channel A -blur 0x8
   -compose hardlight
   '.$path.'\image\ms_light_map-tapeta-2.png
   ');
   
   /* Makao sam komandu -separate proces 5   -colorspace gray -auto-level ^
   -blur 0x3 ^
   -contrast-stretch 0,50%% ^
   -depth 16 ^  -negate  -channel A -blur 0x8*/
   
   $process5->run();
   if (!$process5->isSuccessful()) {
   throw new ProcessFailedException($process5);
   }
   echo $process5->getOutput();
   echo '<img src="\image\ms_light_map-tapeta-2.png">';
   
   $process6 = new Process('magick convert ^
   '.$path.'/image/_wallpap.png ^
   
   '.$path.'\image\ms_logo_displace_mask_tapeta-2.png
   ');
   
   
   
   $process6->run();
   if (!$process6->isSuccessful()) {
   throw new ProcessFailedException($process6);
   }
   echo $process6->getOutput();
   echo '<img src="\image\ms_logo_displace_mask_tapeta-2.png">';
   
   $process7 = new Process('magick convert ^
   '.$path.'\image/_wallpap.png ^
   '.$path.'\image\ms_light_map-tapeta-2.png ^
   -geometry -0-0 ^
   
   '.$path.'\image\ms_logo_displace_mask_tapeta-2.png ^
   
   ');
   
   $process7->run();
   if (!$process7->isSuccessful()) {
   throw new ProcessFailedException($process7);
   }
   echo $process7->getOutput();
   echo '<img src="\image\ms_light_map_logo_tapeta-2.png">';
   
   $src1->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
   $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
   $src = new \Imagick(public_path("\image\ms_light_map_logo_tapeta-2.png"));
   $src3 = new \Imagick(public_path("image/_wallpap.png"));
   $src2->compositeImage($src3, \Imagick::COMPOSITE_DSTOVER, 0, 0);
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
         'name' => $imageRandom, 'product_id' => $id, 'size' => 'vertical'
        ]);
     
        return $check;
    }

    public static function wallpaperThumb($id, $image){
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
       
       
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(80, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("canvas_picture". $imageName1));
       $Y = $src1->getImageHeight()/2;
        $process = new Process('magick convert '.$path.'/canvas_picture'.$imageName1.' -roll +0+'. $Y . ' ' .$path.'/image/_orange_270_r.png
   ');
   
   $process->run();
   if (!$process->isSuccessful()) {
   throw new ProcessFailedException($process);
   }
   echo $process->getOutput();
   echo '<img src="\image\_orange_270_r.png">';
   
   $process1 = new Process('magick  montage  '.$path.'/canvas_picture'.$imageName1.' +clone +clone +clone -tile x4 
   -geometry +0+0  '.$path.'/image/_1col.png
   ');
   
   $process1->run();
   if (!$process1->isSuccessful()) {
   throw new ProcessFailedException($process1);
   }
   echo $process1->getOutput();
   echo '<img src="\image\_1col.png">';
   
   $process2 = new Process('magick  montage  '.$path.'/image/_orange_270_r.png +clone +clone +clone
    -tile x4 -geometry +0+0  '.$path.'/image/_2col.png
   
   
   ');
   
   $process2->run();
   if (!$process2->isSuccessful()) {
   throw new ProcessFailedException($process2);
   }
   echo $process2->getOutput();
   echo '<img src="\image\_2col.png">';
   
   $process3 = new Process('magick  montage -geometry +0+0 '.$path.'/image/_1col.png '.$path.'/image/_2col.png '.$path.'/image/_2cols.png
   ');
   
   $process3->run();
   if (!$process3->isSuccessful()) {
   throw new ProcessFailedException($process3);
   }
   echo $process3->getOutput();
   echo '<img src="\image\_2cols.png">';
   
   $process4 = new Process('magick  convert '.$path.'/image/_2cols.png -write mpr:tile  +delete -size 1920x1080 tile:mpr:tile '.$path.'/image/_wallpap.png
   ');
   
   $process4->run();
   if (!$process4->isSuccessful()) {
   throw new ProcessFailedException($process4);
   }
   echo $process3->getOutput();
   echo '<img src="\image\_wallpap.png">';
   
   $src2 = new \Imagick(public_path("\site-images\Tapete-Thumbnail-mockup.png"));
   $src2->resizeImage(1000, null,\Imagick::FILTER_LANCZOS,1); 
   $src2->writeImage(public_path("\site-images\Tapete-Thumbnail-mockup.png"));
   
   
   
   $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
   
   $process5 = new Process('magick convert ^
   '.$path.'\site-images\Tapete-Thumbnail-mockup.png ^
   -channel A -blur 0x8
   -compose hardlight
   '.$path.'\image\ms_light_map-tapeta-2.png
   ');
   
   /* Makao sam komandu -separate proces 5   -colorspace gray -auto-level ^
   -blur 0x3 ^
   -contrast-stretch 0,50%% ^
   -depth 16 ^  -negate  -channel A -blur 0x8*/
   
   $process5->run();
   if (!$process5->isSuccessful()) {
   throw new ProcessFailedException($process5);
   }
   echo $process5->getOutput();
   echo '<img src="\image\ms_light_map-tapeta-2.png">';
   
   $process6 = new Process('magick convert ^
   '.$path.'/image/_wallpap.png ^
   
   '.$path.'\image\ms_logo_displace_mask_tapeta-2.png
   ');
   
   
   
   $process6->run();
   if (!$process6->isSuccessful()) {
   throw new ProcessFailedException($process6);
   }
   echo $process6->getOutput();
   echo '<img src="\image\ms_logo_displace_mask_tapeta-2.png">';
   
   $process7 = new Process('magick convert ^
   '.$path.'\image/_wallpap.png ^
   '.$path.'\image\ms_light_map-tapeta-2.png ^
   -geometry -0-0 ^
   
   '.$path.'\image\ms_logo_displace_mask_tapeta-2.png ^
   
   ');
   
   $process7->run();
   if (!$process7->isSuccessful()) {
   throw new ProcessFailedException($process7);
   }
   echo $process7->getOutput();
   echo '<img src="\image\ms_light_map_logo_tapeta-2.png">';
   
   $src1->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
   $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
   $src = new \Imagick(public_path("\image\ms_light_map_logo_tapeta-2.png"));
   $src3 = new \Imagick(public_path("image/_wallpap.png"));
   $src2->compositeImage($src3, \Imagick::COMPOSITE_DSTOVER, 0, 0);
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
         'name' => $imageRandom, 'product_id' => $id, 'size' => 'thumb'
        ]);
     
        return $check;
    }


}
