@extends('layouts.layout')
@section('header')
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
        </div>
    </session>
@endsection