<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //白名单
//    protected $fillable =[];
    //黑名单
    protected $guarded = [];

    //关系
    //评论的作者
    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }

    //评论的子评论
    public function replies()
    {
        return $this->hasMany(Comment::class, 'pid');
    }


}
