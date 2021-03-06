@extends('layouts.main')

@section('header')
    @parent
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-message-box@3.2.2/dist/messagebox.min.css">
@endsection

@section('body')
    <!-- navbar top -->
    @section('navbar_top')
        @parent
    @endsection
    <!-- end navbar top -->

    <!-- side nav right-->
    @section('side_nav_right')
        @parent
    @endsection
    <!-- end side nav right-->

<div class="pages section">
    <div class="container">
        <div class="pages-head">
            <h3>账号绑定</h3>
        </div>
        <div class="register">
            <div class="row">
                <div class="input-field col-md-3">
                    当前账号： {{$_SERVER['user_name']}} ({{$_SERVER['uid']}})
                </div>
                <div class="input-field" id="git-user">
                    @if($status)
                        <button id="unbind-github" class="form-control btn btn-danger" style="color: yellow">解绑GITHUB账号</button>
                    @else
                        <a href="/user/bind/github" class="form-control btn btn-default">绑定GITHUB账号</a>
                    @endif
                </div>
                <div class="input-field">
                    <a href="" class="form-control btn btn-default">绑定微信账号</a>
                </div>
                <div class="input-field">
                    <a href="" class="form-control btn btn-default">绑定微博账号</a>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- loader -->
    <div id="fakeLoader"></div>
    <!-- end loader -->

    <!-- footer -->
    <div class="footer">
        <div class="container">
            <div class="about-us-foot">
                <h6>Mstore</h6>
                <p>is a lorem ipsum dolor sit amet, consectetur adipisicing elit consectetur adipisicing elit.</p>
            </div>
            <div class="social-media">
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-google"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
                <a href=""><i class="fa fa-instagram"></i></a>
            </div>
            <div class="copyright">
                <span>© 2017 All Right Reserved</span>
            </div>
        </div>
    </div>
    <!-- end footer -->
@endsection


@section('footerjs')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-message-box@3.2.2/dist/messagebox.min.js"></script>

    <script>
        $("#unbind-github").on('click',function(){
            $.ajax({
                url: '/user/unbind/github',
                type: 'get',
                dataType: 'json',
                success: function(d)
                {
                    if(d.errno == 0)
                    {
                        $.MessageBox("解绑成功");
                        $("#git-user").empty();
                        $("#git-user").append('<a href="/user/bind/github" class="form-control btn btn-default">绑定GITHUB账号</a>');

                    }else{
                        $.MessageBox(d.msg);
                    }
                }
            });
        });
    </script>
@endsection



