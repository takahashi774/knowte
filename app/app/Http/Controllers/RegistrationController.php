<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Post;

class RegistrationController extends Controller
{
    //考察データ追加
    public function createPageForm() {

        return view('createpage');
    }

    public function createPage(Request $request) {

        $post = new Post;

        $id = Auth::id();

        if ($request->image === null) {

            $post->title = $request->title;
            $post->consideration = $request->consideration;
            $post->post_flg = $request->post_flg;
            $post->user_id = $id;
        }else {
            $post->image = $request->file('image')->store('public/image');

            $post->title = $request->title;
            $post->consideration = $request->consideration;
            $post->post_flg = $request->post_flg;
            $post->user_id = $id;
        }


        Auth::user()->post()->save($post);

        return redirect('/create_page');
    }

    // 考察データ（掲示板：公開）
    public function publicPost(Post $post) {

        $post->post_flg = 1;

        $post->save();

        return redirect()->back();
    }

    // 考察データ（掲示板：非公開）
    public function privatePost(Post $post) {

        $post->post_flg = 0;

        $post->save();

        return redirect()->back();
    }

    // 考察データ物理削除
    public function destroyPost(Post $post) {

        $post->delete();

        return redirect('/');
    }
}
