<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Post;

use App\User;

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
            $post->user_id = $id;
        }else {

            $image_path = $request->file('image')->store('public/image');

            $post->image = basename($image_path);

            $post->title = $request->title;
            $post->consideration = $request->consideration;
            $post->user_id = $id;
        }


        Auth::user()->post()->save($post);

        return redirect('/create_page');
    }

    // 考察データ編集
    public function editPostForm(Post $post) {

        $id = Auth::id();

        $types = Post::where([
            ['user_id', $id],
        ])->get();

        return view('edit',[
            'result' => $post,
        ]);
    }

    // 考察データ更新
    public function editIncome(Income $income, CreateData $request) {

        $columns = ['amount', 'date', 'comment', 'type_id'];

        foreach($columns as $column) {
            $income->$column = $request->$column;
        }
        $income->save();

        return redirect('/');
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

    // 管理者ページ　ユーザー物理削除
    public function destroyUser(User $user) {

        $user->delete();

        return redirect('/admin');
    }
}
