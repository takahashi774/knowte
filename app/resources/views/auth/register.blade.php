@extends('layouts.auth-layout')
@section('head')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
      <div class="text-center mt-4">
                <h1>アカウント作成</h1>
            </div>
        <nav class="card mt-5">
          <div class="card-header">会員登録</div>
          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('register') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
              </div>
              <div class="form-group">
                <label for="name">ユーザー名</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
              </div>
              <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="form-group">
                <label for="password-confirm">パスワード（確認）</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">新規登録する</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection