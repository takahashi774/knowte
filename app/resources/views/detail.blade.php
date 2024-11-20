@extends('layouts.layout')
@section('header')
    <header class="py-4">
        <div class="container px-4 px-lg-5 my-1">
            <div class='d-flex justify-content-around mt-3'>
                <a href="{{ url('/') }}">
                    <button type='button' class='btn btn-primary'>編集</button>
                </a>
                @if($post->post_flg == '0')
                <a href="{{ route('public.post', ['post' => $post->id]) }}">
                    <button type='button' class='btn btn-primary'>掲示板へ公開する</button>
                </a>
                @elseif($post->post_flg == '1')
                <a href="{{ route('private.post', ['post' => $post->id]) }}">
                    <button type='button' class='btn btn-primary'>非公開にする</button>
                </a>
                @endif
            </div>
        </div>
    </header>
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row justify-content-center">
                <div class="border col-7">
                    <div class="row">
                        <div class="col-md">
                            @isset($post)
                                <h2>{{ $post['title'] }}</h2>
                                @if(!is_null($post['image']))
                                    <img src="{{ asset('storage/'.$post->image) }}" >
                                @endif
                                <div>{!! nl2br(e($post['consideration'])) !!}</div>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3">
            <a href="{{ route('destroy.post', ['post' => $post->id]) }}">
                <button type='button' class='btn btn-secondary'>削除</button>
            </a>
            </div>
        </div>
    </session>
@endsection