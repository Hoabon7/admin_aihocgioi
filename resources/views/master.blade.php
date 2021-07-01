<!doctype html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ai học giỏi</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <link rel="stylesheet" href="{{ asset('Assets/Css/style.css') }}">




    <!-- customer style -->
    <link rel="stylesheet" href="{{ asset('Assets/Css/nbStyle.css') }}" />
</head>

<body>
    <?php $root_url="{{$url_root}}/" ?>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{$url_root}}/home"><i class="menu-icon fa fa-laptop"></i>Trang Chủ </a>
                    </li>
                    <li class="menu-item-has-children dropdown show">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="true"> <i class="menu-icon fa fa-star-o"></i>Quản Lý Đầu Sách</a>
                        <ul class="sub-menu children dropdown-menu show">
                            <li><i class="fa fa-gavel"></i><a href="{{$url_root}}/level_action.html">Phân Loại Lớp Học</a></li>
                            <li><i class="fa fa-bullhorn"></i><a href="{{$url_root}}/book_action.html">Phân Loại Sách</a></li>
                            <li><i class="fa fa-bullhorn"></i><a href="{{$url_root}}/chapter_action.html">Phân Loại Chương</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown show">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="true"> <i class="menu-icon fa fa-book"></i>Nội Dung Theo Lớp</a>
                        <ul class="sub-menu children dropdown-menu show">
                            <li><i class="fa fa-users"></i><a href="{{$url_root}}/level.html/lop1">Lớp 1</a></li>
                            <li><i class="fa fa-sitemap"></i><a href="{{$url_root}}/level.html/lop2">Lớp 2</a></li>
                            <li><i class="fa fa-users"></i><a href="{{$url_root}}/level.html/lop3">Lớp 3</a></li>
                            <li><i class="fa fa-sitemap"></i><a href="{{$url_root}}/level.html/lop4">Lớp 4</a></li>
                            <li><i class="fa fa-users"></i><a href="{{$url_root}}/level.html/lop5">Lớp 5</a></li>
                            <li><i class="fa fa-sitemap"></i><a href="{{$url_root}}/level.html/lop6">Lớp 6</a></li>
                            <li><i class="fa fa-users"></i><a href="{{$url_root}}/level.html/lop7">Lớp 7</a></li>
                            <li><i class="fa fa-sitemap"></i><a href="{{$url_root}}/level.html/lop8">Lớp 8</a></li>
                            <li><i class="fa fa-users"></i><a href="{{$url_root}}/level.html/lop9">Lớp 9</a></li>
                            <li><i class="fa fa-sitemap"></i><a href="{{$url_root}}/level.html/lop10">Lớp 10</a></li>
                            <li><i class="fa fa-users"></i><a href="{{$url_root}}/level.html/lop11">Lớp 11</a></li>
                            <li><i class="fa fa-sitemap"></i><a href="{{$url_root}}/level.html/lop12">Lớp 12</a></li>

                        </ul>
                    </li>
                    {{-- <li class="menu-item-has-children dropdown show">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="true"> <i class="menu-icon fa fa-bars"></i>Quản lý Content</a>
                        <ul class="sub-menu children dropdown-menu show">
                            <li><i class="fa fa-users"></i><a href="lesson_action.html">Danh sách Bài Học</a></li>
                            <li><i class="fa fa-sitemap"></i><a href="content_action.html">Danh sách Nội dung</a></li>
                        </ul>
                    </li> --}}



                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->



    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="{{ asset('Assets/Css/Images/logo.png') }}"
                            alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="{{ asset('Assets/Css/Images/logo2.png') }}"
                            alt="Logo"></a>

                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..."
                                    aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">3</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-check"></i>
                                    <p>Server #1 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-info"></i>
                                    <p>Server #2 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-warning"></i>
                                    <p>Server #3 overloaded.</p>
                                </a>
                            </div>
                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                                <span class="count bg-primary">4</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have 4 Mails</p>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar"
                                            src="{{ asset('Assets/Css/Images/avatar/1.jpg') }}"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jonathan Smith</span>
                                        <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar"
                                            src="{{ asset('Assets/Css/Images/avatar/2.jpg') }}"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jack Sanders</span>
                                        <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar"
                                            src="{{ asset('Assets/Css/Images/avatar/3.jpg') }}"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Cheryl Wheeler</span>
                                        <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar"
                                            src="{{ asset('Assets/Css/Images/avatar/4.jpg') }}"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Rachel Santos</span>
                                        <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ asset('Assets/Css/Images/admin.jpg') }}"
                                alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="{{ url('profile') }}"><i class="fa fa- user"></i>My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span
                                    class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();"><i
                                    class="fa fa-power -off"></i>Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->

        <div class="content">
            @yield('content')
        </div>
        <!-- /.content -->

        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        aihocgioi.com
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="#">Nguyen Van Hoa</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
   
    <script src=""></script>
    <script src="//code.jquery.com/jquery.js"></script>
    {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js" defer></script>
    <script src="{{ asset('Assets/Js/nbAdminScript.js') }}"></script>
    <script src="{{asset('Assets/Js/ajaxcontentlevel.js')}}"></script>

</body>

</html>
