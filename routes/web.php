<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RegistrationController;
use App\Models\Customer;
use App\Models\Product;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\PhotoController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/demo/{name}/{id?}', function ($name,$id=null) {
//    echo $name ." " .$id;
// $data=compact('name','id');
// return view('demo')->with($data);
// });
// Route::get('/{name?}',function($name=null){
//     $demo="<h2>HELLo</h2>";
//     $data=compact('name','demo');

//     return view('home')->with($data);
// });

// Route::get('/{name?}',function($name=null){
//     $demo='<h1>Heolo</h1>';
//     $data=compact('name','demo');       
//     return view('home')->with($data);
// });

// Route::get('/','App\Http\Controllers\DemoController@index'); 
Route::get('/', function(){
    return view('welcome');
});
// Route::get('/', [DemoController::class, 'index']);
Route::get('/about', [DemoController::class, 'about']);
Route::get('/courses', SingleActionController::class);
Route::resource('/photo', PhotoController::class);
Route::get('/register', [RegistrationController::class, 'index']);
Route::post('/register', [RegistrationController::class, 'register']);

Route::group(['prefix'=>'customer'], function () {
    Route::get('/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::get('/', [CustomerController::class, 'view']);
    Route::get('/trash', [CustomerController::class, 'trash']);
    Route::get('/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');
    Route::get('/forceDelete/{id}', [CustomerController::class, 'forceDelete'])->name('customer.forceDelete');
    Route::get('/restore/{id}', [CustomerController::class, 'restore'])->name('customer.restore');
    Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
    Route::post('/', [CustomerController::class, 'store']);

});




Route::get('get-all-session', function () {
    $session = session()->all();
    p($session);
});

Route::get('set-session', function (Request $request) {
    $request->session()->put('user-name', 'Shk Talha');
    $request->session()->put('user-id', '0263');
    $request->session()->flash('status', 'Active');
    return redirect('get-all-session');
});
Route::get('destroy-session', function () {
    // session()->forget('user-id');
    session()->forget(['user-name', 'user-id']);

    return redirect('get-all-session');
});

Route::get('/upload', function () {
    return view('upload');
});
Route::post('/upload', [DemoController::class, 'upload']);