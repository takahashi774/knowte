<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class ScrollController extends Controller
{
    public function scroll()
    {
        $pdo = new Post(DSN, USER, PASSWORD);
        // コンテンツ件数
        $count = $_POST["count"];
        
        // SQL文生成
        $sql = "SELECT ";
        $sql .=   "content ";
        $sql .= "FROM ";
        $sql .=   " content_table";
        $sql .= "LIMIT ".$count.", ".$count + 10;
        
        // 実行結果取得
        $stmt = $pdo->query($sql); 
        // 配列取得
        $content_arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($content_arr);
        exit;

        return view('scroll', [
            'post_list' => $post_list,
        ]);
    }
}
