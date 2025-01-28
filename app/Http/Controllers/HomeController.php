<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function home(){
        if(Auth::check()){
            $usertype=Auth::user()->usertype;
            if($usertype=== 'admin'){
                return view('admin.index');

            }
            else{
                $products=Product::all();
                $cart=Cart::where('user_id',Auth::user()->id)->count();
                return view('home.index',compact('products','cart'));

            }

        }
    }
    public function index(){

        $products=Product::all();
        // $cart=Cart::where('user_id',Auth::user()->id)->count();
        return view('home.index',compact('products'));

    }
    public function product() {
        $products=Product::all();
        $cart=Cart::where('user_id',Auth::user()->id)->count();
        return view('home.product',compact('products','cart'));
    }
    public function ProductDetails($id){
        $product=Product::find($id);
        $cart=Cart::where('user_id',Auth::user()->id)->count();
        return view('home.product_details',compact('product','cart'));
    }
    public function add_cart($id){
        $user_id=Auth::user()->id;
        $cart=new Cart();
        $cart->user_id=$user_id;
        $cart->product_id=$id;
        toastr()->closeButton()->addSuccess('Product added to Cart');
        $cart->save();
        return redirect()->back();
    }
    public function Cart(){
        $cart=Cart::where('user_id',Auth::user()->id)->count();
        $cart_pro=Cart::all();
        return view('home.cart',compact('cart','cart_pro'));
    }
    public function DeleteCart($id){
        $cart=Cart::find($id);
        toastr()->closeButton()->addSuccess('Product deleted to Cart');
        $cart->delete();
        return redirect()->back();

    }
    public function ConfirmOrders(Request $request){
        $cart = Cart::where('user_id', Auth::user()->id)->get(); // Utilisation de get() pour récupérer les éléments du panier
        foreach($cart as $cartItem){
            $order = new Order();
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->address = $request->address; // Correction de "adress" en "address"
            $order->user_id = Auth::user()->id;
            $order->product_id = $cartItem->product_id;
            $order->save(); // Enregistrement de chaque commande
        }
        $cart_remove=Cart::where('user_id',Auth::user()->id)->get();
        foreach($cart_remove as $carts){
            $data=Cart::find($carts->id);
            $data->delete();
        }
        return redirect()->back();
    }
    public function myorders(){
        $cart=Cart::where('user_id',Auth::user()->id)->count();
        $order=Order::where('user_id',Auth::user()->id)->get();
        return view('home.myorders',compact('cart','order'));
    }


}
