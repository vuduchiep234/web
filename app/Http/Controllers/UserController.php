<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use DB;

class UserController extends Controller
{
    //
    public function getHome(){
    	
        $data['list'] = DB::table('products')->join('producers', 'producers.id', '=', 'products.producer_id')->join('inventories', 'products.id', '=', 'inventories.product_id')->join('categories', 'categories.id', '=', 'products.category_id')->join('auction_product', 'products.id', '=', 'auction_product.product_id')->join('auctions', 'auctions.id', '=', 'auction_product.auction_id')->join('users', 'users.id', '=', 'auction_product.user_id')->join('images', 'products.image_id', '=', 'images.id')->select('auction_product.*', 'categories.type', 'producers.name as nameProducer', 'products.name as nameProduct', 'inventories.quantity', 'users.role_id', 'images.image_url', 'auctions.duration', 'products.id as id_product')->where('users.role_id', 2)->get();
    	return view('user.home', $data);
    	
    }

    public function getDetailProduct($id){

        $data['list'] = DB::table('products')->join('producers', 'producers.id', '=', 'products.producer_id')->join('inventories', 'products.id', '=', 'inventories.product_id')->join('categories', 'categories.id', '=', 'products.category_id')->join('auction_product', 'products.id', '=', 'auction_product.product_id')->join('auctions', 'auctions.id', '=', 'auction_product.auction_id')->join('users', 'users.id', '=', 'auction_product.user_id')->join('images', 'products.image_id', '=', 'images.id')->select('auction_product.*', 'categories.type', 'producers.name as nameProducer', 'products.name as nameProduct', 'inventories.quantity', 'users.role_id', 'images.image_url', 'auctions.duration', 'products.detail')->where('products.id', '=', $id)->where('users.role_id', 2)->get();

    	return view('user.detailProduct', $data);
    	
    }

    public function getProductOfProducer($id){

        $data['list'] = DB::table('products')->join('producers', 'producers.id', '=', 'products.producer_id')->join('inventories', 'products.id', '=', 'inventories.product_id')->join('categories', 'categories.id', '=', 'products.category_id')->join('auction_product', 'products.id', '=', 'auction_product.product_id')->join('auctions', 'auctions.id', '=', 'auction_product.auction_id')->join('users', 'users.id', '=', 'auction_product.user_id')->join('images', 'products.image_id', '=', 'images.id')->select('auction_product.*', 'categories.type', 'producers.name as nameProducer', 'products.name as nameProduct', 'inventories.quantity', 'users.role_id', 'images.image_url', 'auctions.duration', 'products.id as id_product')->where('users.role_id', 2)->where('producers.id', $id)->get();
      return view('user.productOfProducer', $data);
        
    }

    public function getProductOfCategory($id){

        $data['list'] = DB::table('products')->join('producers', 'producers.id', '=', 'products.producer_id')->join('inventories', 'products.id', '=', 'inventories.product_id')->join('categories', 'categories.id', '=', 'products.category_id')->join('auction_product', 'products.id', '=', 'auction_product.product_id')->join('auctions', 'auctions.id', '=', 'auction_product.auction_id')->join('users', 'users.id', '=', 'auction_product.user_id')->join('images', 'products.image_id', '=', 'images.id')->select('auction_product.*', 'categories.type', 'producers.name as nameProducer', 'products.name as nameProduct', 'inventories.quantity', 'users.role_id', 'images.image_url', 'auctions.duration', 'products.id as id_product')->where('users.role_id', 2)->where('categories.id', $id)->get();
      return view('user.productOfProducer', $data);
        
    }

    public function searchProductUser(Request $request){
        if($request->ajax()){

            // $result="";
            $output="";

            $data =  DB::table('products')->join('images', 'images.id', 'products.image_id')->select('products.*', 'images.image_url')
            ->where('products.name','LIKE','%'.$request->data_search.'%')
            ->get();
              $output = "<ul class='dropdown-menu' style='display:table; position:relative;'>";
              foreach($data as $row)
              {
        
               $output .=
               "<li><a href='/detailProduct/$row->id'>".$row->name."</a></li>";
              }
              $output .= "</ul>";
              // echo $output;
              return Response($output);
            
        }
    }
}
