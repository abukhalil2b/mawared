@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-3 col-sm-6">
        	<div class="card mt-3">
        		<div class="card-body">
        			<a class="btn-block btn btn-secondary" href="{{route('admin.course.create')}}">اضافة دورة جديدة</a>
        		</div>
        	</div>
        </div>

        <div class="col-md-3 col-sm-6">
        	<div class="card mt-3">
        		<div class="card-body">
        			<a class="btn-block btn btn-secondary" href="{{route('admin.course.index')}}">قائمة الدورات</a>
        		</div>
        	</div>
        </div>

        <div class="col-md-3 col-sm-6">
        	<div class="card mt-3">
        		<div class="card-body">
        			<a class="btn-block btn btn-secondary" href="{{route('admin.user.student.index')}}">قائمة الطلاب</a>
        		</div>
        	</div>
        </div>

        <div class="col-md-3 col-sm-6">
        	<div class="card mt-3">
        		<div class="card-body">
        			<a class="btn-block btn btn-secondary" href="{{route('admin.user.teacher.index')}}">قائمة المحاضرين</a>
        		</div>
        	</div>
        </div>

        <div class="col-md-3 col-sm-6">
        	<div class="card mt-3">
        		<div class="card-body">
        			<a class="btn-block btn btn-secondary" href="{{route('admin.user.teacher.create')}}">اضافة محاضر</a>
        		</div>
        	</div>
        </div>

    </div>
</div>
@endsection
