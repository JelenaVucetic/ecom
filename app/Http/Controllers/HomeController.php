<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Wishlist;
use App\Design;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Recommends;
use Image;
use Gloudemans\Shoppingcart\Facades\Cart;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //Maknuti komentar ispod
        //$this->middleware('auth', ['only' => ['index']]);
    }

    public function test() {
        return view('test');      
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function welcome()
    {
        $products = Product::orderBy('id', 'desc')->paginate(28);
        $categories = Category::where('parent_id',NULL)->get();

      /*   $images = DB::table('images')->join('product', 'product.id', '=', 'images.product_id')->get(); */
      
        $shirtsCat = DB::table('categories')
                ->where('categories.name', '=', 'T-Shirts')
                ->first();

        $casesCat = DB::table('categories')
                ->where('categories.name', '=', 'Cases')
                ->first();

        $picturesCat = DB::table('categories')
                ->where('categories.name', '=', 'Pictures')
                ->first();

        $mugsCat = DB::table('categories')
                ->where('categories.name', '=', 'Mugs')
                ->first();

        $coastersCat = DB::table('categories')
                ->where('categories.name', '=', 'Coasters')
                ->first();

        $clocksCat = DB::table('categories')
                ->where('categories.name', '=', 'Clocks')
                ->first();

        $sacksCat = DB::table('categories')
                ->where('categories.name', '=', 'Sacks')
                ->first();

        $magnetsCat = DB::table('categories')
                ->where('categories.name', '=', 'Magnets')
                ->first();
                
        $notebooksCat = DB::table('categories')
                ->where('categories.name', '=', 'Notebooks')
                ->first();
        return view('welcome', compact('products', 'categories', 'shirtsCat', 'casesCat', 'picturesCat', 'mugsCat', 'coastersCat', 'clocksCat', 'sacksCat', 'magnetsCat', 'notebooksCat'));
    }

    public function index()
    {

        $designs = Design::orderBy('id', 'desc')->paginate(28);
        $categories = Category::where('parent_id',NULL)->get();
        $products = Product::orderBy('id', 'desc')->paginate(28);

        $tShirts = DB::table('product')
                ->select('product.id', 'product.name', 'product.description', 'product.category_id', 'product.price', 'product.image', 'product.spl_price', 'product.design_id')
                ->join('categories', 'categories.id', '=', 'product.category_id')
                ->where('categories.name', '=', 'T-Shirts')
                ->get();

        $cases = DB::table('product')
                ->select('product.id', 'product.name', 'product.description', 'product.category_id', 'product.price', 'product.image', 'product.spl_price', 'product.design_id')
                ->join('categories', 'categories.id', '=', 'product.category_id')
                ->where('categories.name', '=', 'Samsung Cases') 
                ->orWhere('categories.name', '=', 'Iphone Cases')
                ->orWhere('categories.name', '=', 'Huawei Cases')
                ->get();

        $hoodies = DB::table('product')
                ->select('product.id', 'product.name', 'product.description', 'product.category_id', 'product.price', 'product.image', 'product.spl_price', 'product.design_id')
                ->join('categories', 'categories.id', '=', 'product.category_id')
                ->where('categories.name', '=', 'Hoodies & Sweatshirts')
                ->get();



        return view('home', compact('products', 'categories', 'designs', 'tShirts', 'cases', 'hoodies'));
    }

    public function product_details($id)
    {
        
        $product = DB::table('product')->where('id', $id)->first();
        $find_cat = Product::findOrFail($id);
        if($find_cat->category->name == "T-Shirts"){
            $imageFront = DB::table('images')->where([
                ['product_id', "=", $id],
                ['color' , "=", 'white'],
                ['position' , "=", 'front'],
            ])->first();
                
            $imageBack = "U-one-18.jpg";
                
        }elseif($find_cat->category->name == "Iphone Cases"){
            $imageFront = DB::table('images')->where([
                ['product_id',"=", $id],
                ['color',"=" ,'transparent']
            ])->first();
            $imageBack = "Iphone-II-Pro-Bezpozadine1.png";
           
        }
       
        $categories = Category::where('parent_id',NULL)->get();
        $design = DB::table('design')->where('id', $product->design_id)->first();
        $poster_size = ' ';
        $review = DB::table('reviews')->orderBy('id', 'desc')->where('product_id', $product->id)->first(); 
        $reviewsStar = DB::table('review_star')->where('product_id', $product->id)->get(); 
        $countReviews = DB::table('reviews')->where('product_id', $product->id)->get();
        $counter = null;
        $numberOfReviews = count($countReviews);

        if(!$reviewsStar->isEmpty()) {
          $totalStar = 0;
          foreach ($reviewsStar as $item) {
            $size = $item->size;
            $totalStar = $totalStar + $size;
          }
          
          $average = round($totalStar / count($reviewsStar),1);
        } else {
            $average = 1;
        }

        if(Auth::check()) {
            $user = Auth::id();
            $createReview = DB::table('reviews')->where('user_id', $user)->where('product_id', $product->id)->first();

            $counter = DB::table('users')->select('name' ,DB::raw('count(*) as total'))
            ->join('orders', 'orders.user_id' , '=', 'users.id')
            ->join('order_product', 'orders.id','=','order_product.order_id')
            ->where('users.id', $user)
            ->where('order_product.product_id', $product->id)
            ->groupBy('name')
            ->first(); 


        } else {
            $createReview = null;
        }

        if(Auth::check()) {
            $recommends = new Recommends;
            $recommends->uid = Auth::user()->id;
            $recommends->pro_id = $id;
            $recommends->save();
        } else {
            $recommends = new Recommends;
            $recommends->uid = 0;
            $recommends->pro_id = $id;
            $recommends->save();
        }

        return view('product_details', compact('product', 'categories', 'design', 'poster_size', 'createReview', 'counter', 'review', 'average', 'numberOfReviews', 'imageFront', 'imageBack'));
    }

    public function viewWishlist()
    {
        $Products = DB::table('wishlist')->leftJoin('product', 'wishlist.pro_id', '=', 'product.id')->where("user_id", "=" , Auth::user()->id)->get();
        $categories = Category::where('parent_id',NULL)->get();
        return view('wishlist', compact('Products', 'categories'));
    }

    public function wishlist(Request $request)
    {
        $wishlist = new Wishlist;
        $wishlist->user_id = Auth::user()->id;
        $wishlist->pro_id = $request->id;

        if($wishlist->save()){
            echo "OK";
        }else{
            echo "BAD";
        }

      /*   $product = DB::table('product')->where('id', $request->id)->first();
        $categories = Category::where('parent_id',NULL)->get();
        $design = DB::table('design')->where('id', $product->design_id)->first(); */
        
        
        /* return view('product_details', compact('product', 'categories', 'design'));
     */
}

    public function destroy($id) {
        DB::table('wishlist')->where('pro_id', '=', $id)->delete();
        return back()->with('msg', 'item removed from wishlist');
    }

/*     public function selectSize(Request $request)
    {
        $proDum = $request->proDum;
        $size = $request->size;

        $s_price = DB::table('products_properties')->where('pro_id', $proDum)->where('size', $size)->get();

        foreach($s_price as $sPrice) {
            echo "&euro;" . $sPrice->p_price;
        }
    } */

    public function addReview(Request $request)
    {
        $this->validate($request, [
          
            'person_name' => 'required|min:3|max:35',
            'review_title' => 'required|min:3|max:35',
            'review_content' => 'required|min:3|max:35',
        ],
            [
                'person_name.required' => 'Please enter your name.',
                'review_title.required' => 'Please enter review title.',
                'review_content.required' => 'Please enter review description',
            ]);
        DB::table('reviews')->insert(['person_name' => $request->person_name,
                                    'product_id' => $request->product_id,
                                    'user_id' => $request->userId,
                                    'review_title' => $request->review_title, 
                                    'review_content' => $request->review_content,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                    ]);
        return back();
    }

    public function addStar(Request $request) 
    {
        $stars=$_POST['value'];
        $product_id=$_POST['product_id'];
        $user_id=$_POST['user_id'];
        $counter = DB::table('review_star')
                    ->select('product_id' ,DB::raw('count(*) as total'))
                    ->where('user_id', $user_id)
                    ->where('product_id', $product_id)
                    ->groupBy('product_id')
                    ->first();
            var_dump($counter);

    if(isset($counter)) {
        DB::table('review_star')
                ->where('user_id', $user_id)
                ->where('product_id', $product_id)  // find your user by their email
                ->limit(1)  // optional - to ensure only one record is updated.
                ->update(array('size' =>   $stars));
    } else {
        DB::table('review_star')->insert([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'size' =>   $stars
            ]);
        }
    
        echo 'uspjesno' ;
    }

    public function showReview(){
        $userId = Auth::user()->id;
        DB::table('users')->join('orders', 'orders.user_id' , '=', 'users.id')
        ->join('order_product', 'orders.id','=','order_product.order_id')
        ->where('users.id', $userId)
        ->where('order_product.order_id', $userId)->get();
    }


    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|min:3'
        ],
            [
                'query.required' => 'Please fill in this field.',
                'query.min' => 'Your search must have more than three caracters.'
            ]);
        $query = $request->input('query');
       /*  $products = DB::table('product')->where('name', 'like',  "%$query%")
                                        ->orWhere('description','like', "%$query%")
                                        ->get(); */

        $products = Product::search($query)->paginate(20);
        $categories = Category::where('parent_id',NULL)->get();
        return view('search-results', compact('products', 'categories'));
    }

    public function showCategoryProduct(Request $request){
        
        $category = Category::where('name',$request->category)->first();
         $categoryId = $category->id;
         $all = Category::where('parent_id', $parentId = Category::where('name', $category->name)
                ->value('id'))
                ->pluck('id')
                ->all();
              
         if($request->gender){
             if($category->parent_id){
                /* dd($request->gender,$category->parent_id); */
            $products = Product::where([
                ['category_id',$categoryId],
                ['gender', $request->gender]
                ])->orWhere([
                    ['category_id',$categoryId],
                    ['gender', 'unisex']
                ])->get();
            }else{
                $products = Product::
                whereIn('category_id',$all)->where('gender', $request->gender)
                    ->orWhereIn( 'category_id',$all)->where('gender', 'unisex')->get();
            }
         }else{
             if($category->parent_id){
                $products = Product::where('category_id',$categoryId)->get();
             }else{
                $products = Product::whereIn(
                        'category_id',$all
                    )->get();
             }
           
         }
        
        $output = '';
         foreach($products as $product){
            $output.= " <div class='product col-sm-6 col-md-3 col-6'>".
          "<a href='/product_details/".$product->id ."'  class=''>".
                "<div class=''>".
                "    <div class='img-div'>".
                      "  <img src='/images/".$product->image ." ' class='' alt=''>".
                  "  </div>".
                   " <div class=''>".
                       " <p class=''> ".$product->name." </p>";
                        
                            $pro_cat = Product::find($product->id);
                            if($pro_cat->category != null){
                        
                                $output.="<p class=''>". $pro_cat->category->name ."</p>";
                            }
                        if($product->spl_price==0){
                        $output.="<p>".$product->price."&euro;</p>";
                        }else{
                        $output.=" <p>".$product->spl_price."&euro;</p>";
                        }
                        $output.=" </div>       </div>   </a>     </div>     " ;
   
         }

         if(count($products)>0){
            echo $output;
         }else{
             echo "<h3>No products</h3>";
         }

       /*   return response()
            ->json(['output' => $output, 'number' => $number]); */
         
    }
