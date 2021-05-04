<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    /*
     * 用户信息
     */
    public function index()
    {
        return view('user.info');
    }

    /*
     * 用户博客列表
     */
    public function blogs($id)
    {
        Blog::where('user_id', $id)->get()->paginate(9);
        return view('home');
    }

    /*
     * 消息
     */

    /*
     * 评论
     */
    public function comments($id)
    {
        Comment::where('user_id', $id)->get()->paginate(9);
        return view('home');

    }

}
