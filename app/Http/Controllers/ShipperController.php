<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipper;
use DB;

class ShipperController extends Controller
{
    //
    public function post(Request $request){

		
		return back();
	}

    public function getlistShipper(){

		$data['list'] = shipper::paginate(10);
		return view('admin.listShipper', $data);
	}

    public function search(Request $request){

        $data_search = $request->get('data_search');
        $data = DB::table('shippers')->where('id', 'like', '%'.$data_search.'%')->orWhere('name', 'like', '%'.$data_search.'%')->orWhere('phone', 'like', '%'.$data_search.'%')->orWhere('state', 'like', '%'.$data_search.'%')->paginate(10);
        return view('admin.listShipper', ['list' => $data]);
    }

	public function editShipper(Request $request){

        $shipper = shipper::find($request->get('shipper-id'));
        $shipper->name = $request->get('shipper-name');
        $shipper->phone = $request->get('shipper-phone');
        $shipper->state = $request->get('shipper-state');
        
        $shipper->save();
        return back();
        
    }

    public function deleteShipper(Request $request){
        $shipper = shipper::find($request->input('id'));
        if($shipper->delete()){
            echo "Delete Success";
        }
    }
}
