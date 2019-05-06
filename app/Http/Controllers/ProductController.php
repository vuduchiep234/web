<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Producer;
use App\Models\Category;
use App\Models\Image;
use DB;

class ProductController extends Controller
{
    //
    public function getListProduct(){

		$data['list'] = Product::paginate(10);
		
		return view('admin.listProduct', $data);
	}

	public function search(Request $request){

        $data_search = $request->get('data_search');
        $data = DB::table('products')->where('id', 'like', '%'.$data_search.'%')->orWhere('name', 'like', '%'.$data_search.'%')->orWhere('price', 'like', '%'.$data_search.'%')->orWhere('producer_id', 'like', '%'.$data_search.'%')->orWhere('category_id', 'like', '%'.$data_search.'%')->orWhere('image_id', 'like', '%'.$data_search.'%')->orWhere('state', 'like', '%'.$data_search.'%')->paginate(10);
        return view('admin.listProduct', ['list' => $data]);
    }

}
