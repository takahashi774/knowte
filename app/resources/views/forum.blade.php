@extends('layouts.layout')
@section('header')
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row justify-content-center">
                <div class="border col-7">
                    <div class="row">
                        <div class="col-md">
                            @foreach($posts as $post)
                            <h5>{{ $post['title'] }}</h5>
                            <div><img src="{{ asset($post->image) }}" ></div>
                            <div>{{ $post['consideration'] }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </session>
@endsection