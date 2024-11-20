<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\CreateData;

use App\Post;

class DisplayController extends Controller
{
    // マイページ
    public function index() {
        $posts = Auth::user()->post()->get();

        $id = Auth::id();

        $post = new Post;
        $postAll = $post->where([
            ['user_id', $id],
        ])->get();


        return view('mypage',[
            'posts' => $postAll,
        ]);
    }
    
    public function logout(){
        Auth::logout();
        return redirect('/login');

    }

    // 詳細ページ
    public function postDetail(Post $post) {

        return view('detail',[
            'post' => $post,
        ]);
    }

    // 掲示板
    public function index() {

        $post = new Post;
        $postAll = $post->where([
            ['del_flg', '1'],
        ])->get();


        return view('forum',[
            'posts' => $postAll,
        ]);
    }

}

?>