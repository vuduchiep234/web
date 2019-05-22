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
	['as'=>'listProduct', 'uses'=>'AdminController@getListProduct']
);

Route::get('listProduct/search', 
	['as'=>'listProduct/search', 'uses'=>'AdminController@search']
);


Route::get('listImportBill', 
	['as'=>'listImportBill', 'uses'=>'AdminController@getListImportBill']
);

Route::get('listImportBill/search', 
	['as'=>'listImportBill/search', 'uses'=>'AdminController@search']
);

Route::get('listImportBill/between', 
	['as'=>'listImportBill/between', 'uses'=>'AdminController@between']
);

Route::get('listExportBill', 
	['as'=>'listExportBill', 'uses'=>'AdminController@getListExportBill']
);

Route::get('listExportBill/search', 
	['as'=>'listExportBill/search', 'uses'=>'AdminController@search']
);

Route::get('listExportBill/between', 
	['as'=>'listExportBill/between', 'uses'=>'AdminController@between']
);

Route::get('listOrder', 
	['as'=>'listOrder', 'uses'=>'AdminController@getListOrder']
);

Route::get('listOrder/search', 
	['as'=>'listOrder/search', 'uses'=>'AdminController@search']
);

Route::get('orderProcessing', 
	['as'=>'orderProcessing', 'uses'=>'AdminController@getOrderProcessing']
);

Route::get('orderProcessing/search', 
	['as'=>'orderProcessing/search', 'uses'=>'AdminController@search']
);


##########################################################################################

Route::get('listCategory', 
	['as' => 'listCategory', 'uses' => 'AdminController@getListCategory']
);


##########################################################################################

Route::get('listProducer', 
	['as'=>'listProducer', 'uses'=>'AdminController@getListProducer']
);

##########################################################################################

Route::get('listRole', 
	['as'=>'listRole', 'uses'=>'AdminController@getListRole']
);

Route::get('listRolePagination', 
	['as'=>'listRolePagination', 'uses'=>'AdminController@getListRolePagination']
);

##########################################################################################

Route::get('listUser', 
	['as'=>'listUser', 'uses'=>'AdminController@getListUser']
);


##########################################################################################

Route::get('listShipper', 
	['as'=>'listShipper', 'uses'=>'AdminController@getListShipper']
);

Route::get('listShipper/search', 
	['as'=>'listShipper/search', 'uses'=>'AdminController@search']
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


Route::get('detailProduct/{id}',
 	['as'=>'detailProduct', 'uses'=>'UserController@getProductDetail']
);

Route::get('listAuction',
 	['as'=>'listAuction', 'uses'=>'AdminController@getAuction']
);

Route::get('listAuctionProduct',
 	['as'=>'listAuctionProduct', 'uses'=>'AdminController@getAuctionProduct']
);


Route::get('/search','AdminController@search');

Route::get('/searchUser','AdminController@searchUser');

Route::get('/searchProducer','AdminController@searchProducer');

Route::get('/searchCategory','AdminController@searchCategory');

Route::get('/searchProduct','AdminController@searchProduct');

Route::get('/searchShipper','AdminController@searchShipper');

Route::get('/searchImport','AdminController@searchImport');