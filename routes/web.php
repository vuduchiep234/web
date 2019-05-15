<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('homeAdmin', 
	['as'=>'homeAdmin', 'uses'=>'AdminController@getHomeAdmin']
);


Route::get('listProduct', 
	['as'=>'listProduct', 'uses'=>'ProductController@getListProduct']
);

Route::get('listProduct/search', 
	['as'=>'listProduct/search', 'uses'=>'ProductController@search']
);


Route::get('listImportBill', 
	['as'=>'listImportBill', 'uses'=>'ImportBillController@getListImportBill']
);

Route::get('listImportBill/search', 
	['as'=>'listImportBill/search', 'uses'=>'ImportBillController@search']
);

Route::get('listImportBill/between', 
	['as'=>'listImportBill/between', 'uses'=>'ImportBillController@between']
);

Route::get('listExportBill', 
	['as'=>'listExportBill', 'uses'=>'ExportBillController@getListExportBill']
);

Route::get('listExportBill/search', 
	['as'=>'listExportBill/search', 'uses'=>'ExportBillController@search']
);

Route::get('listExportBill/between', 
	['as'=>'listExportBill/between', 'uses'=>'ExportBillController@between']
);

Route::get('listOrder', 
	['as'=>'listOrder', 'uses'=>'OrderController@getListOrder']
);

Route::get('listOrder/search', 
	['as'=>'listOrder/search', 'uses'=>'OrderController@search']
);

Route::get('orderProcessing', 
	['as'=>'orderProcessing', 'uses'=>'OrderController@getOrderProcessing']
);

Route::get('orderProcessing/search', 
	['as'=>'orderProcessing/search', 'uses'=>'OrderController@search']
);


##########################################################################################

Route::get('listTypeProduct', 
	['as' => 'listTypeProduct', 'uses' => 'CategoryController@getCategory']
);


##########################################################################################

Route::get('listProducer', 
	['as'=>'listProducer', 'uses'=>'ProducerController@getListProducer']
);

##########################################################################################

Route::get('listRole', 
	['as'=>'listRole', 'uses'=>'RoleController@getListRole']
);

##########################################################################################

Route::get('listMember', 
	['as'=>'listMember', 'uses'=>'MemberController@getListMember']
);


##########################################################################################

Route::get('listShipper', 
	['as'=>'listShipper', 'uses'=>'ShipperController@getListShipper']
);

Route::get('listShipper/search', 
	['as'=>'listShipper/search', 'uses'=>'ShipperController@search']
);



##########################################################################################

Route::get('register',
	['as'=>'register', 'uses'=>'RegisterController@getRegister']
);

Route::get('login',
	['as'=>'login', 'uses'=>'LoginController@login']
);

Route::get('homePage',
 	['as'=>'homePage', 'uses'=>'UserController@getHome']
);

Route::get('product/{id}',
 	['as'=>'product', 'uses'=>'UserController@getListProduct']
);

// Route::get('listProductOfAuthor/{id}',
//  	['as'=>'listProductOfAuthor', 'uses'=>'UserController@getListAuthorProduct']
// );

// Route::get('listProductOfGenre/{id}',
//  	['as'=>'listProductOfGenre', 'uses'=>'UserController@getListProductGenre']
// );

Route::get('detailProduct/{id}',
 	['as'=>'detailProduct', 'uses'=>'UserController@getProductDetail']
);