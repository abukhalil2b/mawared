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
                        <a class="btn" href="{{route('admin.course.edit',['id'=>$course->id])}}">تعديل</a>
                        <a class="btn" href="{{route('admin.course.detail.title.create',['id'=>$course->id])}}">التوصيف</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
