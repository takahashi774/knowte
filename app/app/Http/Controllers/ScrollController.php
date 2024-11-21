<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class ScrollController extends Controller
{
    public function scroll()
    {
        $post_list = Post::orderByDesc('created_at')->paginate(5);

        return view('scroll', [
            'post_list' => $post_list,
        ]);
    }
}
