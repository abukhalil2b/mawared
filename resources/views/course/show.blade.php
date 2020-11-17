<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{ asset('css/course-show.css') }}" rel="stylesheet">
	<link href="{{ asset('css/colors.css') }}" rel="stylesheet">
	<link href="{{ asset('css/teacher-show.css') }}" rel="stylesheet">
	<!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<title></title>
</head>
<body>
	@if(session('msg'))
        <center class="alert alert-info">
            <b>{{session('msg')}}</b>
        </center>
    @endif
	<div class="course-show-title">{{$course->title}}</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-3">
				<h5 class="">{{$course->shortDescription}}</h5>
				<h6 class="mt-1">{{$course->longDescription}}</h6>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-6 mt-5 col-sm-12">
				<div class="course-show-learn">{{__('pages.you will learn from this course')}}</div>
				@foreach($details as $detail)
				@if($detail->ishead)
					<div class="display-flex mt-3">
						<span class="material-icons">{{$detail->icon}}</span>
						<span class="text-bold text-lg">{{$detail->title}}</span>
					</div>
				@else
				<div class="details"> - {{$detail->title}}</div>
				@endif
				@endforeach
			</div>
			<div class="col-md-6 mt-5 col-sm-12">
				<div class="display-flex">
					<span class="material-icons">calendar_today</span>
					<span class="text-bold">تاريخ البدء</span>
					{{$course->startAt}}
				</div>
				<div class="display-flex">
					<span class="material-icons">date_range</span>
					<span class="text-bold">تنتهي</span>
					 {{$course->endAt}}
				</div>
				<div class="display-flex">
					<span class="material-icons">av_timer</span>
					<span class="text-bold">الوقت</span>
					 {{$course->startTime}}
				</div>
				<div class="display-flex">
					<span class="material-icons">hourglass_full</span>
					<span class="text-bold">المدة</span>
					 {{$course->duration}}
				</div>
				<div class="display-flex">
					<span class="material-icons">pending_actions</span>
					<span class="text-bold">يبدأ التسجيل</span>
					 {{$course->registerStartAt}}
				</div>
				<div class="display-flex">
					<span class="material-icons">pan_tool</span>
					<span class="text-bold">ينتهي التسجيل</span>
					{{$course->registerEndAt}}
				</div>
				<div class="display-flex">
					<span class="material-icons">today</span>
					<span class="text-bold">الأيام</span>
					@foreach(explode(' ',$course->weekDays) as $day)
					[ {{__('pages.'.$day)}} ]
					@endforeach
				</div>
				<div class="display-flex">
					<span class="material-icons">person_search</span>
					<span class="text-bold">العدد المطلوب</span>
					 {{$course->requireNumber}}
				</div>
				<div class="display-flex">
					<span class="material-icons">desktop_mac</span>
					<span class="text-bold">وسيلة إلقاء الدورة</span>
					 {{$course->deliveryMeans}}
				</div>
				<span class="badge badge-warning">{{$course->isPaid? 'السعر '.$course->price :'مجانية'}}</span>
			</div>
			<div class="col mt-3">
				<span class="display-flex flex-center">
					<a href="{{route('teacher.show',['id'=>$teacher->id])}}">
						@if($teacher->avatar)
						<img class="course-show-avatar" src="{{$teacher->avatar}}" alt="avatar">
						@else
						<img class="course-show-avatar" src="{{asset('img/avatar/avatar.png')}}" alt="avatar">
						@endif
						<span class="course-show-username">
							{{$teacher->user->name}}
						</span>
					</a>
				</span>
			</div>
		</div>
    </div>
    <div class="container">
    	<div class="divider"></div>
    	<div class="btn-container">
    	@guest
	        <a href="{{route('login')}}" class="btn btn1 color1">سجل الدخول</a>
			<a href="{{route('register')}}" class="btn btn1 color1">سجل حساب جديد</a>
	    @else
	    	@if(auth::user()->userType=='admin')
	    	@else
		        @if(!$isSubscribed)
		            <a class="btn btn1 color1"
		               onclick="event.preventDefault();
		                             document.getElementById('subscribe-form').submit();">
		                التسجيل في الدورة
		            </a>
		            <form id="subscribe-form" action="{{ route('course.subscribe') }}" method="POST" style="display: none;">
		                @csrf
		                <input type="hidden" name="course_id" value="{{$course->id}}">
		            </form>
		        @else
		       		@if(auth::user()->userType=='teacher')
		       		@else
		       		 	<center><h4>أنت مشترك بالفعل</h4></center>
		       		@endif
		        @endif
	        @endif
	    @endguest
	    </div>
    </div>
</body>
</html>

