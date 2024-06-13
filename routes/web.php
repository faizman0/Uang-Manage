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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/home', "PageController@home");
    
    //PEMASUKAN

    Route::get('/pemasukan', "TransaksiController@pemasukan");

    Route::get('/pemasukan/add', "TransaksiController@addpemasukan");    

    Route::post('/savepemasukan', 'TransaksiController@savepemasukan');

    Route::get('/pemasukan/editPemasukan/{id}', "TransaksiController@editPemasukan");

    Route::put('/updatePemasukan/{id}', 'TransaksiController@updatePemasukan');

    Route::get('/deletePemasukan/{id}', 'TransaksiController@deletePemasukan');

    //PENGELUARAN
    Route::get('/pengeluaran', "TransaksiController@pengeluaran");
    
    Route::get('/pengeluaran/add', "TransaksiController@addpengeluaran");

    Route::post('/savepengeluaran', 'TransaksiController@savepengeluaran');

    Route::get('/pengeluaran/editPengeluaran/{id}', "TransaksiController@editPengeluaran");

    Route::put('/updatePengeluaran/{id}', 'TransaksiController@updatePengeluaran');

    Route::get('/deletePengeluaran/{id}', 'TransaksiController@deletePengeluaran');

    //AUTH
    route::get('/logout',"AuthController@ceklogout");
    
    route::get('/edituser',"PageController@edituser");
    
    route::post('/updateuser',"PageController@updateuser");

    Route::get('/laporan', 'TransaksiController@monthlyReport');

    Route::get("/actsearchdata", "TransaksiController@actsearchdata");

});

Route::group(['middleware' => ['guest']], function () {
    // menampilkan from login 
    route::get('/',"PageController@login")->name('login');
    route::post('/ceklogin',"AuthController@ceklogin");
});