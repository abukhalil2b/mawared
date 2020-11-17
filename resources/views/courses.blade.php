@extends('layouts.app')

@section('content')
    <center>
    	<span class="material-icons fs-100 layers">layers</span>
    	<p>{{__('pages.comingcourse')}}</p>
    </center>

    <div class="mid-bar">
        <div class="container">
            <div class="row justify-content-center">
            @foreach($comingcourses as $course)
                <div class="col-lg-4 col-md-6 mt-3">
                    <div class="course-card">
                      <img class="course-card-img-top" src="{{ asset('img/cover1.png') }}" alt="img">
                      <span class="course-card-title">{{$course->title}}</span>
                      <div class="course-card-body">
                            @if($course->isPaid==1)
                            السعر
                            <span class="badge badge-warning">{{$course->price}}</span>
                            @else
                            <span class="badge badge-success">مجانية</span>
                            @endif
                            <div class="course-card-txt color1">تاريخ البدء {{$course->startAt}}</div>
                            <a href="{{route('course.show',['id'=>$course->id])}}" class="btn btn1 color1">تفاصيل</a>
                      </div>
                    </div>
                </div>
            @endforeach
            </div>
         </div>
    </div>

	<div class="divider"></div>
    <center>
    	<span class="material-icons fs-100 local_library">local_library</span>
    	<p>{{__('pages.nowcourse')}}</p>
    </center>

    <div class="mid-bar">
        <div class="container">
            <div class="row">
            @foreach($nowcourses as $course)
                <div class="col-lg-4 col-md-6">
                    <div class="course-card">
                    @if($course->imgurl==NULL)
                    <img class="course-card-img-top" src="{{ asset('img/cover1.png') }}" alt="img">
                    @else
                    <img class="course-card-img-top" src="{{$course->imgurl}}" alt="img">
                    @endif
                      <div class="course-card-body">
                        <p class="course-card-text">
                            <h4>{{$course->title}}</h4>
                            السعر
                            @if($course->isPaid==1)
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

	<div class="divider"></div>
    <center>
    	<span class="material-icons fs-100 business_center">business_center</span>
    	<p>{{__('pages.pastcourse')}}</p>
    </center>

    <div class="mid-bar">
        <div class="container">
            <div class="row">
            @foreach($pastcourses as $course)
                <div class="col-lg-4 col-md-6">
                    <div class="course-card">
                    @if($course->imgurl==NULL)
                    <img class="course-card-img-top" src="{{ asset('img/cover1.png') }}" alt="img">
                    @else
                    <img class="course-card-img-top" src="{{$course->imgurl}}" alt="img">
                    @endif
                      <div class="course-card-body">
                        <p class="course-card-text">
                            <span class="course-card-title">{{$course->title}}</span>
                            السعر
                            @if($course->isPaid==1)
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
@endsection