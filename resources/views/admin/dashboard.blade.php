@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-12">
            <a class="btn-block btn btn-secondary" href="{{route('admin.course.create')}}">اضافة دورة جديدة</a>
            <a class="btn-block btn btn-secondary" href="{{route('admin.course.index')}}">قائمة الدورات</a>
            <a class="btn-block btn btn-secondary" href="{{route('admin.user.student.index')}}">قائمة الطلاب</a>
            <a class="btn-block btn btn-secondary" href="{{route('admin.user.teacher.index')}}">قائمة المعلمين</a>
            <a class="btn-block btn btn-secondary" href="{{route('admin.user.teacher.create')}}">اضافة معلم</a>
        </div>
    </div>
</div>
@endsection
