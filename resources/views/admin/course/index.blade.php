@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-bordered table-striped">
                <tr>
                    <td>اسم الدورة</td>
                    <td>تبدأ</td>
                    <td>إدارة</td>
                </tr>
                @foreach($courses as $course)
                <tr>
                    <td>{{$course->title}}</td>
                    <td>{{$course->startAt}}</td>
                    <td>
                        <a class="btn" href="">تعديل</a>
                        <a class="btn" href="">حذف</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
