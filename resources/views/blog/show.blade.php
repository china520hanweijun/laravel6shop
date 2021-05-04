@extends('layouts.base')
@section('content')

    <!-- blog-area start -->
    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 blog-border">
        <!-- single-blog start -->
        <div class="single-blog">
            <div class="blog-post-img">
                <img src="" alt="" />
                <div class="blog-info-block">
									<span class="catitemdatecreated">
										<span class="blog-date">25</span>
										<span class="blog-month">Mar</span>
									</span>
                </div>
            </div>
            <h3 class="blog-title">{{$blog->title}}</h3>
            <div class="blog-toolbar">
								<span class="blog-author">
									<i class="fa fa-user"></i>
									<a href="#">{{$blog->author->name}}</a>
								</span>
                <span class="blog-catitemhits">
									<i class="fa fa-book"></i>
									 Read <b>{{$blog->views}}</b> times
								</span>

                <span class="blog-tag-item">
									<span class="blog-icon-tag"></span>
									Tagged under
									<a href="#">Phone</a>
									<a href="#">Camera</a>
									<a href="#">Sony</a>
									<a href="#">Samsung s4</a>
								</span>

                {{--                        若为当前文章作者--}}
                <span class="blog-catitemhits">
{{--                            <i class="bi bi-pencil"></i>--}}
                            <button type="submit" class="btn btn-default"><a href="{{route('blog.edit', $blog->id)}}">修改</a></button>

