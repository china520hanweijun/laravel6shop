<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogs = Blog::paginate(2);
        return view('blog.index', compact('blogs'));
//        return view('blog.index', $blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $blog = $this->validate($request,[
           'title' => 'required',
            'content' => 'required',
            'blog_category_id' =>'',
            'cover' => '',
            'order_id'=> '',
        ]);
        $blog['user_id'] = Auth::id();
//        $blog['user_id'] = 1;

        $blog = Blog::create($blog);
        return redirect()->route('blog.show', compact('blog'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $blog = Blog::find($id);
//        var_dump($blog->comments);
//        dd($blog->getCommentsByPid()[0]);
        return view('blog.show',  compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $blog = Blog::find($id);
        return view('blog.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $blog = $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'blog_category_id' =>'',
            'cover' => '',
            'order_id'=> '',
        ]);
        Blog::where('id', $id)->update($blog);
        return redirect()->route('blog.show', $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Blog::destroy($id);
        return redirect()->route('blog.index');
    }
}