/* 
    public function product_price(Request $request) {
        $poster_size = $request->sizeSelected;
        
        return view('product_details', compact('poster_size'));
    } */

    public function searchProduct(Request $request){
        $products = Product::search($request->data)->paginate(20);
        $output = '';
        foreach($products as $product){
           $output.= " <div class='product'>".
         "<a href='/product_details/".$product->id ."'  class=''>".
               "<div class=''>".
               "    <div class='img-div'>".
                     "  <img src='/images/".$product->image ." ' class='' alt=''>".
                 "  </div>".
                  " <div class=''>".
                      " <p class=''> ".$product->name." </p>";
                       
                           $pro_cat = Product::find($product->id);
                           if($pro_cat->category != null){
                       
                               $output.="<p class=''>". $pro_cat->category->name ."</p>";
                           }
                       if($product->spl_price==0){
                       $output.="<p>".$product->price."&euro;</p>";
                       }else{
                       $output.=" <p>".$product->spl_price."&euro;</p>";
                       }
                       $output.=" </div>       </div>   </a>     </div>     " ;
  
        }

        if(count($products)>0){
            echo $output;
         }else{
             echo "<h3>No products</h3>";
         }

    }

    public function giftsForHim() {
        $categories = Category::where('parent_id',NULL)->get();

        $shirts = DB::table('product')
        ->select('product.id', 'product.name', 'product.description', 'product.category_id', 'product.price', 'product.image', 'product.spl_price', 'product.design_id')
        ->join('categories', 'categories.id', 'product.category_id')
        ->where('categories.name','T-Shirts')
        ->where(function ($q) {
            $q->where('product.gender', 'male')->orWhere('product.gender', 'unisex');
        })
        ->get();
       
        $casesIds = Category::where('parent_id', $parentId = Category::where('name', 'Cases')
        ->value('id'))
        ->pluck('id')
        ->all();
        $casesProducts =  Product::whereIn('category_id', $casesIds)->where(function ($q) {
            $q->where('product.gender', 'male')->orWhere('product.gender', 'unisex');
        })->get();

        $wallArtIds = Category::where('parent_id', $parentId = Category::where('name', 'Wall ART')
        ->value('id'))
        ->pluck('id')
        ->all();
        $wallProducts =  Product::whereIn('category_id', $wallArtIds)->where(function ($q) {
            $q->where('product.gender', 'male')->orWhere('product.gender', 'unisex');
        })->get();

        $makeupBags = DB::table('product')
        ->select('product.id', 'product.name', 'product.description', 'product.category_id', 'product.price', 'product.image', 'product.spl_price', 'product.design_id')
        ->join('categories', 'categories.id', 'product.category_id')
        ->where('categories.name','Makeup Bags')
        ->where(function ($q) {
            $q->where('product.gender', 'male')->orWhere('product.gender', 'unisex');
        })
        ->get();

        $mugs = DB::table('product')
        ->select('product.id', 'product.name', 'product.description', 'product.category_id', 'product.price', 'product.image', 'product.spl_price', 'product.design_id')
        ->join('categories', 'categories.id', 'product.category_id')
        ->where('categories.name','Mugs')
        ->where(function ($q) {
            $q->where('product.gender', 'male')->orWhere('product.gender', 'unisex');
        })
        ->get();

        $backpacks = DB::table('product')
        ->select('product.id', 'product.name', 'product.description', 'product.category_id', 'product.price', 'product.image', 'product.spl_price', 'product.design_id')
        ->join('categories', 'categories.id', 'product.category_id')
        ->where('categories.name','Backpacks')
        ->where(function ($q) {
            $q->where('product.gender', 'female')->orWhere('product.gender', 'unisex');
        })
        ->get();

        $clocks = DB::table('product')
        ->select('product.id', 'product.name', 'product.description', 'product.category_id', 'product.price', 'product.image', 'product.spl_price', 'product.design_id')
        ->join('categories', 'categories.id', 'product.category_id')
        ->where('categories.name','Clocks')
        ->where(function ($q) {
            $q->where('product.gender', 'male')->orWhere('product.gender', 'unisex');
        })
        ->get();

        $notebooks = DB::table('product')
        ->select('product.id', 'product.name', 'product.description', 'product.category_id', 'product.price', 'product.image', 'product.spl_price', 'product.design_id')
        ->join('categories', 'categories.id', 'product.category_id')
        ->where('categories.name','Notebooks')
        ->where(function ($q) {
            $q->where('product.gender', 'male')->orWhere('product.gender', 'unisex');
        })
        ->get();

        return view('gifts_for_him', compact('categories', 'shirts', 'casesProducts', 'wallProducts', 'makeupBags', 'mugs', 'backpacks', 'clocks', 'notebooks'));
    }

    public function giftsForHer() {
        $categories = Category::where('parent_id',NULL)->get();

        $shirts = DB::table('product')
        ->select('product.id', 'product.name', 'product.description', 'product.category_id', 'product.price', 'product.image', 'product.spl_price', 'product.design_id')
        ->join('categories', 'categories.id', 'product.category_id')
        ->where('categories.name','T-Shirts')
        ->where(function ($q) {
            $q->where('product.gender', 'female')->orWhere('product.gender', 'unisex');
        })
        ->get();
       
        $casesIds = Category::where('parent_id', $parentId = Category::where('name', 'Cases')
        ->value('id'))
        ->pluck('id')
        ->all();
        $casesProducts =  Product::whereIn('category_id', $casesIds)->where(function ($q) {
            $q->where('product.gender', 'female')->orWhere('product.gender', 'unisex');
        })->get();

        $wallArtIds = Category::where('parent_id', $parentId = Category::where('name', 'Wall ART')
        ->value('id'))
        ->pluck('id')
        ->all();
        $wallProducts =  Product::whereIn('category_id', $wallArtIds)->where(function ($q) {
            $q->where('product.gender', 'female')->orWhere('product.gender', 'unisex');
        })->get();

        $makeupBags = DB::table('product')
        ->select('product.id', 'product.name', 'product.description', 'product.category_id', 'product.price', 'product.image', 'product.spl_price', 'product.design_id')
        ->join('categories', 'categories.id', 'product.category_id')
        ->where('categories.name','Makeup Bags')
        ->where(function ($q) {
            $q->where('product.gender', 'female')->orWhere('product.gender', 'unisex');
        })
        ->get();

        $mugs = DB::table('product')
        ->select('product.id', 'product.name', 'product.description', 'product.category_id', 'product.price', 'product.image', 'product.spl_price', 'product.design_id')
        ->join('categories', 'categories.id', 'product.category_id')
        ->where('categories.name','Mugs')
        ->where(function ($q) {
            $q->where('product.gender', 'female')->orWhere('product.gender', 'unisex');
        })
        ->get();

        $bags = DB::table('product')
        ->select('product.id', 'product.name', 'product.description', 'product.category_id', 'product.price', 'product.image', 'product.spl_price', 'product.design_id')
        ->join('categories', 'categories.id', 'product.category_id')
        ->where('categories.name','Bags')
        ->where(function ($q) {
            $q->where('product.gender', 'male')->orWhere('product.gender', 'unisex');
        })
        ->get();

        $backpacks = DB::table('product')
        ->select('product.id', 'product.name', 'product.description', 'product.category_id', 'product.price', 'product.image', 'product.spl_price', 'product.design_id')
        ->join('categories', 'categories.id', 'product.category_id')
        ->where('categories.name','Backpacks')
        ->where(function ($q) {
            $q->where('product.gender', 'female')->orWhere('product.gender', 'unisex');
        })
        ->get();

        $notebooks = DB::table('product')
        ->select('product.id', 'product.name', 'product.description', 'product.category_id', 'product.price', 'product.image', 'product.spl_price', 'product.design_id')
        ->join('categories', 'categories.id', 'product.category_id')
        ->where('categories.name','Notebooks')
        ->where(function ($q) {
            $q->where('product.gender', 'female')->orWhere('product.gender', 'unisex');
        })
        ->get();

        $sacks = DB::table('product')
        ->select('product.id', 'product.name', 'product.description', 'product.category_id', 'product.price', 'product.image', 'product.spl_price', 'product.design_id')
        ->join('categories', 'categories.id', 'product.category_id')
        ->where('categories.name','Sacks')
        ->where(function ($q) {
            $q->where('product.gender', 'female')->orWhere('product.gender', 'unisex');
        })
        ->get();

        $magnets = DB::table('product')
        ->select('product.id', 'product.name', 'product.description', 'product.category_id', 'product.price', 'product.image', 'product.spl_price', 'product.design_id')
        ->join('categories', 'categories.id', 'product.category_id')
        ->where('categories.name','Magnets')
        ->where(function ($q) {
            $q->where('product.gender', 'female')->orWhere('product.gender', 'unisex');
        })
        ->get();

        return view('gifts_for_her', compact('categories', 'shirts', 'casesProducts', 'wallProducts', 'makeupBags', 'mugs', 'bags', 'backpacks', 'notebooks','sacks', 'magnets'));
    }

    public function privacyPolicy() {
        $categories = Category::where('parent_id',NULL)->get();
        return view('privacy_policy', compact('categories'));
    }

    public function howToOrder() {
        $categories = Category::where('parent_id',NULL)->get();
        return view('how_to_order', compact('categories'));
    }

    public function shipping() {
        $categories = Category::where('parent_id',NULL)->get();
        return view('shipping', compact('categories'));
    }
    
    public function helpCenter() {
        $categories = Category::where('parent_id',NULL)->get();
        return view('help_center', compact('categories'));
    }
 
    public function copyright() {
        $categories = Category::where('parent_id',NULL)->get();
        return view('copyright', compact('categories'));
    }

    public function contact() {
        $categories = Category::where('parent_id',NULL)->get();
        return view('contact_us', compact('categories'));
    }

    public function specialPrice() {
        $categories = Category::where('parent_id',NULL)->get();

        $products = Product::where('spl_price' , '!=' , 0)->get();

        return view('specialprice', compact('categories', 'products'));
    }



    public function loadImages(Request $request){
        if($request->position == 'front'){
                $image = DB::table('images')->where([
                    ['product_id', "=", $request->id],
                    ['color' , "=",$request->color],
                    ['position' , "=", 'front'],
                ])->first();
                $blankImage = 'back'.$request->color.'.jpg';
        }else{
            $image = DB::table('images')->where([
                ['product_id', "=", $request->id],
                ['color' , "=",$request->color],
                ['position' , "=", 'back'],
            ])->first();
            $blankImage = 'front'.$request->color.'.jpg';
        }

        return response()->json(array('image' => $image,'blankImage' => $blankImage));
    }

    public function loadImagesPhone(Request $request){
      
            $image = DB::table('images')->where([
                ['product_id', "=", $request->id],
                ['color' , "=",$request->color]
            ])->first();
           
            if($request->color=="Black"){
                $blankImage = 'Iphone-II-Pro-Crna.png';
            }else{
                $blankImage = 'Iphone-II-Pro-Bezpozadine1.png';
            }
           
        

        return response()->json(array('image' => $image,'blankImage' => $blankImage));
    }




}
