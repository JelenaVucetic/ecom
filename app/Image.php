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
  
          $process = new Process('magick convert   '.$path.'\site-images\U-one-16.jpg[403x422+560+631] 
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
         '.$path.'\site-images\U-one-16.jpg[403x422+560+631] 
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
         '.$path.'\site-images\U-one-16.jpg[403x422+560+631] ^
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
  
       
        
      $X = 560 + (403-$width)/2;
      $Y = 631 +  (422-$height)/2;
      
       
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
    'name' => $imageRandom, 'product_id' => $id, 'color' => 'white', 'position' => 'front'
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
  
        
  
         $process = new Process('magick convert   '.$path.'\site-images\U-one-13.jpg[403x422+540+561] 
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
         '.$path.'\site-images\U-one-13.jpg[403x422+540+561] 
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
         '.$path.'\site-images\U-one-13.jpg[403x422+540+561] ^
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
            'name' => $imageRandom, 'product_id' => $id, 'color' => 'navy', 'position' => 'front'
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
 
         $process = new Process('magick convert   '.$path.'\site-images\U-one-6.jpg[403x422+570+601] 
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
        '.$path.'\site-images\U-one-6.jpg[403x422+570+601] 
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
        '.$path.'\site-images\U-one-6.jpg[403x422+570+601] ^
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
       
   $X = 570 + (403-$width)/2;
   $Y = 601 +  (422-$height)/2;
       
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
        'name' => $imageRandom, 'product_id' => $id, 'color' => 'red', 'position' => 'front'
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
         '.$path.'\site-images\U-one-5.jpg[403x422+535+601] 
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
         '.$path.'\site-images\U-one-5.jpg[403x422+535+601] ^
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
        
    $X = 535 + (403-$width)/2;
    $Y = 601 +  (422-$height)/2;

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
            'name' => $imageRandom, 'product_id' => $id, 'color' => 'black', 'position' => 'front'
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
 
        $process = new Process('magick convert   '.$path.'\site-images\U-one-3.jpg[403x422+535+601] 
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
        '.$path.'\site-images\U-one-3.jpg[403x422+535+601] 
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
        '.$path.'\site-images\U-one-3.jpg[403x422+535+601] ^
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
      
   $X = 535 + (403-$width)/2;
   $Y = 601 +  (422-$height)/2;

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
           'name' => $imageRandom, 'product_id' => $id, 'color' => 'black', 'position' => 'back'
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
 
        $process = new Process('magick convert   '.$path.'\site-images\U-one-15.jpg[303x322+615+751] 
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
        '.$path.'\site-images\U-one-15.jpg[303x322+615+751] 
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
        '.$path.'\site-images\U-one-15.jpg[303x322+615+751] ^
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
       
   $X = 615 + (303-$width)/2;
   $Y = 751 +  (322-$height)/2;

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
           'name' => $imageRandom, 'product_id' => $id, 'color' => 'navy', 'position' => 'back'
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
 
        $process = new Process('magick convert   '.$path.'\site-images\U-one-8.jpg[303x322+625+731] 
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
        '.$path.'\site-images\U-one-8.jpg[303x322+625+731] 
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
        '.$path.'\site-images\U-one-8.jpg[303x322+625+731] ^
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
   $Y = 731 +  (322-$height)/2;

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
           'name' => $imageRandom, 'product_id' => $id, 'color' => 'red', 'position' => 'back'
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
 
        $process = new Process('magick convert   '.$path.'\site-images\U-one-18.jpg[303x322+610+731] 
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
        '.$path.'\site-images\U-one-18.jpg[303x322+610+731] 
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
        '.$path.'\site-images\U-one-18.jpg[303x322+610+731] ^
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
       
        $X = 610 + (303-$width)/2;
        $Y = 731 +  (322-$height)/2;
        
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
           'name' => $imageRandom, 'product_id' => $id, 'color' => 'white', 'position' => 'back'
          ]);
       
          return $check;
       
       
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

        $imageRandom1 = ltrim($imageRandom1, '/');

        $check1 = DB::table('images')->insert([
         'name' => $imageRandom1, 'product_id' => $id, 'color' => 'transparent'
        ]);
     
        return $check1;
     
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
        'name' => $imageRandom, 'product_id' => $id, 'color' => 'black'
       ]);

       $imageRandom1 = ltrim($imageRandom1, '/');

       $check1 = DB::table('images')->insert([
        'name' => $imageRandom1, 'product_id' => $id, 'color' => 'transparent'
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
}
