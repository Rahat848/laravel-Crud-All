<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',function(){
    return view('customerform');
});

Route::get('/register',[CustomerController::class,'index']);
Route::post('/register',[CustomerController::class,'store']);
Route::get('/customer',[CustomerController::class,'view']);
Route::get('/customer/delete/{id}',[CustomerController::class,'delete'])->name('customer.delete');
Route::get('/customer/edit/{id}',[CustomerController::class,'edit'])->name('customer.edit');
Route::post('/customer/update/{id}',[CustomerController::class,'update'])->name('customer.update');


//trash er jonno
Route::get('/customer/trash',[CustomerController::class,'trash']);
Route::get('/customer/restore/{id}',[CustomerController::class,'restore'])->name('customer.restore');
//force delete
Route::get('/customer/force-delete/{id}',[CustomerController::class,'forceDelete'])->name('customer.force-delete');


//session
Route::get('get-all-session',function(){
    $session = session()->all();

    p($session);  //p function is created by app er vitor helper.php
});


Route::get('set-session',function(Request $request){
    $request->session()->put('name','Rahat');
    $request->session()->put('user_id','123');
    Session::flash('status', 'success!'); 
    return redirect('get-all-session');
});


Route::get('destroy-session',function(){
    session()->forget('name');
    return redirect('get-all-session');

});

