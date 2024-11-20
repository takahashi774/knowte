@extends('layouts.layout')
@section('header')
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row justify-content-center">
                <div class="border col-7">
                    <br>
                    <h5>考察投稿</h5>
                    <br>
                    <div class="row">
                        <div class="col-md">
                            <form method="post" action="{{ route('create.page') }}" enctype='multipart/form-data'>
                            @csrf
                                <div class="form-group">
                                    <label for="title">タイトル</label>
                                    <input type="text" class="form-control" name="title" id="title"/>
                                </div>
                                <div class="form-group">
                                    <label for="title">画像</label>
                                    <input id="image" type="file" name="image"/>
                                </div>
                                <div class="form-group">
                                    <label for="consideration">本文</label> 
                                    <textarea name="consideration" class="form-control" id="consideration" rows="3"></textarea>
                                </div>
                                <input type="hidden" id="post_flg" name="post_flg" value="0">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">投稿</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </session>
@endsection