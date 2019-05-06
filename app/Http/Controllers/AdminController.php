<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getHomeAdmin(){
    	return view('admin.homeAdmin');
    }

    public function getListRole(){
        return view('admin.listRole');
    }

    public function getListMember(){
    	return view('admin.listMember');
    }

    public function getInsertMember(){
    	return view('admin.insertMember');
    }

    public function getListProducer(){
        return view('admin.listProducer');
    }

    public function getListTypeProduct(){
        return view('admin.listTypeProduct');
    }

    public function getListProduct(){
    	return view('admin.listProduct');
    }

    public function getInsertProduct(){
    	return view('admin.insertProduct');
    }

    public function getImportOfWarehouse(){
    	return view('admin.importOfWarehouse');
    }

    public function getListShipper(){
        return view('admin.listShipper');
    }

    public function getInsertShipper(){
        return view('admin.insertShipper');
    }

    public function getListOrder(){
        return view('admin.listOrder');
    }

    public function getOrderProcessing(){
        return view('admin.orderProcessing');
    }


}
