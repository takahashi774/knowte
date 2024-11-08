@extends('layouts.auth-layout')
@section('header')

<section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <form method="post" action="{{ route('create.page') }}">
            @csrf
                <div class="mt-8">    
                    <div class="w-full flex flex-col">
                        <label for="title" class="font-semibold mt-4">タイトル</label>
                        <input type="text" name="title" class="w-auto py-2 border border-gray-300 rounded-md" id="title">
                    </div>
                </div>
            
                <div class="w-full flex flex-col">
                    <label for="consideration" class="font-semibold mt-4">本文</label> 
                    <textarea name="consideration" class="w-auto py-2 border border-gray-300 rounded-md" id="consideration" cols="30" rows="5">
                    </textarea>
                </div>
            
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">投稿</button>
                </div>
            </form>
        </div>
    </session>

@endsection