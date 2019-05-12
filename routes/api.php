<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
 
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::prefix('users')->group(function () {

        Route::get('{id?}', [
            'uses' => 'API\UserController@get',
            'as' => 'api/v1/users/get'
        ])->where('id', '[0-9]+');

        Route::post('login', [
            'uses' => 'API\UserController@login',
            'as' => 'api/v1/users/login'
        ]);

        Route::post('register', [
            'uses' => 'API\UserController@register',
            'as' => 'api/v1/users/register'
        ]);

        Route::post('logout', [
            'uses' => 'API\UserController@logout',
            'as' => 'api/v1/users/logout'
        ]);

        Route::get('session', [
            'uses' => 'API\UserController@getSessionData',
            'as' => 'api/v1/users/session'
        ]);

        Route::get('all', [
            'uses' => 'API\UserController@getAll',
            'as' => 'api/v1/users/getAll'
        ])->where('id', '[0-9]+');

        Route::post('', [
            'uses' => 'API\UserController@post',
            'as' => 'api/v1/users/post'
        ]);

        Route::patch('{id?}', [
            'uses' => 'API\UserController@patch',
            'as' => 'api/v1/users/patch'
        ])->where('id', '[0-9]+');

        Route::delete('{id}', [
            'uses' => 'API\UserController@delete',
            'as' => 'api/v1/users/delete'
        ])->where('id', '[0-9]+');

        Route::patch('changePassword', [
            'uses' => 'API\UserController@changePassword',
            'as' => 'api/v1/users/changePassword'
        ]);

    });

    Route::prefix('roles')->group(function () {


        Route::get('{id?}', [
            'uses' => 'API\RoleController@get',
            'as' => 'api/v1/roles/get'
        ])->where('id', '[0-9]+');

        Route::get('all', [
            'uses' => 'API\RoleController@getAll',
            'as' => 'api/v1/roles/getAll'
        ])->where('id', '[0-9]+');

        Route::post('', [
            'uses' => 'API\RoleController@post',
            'as' => 'api/v1/roles/post'
        ]);

        Route::patch('{id?}', [
            'uses' => 'API\RoleController@patch',
            'as' => 'api/v1/roles/patch'
        ])->where('id', '[0-9]+');

        Route::delete('{id}', [
            'uses' => 'API\RoleController@delete',
            'as' => 'api/v1/roles/delete'
        ])->where('id', '[0-9]+');

    });

    Route::prefix('images')->group(function () {


        Route::get('{id?}', [
            'uses' => 'API\ImageController@get',
            'as' => 'api/v1/images/get'
        ])->where('id', '[0-9]+');

        Route::get('all', [
            'uses' => 'API\ImageController@getAll',
            'as' => 'api/v1/images/getAll'
        ])->where('id', '[0-9]+');

        Route::post('', [
            'uses' => 'API\ImageController@post',
            'as' => 'api/v1/images/post'
        ]);

        Route::patch('{id?}', [
            'uses' => 'API\ImageController@patch',
            'as' => 'api/v1/images/patch'
        ])->where('id', '[0-9]+');

        Route::delete('{id}', [
            'uses' => 'API\ImageController@delete',
            'as' => 'api/v1/images/delete'
        ])->where('id', '[0-9]+');

    });

    Route::prefix('bills')->group(function () {


        Route::get('{id?}', [
            'uses' => 'API\BillController@get',
            'as' => 'api/v1/bills/get'
        ])->where('id', '[0-9]+');

        Route::get('all', [
            'uses' => 'API\ImageController@getAll',
            'as' => 'api/v1/images/getAll'
        ])->where('id', '[0-9]+');

        Route::get('all', [
            'uses' => 'API\BillController@getAll',
            'as' => 'api/v1/bills/getAll'
        ])->where('id', '[0-9]+');

        Route::post('', [
            'uses' => 'API\BillController@post',
            'as' => 'api/v1/bills/post'
        ]);

        Route::patch('/cancel/{id?}', [
            'uses' => 'API\BillController@cancel',
            'as' => 'api/v1/bills/cancel'
        ]);

        Route::patch('{id?}', [
            'uses' => 'API\BillController@patch',
            'as' => 'api/v1/bills/patch'
        ])->where('id', '[0-9]+');

        Route::delete('{id}', [
            'uses' => 'API\BillController@delete',
            'as' => 'api/v1/bills/delete'
        ])->where('id', '[0-9]+');

    });

    Route::prefix('billDetails')->group(function () {


        Route::get('{id?}', [
            'uses' => 'API\BillDetailController@get',
            'as' => 'api/v1/billDetails/get'
        ])->where('id', '[0-9]+');

        Route::post('', [
            'uses' => 'API\BillDetailController@post',
            'as' => 'api/v1/billDetails/post'
        ]);

        Route::patch('{id?}', [
            'uses' => 'API\BillDetailController@patch',
            'as' => 'api/v1/billDetails/patch'
        ])->where('id', '[0-9]+');

        Route::delete('{id}', [
            'uses' => 'API\BillDetailController@delete',
            'as' => 'api/v1/billDetails/delete'
        ])->where('id', '[0-9]+');

    });

    Route::prefix('categories')->group(function () {


        Route::get('{id?}', [
            'uses' => 'API\CategoryController@get',
            'as' => 'api/v1/categories/get'
        ])->where('id', '[0-9]+');

        Route::get('all', [
            'uses' => 'API\CategoryController@getAll',
            'as' => 'api/v1/categories/getAll'
        ])->where('id', '[0-9]+');

        Route::post('', [
            'uses' => 'API\CategoryController@post',
            'as' => 'api/v1/categories/post'
        ]);

        Route::patch('{id?}', [
            'uses' => 'API\CategoryController@patch',
            'as' => 'api/v1/categories/patch'
        ])->where('id', '[0-9]+');

        Route::delete('{id}', [
            'uses' => 'API\CategoryController@delete',
            'as' => 'api/v1/categories/delete'
        ])->where('id', '[0-9]+');


    });

    Route::prefix('comments')->group(function () {


        Route::get('{id?}', [
            'uses' => 'API\CommentController@get',
            'as' => 'api/v1/comments/get'
        ])->where('id', '[0-9]+');

        Route::post('', [
            'uses' => 'API\CommentController@post',
            'as' => 'api/v1/comments/post'
        ]);

        Route::patch('{id?}', [
            'uses' => 'API\CommentController@patch',
            'as' => 'api/v1/comments/patch'
        ])->where('id', '[0-9]+');

        Route::delete('{id}', [
            'uses' => 'API\CommentController@delete',
            'as' => 'api/v1/comments/delete'
        ])->where('id', '[0-9]+');

    });

    Route::prefix('exportBills')->group(function () {


        Route::get('{id?}', [
            'uses' => 'API\ExportBillController@get',
            'as' => 'api/v1/exportBills/get'
        ])->where('id', '[0-9]+');

        Route::get('all', [
            'uses' => 'API\ExportBillController@getAll',
            'as' => 'api/v1/exportBills/getAll'
        ])->where('id', '[0-9]+');

        Route::get('between', [
            'uses' => 'API\ExportBillController@getBetween',
            'as' => 'api/v1/exportBills/getBetween'
        ])->where('id', '[0-9]+');

        Route::get('statistic', [
            'uses' => 'API\ExportBillController@statistic',
            'as' => 'api/v1/exportBills/statistic'
        ])->where('id', '[0-9]+');

        Route::post('', [
            'uses' => 'API\ExportBillController@post',
            'as' => 'api/v1/ exportBills /post'
        ]);

        Route::patch('/confirm/{id?}', [
            'uses' => 'API\ExportBillController@confirm',
            'as' => 'api/v1/ exportBills/confirm'
        ])->where('id', '[0-9]+');;

        Route::patch('{id?}', [
            'uses' => 'API\ExportBillController@patch',
            'as' => 'api/v1/ exportBills /patch'
        ])->where('id', '[0-9]+');

        Route::delete('{id}', [
            'uses' => 'API\ExportBillController@delete',
            'as' => 'api/v1/ exportBills/delete'
        ])->where('id', '[0-9]+');

    });

    Route::prefix('importBills')->group(function () {


        Route::get('{id?}', [
            'uses' => 'API\ImportBillController@get',
            'as' => 'api/v1/importBills/get'
        ])->where('id', '[0-9]+');

        Route::get('all', [
            'uses' => 'API\ImportBillController@getAll',
            'as' => 'api/v1/importBills/getAll'
        ])->where('id', '[0-9]+');

        Route::get('between', [
            'uses' => 'API\ImportBillController@getBetween',
            'as' => 'api/v1/importBills/getBetween'
        ])->where('id', '[0-9]+');

        Route::get('statistic', [
            'uses' => 'API\ImportBillController@statistic',
            'as' => 'api/v1/importBills/statistic'
        ])->where('id', '[0-9]+');

        Route::post('', [
            'uses' => 'API\ImportBillController@post',
            'as' => 'api/v1/ importBills/post'
        ]);

        Route::patch('{id?}', [
            'uses' => 'API\ImportBillController@patch',
            'as' => 'api/v1/ importBills/patch'
        ])->where('id', '[0-9]+');

        Route::delete('{id}', [
            'uses' => 'API\ImportBillController@delete',
            'as' => 'api/v1/ importBills/delete'
        ])->where('id', '[0-9]+');

    });

    Route::prefix('producers')->group(function () {


        Route::get('{id?}', [
            'uses' => 'API\ProducerController@get',
            'as' => 'api/v1/producers/get'
        ])->where('id', '[0-9]+');

        Route::get('all', [
            'uses' => 'API\ProducerController@getAll',
            'as' => 'api/v1/producers/getAll'
        ])->where('id', '[0-9]+');

        Route::post('', [
            'uses' => 'API\ProducerController@post',
            'as' => 'api/v1/producers/post'
        ]);

        Route::patch('{id?}', [
            'uses' => 'API\ProducerController@patch',
            'as' => 'api/v1/producers/patch'
        ])->where('id', '[0-9]+');

        Route::delete('{id}', [
            'uses' => 'API\ProducerController@delete',
            'as' => 'api/v1/producers/delete'
        ])->where('id', '[0-9]+');

    });

    Route::prefix('products')->group(function () {


        Route::get('{id?}', [
            'uses' => 'API\ProductController@get',
            'as' => 'api/v1/products/get'
        ])->where('id', '[0-9]+');

        Route::get('all', [
            'uses' => 'API\ProductController@getAll',
            'as' => 'api/v1/products/getAll'
        ])->where('id', '[0-9]+');

        Route::post('', [
            'uses' => 'API\ProductController@post',
            'as' => 'api/v1/products/post'
        ]);

        Route::patch('{id?}', [
            'uses' => 'API\ProductController@patch',
            'as' => 'api/v1/products/patch'
        ])->where('id', '[0-9]+');

        Route::delete('{id}', [
            'uses' => 'API\ProductController@delete',
            'as' => 'api/v1/products/delete'
        ])->where('id', '[0-9]+');

    });

    Route::prefix('shippers')->group(function () {


        Route::get('{id?}', [
            'uses' => 'API\ShipperController@get',
            'as' => 'api/v1/shippers/get'
        ])->where('id', '[0-9]+');

        Route::get('all', [
            'uses' => 'API\ShipperController@getAll',
            'as' => 'api/v1/shippers/getAll'
        ])->where('id', '[0-9]+');

        Route::get('available', [
            'uses' => 'API\ShipperController@getAvailable',
            'as' => 'api/v1/shippers/available'
        ])->where('id', '[0-9]+');

        Route::post('', [
            'uses' => 'API\ShipperController@post',
            'as' => 'api/v1/ shippers/post'
        ]);

        Route::patch('{id?}', [
            'uses' => 'API\ShipperController@patch',
            'as' => 'api/v1/ shippers/patch'
        ])->where('id', '[0-9]+');

        Route::delete('{id}', [
            'uses' => 'API\ShipperController@delete',
            'as' => 'api/v1/shippers/delete'
        ])->where('id', '[0-9]+');

    });

    Route::prefix('auctions')->group(function () {


        Route::get('{id?}', [
            'uses' => 'API\AuctionController@get',
            'as' => 'api/v1/auctions/get'
        ])->where('id', '[0-9]+');

        Route::get('all', [
            'uses' => 'API\AuctionController@all',
            'as' => 'api/v1/auctions/getAll'
        ]);

        Route::get('productAll', [
            'uses' => 'API\AuctionController@productAll',
            'as' => 'api/v1/auctions/productAll'
        ]);

        Route::post('', [
            'uses' => 'API\AuctionController@post',
            'as' => 'api/v1/auctions/post'
        ]);

        Route::post('auction', [
            'uses' => 'API\AuctionController@auction',
            'as' => 'api/v1/auctions/auction'
        ]);

        Route::prefix('cards')->group(function () {


            Route::get('{id?}', [
                'uses' => 'API\CardController@get',
                'as' => 'api/v1/cards/get'
            ])->where('id', '[0-9]+');


            Route::post('', [
                'uses' => 'API\CardController@post',
                'as' => 'api/v1/cards/post'
            ]);

            Route::patch('{id?}', [
                'uses' => 'API\CardController@patch',
                'as' => 'api/v1/cards/patch'
            ])->where('id', '[0-9]+');

            Route::delete('{id}', [
                'uses' => 'API\CardController@delete',
                'as' => 'api/v1/cards/delete'
            ])->where('id', '[0-9]+');

        });

    });
});
