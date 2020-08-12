<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use DB;


/**
 * App\Image
 *
 * @property int $id
 * @property string $name
 * @property int $product_id
 * @property string $color
 * @property string $position
 * @property string $gender
 * @property string $size
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Framed-Art-Black-A3-Mask.png"));
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
        $process5 = new Process('magick convert ^
        '.$path.'\site-images\Framed-Art-Black-A3-Mask.png ^
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-A3-black.png
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
        echo '<img src="\image\ms_light_map-A3-black.png">';
        
        $process6 = new Process('magick convert ^
        '.$path.'\resized_pictures'. $imageName1. ' ^
        -channel matte -separate ^
        '.$path.'\image\ms_logo_displace_mask_A3-black.png
        ');
        
        
        
        $process6->run();
        if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
        }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask_A3-black.png">';
        
        $process7 = new Process('magick convert ^
        '.$path.'\resized_pictures'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-A3-black.png ^
        -geometry -300-250 ^
        -compose Multiply -composite ^
        '.$path.'\image\ms_logo_displace_mask_A3-black.png ^
        -compose CopyOpacity -composite ^
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
    /*  $src2->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
     $src2->writeImage(public_path("\site-images\Canvas-mockup-thumbnail.png")); */
     
     $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
     
     $process5 = new Process('magick convert ^
     '.$path.'\site-images\Framed-Art-Black-A3-Mask.png ^
     -channel A -blur 0x8
     -compose hardlight
     '.$path.'\image\ms_light_map-A3-black.png
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
     echo '<img src="\image\ms_light_map-A3-black.png">';
     
     $process6 = new Process('magick convert ^
     '.$path.'\design'. $imageName1. ' ^
     -channel matte -separate ^
     '.$path.'\image\ms_logo_displace_mask_A3-black.png
     ');
     
     
     
     $process6->run();
     if (!$process6->isSuccessful()) {
     throw new ProcessFailedException($process6);
     }
     echo $process6->getOutput();
     echo '<img src="\image\ms_logo_displace_mask_A3-black.png">';
     
     $process7 = new Process('magick convert ^
     '.$path.'\design'. $imageName1. ' ^
     '.$path.'\image\ms_light_map-A3-black.png ^
     -geometry -300-250 ^
     -compose Multiply -composite ^
     '.$path.'\image\ms_logo_displace_mask_A3-black.png ^
     -compose CopyOpacity -composite ^
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
        '.$path.'\resized_pictures'. $imageName1. ' ^
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
        '.$path.'\resized_pictures'. $imageName1. ' ^
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
        $src1->resizeImage(500, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Framed-Art-White-A3-Mask.png"));
       /*  $src2->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src2->writeImage(public_path("\site-images\Canvas-mockup-thumbnail.png")); */
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
        $process5 = new Process('magick convert ^
        '.$path.'\site-images\Framed-Art-White-A3-Mask.png ^
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-A3-white.png
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
        echo '<img src="\image\ms_light_map-A3-white.png">';
        
        $process6 = new Process('magick convert ^
        '.$path.'\resized_pictures'. $imageName1. ' ^
        -channel matte -separate ^
        '.$path.'\image\ms_logo_displace_mask_A3-white.png
        ');
        
        
        
        $process6->run();
        if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
        }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask_A3-white.png">';
        
        $process7 = new Process('magick convert ^
        '.$path.'\resized_pictures'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-A3-white.png ^
        -geometry -360-340 ^
        -compose Multiply -composite ^
        '.$path.'\image\ms_logo_displace_mask_A3-white.png ^
        -compose CopyOpacity -composite ^
        '.$path.'\image\ms_light_map_logo_A3-white.png
        ');
        
        $process7->run();
        if (!$process7->isSuccessful()) {
        throw new ProcessFailedException($process7);
        }
        echo $process7->getOutput();
        echo '<img src="\image\ms_light_map_logo_A3-white.png">';
   
   
        $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,360,340);
        $src2->writeImage(public_path("image\image-A3-white.png"));
        echo '<img src="\image\image-A3-white.png">';
        $src4 = new \Imagick(public_path("site-images/Framed-Art-White-A3-BG.jpg"));
       /*  $src4->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src4->writeImage(public_path("\site-images/Textura-Canvas-mockup.png")); */
         $src3 = new \Imagick(public_path("image/image-A3-white.png"));
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
        '.$path.'\resized_pictures'. $imageName1. ' ^
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
        '.$path.'\resized_pictures'. $imageName1. ' ^
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
        $src1->resizeImage(500, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Thumbnail-Framed-Art-White-A4-Mask.png"));
       /*  $src2->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src2->writeImage(public_path("\site-images\Canvas-mockup-thumbnail.png")); */
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
        $process5 = new Process('magick convert ^
        '.$path.'\site-images\Thumbnail-Framed-Art-White-A4-Mask.png ^
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-thumb-white.png
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
        echo '<img src="\image\ms_light_map-thumb-white.png">';
        
        $process6 = new Process('magick convert ^
        '.$path.'\resized_pictures'. $imageName1. ' ^
        -channel matte -separate ^
        '.$path.'\image\ms_logo_displace_mask_thumb-white.png
        ');
        
        
        
        $process6->run();
        if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
        }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask_thumb-white.png">';
        
        $process7 = new Process('magick convert ^
        '.$path.'\resized_pictures'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-thumb-white.png ^
        -geometry -290-280 ^
        -compose Multiply -composite ^
        '.$path.'\image\ms_logo_displace_mask_thumb-white.png ^
        -compose CopyOpacity -composite ^
        '.$path.'\image\ms_light_map_logo_thumb-white.png
        ');
        
        $process7->run();
        if (!$process7->isSuccessful()) {
        throw new ProcessFailedException($process7);
        }
        echo $process7->getOutput();
        echo '<img src="\image\ms_light_map_logo_thumb-white.png">';
   
   
        $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,290,280);
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
        '.$path.'\resized_pictures'. $imageName1. ' ^
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
        '.$path.'\resized_pictures'. $imageName1. ' ^
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
        $src1->resizeImage(400, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Framed-Art-White-B1-Mask.png"));
       /*  $src2->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src2->writeImage(public_path("\site-images\Canvas-mockup-thumbnail.png")); */
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
        $process5 = new Process('magick convert ^
        '.$path.'\site-images\Framed-Art-White-B1-Mask.png ^
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-B1-white.png
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
        echo '<img src="\image\ms_light_map-B1-white.png">';
        
        $process6 = new Process('magick convert ^
        '.$path.'\resized_pictures'. $imageName1. ' ^
        -channel matte -separate ^
        '.$path.'\image\ms_logo_displace_mask_B1-white.png
        ');
        
        
        
        $process6->run();
        if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
        }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask_B1-white.png">';
        
        $process7 = new Process('magick convert ^
        '.$path.'\resized_pictures'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-B1-white.png ^
        -geometry -340-300 ^
        -compose Multiply -composite ^
        '.$path.'\image\ms_logo_displace_mask_B1-white.png ^
        -compose CopyOpacity -composite ^
        '.$path.'\image\ms_light_map_logo_B1-white.png
        ');
        
        $process7->run();
        if (!$process7->isSuccessful()) {
        throw new ProcessFailedException($process7);
        }
        echo $process7->getOutput();
        echo '<img src="\image\ms_light_map_logo_B1-white.png">';
   
   
        $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,340,300);
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
        '.$path.'\resized_pictures'. $imageName1. ' ^
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
        '.$path.'\resized_pictures'. $imageName1. ' ^
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
        $src1->resizeImage(400, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Framed-Art-White-B2-Mask.png"));
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
        $process5 = new Process('magick convert ^
        '.$path.'\site-images\Framed-Art-White-B2-Mask.png ^
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-B2-white.png
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
        echo '<img src="\image\ms_light_map-B2-black.png">';
        
        $process6 = new Process('magick convert ^
        '.$path.'\resized_pictures'. $imageName1. ' ^
        -channel matte -separate ^
        '.$path.'\image\ms_logo_displace_mask_B2-white.png
        ');
        
        
        
        $process6->run();
        if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
        }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask_B2-white.png">';
        
        $process7 = new Process('magick convert ^
        '.$path.'\resized_pictures'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-B2-white.png ^
        -geometry -340-300 ^
        -compose Multiply -composite ^
        '.$path.'\image\ms_logo_displace_mask_B2-white.png ^
        -compose CopyOpacity -composite ^
        '.$path.'\image\ms_light_map_logo_B2-white.png
        ');
        
        $process7->run();
        if (!$process7->isSuccessful()) {
        throw new ProcessFailedException($process7);
        }
        echo $process7->getOutput();
        echo '<img src="\image\ms_light_map_logo_B2-white.png">';
   
   
        $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,340,300);
        $src2->writeImage(public_path("image\image-B2-white.png"));
        echo '<img src="\image\image-B2-white.png">';
        $src4 = new \Imagick(public_path("site-images/Framed-Art-White-B2-BG.png"));
       /*  $src4->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src4->writeImage(public_path("\site-images/Textura-Canvas-mockup.png")); */
         $src3 = new \Imagick(public_path("image/image-B2-white.png"));
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
           'name' => $imageRandom1, 'product_id' => $id, 'color' => 'white' , 'size' => 'B2'
          ]);
       
          return $check;
        dd();
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(700, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
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
        '.$path.'\resized_pictures'. $imageName1. ' ^
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
        '.$path.'\resized_pictures'. $imageName1. ' ^
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
        $src1->resizeImage(400, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Thumbnail-Framed-Art-Black-A4-Mask.png"));
       /*  $src2->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src2->writeImage(public_path("\site-images\Canvas-mockup-thumbnail.png")); */
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
        $process5 = new Process('magick convert ^
        '.$path.'\site-images\Thumbnail-Framed-Art-Black-A4-Mask.png ^
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-thumb-black.png
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
        echo '<img src="\image\ms_light_map-thumb-black.png">';
        
        $process6 = new Process('magick convert ^
        '.$path.'\resized_pictures'. $imageName1. ' ^
        -channel matte -separate ^
        '.$path.'\image\ms_logo_displace_mask_thumb-black.png
        ');
        
        
        
        $process6->run();
        if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
        }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask_thumb-black.png">';
        
        $process7 = new Process('magick convert ^
        '.$path.'\resized_pictures'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-thumb-black.png ^
        -geometry -340-300 ^
        -compose Multiply -composite ^
        '.$path.'\image\ms_logo_displace_mask_thumb-black.png ^
        -compose CopyOpacity -composite ^
        '.$path.'\image\ms_light_map_logo_thumb-black.png
        ');
        
        $process7->run();
        if (!$process7->isSuccessful()) {
        throw new ProcessFailedException($process7);
        }
        echo $process7->getOutput();
        echo '<img src="\image\ms_light_map_logo_thumb-black.png">';
   
   
        $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,340,300);
        $src2->writeImage(public_path("image\image-thumb-black.png"));
        echo '<img src="\image\image-thumb-black.png">';
        $src4 = new \Imagick(public_path("site-images/Thumbnail-Framed-Art-Black-A4-BG.png"));
         $src3 = new \Imagick(public_path("image/image-thumb-black.png"));
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
             'name' => $imageRandom1, 'product_id' => $id, 'color' => 'black' , 'size' => 'thumb'
            ]);
         
            return $check;

        dd();
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(700, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
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
        '.$path.'\resized_pictures'. $imageName1. ' ^
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
        '.$path.'\resized_pictures'. $imageName1. ' ^
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
        $src1->resizeImage(400, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Framed-Art-Black-B1-Mask.png"));
       /*  $src2->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src2->writeImage(public_path("\site-images\Canvas-mockup-thumbnail.png")); */
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
        $process5 = new Process('magick convert ^
        '.$path.'\site-images\Framed-Art-Black-B1-Mask.png ^
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-B1-black.png
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
        echo '<img src="\image\ms_light_map-B1-black.png">';
        
        $process6 = new Process('magick convert ^
        '.$path.'\resized_pictures'. $imageName1. ' ^
        -channel matte -separate ^
        '.$path.'\image\ms_logo_displace_mask_B1-black.png
        ');
        
        
        
        $process6->run();
        if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
        }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask_B1-black.png">';
        
        $process7 = new Process('magick convert ^
        '.$path.'\resized_pictures'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-B1-black.png ^
        -geometry -360-300 ^
        -compose Multiply -composite ^
        '.$path.'\image\ms_logo_displace_mask_B1-black.png ^
        -compose CopyOpacity -composite ^
        '.$path.'\image\ms_light_map_logo_B1-black.png
        ');
        
        $process7->run();
        if (!$process7->isSuccessful()) {
        throw new ProcessFailedException($process7);
        }
        echo $process7->getOutput();
        echo '<img src="\image\ms_light_map_logo_B1-black.png">';
   
   
        $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,360,300);
        $src2->writeImage(public_path("image\image-B1-black.png"));
        echo '<img src="\image\image-B1-black.png">';
        $src4 = new \Imagick(public_path("site-images/Framed-Art-Black-B1-BG.png"));
       /*  $src4->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src4->writeImage(public_path("\site-images/Textura-Canvas-mockup.png")); */
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

        dd();
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(700, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
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
        '.$path.'\resized_pictures'. $imageName1. ' ^
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
        '.$path.'\resized_pictures'. $imageName1. ' ^
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
        $src1->resizeImage(400, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Framed-Art-Black-B2-Mask.png"));
       /*  $src2->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src2->writeImage(public_path("\site-images\Canvas-mockup-thumbnail.png")); */
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
        $process5 = new Process('magick convert ^
        '.$path.'\site-images\Framed-Art-Black-B2-Mask.png ^
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-B2-black.png
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
        echo '<img src="\image\ms_light_map-B2-black.png">';
        
        $process6 = new Process('magick convert ^
        '.$path.'\resized_pictures'. $imageName1. ' ^
        -channel matte -separate ^
        '.$path.'\image\ms_logo_displace_mask_B2-black.png
        ');
        
        
        
        $process6->run();
        if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
        }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask_B2-black.png">';
        
        $process7 = new Process('magick convert ^
        '.$path.'\resized_pictures'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-B2-black.png ^
        -geometry -340-260 ^
        -compose Multiply -composite ^
        '.$path.'\image\ms_logo_displace_mask_B2-black.png ^
        -compose CopyOpacity -composite ^
        '.$path.'\image\ms_light_map_logo_B2-black.png
        ');
        
        $process7->run();
        if (!$process7->isSuccessful()) {
        throw new ProcessFailedException($process7);
        }
        echo $process7->getOutput();
        echo '<img src="\image\ms_light_map_logo_B2-black.png">';
   
   
        $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,340,260);
        $src2->writeImage(public_path("image\image-B2-black.png"));
        echo '<img src="\image\image-B2-black.png">';
        $src4 = new \Imagick(public_path("site-images/Framed-Art-Black-B2-BG.png"));
       /*  $src4->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src4->writeImage(public_path("\site-images/Textura-Canvas-mockup.png")); */
         $src3 = new \Imagick(public_path("image/image-B2-black.png"));
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
             'name' => $imageRandom1, 'product_id' => $id, 'color' => 'black', 'size' => 'B2'
            ]);
         
            return $check;

        dd();
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(550, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
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
        '.$path.'\resized_pictures'. $imageName1. ' ^
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
        '.$path.'\resized_pictures'. $imageName1. ' ^
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
    $src1->resizeImage(550, null,\Imagick::FILTER_LANCZOS,1); 
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
   -geometry -260-130 ^
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
   $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 260, 130);
   $src2->writeImage(public_path("image/output1.png"));
   $process5 = new Process('magick  convert '.$path.'\image\output1.png 
   -flatten  '.$path.'\image'.$imageRandom1.'
   ');
    $process5->run();
       if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
       }
        echo $process5->getOutput();
        echo '<img src="\design'.$imageName1.'">';
        echo '<img src="\image\out.png">'; 

        $imageRandom = ltrim($imageRandom1, '/');

        $check1 = DB::table('images')->insert([
         'name' => $imageRandom, 'product_id' => $id, 'color' => 'transparent' , 'size' => 'Huawei P20'
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
   
   
   /* $src1 = new \Imagick(public_path("\image\ms_light_map_logo_phone.png")); */
   
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
    'name' => $imageRandom2, 'product_id' => $id, 'color' => 'black', 'size' => "Huawei P20"
   ]);
  
   return $check2;


        dd();
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
       
    
       
   
   $src1 = new \Imagick(public_path("design". $imageName1));
   $src1->resizeImage(400, null,\Imagick::FILTER_LANCZOS,1); 
   $src1->writeImage(public_path("resized_pictures". $imageName1));
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
   '.$path.'\resized_pictures'. $imageName1. ' ^
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
   '.$path.'\resized_pictures'. $imageName1. ' ^
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
         'name' => $imageRandom, 'product_id' => $id, 'color' => 'transparent' , 'size' => 'Huawei P20'
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
  'name' => $imageRandom2, 'product_id' => $id, 'color' => 'black', 'size' => "Huawei P20"
 ]);

 return $check2;
     }

    public static function samsungS20PlusPhoneCase($id, $image){

        $imageName1 = "/" .  $image; 
  
        $path = public_path();

       
    
       
 
  $src1 = new \Imagick(public_path("design". $imageName1));
  $src1->resizeImage(550, null,\Imagick::FILTER_LANCZOS,1); 
  $src1->writeImage(public_path("resized_pictures". $imageName1));
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
  '.$path.'\resized_pictures'. $imageName1. ' ^
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
  '.$path.'\resized_pictures'. $imageName1. ' ^
  '.$path.'\image\ms_light_map-phone1.png ^
  -geometry -280-130 ^
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
 $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 280, 130);
 $src2->writeImage(public_path("image/output1.png"));

 $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
 $name = mt_rand(1000000, 9999999)
     . mt_rand(1000000, 9999999)
     . $characters[rand(0, strlen($characters) - 1)];
 
 $string = str_shuffle($name);
 $string .=  round(microtime(true) * 1000);
 $imageRandom1 = '/' . $string . '.png';

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

        dd();
        $imageName1 = "/" .  $image; 
  
        $path = public_path();
 
  $src1 = new \Imagick(public_path("design". $imageName1));
  $src1->resizeImage(400, null,\Imagick::FILTER_LANCZOS,1); 
  $src1->writeImage(public_path("resized_pictures". $imageName1));
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
  '.$path.'\resized_pictures'. $imageName1. ' ^
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
  '.$path.'\resized_pictures'. $imageName1. ' ^
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
  $src1->resizeImage(500, null,\Imagick::FILTER_LANCZOS,1); 
  $src1->writeImage(public_path("resized_pictures". $imageName1));
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
  '.$path.'\resized_pictures'. $imageName1. ' ^
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
  '.$path.'\resized_pictures'. $imageName1. ' ^
  '.$path.'\image\ms_light_map-phone1.png ^
  -geometry -280-130 ^
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
 $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 280, 130);
 $src2->writeImage(public_path("image/output1.png"));

 $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
 $name = mt_rand(1000000, 9999999)
     . mt_rand(1000000, 9999999)
     . $characters[rand(0, strlen($characters) - 1)];
 
 $string = str_shuffle($name);
 $string .=  round(microtime(true) * 1000);
 $imageRandom1 = '/' . $string . '.png'; 

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
        -flatten  '.$path.'\image\SamsungGalaxy-P20-Crna.png
       ');
          $process10->run();
             if (!$process10->isSuccessful()) {
              throw new ProcessFailedException($process10);
             }
              echo $process10->getOutput();
              echo '<img src="\image\SamsungGalaxy-P20-Crna.png">'; 


 
              $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
              $name = mt_rand(1000000, 9999999)
                  . mt_rand(1000000, 9999999)
                  . $characters[rand(0, strlen($characters) - 1)];
              
              $string = str_shuffle($name);
              $string .=  round(microtime(true) * 1000);
              $imageRandom2 = '/' . $string . '.png'; 

 
 $process8 = new Process('magick convert ^
 '.$path.'\image\SamsungGalaxy-P20-Crna.png ^
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


        dd();
        $imageName1 = "/" .  $image; 
      
        $path = public_path();

  $src1 = new \Imagick(public_path("design". $imageName1));
  $src1->resizeImage(400, null,\Imagick::FILTER_LANCZOS,1); 
  $src1->writeImage(public_path("resized_pictures". $imageName1));
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
  '.$path.'\resized_pictures'. $imageName1. ' ^
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
  '.$path.'\resized_pictures'. $imageName1. ' ^
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



     

        $imageName1 = "/" .  $image; 
  
        $path = public_path();
       
    
       
 
  $src1 = new \Imagick(public_path("design". $imageName1));
   $src1->resizeImage(550, null,\Imagick::FILTER_LANCZOS,1); 
  $src1->writeImage(public_path("resized_pictures". $imageName1)); 
 $src2 = new \Imagick(public_path("\site-images\Iphone-II-Pro-Bezpozadine1.png"));
 $src3 = new \Imagick(public_path("\site-images\Iphone-II-Pro.jpg"));
 
 
  $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
 
  $process5 = new Process('magick convert ^
 '.$path.'\site-images\Iphone-II-Pro.jpg ^
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
  '.$path.'\resized_pictures'. $imageName1. ' ^
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
  '.$path.'\resized_pictures'. $imageName1. ' ^
  '.$path.'\image\ms_light_map-phone1.png ^
  -geometry -260-120 ^
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
 $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 260, 120);
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

  $process5 = new Process('magick  convert '.$path.'\image\output1.png -background "rgb(0,0,0)" 
  -flatten  '.$path.'\image'.$imageRandom.'
 ');
    $process5->run();
       if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
       }
        echo $process5->getOutput();
        echo '<img src="\image\out.png">'; 

        $process10 = new Process('magick  convert '.$path.'\site-images\Iphone-II-Pro-Bezpozadine1.png -background "rgb(0,0,0)" 
        -flatten  '.$path.'\image\Iphone-II-Pro-Crna.png 
       ');
          $process10->run();
             if (!$process10->isSuccessful()) {
              throw new ProcessFailedException($process10);
             }
              echo $process10->getOutput();
              echo '<img src="\image\Iphone-II-Pro-Crna.png">'; 

 echo '<img src="/image/output1.png" alt="" />'; 
 /* $src1 = new \Imagick(public_path("\image\ms_light_map_logo_phone.png")); */
 
 
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
        $path = public_path();
        $imageName1 = "/" .  $image; 
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(400, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
       $src2 = new \Imagick(public_path("\site-images\Iphone-II-Pro-Bezpozadine.png"));
       $src3 = new \Imagick(public_path("\site-images\Iphone-II-Pro.jpg"));
       
       
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
       
        $process5 = new Process('magick convert ^
       '.$path.'\site-images\Iphone-II-Pro.jpg ^
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-iphone.png
         ');
     
       
       $process5->run();
       if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
       }
        echo $process5->getOutput();
        echo '<img src="\image\ms_light_map-iphone.png">';
       
        $process6 = new Process('magick convert ^
        '.$path.'\resized_pictures'. $imageName1. ' ^
        -channel matte -separate ^
        '.$path.'\image\ms_logo_displace_mask_iphone.png
         ');
     
        
       
       $process6->run();
       if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
       }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask_iphone.png">';
       
        $process7 = new Process('magick convert ^
        '.$path.'\resized_pictures'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-iphone.png ^
        -geometry -340-320^
        -compose Multiply -composite ^
        '.$path.'\image\ms_logo_displace_mask_iphone.png ^
        -compose CopyOpacity -composite ^
        '.$path.'\image\ms_light_map_logo_iphone.png
        ');
       
       $process7->run();
       if (!$process7->isSuccessful()) {
       throw new ProcessFailedException($process7);
       }
       echo $process7->getOutput();
       echo '<img src="\image\ms_light_map_logo_iphone.png">';
       
       $src1->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
       $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
       $src = new \Imagick(public_path("\image\ms_light_map_logo_iphone.png"));
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


    public static function customCase($id, $image){
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
       
    
       
   
   $src1 = new \Imagick(public_path("design". $imageName1));
    $src1->resizeImage(530, null,\Imagick::FILTER_LANCZOS,1); 
   $src1->writeImage(public_path("resized_pictures". $imageName1)); 
   $src2 = new \Imagick(public_path("\site-images\Custommaska.png"));
   
   
   
   $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
   
   $process5 = new Process('magick convert ^
   '.$path.'\site-images\Custommaska.png ^
   -channel A -blur 0x8
   -compose hardlight
   '.$path.'\image\ms_light_map-custom.png
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
   echo '<img src="\image\ms_light_map-custom.png">';
   
   $process6 = new Process('magick convert ^
   '.$path.'\resized_pictures'. $imageName1. ' ^
   -channel matte -separate ^
   '.$path.'\image\ms_logo_displace_mask_custom.png
   ');
   
   
   
   $process6->run();
   if (!$process6->isSuccessful()) {
   throw new ProcessFailedException($process6);
   }
   echo $process6->getOutput();
   echo '<img src="\image\ms_logo_displace_mask_custom.png">';
   
   $process7 = new Process('magick convert ^
   '.$path.'\resized_pictures'. $imageName1. ' ^
   '.$path.'\image\ms_light_map-custom.png ^
   -geometry -280-140 ^
   -compose Multiply -composite ^
   '.$path.'\image\ms_logo_displace_mask_custom.png ^
   -compose CopyOpacity -composite ^
   '.$path.'\image\ms_light_map_logo_custom.png
   ');
   
   $process7->run();
   if (!$process7->isSuccessful()) {
   throw new ProcessFailedException($process7);
   }
   echo $process7->getOutput();
   echo '<img src="\image\ms_light_map_logo_custom.png">';
   
   $src1->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
   $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
   $src = new \Imagick(public_path("\image\ms_light_map_logo_custom.png"));
   $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 280, 140);
   $src2->writeImage(public_path("image/custom1.png"));

   $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $name = mt_rand(1000000, 9999999)
       . mt_rand(1000000, 9999999)
       . $characters[rand(0, strlen($characters) - 1)];
   
   $string = str_shuffle($name);
   $string .=  round(microtime(true) * 1000);
   $imageRandom = '/' . $string . '.png';

   $process5 = new Process('magick  convert '.$path.'\image\custom1.png 
   -flatten  '.$path.'\image'.$imageRandom.'
   ');
    $process5->run();
       if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
       }
        echo $process5->getOutput();


        $imageRandom = ltrim($imageRandom, '/');

        $check = DB::table('images')->insert([
         'name' => $imageRandom, 'product_id' => $id, 'color' => 'white' ,'size' => 'custom'
        ]);
     
     

   
        $process10 = new Process('magick  convert '.$path.'\site-images\Custommaska.png -background "rgb(0,0,0)" 
        -flatten  '.$path.'\image\Custom-Crna.png
       ');
          $process10->run();
             if (!$process10->isSuccessful()) {
              throw new ProcessFailedException($process10);
             }
              echo $process10->getOutput();
              echo '<img src="\image\Custom-Crna.png">'; 
   
   
   /* $src1 = new \Imagick(public_path("\image\ms_light_map_logo_phone.png")); */
   $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $name = mt_rand(1000000, 9999999)
       . mt_rand(1000000, 9999999)
       . $characters[rand(0, strlen($characters) - 1)];
   
   $string = str_shuffle($name);
   $string .=  round(microtime(true) * 1000);
   $imageRandom1 = '/' . $string . '.png';
   
   $process8 = new Process('magick convert ^
   '.$path.'\image\Custom-Crna.png ^
   '.$path.'\image\custom1.png ^
   -compose ATop -composite ^
   
   -depth 16 ^
   '.$path.'\image'.$imageRandom1.'
   ');
   
   $process8->run();
   if (!$process8->isSuccessful()) {
   throw new ProcessFailedException($process8);
   }
   echo $process8->getOutput();

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
        
        $process5 = new Process('magick convert ^
        '.$path.'\site-images\U1-Canvas_Slika-Maska.png ^
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
        '.$path.'\resized_pictures'. $imageName1. ' ^
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
        '.$path.'\resized_pictures'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-canvas.png ^
        -geometry -350-250 ^
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

        dd();
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(700, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
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
        '.$path.'\resized_pictures'. $imageName1. ' ^
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
        '.$path.'\resized_pictures'. $imageName1. ' ^
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
        
        $process5 = new Process('magick convert ^
        '.$path.'\site-images\Canvas-mockup-thumbnail.png ^
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-canvas-thumb.png
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
        echo '<img src="\image\ms_light_map-canvas-thumb.png">';
        
        $process6 = new Process('magick convert ^
        '.$path.'\resized_pictures'. $imageName1. ' ^
        -channel matte -separate ^
        '.$path.'\image\ms_logo_displace_mask_canvas_thumb.png
        ');
        
        
        
        $process6->run();
        if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
        }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask_canvas_thumb.png">';
        
        $process7 = new Process('magick convert ^
        '.$path.'\resized_pictures'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-canvas-thumb.png ^
        -geometry -300-230 ^
        -compose Multiply -composite ^
        '.$path.'\image\ms_logo_displace_mask_canvas_thumb.png ^
        -compose CopyOpacity -composite ^
        '.$path.'\image\ms_light_map_logo_canvas_thumb.png
        ');
        
        $process7->run();
        if (!$process7->isSuccessful()) {
        throw new ProcessFailedException($process7);
        }
        echo $process7->getOutput();
        echo '<img src="\image\ms_light_map_logo_canvas_thumb.png">';
   
   
        $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,300,230);
        $src2->writeImage(public_path("image\image-canvas-thumb.png"));
        echo '<img src="\image\image-canvas-thumb.png">';
        $src4 = new \Imagick(public_path("site-images/U1-Canvas_Slika-BG.png"));
       /*  $src4->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src4->writeImage(public_path("\site-images/Textura-Canvas-mockup.png")); */
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

    public static function wallpaper($id, $image){

        $imageName1 = "/" .  $image; 

        $path = public_path();
   
       
       
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(80, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
       $Y = $src1->getImageHeight()/2;
        $process = new Process('magick convert '.$path.'/resized_pictures'.$imageName1.' -roll +0+'. $Y . ' ' .$path.'/image/_orange_270_r.png
   ');
   
   $process->run();
   if (!$process->isSuccessful()) {
   throw new ProcessFailedException($process);
   }
   echo $process->getOutput();
   echo '<img src="\image\_orange_270_r.png">';
   
   $process1 = new Process('magick  montage  '.$path.'/resized_pictures'.$imageName1.' +clone +clone +clone -tile x4 
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
   
   $src2 = new \Imagick(public_path("\site-images\Wall-Wallpapers-Mask.png"));

   
   
   
   $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
   
   $process5 = new Process('magick convert ^
   '.$path.'\site-images\Wall-Wallpapers-Mask.png ^
   -channel A -blur 0x8
   -compose hardlight
   '.$path.'\image\ms_light_map-tapeta-2.png
   ');
   

   
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
   $process5 = new Process('magick  convert '.$path.'\image\output1.png 
   -flatten  '.$path.'\image\out.png 
   ');
    $process5->run();
       if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
       }
        echo $process5->getOutput();
        echo '<img src="\image\out.png">';

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom = '/' . $string . '.png';
   
        $process6 = new Process('magick  convert '.$path.'\image\out.png ^
        '.$path.'\site-images\Wall-Wallpapers-BG.png ^
        -compose Multiply -composite ^
         '.$path.'\image'.$imageRandom.'
   ');
    $process6->run();
       if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
       }
        echo $process6->getOutput();
        
        $imageRandom = ltrim($imageRandom, '/');

        $check = DB::table('images')->insert([
         'name' => $imageRandom, 'product_id' => $id, 'size' => 'vertical'
        ]);
     
        return $check;


        dd();
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
       
       
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(80, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
       $Y = $src1->getImageHeight()/2;
        $process = new Process('magick convert '.$path.'/resized_pictures'.$imageName1.' -roll +0+'. $Y . ' ' .$path.'/image/_orange_270_r.png
   ');
   
   $process->run();
   if (!$process->isSuccessful()) {
   throw new ProcessFailedException($process);
   }
   echo $process->getOutput();
   echo '<img src="\image\_orange_270_r.png">';
   
   $process1 = new Process('magick  montage  '.$path.'/resized_pictures'.$imageName1.' +clone +clone +clone -tile x4 
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
   /* echo '<img src="\image\ms_light_map_logo_tapeta-2.png">'; */
   
   $src1->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
   $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
  /*  $src = new \Imagick(public_path("\image\ms_light_map_logo_tapeta-2.png")); */
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
        $src1->writeImage(public_path("resized_pictures". $imageName1));
       $Y = $src1->getImageHeight()/2;
        $process = new Process('magick convert '.$path.'/resized_pictures'.$imageName1.' -roll +0+'. $Y . ' ' .$path.'/image/_orange_270_r.png
   ');
   
   $process->run();
   if (!$process->isSuccessful()) {
   throw new ProcessFailedException($process);
   }
   echo $process->getOutput();
   echo '<img src="\image\_orange_270_r.png">';
   
   $process1 = new Process('magick  montage  '.$path.'/resized_pictures'.$imageName1.' +clone +clone +clone -tile x4 
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
  /*  echo '<img src="\image\ms_light_map_logo_tapeta-2.png">'; */
   
   $src1->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
   $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
 /*   $src = new \Imagick(public_path("\image\ms_light_map_logo_tapeta-2.png")); */
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

    public static function clock($id, $image){
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
       
    
       
   
   $src1 = new \Imagick(public_path("design". $imageName1));
   $src1->resizeImage(500, null,\Imagick::FILTER_LANCZOS,1); 
   $imageName1 = ltrim($imageName1, '/');
   $imageName1 = "/clock" .  $imageName1; 
   $src1->writeImage(public_path("resized_pictures". $imageName1));
   $src2 = new \Imagick(public_path("\site-images\SatCrni.png"));
   $src3 = new \Imagick(public_path("\site-images\SatBijeli.png"));
   
   
   $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
   
   $process5 = new Process('magick convert ^
   '.$path.'\site-images\SatCrni.png ^
   -channel A -blur 0x8
   -compose hardlight
   '.$path.'\image\ms_light_map-clock.png
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
   echo '<img src="\image\ms_light_map-clock.png">';
   
   $process6 = new Process('magick convert ^
   '.$path.'\resized_pictures'. $imageName1. ' ^
   -channel matte -separate ^
   '.$path.'\image\ms_logo_displace_mask_clock.png
   ');
   
   
   
   $process6->run();
   if (!$process6->isSuccessful()) {
   throw new ProcessFailedException($process6);
   }
   echo $process6->getOutput();
   echo '<img src="\image\ms_logo_displace_mask_clock.png">';
   
   $process7 = new Process('magick convert ^
   '.$path.'\resized_pictures'. $imageName1. ' ^
   '.$path.'\image\ms_light_map-clock.png ^
   -geometry -310-240 ^
   -compose Multiply -composite ^
   '.$path.'\image\ms_logo_displace_mask_clock.png ^
   -compose CopyOpacity -composite ^
   '.$path.'\image\ms_light_map_logo_clock.png
   ');
   
   $process7->run();
   if (!$process7->isSuccessful()) {
   throw new ProcessFailedException($process7);
   }
   echo $process7->getOutput();
   echo '<img src="\image\ms_light_map_logo_clock.png">';
   
   $src1->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
   $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
   $src = new \Imagick(public_path("\image\ms_light_map_logo_clock.png"));
   $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 310, 240);
   $src2->writeImage(public_path("image/clock.png"));

   $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $name = mt_rand(1000000, 9999999)
       . mt_rand(1000000, 9999999)
       . $characters[rand(0, strlen($characters) - 1)];
   
   $string = str_shuffle($name);
   $string .=  round(microtime(true) * 1000);
   $imageRandom = '/' . $string . '.png';


   $process5 = new Process('magick  convert '.$path.'\image\clock.png -background "rgb(0,0,0)" 
   -flatten  '.$path.'\image'.$imageRandom.'
   ');
    $process5->run();
       if (!$process5->isSuccessful()) {
        throw new ProcessFailedException($process5);
       }
        echo $process5->getOutput();
      
        $imageRandom = ltrim($imageRandom, '/');

        $check = DB::table('images')->insert([
         'name' => $imageRandom, 'product_id' => $id, 'color' => 'black'
        ]);
    
        
   
      /*   $process9 = new Process('magick  convert '.$path.'\site-images\SatCrni.png -background "rgb(0,0,0)" 
   -flatten  '.$path.'\site-images\CrniSatSite.png 
   ');
    $process9->run();
       if (!$process9->isSuccessful()) {
        throw new ProcessFailedException($process9);
       }
        echo $process9->getOutput();
        echo '<img src="\site-images\CrniSatSite.png">';  */
   
        $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 310, 240);
        $src2->writeImage(public_path("image/output1.png"));
        $process5 = new Process('magick  convert '.$path.'\site-images\SatBijeli.png  
        -flatten  '.$path.'\image\out1.png 
        ');
         $process5->run();
            if (!$process5->isSuccessful()) {
             throw new ProcessFailedException($process5);
            }
             echo $process5->getOutput();
           $src3->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 310, 240);

           $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
           $name = mt_rand(1000000, 9999999)
               . mt_rand(1000000, 9999999)
               . $characters[rand(0, strlen($characters) - 1)];
           
           $string = str_shuffle($name);
           $string .=  round(microtime(true) * 1000);
           $imageRandom1 = '/' . $string . '.png';

           $src3->writeImage(public_path("image".$imageRandom1));

           $imageRandom1 = ltrim($imageRandom1, '/');

           $check1 = DB::table('images')->insert([
            'name' => $imageRandom1, 'product_id' => $id, 'color' => 'white'
           ]);
       
           return $check1;
             
    }

    public static function cegerThumb($id, $image){
        $path = public_path();

        /*  $process0 = new Process(' convert -version
          ');
          $process0->run();
          if (!$process0->isSuccessful()) {
              throw new ProcessFailedException($process0);
          } 
          echo $process0->getOutput();
    
          dd(); */
         $process0 = new Process('magick convert '.$path.'\site-images\Torbaobicnasalinijom.jpg
         -resize 1200x2000
         '.$path.'\site-images\Torbaobicnasalinijom.jpg
          ');
          $process0->run();
          if (!$process0->isSuccessful()) {
              throw new ProcessFailedException($process0);
          } 
    
          $processa = new Process('magick convert '.$path.'\site-images\Torbaobicnasalinijom.jpg
          -resize 1200x2000
          '.$path.'\site-images\Torbaobicnasalinijom.jpg
           ');
           $processa->run();
           if (!$processa->isSuccessful()) {
               throw new ProcessFailedException($processa);
           } 
    
          $process = new Process('magick convert   '.$path.'\site-images\Torbaobicnasalinijom.jpg[403x422+390+481] 
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
    
       
         $X = 390 + (403-$width)/2;
         $Y = 481 +  (422-$height)/2;
        
    
          $process3 = new Process('magick convert 
         '.$path.'\site-images\Torbaobicnasalinijom.jpg[403x422+390+481] 
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
         '.$path.'\site-images\Torbaobicnasalinijom.jpg[403x422+390+481] ^
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
        
       
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $name = mt_rand(1000000, 9999999)
        . mt_rand(1000000, 9999999)
        . $characters[rand(0, strlen($characters) - 1)];
    
    $string = str_shuffle($name);
    $string .=  round(microtime(true) * 1000);
    $imageRandom = '/' . $string . '.png';
    
         $process8 = new Process('magick convert ^
         '.$path.'\site-images\Torbaobicnasalinijom.jpg^
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
         'name' => $imageRandom, 'product_id' => $id, 'size' => 'thumb'
        ]);
    
        return $check;
    }


    public static function sacksHo2($id, $image){
        $path = public_path();

       
         $process0 = new Process('magick convert '.$path.'\site-images\PapirnakesaDinaHo2.jpg
         -resize 1200x2000
         '.$path.'\site-images\PapirnakesaDinaHo2.jpg
          ');
          $process0->run();
          if (!$process0->isSuccessful()) {
              throw new ProcessFailedException($process0);
          } 
    
          $processa = new Process('magick convert '.$path.'\site-images\PapirnakesaDinaHocrn.jpg
          -resize 1200x2000
          '.$path.'\site-images\PapirnakesaDinaHocrn.jpg
           ');
           $processa->run();
           if (!$processa->isSuccessful()) {
               throw new ProcessFailedException($processa);
           } 
    
          $process = new Process('magick convert   '.$path.'\site-images\PapirnakesaDinaHo2.jpg[303x322+430+431] 
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
    
        
         $X = 430 + (303-$width)/2;
         $Y = 431 +  (322-$height)/2;
        
    
          $process3 = new Process('magick convert 
         '.$path.'\site-images\PapirnakesaDinaHo2.jpg[303x322+430+431] 
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
         '.$path.'\site-images\PapirnakesaDinaHo2.jpg[303x322+430+431] ^
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
        
       
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom = '/' . $string . '.png';
    
         $process8 = new Process('magick convert ^
         '.$path.'\site-images\PapirnakesaDinaHo2.jpg ^
         '.$path.'\image\ms_light_map_logo.png ^
         -geometry +'.$X.'+'.$Y.'
         -compose over    -composite ^
         -depth 24 ^
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
    
    
        $process9 = new Process('magick convert ^
        '.$path.'\site-images\PapirnakesaDinaHocrn.jpg ^
        '.$path.'\image\ms_light_map_logo.png ^
        -geometry +'.$X.'+'.$Y.'
        -compose over -composite ^
        -depth 16 ^
        '.$path.'\image'.$imageRandom1.'
        ');
    
    $process9->run();
    if (!$process9->isSuccessful()) {
       throw new ProcessFailedException($process9);
    }
       echo $process9->getOutput();

       $imageRandom1 = ltrim($imageRandom1, '/');

       $check = DB::table('images')->insert([
        'name' => $imageRandom1, 'product_id' => $id, 'color' => 'black' 
       ]);

    }

    public static function sacks($id, $image){
        $path = public_path();

        $process0 = new Process('magick convert '.$path.'\site-images\PapirnakesaDina.jpg
        -resize 1200x2000
        '.$path.'\site-images\PapirnakesaDina.jpg
         ');
         $process0->run();
         if (!$process0->isSuccessful()) {
             throw new ProcessFailedException($process0);
         } 
   
         $processa = new Process('magick convert '.$path.'\site-images\PapirnakesaDinacrna.jpg
         -resize 1200x2000
         '.$path.'\site-images\PapirnakesaDinacrna.jpg
          ');
          $processa->run();
          if (!$processa->isSuccessful()) {
              throw new ProcessFailedException($processa);
          } 
   
         $process = new Process('magick convert   '.$path.'\site-images\PapirnakesaDina.jpg[303x322+450+311] 
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
   
       
        $X = 450 + (303-$width)/2;
        $Y = 311 +  (322-$height)/2;
       
   
         $process3 = new Process('magick convert 
        '.$path.'\site-images\PapirnakesaDina.jpg[303x322+450+311] 
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
        '.$path.'\site-images\PapirnakesaDina.jpg[303x322+450+311] ^
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
       
      
       $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
       $name = mt_rand(1000000, 9999999)
           . mt_rand(1000000, 9999999)
           . $characters[rand(0, strlen($characters) - 1)];
       
       $string = str_shuffle($name);
       $string .=  round(microtime(true) * 1000);
       $imageRandom = '/' . $string . '.png';
   
        $process8 = new Process('magick convert ^
        '.$path.'\site-images\PapirnakesaDina.jpg ^
        '.$path.'\image\ms_light_map_logo.png ^
        -geometry +'.$X.'+'.$Y.'
        -compose over    -composite ^
        -depth 24 ^
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

       $process9 = new Process('magick convert ^
       '.$path.'\site-images\PapirnakesaDinacrna.jpg ^
       '.$path.'\image\ms_light_map_logo.png ^
       -geometry +'.$X.'+'.$Y.'
       -compose over -composite ^
       -depth 16 ^
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


    public static function notes($id, $image){
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
       
    
       
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(300, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Notes.png"));
       
        
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
        $process5 = new Process('magick convert ^
        '.$path.'\site-images\Notescrni.png ^
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-notes.png
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
        echo '<img src="\image\ms_light_map-notes.png">';
        
        $process6 = new Process('magick convert ^
        '.$path.'\resized_pictures'. $imageName1. ' ^
        -channel matte -separate ^
        '.$path.'\image\ms_logo_displace_mask_notes.png
        ');
        
        
        
        $process6->run();
        if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
        }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask_clock.png">';
        
        $process7 = new Process('magick convert ^
        '.$path.'\resized_pictures'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-notes.png ^
        -geometry -430-400 ^
        -compose Multiply -composite ^
        '.$path.'\image\ms_logo_displace_mask_notes.png ^
        -compose CopyOpacity -composite ^
        '.$path.'\image\ms_light_map_logo_notes.png
        ');
        
        $process7->run();
        if (!$process7->isSuccessful()) {
        throw new ProcessFailedException($process7);
        }
        echo $process7->getOutput();
        echo '<img src="\image\ms_light_map_logo_notes.png">';
        
        $src1->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5");
        $src = new \Imagick(public_path("\image\ms_light_map_logo_notes.png"));
        $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 430, 400);
        $src2->writeImage(public_path("image/notes1.png"));

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom = '/' . $string . '.png';

        $process5 = new Process('magick  convert '.$path.'\image\notes1.png  
        -flatten  '.$path.'\image'.$imageRandom.'
        ');
         $process5->run();
            if (!$process5->isSuccessful()) {
             throw new ProcessFailedException($process5);
            }
             echo $process5->getOutput();
            
             $imageRandom = ltrim($imageRandom, '/');

             $check = DB::table('images')->insert([
                'name' => $imageRandom, 'product_id' => $id, 'color' => 'white'
               ]);
         
               
        
         /*      $process9 = new Process('magick  convert '.$path.'\site-images\Notescrni.png -background "rgb(0,0,0)" 
        -flatten  '.$path.'\site-images\Notescrnislika.png 
        ');
         $process9->run();
            if (!$process9->isSuccessful()) {
             throw new ProcessFailedException($process9);
            }
             echo $process9->getOutput();
             echo '<img src="\site-images\Notescrnislika.png">'; */  
        
             $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 430, 400);
             $src2->writeImage(public_path("image/notes1.png"));
             $process5 = new Process('magick  convert '.$path.'\site-images\Notes.png  
             -flatten  '.$path.'\image\notes1.png 
             ');
              $process5->run();
                 if (!$process5->isSuccessful()) {
                  throw new ProcessFailedException($process5);
                 }
                  echo $process5->getOutput();
                  $src3 = new \Imagick(public_path("\site-images\Notescrni.png"));
                $src3->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 430, 400);
                $src3->setImageBackgroundColor('#fad888');
                $src3->writeImage(public_path("image/notes3.png"));

                $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $name = mt_rand(1000000, 9999999)
                    . mt_rand(1000000, 9999999)
                    . $characters[rand(0, strlen($characters) - 1)];
                
                $string = str_shuffle($name);
                $string .=  round(microtime(true) * 1000);
                $imageRandom1 = '/' . $string . '.png';

                $process9 = new Process('magick  convert '.$path.'\image\notes3.png -background "rgb(0,0,0)" 
        -flatten  '.$path.'\image'.$imageRandom1.'
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

    public static function magnetRectangle($id, $image){
        $imageName1 = "/" .  $image; 

        $path = public_path();
   
       
    
       
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(350, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Karticni.png"));
       
        
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
        $process5 = new Process('magick convert ^
        '.$path.'\site-images\Karticni.png ^
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
        '.$path.'\resized_pictures'. $imageName1. ' ^
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
        '.$path.'\resized_pictures'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-phone1.png ^
        -geometry -430-270 ^
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
        $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 430, 270);
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
                'name' => $imageRandom, 'product_id' => $id, 'size' => 'rectangle'
               ]);
         
               return $check;
    }

    public static function magnetCircle($id, $image){
        $imageName1 = "/" .  $image; 

     $path = public_path();

    
 
    
     $src1 = new \Imagick(public_path("design". $imageName1));
     $src1->resizeImage(350, null,\Imagick::FILTER_LANCZOS,1); 
     $src1->writeImage(public_path("resized_pictures". $imageName1));
     $src2 = new \Imagick(public_path("\site-images\Okrugli.png"));
    
     
     
     $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
     
     $process5 = new Process('magick convert ^
     '.$path.'\site-images\Okrugli.png ^
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
     '.$path.'\resized_pictures'. $imageName1. ' ^
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
     '.$path.'\resized_pictures'. $imageName1. ' ^
     '.$path.'\image\ms_light_map-phone1.png ^
     -geometry -425-280 ^
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
     $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 425, 280);
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
            'name' => $imageRandom, 'product_id' => $id, 'size' => 'Rounded'
           ]);
     
           return $check;
    }


    public static function masksBlack($id, $image){
        $path = public_path();

           $process = new Process('magick convert   '.$path.'\site-images\Face-Mask-Black-BG.png[203x222+620+401] 
          
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
      
      
          $X = 620 + (203-$width)/2;
          $Y = 401 +  (222-$height)/2;
         
      
           $process3 = new Process('magick convert 
          '.$path.'\site-images\Face-Mask-Black-BG.png[203x222+620+401] 
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
      
          $process7 = new Process('magick convert ^
          '.$path.'\image\ms_displaced_logo.png ^
          -matte                     ^
          -virtual-pixel transparent ^
          -distort Perspective       ^
          "0,0,20,20 0,200,20,220 200,200,180,220 200,0,220,10" ^
          '.$path.'\image\ms_displaced_logo_perspective.png
        
           ');
      
      $process7->run();
      if (!$process7->isSuccessful()) {
          throw new ProcessFailedException($process7);
      }
      
      echo '<img src="\image\ms_displaced_logo_perspective.png">'; 
      
      
           $process5 = new Process('magick convert ^
          '.$path.'\site-images\Face-Mask-Black-BG.png[203x222+620+401] ^
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
          '.$path.'\image\ms_displaced_logo_perspective.png ^
          -channel matte -separate ^
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
          $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,620,401);
          $src2->writeImage(public_path("image\image-mask-black.png"));
          echo '<img src="\image\image-mask-black.png">';
      

          $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $name = mt_rand(1000000, 9999999)
              . mt_rand(1000000, 9999999)
              . $characters[rand(0, strlen($characters) - 1)];
          
          $string = str_shuffle($name);
          $string .=  round(microtime(true) * 1000);
          $imageRandom1 = '/' . $string . '.png';
      
          $process8 = new Process('magick convert ^
          '.$path.'\site-images\Face-Mask-Black-BG.png ^
          '.$path.'\image\image-mask-black.png ^
          -geometry +0+0
          -compose over    -composite ^
          -depth 24 ^
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
      
          $process7 = new Process('magick convert ^
          '.$path.'\image\ms_displaced_logo.png ^
          -matte                     ^
          -virtual-pixel transparent ^
          -distort Perspective       ^
          "0,0,20,20 0,200,20,220 200,200,180,220 200,0,220,10" ^
          '.$path.'\image\ms_displaced_logo_perspective.png
        
           ');
      
      $process7->run();
      if (!$process7->isSuccessful()) {
          throw new ProcessFailedException($process7);
      }
      
      echo '<img src="\image\ms_displaced_logo_perspective.png">'; 
      
      
           $process5 = new Process('magick convert ^
          '.$path.'\site-images\Face-Mask-White-BG.png[203x222+620+401] ^
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
          '.$path.'\image\ms_displaced_logo_perspective.png ^
          -channel matte -separate ^
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

          $process8 = new Process('magick convert ^
          '.$path.'\site-images\Face-Mask-White-BG.png ^
          '.$path.'\image\image-mask-black.png ^
          -geometry +0+0
          -compose over    -composite ^
          -depth 24 ^
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
   
       $process7 = new Process('magick convert ^
       '.$path.'\image\ms_displaced_logo.png ^
       -matte                     ^
       -virtual-pixel transparent ^
       -distort Perspective       ^
       "0,0,0,0 200,0,220,30 0,200,30,250 200,200,220,170" ^
       '.$path.'\image\ms_displaced_logo_perspective.png
     
        ');
   
   $process7->run();
   if (!$process7->isSuccessful()) {
       throw new ProcessFailedException($process7);
   }
   
       
        $process5 = new Process('magick convert ^
       '.$path.'\site-images\maskabijela.jpg[303x322+130+501] ^
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
       '.$path.'\image\ms_displaced_logo_perspective.png ^
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
       '.$path.'\image\ms_displaced_logo_perspective.png ^
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
      
     
      $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        $string = str_shuffle($name);
        $string .=  round(microtime(true) * 1000);
        $imageRandom = '/' . $string . '.png';
   
       $process8 = new Process('magick convert ^
       '.$path.'\site-images\maskabijela.jpg ^
       '.$path.'\image\ms_light_map_logo.png ^
       -geometry +'.$X.'+'.$Y.'
       -compose over    -composite ^
       -depth 24 ^
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
   
   
      $process9 = new Process('magick convert ^
      '.$path.'\site-images\maskacrna.jpg ^
      '.$path.'\image\ms_light_map_logo.png ^
      -geometry +550+630
      -compose over -composite ^
      -depth 16 ^
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
   
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(380, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Mug-Mask.png"));
      /*   $src2->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src2->writeImage(public_path("\site-images\Solja.jpg")); */
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
        $process5 = new Process('magick convert ^
        '.$path.'\site-images\Solja.png ^
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
        '.$path.'\resized_pictures'. $imageName1. ' ^
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
        '.$path.'\resized_pictures'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-canvas.png ^
        -geometry -380-290 ^
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
   
        
        /* $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,390,450);
        $src2->writeImage(public_path("image\image-canvas.png")); */
   
        $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER  ,380,290);
        $src2->writeImage(public_path("image\image-canvas.png"));
        echo '<img src="\image\image-canvas.png">';
        $src4 = new \Imagick(public_path("site-images/Solja.png"));
     /*    $src4->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src4->writeImage(public_path("\site-images/Textura-Canvas-mockup.png")); */
         $src3 = new \Imagick(public_path("image/image-canvas.png"));
         $src3->compositeImage($src4, \Imagick::COMPOSITE_MULTIPLY    ,0,0);

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
        
        $process5 = new Process('magick convert ^
        '.$path.'\site-images\Solja.jpg ^
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
        '.$path.'\resized_pictures'. $imageName1. ' ^
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
        '.$path.'\resized_pictures'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-canvas.png ^
        -geometry -690-450 ^
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
   
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(370, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("design". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Solja-Mockup-BG.png"));
      
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
        $process5 = new Process('magick convert ^
        '.$path.'\site-images\Solja-Mockup-BG.png ^
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
        '.$path.'\design'. $imageName1. ' ^
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
        '.$path.'\design'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-canvas.png ^
        -geometry -380-350 ^
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
   
        $src6 = new \Imagick(public_path("site-images/Solja-Mockup-Mask.png"));
        $src6->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,380,350);
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
            'name' => $imageRandom1, 'product_id' => $id, 'size' => 'main'
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
        
        $process5 = new Process('magick convert ^
        '.$path.'\site-images\Solja2.png ^
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
        '.$path.'\resized_pictures'. $imageName1. ' ^
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
        '.$path.'\resized_pictures'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-canvas.png ^
        -geometry -680-440 ^
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
   
       
    
       
   
   $src1 = new \Imagick(public_path("design". $imageName1));
   $src1->resizeImage(400, null,\Imagick::FILTER_LANCZOS,1); 
   $src1->writeImage(public_path("resized_pictures". $imageName1));
   $src2 = new \Imagick(public_path("\site-images\TermosThumbnail.png"));
   /* $src3 = new \Imagick(public_path("\image\Iphone-II-Pro.jpg")); */
   
   
   $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
   
   $process5 = new Process('magick convert ^
   '.$path.'\site-images\TermosThumbnail.png ^
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
   
   $process6 = new Process('magick convert ^
   '.$path.'\resized_pictures'. $imageName1. ' ^
   -channel matte -separate ^
   '.$path.'\image\ms_logo_displace_mask_thermos.png
   ');
   
   
   
   $process6->run();
   if (!$process6->isSuccessful()) {
   throw new ProcessFailedException($process6);
   }
   echo $process6->getOutput();
   echo '<img src="\image\ms_logo_displace_mask_thermos.png">';
   
   $process7 = new Process('magick convert ^
   '.$path.'\resized_pictures'. $imageName1. ' ^
   '.$path.'\image\ms_light_map-thermos.png ^
   -geometry -700-420 ^
   -compose Multiply -composite ^
   '.$path.'\image\ms_logo_displace_mask_thermos.png ^
   -compose CopyOpacity -composite ^
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
   $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 700, 420);

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
   
       
    
       
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(350, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Puzle.png"));
       
        
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
        $process5 = new Process('magick convert ^
        '.$path.'\site-images\Puzle.png ^
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-puzle.png
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
        echo '<img src="\image\ms_light_map-puzle.png">';
        
        $process6 = new Process('magick convert ^
        '.$path.'\resized_pictures'. $imageName1. ' ^
        -channel matte -separate ^
        '.$path.'\image\ms_logo_displace_mask_puzle.png
        ');
        
        
        
        $process6->run();
        if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
        }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask_puzle.png">';
        
        $process7 = new Process('magick convert ^
        '.$path.'\resized_pictures'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-puzle.png ^
        -geometry -205-100 ^
        -compose Multiply -composite ^
        '.$path.'\image\ms_logo_displace_mask_puzle.png ^
        -compose CopyOpacity -composite ^
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
        $src2->compositeImage($src, \Imagick::COMPOSITE_DSTOVER, 205, 100);
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



      $process = new Process('magick convert   '.$path.'\site-images\Neseser.jpg[303x322+650+501] 
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

    
     $X = 650 + (303-$width)/2;
     $Y = 501 +  (322-$height)/2;
    

      $process3 = new Process('magick convert 
     '.$path.'\site-images\Neseser.jpg[303x322+650+501] 
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

     $process7 = new Process('magick convert ^
     '.$path.'\image\ms_displaced_logo.png ^
     -matte                     ^
     -virtual-pixel transparent ^
     -distort Perspective       ^
     "0,0,0,0 200,0,220,30 0,200,30,200 200,200,220,180" ^
     '.$path.'\image\ms_displaced_logo_perspective.png
   
      ');

 $process7->run();
 if (!$process7->isSuccessful()) {
     throw new ProcessFailedException($process7);
 }
     echo $process7->getOutput();
     echo '<img src="\image\ms_displaced_logo_perspective.png">';

     
      $process5 = new Process('magick convert ^
     '.$path.'\site-images\Neseser.jpg[303x322+650+501] ^
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
     '.$path.'\image\ms_displaced_logo_perspective.png ^
     -channel matte -separate ^
     '.$path.'\image\ms_logo_displace_mask.png
      ');

 $process6->run();
 if (!$process6->isSuccessful()) {
     throw new ProcessFailedException($process6);
 }
     echo $process6->getOutput();
     echo '<img src="\image\ms_logo_displace_mask.png">';

     $src1 = new \Imagick(public_path("\image\ms_displaced_logo_perspective.png"));
     $src2 = new \Imagick(public_path("site-images/Zipper-Cases-Maska.png"));
     $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,650,501);
     $src2->writeImage(public_path("image\image-zip.png"));
     echo '<img src="\image\image-zip.png">';

     $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
     $name = mt_rand(1000000, 9999999)
         . mt_rand(1000000, 9999999)
         . $characters[rand(0, strlen($characters) - 1)];
     
     $string = str_shuffle($name);
     $string .=  round(microtime(true) * 1000);
     $imageRandom = '/' . $string . '.png';

     $process8 = new Process('magick convert ^
     '.$path.'\site-images\Neseser.jpg ^
     '.$path.'\image\image-zip.png ^
     -compose over    -composite ^
     -depth 24 ^
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

    $process9 = new Process('magick convert ^
    '.$path.'\site-images\Neseser-Crveni.jpg ^
    '.$path.'\image\image-zip.png ^
    -compose over    -composite ^
    -depth 24 ^
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

   $process10 = new Process('magick convert ^
   '.$path.'\site-images\Neseser-Rozi.jpg ^
   '.$path.'\image\image-zip.png ^
   -compose over    -composite ^
   -depth 24 ^
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
    
         $process7 = new Process('magick convert ^
         '.$path.'\image\ms_displaced_logo.png ^
         -matte                     ^
         -virtual-pixel transparent ^
         -distort Perspective       ^
         "0,0,0,0 200,0,220,30 0,200,30,200 200,200,220,180" ^
         '.$path.'\image\ms_displaced_logo_perspective.png
       
          ');
    
     $process7->run();
     if (!$process7->isSuccessful()) {
         throw new ProcessFailedException($process7);
     }
         echo $process7->getOutput();
         echo '<img src="\image\ms_displaced_logo_perspective.png">';
    
         
          $process5 = new Process('magick convert ^
         '.$path.'\site-images\Neseser.jpg[303x322+630+481] ^
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
         '.$path.'\image\ms_displaced_logo_perspective.png ^
         -channel matte -separate ^
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
    
         $process8 = new Process('magick convert ^
         '.$path.'\site-images\Neseser.jpg ^
         '.$path.'\image\ms_displaced_logo_perspective.png ^
         -geometry +'.$X.'+'.$Y.'
         -compose over    -composite ^
         -depth 24 ^
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

    
     $process0 = new Process('magick convert '.$path.'\site-images\Torbacrnaruckamanjam.jpg
     -resize 1200x2000
     '.$path.'\site-images\Torbacrnaruckamanjam.jpg
      ');
      $process0->run();
      if (!$process0->isSuccessful()) {
          throw new ProcessFailedException($process0);
      } 

      $process = new Process('magick convert   '.$path.'\site-images\Torbacrnaruckamanjam.jpg[403x422+440+501] 
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

   
     $X = 440 + (403-$width)/2;
     $Y = 501 +  (422-$height)/2;
    

      $process3 = new Process('magick convert 
     '.$path.'\site-images\Torbacrnaruckamanjam.jpg[403x422+410+451] 
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
     '.$path.'\site-images\Torbacrnaruckamanjam.jpg[403x422+410+451] ^
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
    
   
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $name = mt_rand(1000000, 9999999)
        . mt_rand(1000000, 9999999)
        . $characters[rand(0, strlen($characters) - 1)];
    
    $string = str_shuffle($name);
    $string .=  round(microtime(true) * 1000);
    $imageRandom = '/' . $string . '.png';

     $process8 = new Process('magick convert ^
     '.$path.'\site-images\Torbacrvenaruckamanja.jpg ^
     '.$path.'\image\ms_light_map_logo.png ^
     -geometry +'.$X.'+'.$Y.'
     -compose over    -composite ^
     -depth 24 ^
     '.$path.'\image'.$imageRandom.'
     ');

$process8->run();
if (!$process8->isSuccessful()) {
    throw new ProcessFailedException($process8);
}
    echo $process8->getOutput();
    
    $imageRandom = ltrim($imageRandom, '/');

    $check = DB::table('images')->insert([
     'name' => $imageRandom, 'product_id' => $id, 'color' => 'red'
    ]);

    


    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $name = mt_rand(1000000, 9999999)
        . mt_rand(1000000, 9999999)
        . $characters[rand(0, strlen($characters) - 1)];
    
    $string = str_shuffle($name);
    $string .=  round(microtime(true) * 1000);
    $imageRandom1 = '/' . $string . '.png';

    $process9 = new Process('magick convert ^
    '.$path.'\site-images\proba.jpg ^
    '.$path.'\image\ms_light_map_logo.png ^
    -geometry +'.$X.'+'.$Y.'
    -compose over -composite ^
    -depth 16 ^
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


    public static function coastersSquare($id, $image){

        $imageName1 = "/" .  $image; 

        $path = public_path();
   
   
        $src1 = new \Imagick(public_path("design". $imageName1));
        $src1->resizeImage(300, null,\Imagick::FILTER_LANCZOS,1); 
        $src1->writeImage(public_path("resized_pictures". $imageName1));
        $src2 = new \Imagick(public_path("\site-images\Podmetac-Kvadrat-Maska.png"));
       /*  $src2->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
        $src2->writeImage(public_path("\site-images\Canvas-mockup-thumbnail.png")); */
        
        $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
        
        $process5 = new Process('magick convert ^
        '.$path.'\site-images\Podmetac-Kvadrat-Maska.png ^
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-coaster-square.png
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
        echo '<img src="\image\ms_light_map-coaster-square.png">';
        
        $process6 = new Process('magick convert ^
        '.$path.'\resized_pictures'. $imageName1. ' ^
        -channel matte -separate ^
        '.$path.'\image\ms_logo_displace_mask_coaster-square.png
        ');
        
        
        
        $process6->run();
        if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
        }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask_coaster-square.png">';
        
        $process7 = new Process('magick convert ^
        '.$path.'\resized_pictures'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-coaster-square.png ^
        -geometry -520-350 ^
        -compose Multiply -composite ^
        '.$path.'\image\ms_logo_displace_mask_coaster-square.png ^
        -compose CopyOpacity -composite ^
        '.$path.'\image\ms_light_map_logo_coaster-square.png
        ');
        
        $process7->run();
        if (!$process7->isSuccessful()) {
        throw new ProcessFailedException($process7);
        }
        echo $process7->getOutput();
        echo '<img src="\image\ms_light_map_logo_coaster-square.png">';
   
   
        $process7 = new Process('magick convert ^
        '.$path.'\image\ms_light_map_logo_coaster-square.png ^
        -matte                     ^
        -virtual-pixel transparent ^
        -distort Perspective       ^
        "0,0,-20,20 0,300,20,320 300,300,320,280 300,0,280,-20" ^
        '.$path.'\image\ms_displaced_logo_perspective.png
      
         ');
   
    $process7->run();
    if (!$process7->isSuccessful()) {
        throw new ProcessFailedException($process7);
    }
        echo $process7->getOutput();
        echo '<img src="\image\ms_displaced_logo_perspective.png">';
   
        $src1 = new \Imagick(public_path("\image\ms_displaced_logo_perspective.png"));
   
        $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,520,350);
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
        
        $process5 = new Process('magick convert ^
        '.$path.'\site-images\podmetackvadratasti.jpg ^
        -channel A -blur 0x8
        -compose hardlight
        '.$path.'\image\ms_light_map-podmetac.jpg
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
        echo '<img src="\image\ms_light_map-podmetac.jpg">';
        
        $process6 = new Process('magick convert ^
        '.$path.'\resized_pictures'. $imageName1. ' ^
        -channel matte -separate ^
        '.$path.'\image\ms_logo_displace_mask_podmetac.png
        ');
        
        
        
        $process6->run();
        if (!$process6->isSuccessful()) {
        throw new ProcessFailedException($process6);
        }
        echo $process6->getOutput();
        echo '<img src="\image\ms_logo_displace_mask_podmetac.png">';
        
        $process7 = new Process('magick convert ^
        '.$path.'\resized_pictures'. $imageName1. ' ^
        '.$path.'\image\ms_light_map-podmetac.jpg ^
        -geometry -675-3420 ^
        -compose Multiply -composite ^
        '.$path.'\image\ms_logo_displace_mask_podmetac.png ^
        -compose CopyOpacity -composite ^
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
       
       
            $src1 = new \Imagick(public_path("design". $imageName1));
            $src1->resizeImage(300, null,\Imagick::FILTER_LANCZOS,1); 
            $src1->writeImage(public_path("resized_pictures". $imageName1));
            $src2 = new \Imagick(public_path("\site-images\Podmetac-Kruzni-Mask.png"));
           /*  $src2->resizeImage(1500, 1500,\Imagick::FILTER_LANCZOS,1); 
            $src2->writeImage(public_path("\site-images\Canvas-mockup-thumbnail.png")); */
            
            $src1->setImageArtifact('compose:args', "1,0,-0.5,0.5"); 
            
            $process5 = new Process('magick convert ^
            '.$path.'\site-images\Podmetac-Kruzni-Mask.png ^
            -channel A -blur 0x8
            -compose hardlight
            '.$path.'\image\ms_light_map-coaster.png
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
            echo '<img src="\image\ms_light_map-coaster.png">';
            
            $process6 = new Process('magick convert ^
            '.$path.'\resized_pictures'. $imageName1. ' ^
            -channel matte -separate ^
            '.$path.'\image\ms_logo_displace_mask_coaster.png
            ');
            
            
            
            $process6->run();
            if (!$process6->isSuccessful()) {
            throw new ProcessFailedException($process6);
            }
            echo $process6->getOutput();
            echo '<img src="\image\ms_logo_displace_mask_coaster.png">';
            
            $process7 = new Process('magick convert ^
            '.$path.'\resized_pictures'. $imageName1. ' ^
            '.$path.'\image\ms_light_map-coaster.png ^
            -geometry -460-350 ^
            -compose Multiply -composite ^
            '.$path.'\image\ms_logo_displace_mask_coaster.png ^
            -compose CopyOpacity -composite ^
            '.$path.'\image\ms_light_map_logo_coaster.png
            ');
            
            $process7->run();
            if (!$process7->isSuccessful()) {
            throw new ProcessFailedException($process7);
            }
            echo $process7->getOutput();
            echo '<img src="\image\ms_light_map_logo_coaster.png">';
       
       
            $src2->compositeImage($src1, \Imagick::COMPOSITE_DSTOVER ,460,350);
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
            
            $process5 = new Process('magick convert ^
            '.$path.'\site-images\podmetacokrugli.jpg ^
            -channel A -blur 0x8
            -compose hardlight
            '.$path.'\image\ms_light_map-podmetac.jpg
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
            echo '<img src="\image\ms_light_map-podmetac.jpg">';
            
            $process6 = new Process('magick convert ^
            '.$path.'\resized_pictures'. $imageName1. ' ^
            -channel matte -separate ^
            '.$path.'\image\ms_logo_displace_mask_podmetac.png
            ');
            
            
            
            $process6->run();
            if (!$process6->isSuccessful()) {
            throw new ProcessFailedException($process6);
            }
            echo $process6->getOutput();
            echo '<img src="\image\ms_logo_displace_mask_podmetac.png">';
            
            $process7 = new Process('magick convert ^
            '.$path.'\resized_pictures'. $imageName1. ' ^
            '.$path.'\image\ms_light_map-podmetac.jpg ^
            -geometry -640-740 ^
            -compose Multiply -composite ^
            '.$path.'\image\ms_logo_displace_mask_podmetac.png ^
            -compose CopyOpacity -composite ^
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
