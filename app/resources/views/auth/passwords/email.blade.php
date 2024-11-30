@extends('layouts.auth-layout')
@section('head')
    <div class="container">
        <div class="row justify-content-center">
        <div class="col col-md-offset-3 col-md-6">
            <div class="text-center mt-4">
                <h1>KnowTE</h1>
            </div>
            <nav class="card mt-5">
            <div class="card-header">パスワードリセット</div>
            <div class="card-body">
                <p>ご利用中のメールアドレスを入力してください</p>
                <p>パスワード再設定のためのURLをお送りします</p>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div>
                        <label>メールアドレス</label>
                        <input type="text" name="mail" value="{{ old('mail') }}">
                        <span>{{ $errors->first('mail') }}</span>
                    </div>
                    <div>
                        <div><a href="{{ route('login') }}">戻る</a></div>
                        <div class="text-center"><button type="submit">再設定メールを送信</button></div>
                    </div>
                </form>
            </div>
            </nav>
        </div>
        </div>
    </div>
@endsection

