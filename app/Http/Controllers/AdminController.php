<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Producer;
use App\Models\Product;
use App\Models\Shipper;
use App\Models\Category;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\ImportBill;
use App\Models\ExportBill;
use DB;

class AdminController extends Controller
{
    public function getHomeAdmin(){
    	return view('admin.homeAdmin');
    }

    public function getListRole(){

        $data['list'] = Role::paginate(10);
        return view('admin.listRole', $data);
        
    }

    public function getListRolePagination(){

        $data['list'] = Role::paginate(10);
        return view('admin.listRolePagination', $data)->render();
        
    }

    public function getListUser(){

        $data['list'] = User::paginate(10);
        $data['listR'] = Role::all();
        return view('admin.listUser', $data);
        
    }


    public function getListProducer(){

        $data['list'] = Producer::paginate(10);
        return view('admin.listProducer', $data);
    }

    public function getListCategory(){

        $data['list'] = Category::paginate(10);
        return view('admin.listCategory', $data);
    }

    public function getListProduct(){

        $data['listProducer'] = Producer::all();
        $data['listCate'] = Category::all();
        // $data['list'] = DB::select("Select products.*, producers.name as nameProducer, categories.type, inventories.quantity, images.image_url From products, producers, categories, inventories, images Where products.producer_id = producers.id And products.category_id = categories.id And products.id = inventories.product_id and products.image_id = images.id");

        $data['list'] = DB::table('products')->join('producers', 'products.producer_id', 'producers.id')->join('categories', 'products.category_id', 'categories.id')->join('inventories', 'products.id', 'inventories.product_id')->join('images', 'products.image_id', 'images.id')->select('products.*', 'producers.name as nameProducer', 'categories.type', 'images.image_url', 'inventories.quantity')->paginate(10);
        return view('admin.listProduct', $data);
    }

    public function getListImportBill(){
    	return view('admin.listImportBill');
    }

    public function getListExportBill(){

        $data['list'] = ExportBill::paginate(10);
        return view('admin.listExportBill', $data);
    }

    public function getListShipper(){

        $data['list'] = Shipper::paginate(10);
        return view('admin.listShipper', $data);
    }


    public function getListOrder(){

        $data['list'] = Bill::paginate(10);
        return view('admin.listOrder', $data);
    }

    public function getOrderProcessing(){

        $data['list'] = Bill::paginate(10);
        return view('admin.orderProcessing', $data);
    }


}
