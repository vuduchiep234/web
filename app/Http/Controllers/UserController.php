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

    public function getListBook($id){

        $data['list'] = DB::table('publishers')->join('books', 'publishers.id', '=', 'books.publisher_id')->join('book_images', 'book_images.book_id', '=', 'books.id')->join('images', 'book_images.image_id', '=', 'images.id')->select('books.*', 'images.imageURL', 'publishers.publisherName')->where('publishers.id', '=', $id)->get();
    	
    	return view('user.book', $data);
    	
    }

    public function getDetailProduct($id){

        $data['list'] = DB::table('products')->join('producers', 'producers.id', '=', 'products.producer_id')->join('inventories', 'products.id', '=', 'inventories.product_id')->join('categories', 'categories.id', '=', 'products.category_id')->join('auction_product', 'products.id', '=', 'auction_product.product_id')->join('auctions', 'auctions.id', '=', 'auction_product.auction_id')->join('users', 'users.id', '=', 'auction_product.user_id')->join('images', 'products.image_id', '=', 'images.id')->select('auction_product.*', 'categories.type', 'producers.name as nameProducer', 'products.name as nameProduct', 'inventories.quantity', 'users.role_id', 'images.image_url', 'auctions.duration', 'products.detail')->where('products.id', '=', $id)->where('users.role_id', 2)->get();

    	return view('user.detailProduct', $data);
    	
    }

    public function getListAuthorBook($id){

        $data['list'] = DB::table('authors')->join('author_book', 'authors.id', '=', 'author_book.author_id')->join('books', 'author_book.book_id', '=', 'books.id')->join('publishers', 'publishers.id', '=', 'books.publisher_id')->join('book_images', 'book_images.book_id', '=', 'books.id')->join('images', 'book_images.image_id', '=', 'images.id')->where('authors.id', '=', $id)->select('books.*', 'publishers.publisherName', 'images.imageURL')->get();

        
        return view('user.listAuthorBook', $data);
        
    }

    public function getListBookGenre($id){

        $data['list'] = DB::table('genres')->join('book_genre', 'genres.id', '=', 'book_genre.genre_id')->join('books', 'book_genre.book_id', '=', 'books.id')->join('publishers', 'publishers.id', '=', 'books.publisher_id')->join('book_images', 'book_images.book_id', '=', 'books.id')->join('images', 'book_images.image_id', '=', 'images.id')->where('genres.id', '=', $id)->select('books.*', 'publishers.publisherName', 'images.imageURL')->get();
        
        return view('user.listBookGenre', $data);
        
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
