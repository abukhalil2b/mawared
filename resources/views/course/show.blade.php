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
	<title>course</title>
</head>
<body>
	<div class="container">
		<div class="text-head mt-5">{{$course->title}}</div>
		<div class="img-container">
			<img class="img1 mt-5" src="{{$course->imgurl}}" alt="Card image cap">
		</div>
		<h5 class="mt-5">{{$course->shortDescription}}</h5>
		<h6 class="mt-1">{{$course->longDescription}}</h6>
		<span class="badge badge-warning">{{$course->isPaid? $course->price :'مجانية'}}</span>
		<div><span class="text-bold">تاريخ البدء</span> {{$course->startAt}}</div>
		<div><span class="text-bold">تنتهي</span>  {{$course->endAt}}</div>
		<div><span class="text-bold">الوقت</span>  {{$course->startTime}}</div>
		<div><span class="text-bold">المدة</span>  {{$course->duration}}</div>
		<div><span class="text-bold">يبدأ التسجيل</span>  {{$course->registerStartAt}}</div>
		<div><span class="text-bold">ينتهي التسجيل</span> {{$course->registerEndAt}}</div>
		<div><span class="text-bold">الأيام</span>  {{$course->weekDays}}</div>
		<div><span class="text-bold">العدد المطلوب</span>  {{$course->requireNumber}}</div>
		<div><span class="text-bold">وسيلة إلقاء الدورة</span>  {{$course->deliveryMeans}}</div>
		<div><span class="text-bold">المحاضر</span>  {{$course->teacher->user->name}} </div>
		@guest
	        <a href="{{route('login')}}" class="btn btn1">سجل الدخول</a>
			<a href="{{route('register')}}" class="btn btn1">سجل حساب جديد</a>
        @else
	        @if(!$isSubscribed)
	            <a class="btn btn1"
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
        @endguest
	</div>
</body>
</html>

