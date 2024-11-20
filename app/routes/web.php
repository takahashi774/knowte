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
    
    Route::group(['middleware' => 'can:view,post'], function() {
        // 考察データ詳細
        Route::get('/post/{post}/detail', [DisplayController::class, 'postDetail'])->name('post.detail');
        // 掲示板へ公開
        Route::get('/public_post/{post}', [RegistrationController::class, 'publicPost'])->name('public.post');
        // 掲示板へ非公開
        Route::get('/private_post/{post}', [RegistrationController::class, 'privatePost'])->name('private.post');
        // 考察データ物理削除
        Route::get('/destroy_post/{post}', [RegistrationController::class, 'destroyPost'])->name('destroy.post');
    });

    // 掲示板
    Route::get('/forum_page', [DisplayController::class, 'forumPage'])->name('forum.page');
});

Route::get('/reset-link-expired', function () {
    return view('auth.passwords.reset_expired');
});




