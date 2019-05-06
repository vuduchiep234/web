<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImportBill;
use DB;

class ImportBillController extends Controller
{
    //
    public function getListImportBill(){
    	$data['list'] = ImportBill::paginate(10);
    	return view('admin.listImportBill', $data);
    }

    public function search(Request $request){

        $data_search = $request->get('data_search');
        $data = DB::table('import_bills')->where('id', 'like', '%'.$data_search.'%')->orWhere('creator_id', 'like', '%'.$data_search.'%')->orWhere('product_id', 'like', '%'.$data_search.'%')->orWhere('quantity', 'like', '%'.$data_search.'%')->orWhere('price', 'like', '%'.$data_search.'%')->paginate(10);
        return view('admin.listImportBill', ['list' => $data]);
    }

    public function between(Request $request){
        $from = $request->get('from_date');
        $to = $request->get('to_date');
        $needle = 'created_at';

        $data = DB::table('import_bills')->whereBetween($needle, [$from, $to])->paginate(10);
        return view('admin.listImportBill', ['list' => $data]);
    }
}
