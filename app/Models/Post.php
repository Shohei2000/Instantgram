<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // テーブル名を指定
    protected $table = 'posts';

    // モデルに関連するテーブルの主キーを指定
    protected $primaryKey = 'id';

    // 可変項目
    protected $fillable = [
        'caption',
        'image',
        // 他に必要なカラムがあれば追加
    ];

    // 非表示項目
    protected $hidden = [
        // 非表示にするカラムがあれば指定
    ];

    // 日付のフォーマット
    protected $dateFormat = 'Y-m-d H:i:s';

    // モデルのタイムスタンプを更新するかの設定
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
