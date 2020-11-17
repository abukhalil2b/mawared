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
            <div class="card mt-5">
                <div class="card-header"><h4>{{__('pages.studentlist')}}</h4></div>
                <div class="card-body">

                    <table class="table">
                        <tr>
                            <td>الإسم</td>
                            <td>الحالة المالية</td>
                        </tr>
                        @foreach($course->subscribers as $subscriber)
                        <tr>
                            <td>
                                <a href="{{route('course.teacher.student.show',['studentId'=>$subscriber->id,'courseId'=>$courseId,'teacherId'=>$teacherId])}}" class="list-group-item">
                                    {{$subscriber->user->name}}
                                </a>
                            </td>
                            <td>
                                <div class="list-group-item">
                                    <span class="badge badge-secondary">{{$subscriber->pivot->ispaid==1?'تم الدفع':'لم يدفع'}}</span>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection




