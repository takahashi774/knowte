@extends('layouts.auth-layout')
@section('head')

<div class="container">
    <div class="row justify-content-center">
        <div class="col col-md-offset-3 col-md-6">
        <div class="text-center mt-4">
            <h1>KnowTE</h1>
        </div>
        <nav class="card mt-5">
          <div class="card-header">パスワード再設定</div>
          <div class="card-body">
            <form action="{{ route('password.update') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="password">新しいパスワード</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="form-group">
                <label for="password-confirm">新しいパスワード（確認）</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
              </div>
              <input type=hidden id="email" name="email" value="{{ $email }}">
              <input type=hidden id="token" name="token" value="{{ $token }}">
              <div class="text-center">
                <button type="submit" class="btn btn-primary">パスワード再設定する</button>
              </div>
            </form>
          </div>
        </nav>
        </div>
    </div>
</div>
@endsection
