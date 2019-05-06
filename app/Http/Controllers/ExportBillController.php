<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExportBill;
use DB;

class ExportBillController extends Controller
{
    //
    public function getListExportBill(){
    	$data['list'] = ExportBill::paginate(10);
    	return view('admin.listExportBill', $data);
    }

    public function search(Request $request){

        $data_search = $request->get('data_search');
        $data = DB::table('export_bills')->where('id', 'like', '%'.$data_search.'%')->orWhere('creator_id', 'like', '%'.$data_search.'%')->orWhere('bill_id', 'like', '%'.$data_search.'%')->paginate(10);
        return view('admin.listExportBill', ['list' => $data]);
    }

    public function between(Request $request){
        $from = $request->get('from_date');
        $to = $request->get('to_date');
        $needle = 'created_at';

        $data = DB::table('export_bills')->whereBetween($needle, [$from, $to])->paginate(10);
        return view('admin.listExportBill', ['list' => $data]);
    }
}
