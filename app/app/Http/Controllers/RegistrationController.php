<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Post;

use App\Http\Requests\CreateData;

class RegistrationController extends Controller
{
    //考察データ追加
    public function createPageForm() {

        return view('createpage');
    }

    public function createPage(CreateData $request) {

        $post = new Post;

        $id = Auth::id();

        $post->type_id = $request->type_id;
        $post->post_id = $request->post_id;
        $post->title = $request->title;
        $post->image = $request->image;
        $post->consideration = $request->consideration;
        $post->post_flg = $request->post_flg;
        $post->user_id = $id;


        Auth::user()->post()->save($post);

        return redirect('/create_page');
    }
}
