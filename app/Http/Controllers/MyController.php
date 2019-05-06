<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Comment;
use DB;
use DOMDocument;
use Cart;
use Auth;
use App\Models\User;
use App\Models\Inventory;


class MyController extends Controller
{
    //
    public function login(){
        return view('login');
    }

    public function postLogin(Request $request){
        $email = $request->email;
        $password = $request->password;
        $data = User::where('email', $email)->where('password', $password)->first();
        $id = $data->id;
        $role_id = $data->role_id;
        $first_name = $data->first_name;
        $last_name = $data->last_name;
        $phone = $data->phone;

        $request->session()->put('id', $id);
        $request->session()->put('first_name', $first_name);
        $request->session()->put('last_name', $last_name);
        $request->session()->put('phone', $phone);

        $product['newProduct'] = DB::table('images')->join('products', 'products.image_id', '=', 'images.id')->orderBy('products.id', 'desc')->join('inventories', 'products.id', '=', 'inventories.product_id')->get();
        $product['listProduct'] = DB::table('images')->join('products', 'products.image_id', '=', 'images.id')->join('inventories', 'products.id', '=', 'inventories.product_id')->get();
        if($role_id == 6){
            return view('admin.homeAdmin');
        }
        else if($role_id == 2 || $role_id == 5){
            return view('ui.home', $product);
        }
        else{
            dd('that bai');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->forget('id');
        return redirect()->intended('login');
    }

//////////////////////////////////////////////
    public function getIndex(){

    	$category['listCate'] = Category::all(); 
    	// $product['listProduct'] = Product::all();
    	$product['newProduct'] = DB::table('products')->join('images', 'products.image_id', '=', 'images.id')->orderBy('products.id', 'desc')->join('inventories', 'products.id', '=', 'inventories.product_id')->get();
        $product['listProduct'] = DB::table('products')->join('images', 'products.image_id', '=', 'images.id')->join('inventories', 'products.id', '=', 'inventories.product_id')->get();
    	return view('ui.home', $category, $product);
    }

    public function detailProduct(Request $request){

    	$comment['listComment'] = DB::table('comments')->join('users', 'comments.user_id', '=', 'users.id')->get(); 
        // dd($comment);
    	$product['product'] = DB::table('products')->join('images', 'products.image_id', '=', 'images.id')->where('products.id', '=', $request->idProduct)->first();
    	return view('ui.detailProduct', $comment, $product);
    }

    public function categoryProduct($idCategory){

    	$data['type'] = Category::where('id', $idCategory)->first(); 
    	$product['listProduct'] = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')->join('images', 'products.image_id', '=', 'images.id')->where('products.category_id', $idCategory)->get();
    	return view('ui.category', $product, $data);
    }

    public function addCart($id){

    	$product = DB::table('products')->join('images', 'products.image_id', '=', 'images.id')->where('products.id', '=', $id)->first();

    	Cart::add(['id' => $id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price, 'options' => ['img' => $product->content]]);

    	return redirect('cart/show');
    }

    public function showCart(){

    	$data['total'] = Cart::total();
    	$data['items'] = Cart::content();
    	return view ('ui.cart', $data);

    }

    public function deleteCart($id){
    	if($id == 'all'){
    		Cart::destroy();
    	}
    	else{
    		Cart::remove($id);
    	}
    	return back();
    }

    public function updateCart(Request $request){
    	Cart::update($request->rowId, $request->qty);
    }

    public function postComment(Request $request, $id){
        $comment = new Comment;
        $comment->content = $request->content;
    }

}
