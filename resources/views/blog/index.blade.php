@extends('layouts.base')
@section('typeurl', '')
@section('type', '博客')
@section('title', '博客列表')
@section('content')


    <!-- blog-area start -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <!-- 博客列表 start -->
        @foreach($blogs as $blog)
            <div class="single-blog">
                <div class="blog-post-img">
                    <a href="{{route('blog.show', $blog->id)}}">
                        <img src="{{$blog->cover}}" alt="" />
                    </a>
                    <div class="blog-info-block">
									<span class="catitemdatecreated">
										<span class="blog-date">09</span>
										<span class="blog-month">aug</span>
									</span>
                    </div>
                </div>
                <h3 class="blog-title"><a href="{{route('blog.show', [$blog->id])}}">{{$blog->title}}</a></h3>
                <div class="blog-toolbar">
								<span class="blog-author">
									<i class="fa fa-user"></i>
									<a href="#">{{$blog->user_id}}</a>
								</span>
                    <span class="blog-catitemhits">
									<i class="fa fa-book"></i>
									 浏览 <b>{{$blog->views}}</b> 次
								</span>
                    <span class="blog-tag-item">
									<span class="blog-icon-tag"></span>
									Tagged under
									<a href="#">DIgital</a>
									<a href="#">Furniture</a>
									<a href="#">Donec</a>
									<a href="#">Proin</a>
								</span>
                </div>
                <div class="blog-description">
{{--                    {!! $blog->content !!}--}}
                    {!! Str::limit($blog->content, 100, '...') !!}
                </div>
                <div class="blog-read-more">
                    <a href="{{route('blog.show', [$blog->id])}}" class="k2ReadMore readon">阅读全部</a>
                </div>
            </div>
        @endforeach
        <!-- 博客分页 -->

        {{ $blogs->links() }}
{{--        --}}
{{--        <div class="panination">--}}
{{--            <ul>--}}
{{--                <li class="page hidden-xs"><a href="#">Start</a></li>--}}
{{--                <li class="page"><a href="#">Prev</a></li>--}}
{{--                <li><a href="#">1</a></li>--}}
{{--                <li class="active"><a href="#">2</a></li>--}}
{{--                <li><a href="#">3</a></li>--}}
{{--                <li><a href="#">4</a></li>--}}
{{--                <li class="hidden-xs"><a href="#">5</a></li>--}}
{{--                <li class="page"><a href="#">Next</a></li>--}}
{{--                <li class="page hidden-xs"><a href="#">End</a></li>--}}
{{--            </ul>--}}
{{--            <p>Page 1 of 5</p>--}}
{{--        </div>--}}
    </div>
    <!-- blog-area end -->

@endsection
