<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

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
    public function forumPage() {

        $post = new Post;
        $postAll = $post->where([
            ['post_flg', '1'],
        ])->get();


        return view('forum',[
            'posts' => $postAll,
        ]);
    }

    // 詳細ページ(掲示板閲覧用)
    public function forumDetail(Post $post) {

        return view('forum_detail',[
            'post' => $post,
        ]);
    }

    // 掲示板タイトル検索
    public function searchDate(Request $request)
    {
        $keyword = $request->input('keyword');

        if(!empty($keyword)) {
            $post = new Post;
        
            $postAll = $post->where('title', 'LIKE', "%{$keyword}%")
            ->where([
                ['post_flg', '1'],
            ])->get();

            return view('forum', [
                'posts' => $postAll, 
                'keyword'  => $keyword,
            ]);

        }else {
            $post = new Post;
            $postAll = $post->where([
                ['post_flg', '1'],
            ])->get();


            return view('forum',[
                'posts' => $postAll,
            ]);
        }
    }
}

?>