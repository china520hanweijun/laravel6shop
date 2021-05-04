@include('layouts.top')

<!-- main content area start  -->
<section class="main-content-area">
    <div class="container">

        <!-- bradcame start -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="greentect_bradcame">
                    <ul>
                        <li><a href="/">首页</a></li>
                        <li><a href="@yield('typeurl')">@yield('type')</a></li>
                        <li>@yield('title')</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- bradcame end -->
        <div class="row">
            @yield('content')
        </div>
    </div>
</section>
<!-- main content area end  -->
@include('layouts.foot')
