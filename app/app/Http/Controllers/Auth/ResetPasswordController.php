<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function reset(Request $request)
    {
        // バリデーション
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        // パスワードリセットのロジックを実行
        $response = $this->broker()->reset(
            $this->credentials($request),
            function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        // トークンが期限切れているかどうかを確認
        if ($response === Password::PASSWORD_RESET) {
            // パスワードが正常にリセットされた場合のリダイレクト
            return redirect('/')->with('flash_message', 'パスワードを変更しました');
        } else {
            // トークンが期限切れている場合のリダイレクト
            return redirect('/reset-link-expired')->with('flash_message', 'リンクの有効期限が切れています');
        }
    }
}
