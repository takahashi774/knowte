<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\User;
use Illuminate\Database\QueryException;

use Illuminate\Support\Facades\Log;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    // public function showLinkRequestForm()
    // {
    //     return view('auth.passwords.email');
    // }

    // public function sendResetLinkEmail(Request $request)
    // {

    //     Log::debug($request->only('mail'));

    //     $this->validateEmail($request);
    //     $response = $this->broker()->sendResetLink(
    //         $request->only('mail')
    //     );

    //     Log::debug('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');

    //     // 正常に完了した場合
    //     if($response == Password::RESET_LINK_SENT) {
    //         return back()->with('flash_message', 'メールを送信しました！');
    //     }

    //     Log::debug('bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb');

    //     // バリデーションエラーが発生した場合
    //     return back()
    //         ->withInput($request->only('email'))
    //         ->withErrors(['email' => 'メールを送信できませんでした。メールアドレスをご確認ください']);
    
    // }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
