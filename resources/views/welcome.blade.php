<!DOCTYPE html>
<html dir=rtl>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet">

</head>
<body>

    <div class="overlay">

        <div class="container">
            <div class="row pt-3">
                <div class="col-lg-4 logo-container">
                    <img class="logo-img" src="{{ asset('img/logo1.png') }}" alt="">
                    <span class="logo-title-lg" >الجمعية العمانية للعناية بالقرآن الكريم</span>
                    <span class="logo-title-sm" >مركز ولاية العامرات</span>
                </div>

                <div class="col-lg-5 interface-nav-list-container">
                    <ul class="interface-nav-list">
                        <li>
                          <a href="/">عن الجمعية</a>
                        </li>
                        <li>
                          <a href="/">المدونة </a>
                        </li>

                        <li>
                          <a href=""> اتصل بنا </a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 interface-nav-btn-container">
                    @if(Auth::guard()->check())
                        <a class="interface-nav-btn interface-nav-btn-logout "
                            onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"
                            href="{{route('logout')}}">{{ __('auth.Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        <a class="interface-nav-btn " href="/home"> الرئيسية </a>
                    @else
                        <a class="interface-nav-btn" href="{{route('login')}}">تسجيل الدخول</a>
                        <a class="interface-nav-btn" href="{{route('register')}}">تسجيل جديد</a>
                    @endif

                </div>

            </div>  <!-- nav row -->

            <div class="row interface-title-lg-container pt-5 ">
                <span class="interface-title-lg">
                    <span class="interface-title-brown">ابحث </span>و <span class="interface-title-brown">سجل</span> في الدورات القرآنية
                </span>
            </div> <!-- title row -->

            @if(session('status'))
            <div class="row interface-title-lg-container pt-5 ">
                <div class="alert alert-warning">
                    <b>{{session('status')}}</b>
                </div>
            </div> <!-- alert row -->
            @endif
        </div>

    </div>


    <div class="interface-search-bar-container">
        <span class="fa fa-search"></span>
        <form action="" method="post">
        @csrf
          <input class="interface-search-input" name="title" placeholder="بحث عن دورة" autocomplete="off">
        </form>
    </div>

    <center><p  class="statist-txt">{{__('pages.comingcourse')}}</p></center>

    <div class="mid-bar">
        <div class="container">
            <div class="row">
            @foreach($comingcourses as $course)
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                      <img class="card-img-top" src="{{ asset('img/logo1.png') }}" alt="Card image cap">
                      <div class="card-body">
                        <p class="card-text">
                            <h4>{{$course->title}}</h4>
                            السعر
                            @if($course->free==0)
                            <span class="badge badge-warning">{{$course->price}}</span>
                            @else
                            <span class="badge badge-success">مجانية</span>
                            @endif
                            <div>تاريخ البدء {{$course->startAt}}</div>
                            <a href="{{route('course.show',['id'=>$course->id])}}" class="btn btn1">تفاصيل</a>
                        </p>
                      </div>
                    </div>
                </div>
            @endforeach
            </div>
         </div>
    </div>

    <center><p  class="statist-txt">{{__('pages.nowcourse')}}</p></center>

    <div class="mid-bar">
        <div class="container">
            <div class="row">
            @foreach($nowcourses as $course)
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                    @if($course->imgurl==NULL)
                    <img class="card-img-top" src="{{ asset('img/logo1.png') }}" alt="Card image cap">
                    @else
                    <img class="card-img-top" src="{{$course->imgurl}}" alt="Card image cap">
                    @endif
                      <div class="card-body">
                        <p class="card-text">
                            <h4>{{$course->title}}</h4>
                            السعر
                            @if($course->free==0)
                            <span class="badge badge-warning">{{$course->price}}</span>
                            @else
                            <span class="badge badge-success">مجانية</span>
                            @endif
                            <div>تاريخ البدء {{$course->startAt}}</div>
                            <a href="{{route('course.show',['id'=>$course->id])}}" class="btn btn1">تفاصيل</a>
                        </p>
                      </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>

    <center><p  class="statist-txt">{{__('pages.pastcourse')}}</p></center>

    <div class="mid-bar">
        <div class="container">
            <div class="row">
            @foreach($pastcourses as $course)
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                    @if($course->imgurl==NULL)
                    <img class="card-img-top" src="{{ asset('img/logo1.png') }}" alt="Card image cap">
                    @else
                    <img class="card-img-top" src="{{$course->imgurl}}" alt="Card image cap">
                    @endif
                      <div class="card-body">
                        <p class="card-text">
                            <h4>{{$course->title}}</h4>
                            السعر
                            @if($course->free==0)
                            <span class="badge badge-warning">{{$course->price}}</span>
                            @else
                            <span class="badge badge-success">مجانية</span>
                            @endif
                            <div>تاريخ البدء {{$course->startAt}}</div>
                            <a href="{{route('course.show',['id'=>$course->id])}}" class="btn btn1">تفاصيل</a>
                        </p>
                      </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>

    <center><p class="statist-txt">إحصائيات</p></center>

    <div class="mid-bar">
       <div class="container">
            <div class="row justify-content-center">

            <div class="col-lg-3 col-md-3 col-sm-12 statist-box">
                <div class="statist-round statist-round-brown">
                    <p class="statist-round-txt-up statist-round-txt-up-brown">300</p>
                    <p class="statist-round-txt-down statist-round-txt-down-brown">متخرج</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 statist-box">
                <div class="statist-round statist-round-blue">
                    <p class="statist-round-txt-up statist-round-txt-up-blue">12</p>
                    <p class="statist-round-txt-down statist-round-txt-down-blue">مدرس</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 statist-box">
                <div class="statist-round statist-round-green">
                    <p class="statist-round-txt-up statist-round-txt-up-green">30</p>
                    <p class="statist-round-txt-down statist-round-txt-down-green">الدورات</p>
                </div>
            </div>
        </div>
       </div>
    </div>



    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12 footer-link-container">
                    <div class="footer-link">
                        <span> <a href="">عن البرنامج</a> |</span>
                        <span> <a href="">المدونة</a> |</span>
                        <span> <a href="">اتصل بنا</a> </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 footer-social-container">
                    <div class="social">
                        <img src="img/instagram.png"width="30">
                        <img src="img/facebook.png" width="30">
                        <img src="img/twitter.png"  width="30">
                        <img src="img/youtube.png"  width="30">
                    </div>
                </div>
                <div class="col-lg-6 col-md-5 col-sm-12 footer-logo-container">
                    <span class="logo-title-lg" >الجمعية العمانية للعناية بالقرآن الكريم</span>
                    <span class="logo-title-sm" >مركز ولاية العامرات</span>
                </div>
            </div>
        </div>
    </div><!--/footer-->

</body>
</html>








