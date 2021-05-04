@foreach($pcoms as $comment)
    @include('comment.comment', $comment)
@endforeach
