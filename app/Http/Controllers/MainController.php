<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    /**
     * ホーム画面の表示
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // ログインしているユーザー情報を取得
        $user = Auth::user();

        // データベースから全ての投稿を取得し、新しい順から並べる
        $posts = Post::orderBy('created_at', 'desc')->get();

        // ホーム画面を表示する際に、ログインユーザー情報と投稿一覧をビューに渡す
        return view('home', compact('user', 'posts'));
    }


}
