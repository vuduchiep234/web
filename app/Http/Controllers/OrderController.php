<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Producer;
use App\Models\Category;
use App\Models\Image;
use DB;

class OrderController extends Controller
{
    //
    public function getListOrder(){

		$data['list'] = Bill::paginate(10);
		
		return view('admin.listOrder', $data);
	}

	public function getOrderProcessing(){

		$data['list'] = Bill::paginate(10);
		
		return view('admin.orderProcessing', $data);
	}

	public function search(Request $request){

        $data_search = $request->get('data_search');
        $data = DB::table('bills')->where('id', 'like', '%'.$data_search.'%')->orWhere('billdetail_id', 'like', '%'.$data_search.'%')->orWhere('user_id', 'like', '%'.$data_search.'%')->orWhere('shipper_id', 'like', '%'.$data_search.'%')->orWhere('state', 'like', '%'.$data_search.'%')->paginate(10);
        return view('admin.orderProcessing', ['list' => $data]);
    }
}
