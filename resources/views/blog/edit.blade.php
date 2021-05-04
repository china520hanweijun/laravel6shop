@extends('layouts.base')
@include('vendor.ueditor.assets')
@section('content')

    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
        ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
            ue.setContent('{!! $blog->content !!}'); //

        });

    </script>
            <div class="row">
                <!-- blog-area start -->
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-md-12 column">
                            <form role="form" action="{{route('blog.update', $blog->id)}}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">标题</label><input type="text" class="form-control" name="title" value="{{$blog->title}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">内容</label>

                                    <!-- 编辑器容器 -->
                                    <script id="container" name="content" type="text/plain"></script>
                                    {{--                                    <input type="password" class="form-control" id="content" />--}}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">封面图</label><input type="file" name="cover" />
                                    <p class="help-block">
                                        博客展示封面
                                    </p>
                                </div>
                                <div class="checkbox">
                                    {{--                                    <label><input type="checkbox" />Check me out</label>--}}
                                </div> <button type="submit" class="btn btn-default">确定修改</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- blog-area end -->
            </div>
@endsection
