@extends('layouts.auth-layout')
@section('head')

    <div class="container">
        <div class="row justify-content-center">
        <div class="col col-md-offset-3 col-md-6">
            <div class="text-center mt-4">
                <h1>KnowTE</h1>
            </div>
            <nav class="card mt-5">
            <div class="card-header">ログイン</div>
            <div class="card-body">
                @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $message)
                    <p>{{ $message }}</p>
                    @endforeach
                </div>
                @endif
                <form action="{{ route('login') }}" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
                    </div>
                    <div class="form-group">
                        <label for="password">パスワード</label>
                        <input type="password" class="form-control" id="password" name="password" />
                    </div>
                    <div class="text-right">
                        <div><a href="{{ route('register') }}">>>新規登録はこちら</a></div>
                        <div><a href="{{ route('password.request') }}">>>パスワードお忘れの方</a></div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">ログイン</button>
                    </div>
                </form>
            </div>
            </nav>
        </div>
        </div>
    </div>
@endsection
