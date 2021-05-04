{{--<div class="single-page-comments">--}}
{{--    <div class="single-comment-user">--}}
{{--        <img src="img/blog/user-2.jpg" alt="" />--}}
{{--    </div>--}}
{{--    <div class="single-comment-text">--}}
{{--        <h4>评论者: <a href="#">{{$comment->owner->name}}</a></h4>--}}
{{--        <span>时间, {{$comment-created_at}}</span>--}}
{{--        <p>{{$comment->content}}</p>--}}
{{--        <a href="#"><i class="fa fa-link"></i> 回复他 Link </a>--}}
{{--        @include('comment.form', ["pid"=>$comment->id])--}}
{{--        @if(isset($comments[$comment->id]))--}}
{{--            @include('comment.list', ['collections' =>$comennts[$comennt->id]])--}}
{{--        @endif--}}
{{--    </div>--}}
{{--</div>--}}

<div class="single-page-comments">
    <div class="single-comment-user">
        <img src="URL::asset('img/blog/user-1.jpg')" alt="{{$comment->owner->name}}" />
    </div>
    <div class="single-comment-text">
        <h4>posted by <a class="shaddam" href="#">{{$comment->owner->name}}</a></h4>
        <span>{{$comment->created_at}} </span>
        <p>{{$comment->content}}</p>
{{--发表评论--}}
{{--        <a href="#"><i class="fa fa-link"></i> 回复 </a>--}}
        @include('comment.form',['pid'=>$comment->id])
{{--        子评论--}}
        @if(isset($blog->getCommentsByPid()[$comment->id]))
            @include('comment.list', ['pcoms'=>$blog->getCommentsByPid()[$comment->id]])
        @endif

    </div>
</div>
