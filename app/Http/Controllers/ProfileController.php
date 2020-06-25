<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Address;
use App\Order;
use App\Product;
use App\Category;
use App\User;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;    
use Image;
class ProfileController extends Controller
{
    //
    public function index() {
        $categories = Category::where('parent_id',NULL)->get();
        $user_id = Auth::user()->id;

        $orders = DB::table('order_product')->leftJoin('product', 'product.id', '=', 'order_product.product_id')->
                    leftJoin('orders', 'orders.id', '=', 'order_product.order_id')->
                    where('orders.user_id', '=', $user_id)->get();
        return view('profile.index', compact('categories', 'orders'));
    }



    public function address() {
        $categories = Category::where('parent_id',NULL)->get();

        $user_id = Auth::user()->id;

        $user = DB::table('user_address')->where('user_id', '=',  $user_id)->first();

        if ($user === null) {
            $address_data = null;
            return view('profile.fill-address', compact('address_data', 'categories'));
        } else {
            $address_data = DB::table('user_address')->where('user_id', '=', $user_id)->orderby('id', 'DESC')->first();
        //dd( $address_data);
            return view('profile.address', compact('address_data', 'categories'));
        }

       
    }

    public function createAddress(Request $request) {
        $categories = Category::where('parent_id',NULL)->get();

        $this->validate($request, [ 
            'firstname' => 'required|min:3|max:35',
            'lastname' => 'required|min:3|max:35',
            'email' => 'required|email',
            'phone' => 'required',
            'street' => 'required|min:3|max:35',
            'zip' => 'required|regex:/\b\d{5}\b/',
            'city' => 'required|min:3|max:35'
        ],
            [
                'firstname.required' => 'Enter First Name',
                'lastname.required' => 'Enter Last Name',
                'email.required' => 'Pleaste enter valid email',
                'phone.required' => 'Plese enter your phone number',
                'street.required' => 'Enter Street',
                'zip.required' => 'Zip is not valid',
                'city.required' => 'Enter City',
            ]);
        
        $userid = Auth::user()->id;

        DB::table('user_address')->insert([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'street' => $request->street,
            'zip' => $request->zip,
            'city' => $request->city,
            'user_id' => $userid,
            'created_at' => now()
        ]);

         $address_data = DB::table('user_address')->where('user_id', '=', $userid)->orderby('id', 'DESC')->first();
        //dd( $address_data);
        return view('profile.address', compact('address_data', 'categories'));
    }

    public function updateAddress(Request $request) {
        $this->validate($request, [
            'firstname' => 'required|min:3|max:35',
            'lastname' => 'required|min:3|max:35',
            'email' => 'required|email',
            'phone' => 'required',
            'street' => 'required|min:3|max:35',
            'zip' => 'required|regex:/\b\d{5}\b/',
            'city' => 'required|min:3|max:35'
        ],
            [
                'firstname.required' => 'Enter First Name',
                'lastname.required' => 'Enter Last Name',
                'email.required' => 'Pleaste enter valid email',
                'phone.required' => 'Plese enter your phone number',
                'street.required' => 'Enter Street',
                'zip.required' => 'Zip is not valid',
                'city.required' => 'Enter City',
            ]);
        
        $userid = Auth::user()->id;
        DB::table('user_address')->where('user_id', $userid)->update($request->except('_token'));
        return back()->with('msg', 'Your address has been updated');
    }

    public function password() {
        $categories = Category::where('parent_id',NULL)->get();
        return view('profile.password', compact('categories'));
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        return back()->with('msg', 'You have change your password successfuly!');

    }

    public function profilImage() {
        $categories = Category::where('parent_id',NULL)->get();
        return view('profile.add_avatar', compact('categories'));
    }

    public function updateProfilImage(Request $request) {
        // Handle the user upload of avatar
    	if($request->hasFile('avatar')){
            $width = 300; 
            $height = 100;
    		$avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $img = Image::make($avatar);
           
            $img->height() > $img->width() ? $width=null : $height=null;
    		$img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            })->save( public_path('/avatars/' . $filename ) );
    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}

    	return back();;
    }

    public function myWishlist() {
        $Products = DB::table('wishlist')->leftJoin('product', 'wishlist.pro_id', '=', 'product.id')
                                        ->where("user_id", "=" , Auth::user()->id)->get();
        $categories = Category::where('parent_id',NULL)->get();
        return view('profile.my_wishlist', compact('Products', 'categories'));
    }
}
