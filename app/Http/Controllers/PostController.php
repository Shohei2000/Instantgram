<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * フォームの投稿を処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createPost(Request $request)
    {
        // バリデーション
        $request->validate([
            'caption' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // 最大2MBまでの画像ファイル
        ]);

        if ($request->hasFile('image')) {
            // 画像のアップロード処理
            $imagePath = $request->file('image')->store('images', 'public');
        }else{
            $imagePath = null;
        }
        
        // Postモデルを使って新しい投稿を作成
        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->caption = $request->input('caption');
        $post->image = $imagePath;
        $post->save();

        // リダイレクトしてホームに戻る
        return redirect()->route('home')->with('success', '投稿が成功しました！');
    }
}
