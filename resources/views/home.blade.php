@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('pages.Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($user)
                    <div class="card-body">
                       الإسم: {{$user->name}}
                       <h4>دوراتي القادمة</h4>
                        @foreach($myComingCourses as $myComingCourse)
                            <li>{{$myComingCourse->title}}</li>
                        @endforeach

                        <h4>دوراتي الحالية</h4>
                        @foreach($myNowCourses as $myNowCourse)
                            <li>{{$myNowCourse->title}}</li>
                        @endforeach

                        <h4>دوراتي السابقة</h4>
                        @foreach($myPastCourses as $myPastCourse)
                            <li>{{$myPastCourse->title}}</li>
                        @endforeach
                    </div>
                    @else
                    <div class="info">ليس لديك حساب طالب</div>
                    <form action="{{route('register.student')}}" method="post">
                        @csrf
                        <input class="form-control mt-1" name="nationalId" value="" placeholder="الرقم المدني">
                        <input class="form-control mt-1" name="phone" value="" placeholder="الهاتف">
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                        <button class="btn mt-1" type="submit">سجل حساب طالب</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
