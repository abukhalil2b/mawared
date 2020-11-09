@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4 col-sm-12">
            <div class="card mt-5">
                <div class="card-header"><h4>{{__('pages.comingcourse')}}</h4></div>
                <div class="card-body">
                    @foreach($myComingCourses as $myComingCourse)
                    <div class="list-group">
                        <a href="{{route('course.teacher.student.index',['courseId'=>$myComingCourse->id,'teacherId'=>$teacher->id])}}" class="list-group-item">
                            <h4 class="list-group-item-heading">{{$myComingCourse->title}}</h4>
                            <p class="list-group-item-text">عدد المشتركين
                                <span class="badge badge-secondary">
                                    {{$myComingCourse->students->count()}}
                                </span>
                            </p>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="card mt-5">
                <div class="card-header"><h4>{{__('pages.nowcourse')}}</h4></div>
                <div class="card-body">
                    @foreach($myNowCourses as $myNowCourse)
                    <div class="list-group">
                      <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">{{$myNowCourse->title}}</h4>
                        <p class="list-group-item-text">...</p>
                      </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="card mt-5">
                <div class="card-header"><h4>{{__('pages.pastcourse')}}</h4></div>
                <div class="card-body">
                    @foreach($myPastCourses as $myPastCourse)
                     <div class="list-group">
                      <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">{{$myPastCourse->title}}</h4>
                        <p class="list-group-item-text">...</p>
                      </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




