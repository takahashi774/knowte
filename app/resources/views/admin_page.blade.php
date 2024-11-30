@extends('layouts.layout')
@section('header')
    <header class="py-4">
        <div class="row justify-content-center mb-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class='text-center'>タイトル＆ユーザー名検索</div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row justify-content-center">
                                    @csrf
                                    <div class="col-auto">
                                        <input type="text" name="keyword" placeholder="タイトル" value="">
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" name="username"placeholder="ユーザー名" value="">
                                    </div>
                                    <div class="col-auto ml-3">
                                        <button type='submit' class='btn btn-primary'>検索</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row justify-content-center">
                <div class="border col-7">
                    <div class="row">
                        <div class="col-md" id="infinite-scroll">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th>タイトル</th>
                                    <th>公開/非公開</th>
                                    <th>ユーザー名</th>
                                    <th>ユーザー削除</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div id="content">
                                        @foreach ($posts as $post)
                                        <div>
                                            <tr>
                                                <td>{{ $post->title }}</td>
                                                <td>
                                                    @if($post->post_flg == '0')
                                                    <a href="{{ route('public.post', ['post' => $post->id]) }}">
                                                        <button type='button' class='btn btn-primary'>掲示板へ公開する</button>
                                                    </a>
                                                    @elseif($post->post_flg == '1')
                                                    <a href="{{ route('private.post', ['post' => $post->id]) }}">
                                                        <button type='button' class='btn btn-primary'>非公開にする</button>
                                                    </a>
                                                    @endif
                                                </td>
                                                <td>{{ $post->user->name }}</td>
                                                <td>
                                                    <a href="{{ route('destroy.user', ['user' => $post->user->id]) }}">
                                                        <button type='button' class='btn btn-secondary'>削除</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        </div>
                                        @endforeach
                                    <div>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </session>
@endsection