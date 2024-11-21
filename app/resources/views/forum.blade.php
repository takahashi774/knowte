@extends('layouts.layout')
@section('header')
    <header class="py-4">
        <div class="row justify-content-center mb-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class='text-center'>タイトル検索</div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row justify-content-center">
                                    @csrf
                                    <div class="col-auto">
                                        <input type="text" name="keyword" value="">
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
                                    <th>作成日</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                    <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->created_at }}</td>
                                    <td><a href="{{ route('forum.detail', ['post' => $post['id']]) }}" class="btn btn-primary">詳細</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </session>
@endsection