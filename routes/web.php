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

Route::get('login', 
	['as'=>'login', 'uses'=>'MyController@login']
);

Route::get('logout', 
	['as'=>'logout', 'uses'=>'MyController@logout']
);

Route::post('postLogin', 
	['as'=>'postLogin', 'uses'=>'MyController@postLogin']
);

Route::post('postComment/{id}', 
	['as'=>'postComment', 'uses'=>'MyController@postComment']
);



Route::get('homeAdmin', 
	['as'=>'homeAdmin', 'uses'=>'AdminController@getHomeAdmin']
);




// Route::get('insertMember', 
// 	['as'=>'insertMember', 'uses'=>'AdminController@getInsertMember']
// );




Route::get('listProduct', 
	['as'=>'listProduct', 'uses'=>'ProductController@getListProduct']
);

Route::get('listProduct/search', 
	['as'=>'listProduct/search', 'uses'=>'ProductController@search']
);

// Route::get('insertProduct', 
// 	['as'=>'insertProduct', 'uses'=>'AdminController@getInsertProduct']
// );

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

// Route::get('listShipper', 
// 	['as'=>'listShipper', 'uses'=>'AdminController@getListShipper']
// );

// Route::get('insertShipper', 
// 	['as'=>'insertShipper', 'uses'=>'AdminController@getInsertShipper']
// );

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

Route::get('listImage', 
	['as'=>'listImage', 'uses'=>'ImageController@getListImage']
);

Route::get('listImage/search', 
	['as'=>'listImage/search', 'uses'=>'ImageController@search']
);

Route::post('listImage', 
	['as'=>'listImage', 'uses'=>'ImageController@uploadSubmit']
);

Route::post('listImage/editImage', 
	['as'=>'listImage/editImage', 'uses'=>'ImageController@editImage']
);

Route::post('listImage/deleteImage', 
	['as'=>'listImage/deleteImage', 'uses'=>'ImageController@deleteImage']
);

##########################################################################################

Route::get('listTypeProduct', 
	['as' => 'listTypeProduct', 'uses' => 'CategoryController@getCategory']
);

Route::get('listTypeProduct/search', 
	['as'=>'listTypeProduct/search', 'uses'=>'CategoryController@search']
);

Route::post('listTypeProduct', 
	['as'=>'listTypeProduct', 'uses'=>'CategoryController@post']
);

Route::post('listTypeProduct/delete', 
	['as'=>'listTypeProduct/delete', 'uses'=>'CategoryController@deleteCategory']
);

Route::post('listTypeProduct/editCategory', 
	['as'=>'listTypeProduct/editCategory', 'uses'=>'CategoryController@editCategory']
);


##########################################################################################

Route::get('listProducer', 
	['as'=>'listProducer', 'uses'=>'ProducerController@getListProducer']
);

Route::get('listProducer/search', 
	['as'=>'listProducer/search', 'uses'=>'ProducerController@search']
);

Route::post('listProducer', 
	['as'=>'listProducer', 'uses'=>'ProducerController@post']
);

Route::post('listProducer/editProducer', 
	['as'=>'listProducer/editProducer', 'uses'=>'ProducerController@editProducer']
);

Route::post('listProducer/delete', 
	['as'=>'listProducer/delete', 'uses'=>'ProducerController@deleteProducer']
);



##########################################################################################

Route::get('listRole', 
	['as'=>'listRole', 'uses'=>'RoleController@getListRole']
);

Route::get('listRole/searchRole', 
	['as'=>'listRole/searchRole', 'uses'=>'RoleController@searchRole']
);

Route::post('listRole', 
	['as'=>'listRole', 'uses'=>'RoleController@post']
);

Route::post('listRole/editRole', 
	['as'=>'listRole/editRole', 'uses'=>'RoleController@editRole']
);

Route::post('listRole/deleteRole', 
	['as'=>'listRole/deleteRole', 'uses'=>'RoleController@deleteRole']
);


##########################################################################################

Route::get('listMember', 
	['as'=>'listMember', 'uses'=>'MemberController@getListMember']
);

Route::get('listMember/search', 
	['as'=>'listMember/search', 'uses'=>'MemberController@search']
);

Route::post('listMember', 
	['as'=>'listMember', 'uses'=>'MemberController@post']
);

Route::post('listMember/editMember', 
	['as'=>'listMember/editMember', 'uses'=>'MemberController@editMember']
);

Route::post('listMember/deleteMember', 
	['as'=>'listMember/deleteMember', 'uses'=>'MemberController@deleteMember']
);



##########################################################################################

Route::get('listShipper', 
	['as'=>'listShipper', 'uses'=>'ShipperController@getListShipper']
);

Route::get('listShipper/search', 
	['as'=>'listShipper/search', 'uses'=>'ShipperController@search']
);



##########################################################################################

Route::get('index', 
	['as'=>'index', 'uses'=>'MyController@getIndex']
);

Route::get('detail', 
	['as'=>'detail', 'uses'=>'MyController@getDetail']
);

Route::get('detailProduct/{idProduct}', 
	['as'=>'detailProduct', 'uses'=>'MyController@detailProduct']
);

Route::get('category/{idCategory}', 
	['as'=>'category', 'uses'=>'MyController@categoryProduct']
);

Route::get('cart/show', 
	['as'=>'cart/show', 'uses'=>'MyController@showCart']
);

Route::get('cart/add/{id}', 
	['as'=>'cart/add', 'uses'=>'MyController@addCart']
);
Route::get('cart/delete/{id}', 
	['as'=>'cart/delete', 'uses'=>'MyController@deleteCart']
);
Route::get('cart/update', 
	['as'=>'cart/update', 'uses'=>'MyController@updateCart']
);


// Route::get('cart', 
// 	['as'=>'cart', 'uses'=>'MyController@cart']
// );
