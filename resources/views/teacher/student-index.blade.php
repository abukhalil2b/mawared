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
                            <td>النقاط</td>
                        </tr>
                        @foreach($students as $student)
                        <tr>
                            <td>
                                <a href="{{route('course.teacher.student.show',['studentId'=>$student->id,'courseId'=>$courseId,'teacherId'=>$teacherId])}}" class="list-group-item">
                                {{$student->user->name}}
                                </a>
                            </td>
                            <td>
                                <div class="list-group-item">
                                    <span class="badge badge-secondary">{{$student->marks->sum('point')}}</span>
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




