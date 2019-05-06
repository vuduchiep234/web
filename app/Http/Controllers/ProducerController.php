<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producer;
use DB;

class ProducerController extends Controller
{
    //
	public function post(Request $request){

		
		return back();
	}

    public function getListProducer(){

		$data['list'] = Producer::paginate(10);
		return view('admin.listProducer', $data);
	}

    public function search(Request $request){

        $data_search = $request->get('data_search');
        $data = DB::table('producers')->where('id', 'like', '%'.$data_search.'%')->orWhere('name', 'like', '%'.$data_search.'%')->orWhere('phone', 'like', '%'.$data_search.'%')->orWhere('email', 'like', '%'.$data_search.'%')->orWhere('address', 'like', '%'.$data_search.'%')->paginate(10);
        return view('admin.listProducer', ['list' => $data]);
    }

	public function editProducer(Request $request){

        $producer = Producer::find($request->get('producer-id'));
        $producer->name = $request->get('name-producer');
        $producer->address = $request->get('address-producer');
        $producer->phone = $request->get('phone-producer');
        $producer->email = $request->get('email-producer');
        $producer->save();
        return back();
        
    }

    public function deleteProducer(Request $request){
        $producer = Producer::find($request->input('id'));
        if($producer->delete()){
            echo "Delete Success";
        }
    }
}
