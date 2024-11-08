<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;

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

Auth::routes();

Route::get('/login', function(){
    return view('auth.login');
})->name('login');


Route::group(['middleware' => 'auth'], function() {

    Route::get('/', [DisplayController::class, 'index']);
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');

    // 考察データ追加
    Route::get('/create_page', [RegistrationController::class, 'createPageForm'])->name('create.page');
    Route::post('/create_page', [RegistrationController::class, 'createPage']);  

});

Route::get('/reset-link-expired', function () {
    return view('auth.passwords.reset_expired');
});



