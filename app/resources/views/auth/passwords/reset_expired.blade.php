@extends('layouts.auth-layout')
@section('head')

    <div class="container">
        <div class="row justify-content-center">
        <div class="col col-md-offset-3 col-md-6">
            <div class="text-center mt-4">
                <h1>KnowTE</h1>
            </div>
            <nav class="card mt-5">
            <div class="card-header">リンクの有効期限切れ</div>
            <div class="card-body">
                @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $message)
                    <p>{{ $message }}</p>
                    @endforeach
                </div>
                @endif
                <p>リンクの有効期限が切れています。お手数をおかけしますがもう一度メールアドレスを入力してください。</p>
                <p>再度パスワード再設定のためのURLをお送りします。</p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <label>メールアドレス</label>
                        <input type="text" name="mail" value="{{ old('mail') }}">
                        <span>{{ $errors->first('mail') }}</span>
                    </div>
                    <div>
                        <div><a href="{{ route('login') }}">戻る</a></div>
                        <button type="submit">再設定メールを送信</button>
                    </div>
                </form>
            </div>
            </nav>
        </div>
        </div>
    </div>
@endsection