{{--                            <form action="{{route('blog.destroy', $blog->id)}}">--}}
                    {{--                                @csrf--}}
                    {{--                                @method('DELETE')--}}
                    {{--                                <button type="button" class="btn btn-warning">删除</button>--}}
                    {{--                            </form>--}}
                        </span>
                <span class="blog-catitemhits">
                            <i class="bi bi-x"></i>
                              <form action="{{ route('blog.destroy', $blog->id) }}" method="post" style="display: inline-block;">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                                  <button type="submit" class="btn btn-danger">删除</button>
                                </form>
{{--                            <a title="删除" href="javascript:;" onclick="del_blog({{$blog->id}})">删除</a>--}}
                        </span>

            </div>
            <div class="blog-description">
                {!!$blog->content!!}
            </div>
            <div class="map-content">
                <span class="left-content">Read <b>{{$blog->views}}</b> times </span>
                <span class="right-content">最后更新时间: {{$blog->updated_at}}</span>
            </div>

            <div class="item-author">
                <div class="item-a-img">
                    <a href="#"><img src="img/blog/s-user.jpg" alt="" /></a>
                </div>
                <div class="item-a-info">
                    <h3><a href="#">{{$blog->author->name}}</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.  </p>
                    <h5><strong>Website:</strong> <a target="_blank" href="http://www.jqueryfuns.com">bootexperts.com</a></h5>
                </div>
            </div>
        </div>
        <!-- single-blog end -->
        <div class="single-comment-one">
            @if($blog->comments->count())
                <h3>
                    <span>{{$blog->comments->count()}}</span> comment
                </h3>
                @include('comment.form')
                @include('comment.list', ['pcoms'=>$blog->getCommentsByPid()[0]])

            @else
                <div class="post-log">
                    <a href="#"><i class="fa fa-link"></i>暂时还没人发现,我来偷螃蟹吃:</a>
                    @include('comment.form')
                </div>
            @endif
        </div>


    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 blog-padding">
        <div class="blog-right-sidebar">
            <div class="blog-search">
                <form action="#">
                    <input type="text" placeholder="Search" />
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="blog-category">
                <h3 class="blog-sidebar-title">categories</h3>
                <ul>
                    <li><a href="#">Phone <span>(4)</span></a></li>
                    <li><a href="#">Tablet <span>(5)</span></a></li>
                    <li><a href="#">Camera <span>(4)</span></a></li>
                    <li><a href="#">Fashion <span>(2)</span></a></li>
                    <li><a href="#">Dress <span>(3)</span></a></li>
                </ul>
            </div>
            <div class="blog-flickr">
                <h3 class="blog-sidebar-title">flickr widget</h3>
                <ul>
                    <li><a data-fancybox-group="gallery" class="fliker_img" href="img/blog/1.jpg"><img src="img/blog/flickr/1.jpg" alt="" /></a></li>
                    <li><a data-fancybox-group="gallery" class="fliker_img" href="img/blog/2.jpg"><img src="img/blog/flickr/2.jpg" alt="" /></a></li>
                    <li><a data-fancybox-group="gallery" class="fliker_img" href="img/blog/3.jpg"><img src="img/blog/flickr/3.jpg" alt="" /></a></li>
                    <li><a data-fancybox-group="gallery" class="fliker_img" href="img/blog/4.jpg"><img src="img/blog/flickr/4.jpg" alt="" /></a></li>
                    <li><a data-fancybox-group="gallery" class="fliker_img" href="img/blog/1.jpg"><img src="img/blog/flickr/5.jpg" alt="" /></a></li>
                    <li><a data-fancybox-group="gallery" class="fliker_img" href="img/blog/2.jpg"><img src="img/blog/flickr/6.jpg" alt="" /></a></li>
                    <li><a data-fancybox-group="gallery" class="fliker_img" href="img/blog/3.jpg"><img src="img/blog/flickr/7.jpg" alt="" /></a></li>
                    <li><a data-fancybox-group="gallery" class="fliker_img" href="img/blog/4.jpg"><img src="img/blog/flickr/8.jpg" alt="" /></a></li>
                    <li><a data-fancybox-group="gallery" class="fliker_img" href="img/blog/1.jpg"><img src="img/blog/flickr/9.jpg" alt="" /></a></li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et</p>
            </div>
            <div class="blog-popular-post">
                <h3 class="blog-sidebar-title">populer posts</h3>
                <ul>
                    <li>
                        <div class="popular-post-img">
                            <a href="#"><img src="img/blog/latest-blog/1.jpg" alt="" /></a>
                        </div>
                        <div class="popular-post-content">
                            <a href="#">Nunc facilisis sagittis ullamcorper.</a>
                            <div class="popular-date">
												<span>
													<i class="fa fa-user"></i> <a href="#">New User</a>
												</span>
                                <span>
													<i class="fa fa-clock-o"></i>  2015-06-20
												</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="popular-post-img">
                            <a href="#"><img src="img/blog/latest-blog/2.jpg" alt="" /></a>
                        </div>
                        <div class="popular-post-content">
                            <a href="#"> Nulla luctus Males tincidunt.</a>
                            <div class="popular-date">
												<span>
													<i class="fa fa-user"></i> <a href="#">Top User</a>
												</span>
                                <span>
													<i class="fa fa-clock-o"></i>  2015-06-20
												</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="popular-post-img">
                            <a href="#"><img src="img/blog/latest-blog/3.jpg" alt="" /></a>
                        </div>
                        <div class="popular-post-content">
                            <a href="#">Quisque in arcu id dui vulputate mollis</a>
                            <div class="popular-date">
												<span>
													<i class="fa fa-user"></i> <a href="#">Super User</a>
												</span>
                                <span>
													<i class="fa fa-clock-o"></i>  2015-06-20
												</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- tag start -->
            <div class="popular-tag blog-sidebar">
                <h3 class="blog-sidebar-title">Tags</h3>
                <div class="popular-tag-list">
                    <a href="#">Clothing</a>
                    <a href="#">accessories</a>
                    <a href="#">fashion</a>
                    <a href="#">footwear</a>
                    <a href="#">kid</a>
                    <a href="#">good</a>
                    <a href="#">men</a>
                    <a href="#">women</a>
                    <a href="#">chowa</a>
                    <a href="#">Clock</a>
                    <div class="view-all-tag">
                        <a href="#">View All Tags</a>
                    </div>
                </div>
            </div>
            <!-- tag end -->
        </div>
    </div>
    <!-- blog-area end -->

@endsection
