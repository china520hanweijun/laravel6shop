<form method="POST" action="{{route('comment.store')}}">
    @csrf

    @if(isset($pid))
        <input type="hidden" name="pid" value="{{$pid}}">
    @endif

    <div class="form-group">
        <label for="body" class="control-label">内容:</label>
        <input type="hidden" name="blog_id" value="{{$blog->id}}">
        <textarea id="body" name="content"  class="form-control" required="required"></textarea>
    </div>
    <button type="submit" class="btn btn-success">回复</button>
</form>
