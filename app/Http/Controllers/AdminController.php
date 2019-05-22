<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Auction;
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

    public function getAuction(){

        $data['list'] = Auction::paginate(10);
        return view('admin.listAuction', $data);
        
    }

    public function getAuctionProduct(){

        $data['list'] = DB::table('auction_product')->join('auctions', 'auction_product.auction_id', 'auctions.id')->join('products', 'auction_product.product_id', 'products.id')->join('users', 'auction_product.user_id', 'users.id')->select('auction_product.*', 'products.name as nameProduct', 'users.name as nameUser', 'auctions.duration')->where('users.role_id', 2)->paginate(10);
        $data['listP'] = Product::all();
        $data['listA'] = Auction::all();
        return view('admin.listAuctionProduct', $data);
        
    }

    public function getListUser(){

        $data['list'] = DB::table('users')->join('roles', 'roles.id', 'users.role_id')->select('users.*', 'roles.type')->paginate(10);
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
        // $data['list'] = ImportBill::paginate(10);
        $data['list'] = DB::table('import_bills')->join('products', 'import_bills.product_id', 'products.id')->join('users', 'import_bills.creator_id', 'users.id')->select('import_bills.*', 'products.name', 'users.name as creator')->paginate(10);
        $data['listP'] = Product::all();
    	return view('admin.listImportBill', $data);
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

    public function search(Request $request){
        if($request->ajax()){

            $result="";

            $role = Role::where('type','LIKE','%'.$request->data_search.'%')->orWhere('id','LIKE','%'.$request->data_search.'%')->get();
            if($role){
                foreach ($role as  $key => $data) {
                    $result .= "<tr row_id_role='$data->id'>".
                                "<td class='text-center'>".$data->id."</td>".
                                "<td class='text-center'>".$data->type."</td>".
                                "<td class='text-center'>"
                                        ."<a href='#' class='blue' data-toggle='modal' id_edit_role=".$data->id." data-type='update-role' name=".$data->type.">"
                                            ."<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                        ."</a>"
                                    ."</td>"
                                    ."<td class='text-center'>"
                                        ."<a href='#' class='red delete_role' id_delete_role=".$data->id." data-type='delete-role' data-toggle='modal'>"
                                            ."<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                        ."</a>"
                                    ."</td>"
                            ."</tr>";
                }
                return Response($result);
            }
        }
    }

    public function searchUser(Request $request){
        if($request->ajax()){

            $result="";

            $user = DB::table('users')->join('roles', 'roles.id', 'users.role_id')->select('users.*', 'roles.type')->where('name','LIKE','%'.$request->data_search.'%')->orWhere('users.id','LIKE','%'.$request->data_search.'%')->orWhere('users.email','LIKE','%'.$request->data_search.'%')->orWhere('roles.type','LIKE','%'.$request->data_search.'%')->get();
            if($user){
                foreach ($user as  $key => $data) {
                    $result .= 

                            "<tr row_id_user='$data->id'>"
                            ."<td class='text-center'>$data->id</td>"
                            ."<td class='text-center'>$data->name</td>"
                            ."<td class='text-center'>$data->email</td>"
                            // "<!-- <td class="text-center">{{$user->password}}</td> -->
                            ."<td class='text-center'>$data->type</td>"
                            ."<td class='text-center'>"
                                ."<a href='#'' class='blue' id_edit_user='$data->id' name='$data->name' email='$data->email' password='$data->password' role_id='$data->role_id' role='$data->type' data-type='update-user' data-toggle='modal'>"
                                    ."<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                ."</a>"
                            ."</td>"
                            
                            ."<td class='text-center'>"
                                ."<a class='red' href='#'' id_delete_user='$data->id' data-type='delete-user' data-toggle='modal'>"
                                    ."<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                ."</a>"

                            ."</td>"
                        ."</tr>";
                }
                return Response($result);
            }
        }
    }

    public function searchProducer(Request $request){
        if($request->ajax()){

            $result="";

            $producer = DB::table('producers')->where('name','LIKE','%'.$request->data_search.'%')->orWhere('address','LIKE','%'.$request->data_search.'%')->orWhere('email','LIKE','%'.$request->data_search.'%')->orWhere('phone','LIKE','%'.$request->data_search.'%')->orWhere('id','LIKE','%'.$request->data_search.'%')->get();
            if($producer){
                foreach ($producer as  $key => $data) {
                    $result .= 

                            "<tr row_id_user='$data->id'>"
                            ."<td class='text-center'>$data->id</td>"
                            ."<td class='text-center'>$data->name</td>"
                            ."<td class='text-center'>$data->address</td>"
                            ."<td class='text-center'>$data->email</td>"
                            ."<td class='text-center'>$data->phone</td>"
                            ."<td class='text-center'>"
                                        ."<a href='#' class='blue' data-toggle='modal' id_edit_producer=".$data->id." data-type='update-producer' name=".$data->name.">"
                                            ."<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                        ."</a>"
                                    ."</td>"
                                    ."<td class='text-center'>"
                                        ."<a href='#' class='red delete_producer' id_delete_producer=".$data->id." data-type='delete-producer' data-toggle='modal'>"
                                            ."<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                        ."</a>"
                                    ."</td>"
                        ."</tr>";
                }
                return Response($result);
            }

        }
    }

    public function searchCategory(Request $request){
        if($request->ajax()){

            $result="";

            $category = Category::where('type','LIKE','%'.$request->data_search.'%')->orWhere('id','LIKE','%'.$request->data_search.'%')->get();
            if($category){
                foreach ($category as  $key => $data) {
                    $result .= "<tr row_id_category='$data->id'>".
                                "<td class='text-center'>".$data->id."</td>".
                                "<td class='text-center'>".$data->type."</td>".
                                "<td class='text-center'>"
                                        ."<a href='#' class='blue' data-toggle='modal' id_edit_category=".$data->id." data-type='update-category' name=".$data->type.">"
                                            ."<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                        ."</a>"
                                    ."</td>"
                                    ."<td class='text-center'>"
                                        ."<a href='#' class='red delete_category' id_delete_role=".$data->id." data-type='delete-category' data-toggle='modal'>"
                                            ."<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                        ."</a>"
                                    ."</td>"
                            ."</tr>";
                }
                return Response($result);
            }
        }
    }

    public function searchProduct(Request $request){
        if($request->ajax()){

            $result="";

            $product = DB::table('products')->join('producers', 'products.producer_id', 'producers.id')->join('categories', 'products.category_id', 'categories.id')->join('inventories', 'products.id', 'inventories.product_id')->join('images', 'products.image_id', 'images.id')->select('products.*', 'producers.name as nameProducer', 'categories.type', 'inventories.quantity', 'images.image_url')->where('products.name','LIKE','%'.$request->data_search.'%')->orWhere('products.id','LIKE','%'.$request->data_search.'%')->orWhere('producers.name','LIKE','%'.$request->data_search.'%')->orWhere('categories.type','LIKE','%'.$request->data_search.'%')->get();
            if($product){
                foreach ($product as  $key => $data) {
                    $result .= 

                            "<tr row_id_user='$data->id'>"
                            ."<td class='text-center'>$data->id</td>"
                            ."<td class='text-center'>$data->name</td>"
                            ."<td class='text-center'>$data->price</td>"
                            ."<td class='text-center'>$data->detail</td>"
                            ."<td class='text-center'>$data->nameProducer</td>"
                            ."<td class='text-center'>$data->type</td>"
                            ."<td class='text-center'>$data->image_url</td>"
                            ."<td class='text-center'>$data->quantity</td>"
                            ."<td class='center'>"
                                ."<a href='#' class='orange' data-toggle='modal' id_import_product=".$data->id." data-type='import-product' >"
                                    ."<i class='ace-icon fa fa-edit bigger-130'></i>"
                                ."</a>"
                            ."</td>"
                            ."<td class='center'>"
                                ."<a href='#' class='blue' data-toggle='modal' id_edit_product=".$data->id." data-type='update-product' >"
                                ."<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                ."</a>"
                            ."</td>"
                            ."<td class='center'>"
                                ."<a href='#' class='red delete_product' data-toggle='modal' id_delete_product=".$data->id." data-type='delete-product'>"
                                ."<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                ."</a>"
                            ."</td>"
                        ."</tr>";
                }
                return Response($result);
            }

        }
    }

    public function searchShipper(Request $request){
        if($request->ajax()){

            $result="";

            $shipper = Shipper::where('name','LIKE','%'.$request->data_search.'%')->orWhere('id','LIKE','%'.$request->data_search.'%')->orWhere('phone','LIKE','%'.$request->data_search.'%')->orWhere('state','LIKE','%'.$request->data_search.'%')->get();
            if($shipper){
                foreach ($shipper as  $key => $data) {
                    $result .= 

                            "<tr row_id_user='$data->id'>"
                            ."<td class='text-center'>$data->id</td>"
                            ."<td class='text-center'>$data->name</td>"
                            ."<td class='text-center'>$data->phone</td>"
                            ."<td class='text-center'>$data->state</td>"
                            ."<td class='center'>"
                                ."<a href='#' class='blue' data-toggle='modal' id_edit_shipper=".$data->id." data-type='update-shipper' name=".$data->name.">"
                                    ."<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                ."</a>"
                            ."</td>"
                            ."<td class='center'>"
                                ."<a href='#' class='red delete_shipper' id_delete_shipper=".$data->id." data-type='delete-shipper' data-toggle='modal'>"
                                    ."<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                ."</a>"
                            ."</td>"
                        ."</tr>";
                }
                return Response($result);
            }
        }
    }

    public function searchImport(Request $request){
        if($request->ajax()){

            $result="";

            $import = DB::table('import_bills')->join('products', 'import_bills.product_id', 'products.id')->join('users', 'import_bills.creator_id', 'users.id')->select('import_bills.*', 'products.name', 'users.name as creator')->where('users.name','LIKE','%'.$request->data_search.'%')->orWhere('import_bills.id','LIKE','%'.$request->data_search.'%')->orWhere('products.name','LIKE','%'.$request->data_search.'%')->orWhere('quantity','LIKE','%'.$request->data_search.'%')->orWhere('import_bills.price','LIKE','%'.$request->data_search.'%')->get();
            if($import){
                foreach ($import as  $key => $data) {
                    $result .= 

                            "<tr row_id_user='$data->id'>"
                            ."<td class='text-center'>$data->id</td>"
                            ."<td class='text-center'>$data->creator</td>"
                            ."<td class='text-center'>$data->name</td>"
                            ."<td class='text-center'>$data->quantity</td>"
                            ."<td class='text-center'>$data->price</td>"
                            ."<td class='text-center'>"
                                ."<a href='#' class='blue' data-toggle='modal' id_edit_import=".$data->id." import_product_id=".$data->creator_id." data-quantity=".$data->quantity." data-price=".$data->price." data-role='update-importBill'>"
                                    ."<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                ."</a>"
                            ."</td>"
                            ."<td class='text-center'>"
                                ."<a href='#' class='red delete_import' id_delete_import=".$data->id." data-role='delete-importBill' data-toggle='modal'>"
                                    ."<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                ."</a>"
                            ."</td>"
                        ."</tr>";
                }
                return Response($result);
            }
        }
    }



}
