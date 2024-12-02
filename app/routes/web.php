<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LikeController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;


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
    Route::get('logout', [LoginController::class, 'logout'])->name('logout'); 

    // 管理者ページ
    Route::group(['middleware' => ['auth', 'can:admin']], function () {
        Route::get('/admin', [DisplayController::class, 'AdminPage'])->name('admin.page');
    });
    // 管理者ページ　タイトル＆ユーザー名検索
    Route::post('/admin', [DisplayController::class, 'searchUser']);
    // 管理者ページ　ユーザー物理削除
    Route::get('/destroy_user/{user}', [RegistrationController::class, 'destroyUser'])->name('destroy.user');
    // 掲示板へ公開
    Route::get('/public_post/{post}', [RegistrationController::class, 'publicPost'])->name('public.post');
    // 掲示板へ非公開
    Route::get('/private_post/{post}', [RegistrationController::class, 'privatePost'])->name('private.post');


    // 考察データ追加
    Route::get('/create_page', [RegistrationController::class, 'createPageForm'])->name('create.page');
    Route::post('/create_page', [RegistrationController::class, 'createPage']);
    
    Route::group(['middleware' => 'can:view,post'], function() {
        // 考察データ詳細
        Route::get('/post/{post}/detail', [DisplayController::class, 'postDetail'])->name('post.detail');
        // 考察データ編集
        Route::get('/edit_post/{post}', [RegistrationController::class, 'editPostForm'])->name('edit.post');
        Route::post('/edit_post/{post}', [RegistrationController::class, 'editPost']);
        
        // 考察データ物理削除
        Route::get('/destroy_post/{post}', [RegistrationController::class, 'destroyPost'])->name('destroy.post');
    });

    // 掲示板
    Route::get('/forum_page', [DisplayController::class, 'forumPage'])->name('forum.page');
    // 考察データ詳細(掲示板閲覧用)
    Route::get('/forum/{post}/detail', [DisplayController::class, 'forumDetail'])->name('forum.detail');

    // 掲示板タイトル検索
    Route::post('/forum_page', [DisplayController::class, 'searchDate']);

    // いいね機能
    Route::post('/ajaxlike', [LikeController::class, 'ajaxlike'])->name('posts.ajaxlike');
});

// パスワードリセット
// リセット用　メールフォーム
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// 入力したメールへPOST送信
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// メールから再設定フォーム
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
//  再設定フォームからPOST送信(更新)
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Route::get('/reset-link-expired', function () {
//     return view('auth.passwords.reset_expired');
// });

