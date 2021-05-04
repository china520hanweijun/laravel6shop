<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //白名单
//    protected $fillable =[];
    //黑名单
    protected $guarded = [];


    //关系
    //作者
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    //博客的评论
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    //pid分组评论
    public function getCommentsByPid(){
        return $this->comments()->get()->groupBy('pid');
    }

}
