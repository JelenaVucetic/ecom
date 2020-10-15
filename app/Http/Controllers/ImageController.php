<?php

namespace App\Http\Controllers;

//use Request;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator,Redirect,Response,File;
use DB;
use App\Category;
use Illuminate\Support\Facades\Input;
//use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\Facades\Image;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;


class ImageController extends Controller
{
    public function index() {
        $categories = Category::where('parent_id',NULL)->get();
        return view('admin.upload_design.work', compact('categories'));
    }
   
    public function upload(Request $request){
        $categories = Category::where('parent_id',NULL)->get();
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048|jfif',

        ],
        ['file.required' => 'Morate izabrati fajl',
         'file.mimes' => 'Fajl mora biti: jpeg, png, jpg, gif',
         'file.jfif' => 'Fajl mora biti: jpeg, png, jpg, gif']
    );

        $file = $request->file('file');
        $imageName =  $file->getClientOriginalName();
        $filename = pathinfo($imageName, PATHINFO_FILENAME);
        
        $extension =  $request->file('file')->getClientOriginalExtension();
       // dd($extension);
        $imageNoExt = $filename . "_" . time();

        $image2 = $imageNoExt . "_watermark" . "." . $extension;
        $image = $imageNoExt . ".".$extension;
        $image = preg_replace('/\s+/', '', $image);

        $image2 = preg_replace('/\s+/', '', $image2);
        $file->move('design/', $image);
       
      /*   $image1 = new \Imagick();
        $image1->readImage(public_path('design/' . $image)); */
        $image1 = Image::make(public_path('design/' . $image));
        
         $image3 = new \Imagick();
        $image3->readImage(public_path('design/' . $image)); 
        $watermark = new \Imagick();
        $path = public_path();
        $watermark->readImage(public_path("site-images/watermark2.png"));

    /*     $process = new Process('magick convert -size 2000x2000 tile:'.$path.'/site-images/watermark2.png ' .$path.'/image/watermark2.png
        ');
        
        $process->run();
        if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
        }
        echo $process->getOutput();  */ 

        exec('magick convert -size 2000x2000 tile:'.$path.'/site-images/watermark2.png ' .$path.'/image/watermark2.png');
       
        $width = $image1->width();
        $height = $image1->height();
        $watermark1 = new \Imagick();
       
        $watermark1->readImage(public_path("image/watermark2.png"));
        /* $watermark->resizeImage($width,$height,\Imagick::FILTER_LANCZOS,1); */
        // The start coordinates where the file should be printed
        $x = 0;
        $y = 0;
        
        // Draw watermark on the image file with the given coordinates
        $image3->compositeImage($watermark1, \Imagick::COMPOSITE_OVER, $x, $y);

    
        // Save image
        $image3->writeImage(public_path("design/" . $image2));
       

         if($image1->width() > 400) {
            $image1->resize(400,null, function($constraint){
                $constraint->aspectRatio();
            }); 
        }
           
        $image1->save('image/' . $image1->basename); 
 

        return view('admin.upload_design.work', compact(['image','categories']));

}

public function display_mockup(Request $request){
    $image = $request->image;
    return view('admin.upload_design.upload_mockup', compact('image'));
}

public function upload_final_mockup(Request $request){

    $id = $request->id;
    $image = $request->image;
    $image = explode(";" , $image)[1];   
  
   $image = explode("," , $image)[1]; 
    $image = str_replace(" ", "+", $image); 
     $image = base64_decode($image); 
     
     $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";     
     $name = mt_rand(1000000, 9999999)  
      . mt_rand(1000000, 9999999)  
       . $characters[rand(0, strlen($characters) - 1)];     
     $string = str_shuffle($name);  

      file_put_contents("final_image/". $string . ".png", $image);
    

      DB::table('images')->insert([
        'name'=> $string.'.png',
        'product_id'=> $id
        ]); 

        echo 'Kreirani proizvodi';
   /*  $image = $request->image;
    return view('admin.upload_design.upload_mockup', compact('image')); */
}


public function final_mockup(Request $request){
    
    $image = $request->image;
    
  
      $image = explode(";" , $image)[1];   
    
     $image = explode("," , $image)[1]; 
      $image = str_replace(" ", "+", $image); 
       $image = base64_decode($image); 
       
       $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";     
       $name = mt_rand(1000000, 9999999)  
        . mt_rand(1000000, 9999999)  
         . $characters[rand(0, strlen($characters) - 1)];     
       $string = str_shuffle($name);  
 
        file_put_contents("final_image/". $string . ".png", $image);
      
        echo 'uploaded'; 
    
   }


}
