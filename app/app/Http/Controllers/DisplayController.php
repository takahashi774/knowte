<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Post;

use App\Like;

use App\User;

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

    // 管理者ページ
    public function AdminPage()
    {
        $postAll = Post::all();

        return view('admin_page',[
            'posts' => $postAll,
        ]);
    }

    // 管理者ページ　タイトル＆ユーザー名検索
    public function searchUser(Request $request)
    {
        $keyword = $request->input('keyword');
        $username = $request->input('username');

        $post = Post::query();

        $post->join('users', function($post) use ($request) {
            $post->on('posts.user_id', '=', 'users.id');
        });

        if(!empty($keyword)) {

            if(!empty($username)){
       
                $postAll = $post
                    ->where('title', 'LIKE', "%{$keyword}%")
                    ->where('name', 'LIKE', "%{$username}%")
                    ->get();

                return view('admin_page', [
                    'posts' => $postAll, 
                    'keyword'  => $keyword,
                    'username' => $username,
                ]);
            }else{
                $postAll = $post
                    ->where('title', 'LIKE', "%{$keyword}%")
                    ->get();

                return view('admin_page', [
                    'posts' => $postAll, 
                    'keyword'  => $keyword,
                    'username' => $username,
                ]);
            }

        }else {

            if(!empty($username)){
       
                $postAll = $post
                    ->where('name', 'LIKE', "%{$username}%")
                    ->get();

                return view('admin_page', [
                    'posts' => $postAll, 
                    'keyword'  => $keyword,
                    'username' => $username,
                ]);
            }else{
                $postAll = Post::all();

                return view('admin_page',[
                    'posts' => $postAll,
                ]);
            }

        }
    }

    // 掲示板
    public function forumPage() {

        $post = new Post;
        $postAll = $post->where([
            ['post_flg', '1'],
        ])->get();

        $like_model = new Like;


        return view('forum',[
            'posts' => $postAll,
            'like_model'=>$like_model,
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
            $like_model = new Like;
        
            $postAll = $post->where('title', 'LIKE', "%{$keyword}%")
            ->where([
                ['post_flg', '1'],
            ])->get();

            return view('forum', [
                'posts' => $postAll, 
                'keyword'  => $keyword,
                'like_model'=>$like_model,
            ]);

        }else {
            $post = new Post;
            $like_model = new Like;

            $postAll = $post->where([
                ['post_flg', '1'],
            ])->get();


            return view('forum',[
                'posts' => $postAll,
                'like_model'=>$like_model,
            ]);
        }
    }
}

?>