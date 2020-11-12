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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4>{{__('pages.totalpoints')}}</h4></div>
                <div class="card-body">
                    {{$totalMarks}}
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header"><h4>{{__('pages.mycomingcourse')}}</h4></div>
                <div class="card-body">
                    @foreach($myComingCourses as $myComingCourse)
                        <div>{{$myComingCourse->title}}</div>
                        {{__('pages.points')}}
                        @if($myComingCourse->marks)
                        {{$myComingCourse->marks->where('student_id',$student->id)->sum('point')}}
                        @else
                        0
                        @endif
                        <div class="divider"></div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header"><h4>{{__('pages.mynowcourse')}}</h4></div>
                <div class="card-body">
                    @foreach($myNowCourses as $myNowCourse)
                        <div>{{$myNowCourse->title}}</div>
                        {{__('pages.points')}}
                        @if($myNowCourse->marks)
                        {{$myNowCourse->marks->where('student_id',$student->id)->sum('point')}}
                        @else
                        0
                        @endif
                        <div class="divider"></div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header"><h4>{{__('pages.mypastcourse')}}</h4></div>
                <div class="card-body">
                    @foreach($myPastCourses as $myPastCourse)
                        <div>{{$myPastCourse->title}}</div>
                        {{__('pages.points')}}
                        @if($myPastCourse->marks)
                        {{$myPastCourse->marks->where('student_id',$student->id)->sum('point')}}
                        @else
                        0
                        @endif
                        <div class="divider"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




