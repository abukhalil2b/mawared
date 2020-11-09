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
                <div class="card-header">
                    <h4>الدورة: {{$course->title}}</h4>
                    <h4>الطالب: {{$student->user->name}}</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('student.mark.store')}}" method="post">
                        @csrf
                    	<input type="hidden" name="teacher_id" value="{{$teacherId}}">
                    	<input type="hidden" name="student_id" value="{{$student->id}}">
                    	<input type="hidden" name="course_id" value="{{$course->id}}">
                    	<div class="form-group">
                    		<input type="number" class="form-control" name="point" placeholder="النقاط">
                    	</div>
                    	<div class="form-group">
                    		<input class="form-control" name="note" placeholder="ملحوظات">
                    	</div>
                    	<div class="form-group">
                    		<button class="btn btn-block btn-primary">حفظ</button>
                    	</div>
                    </form>
                </div>
            </div>
            <div class="card mt-5">
                <div class="card-header">النقاط</div>
                <div class="card-body">
                    @foreach($marks as $mark)
                    <div class="list-group">
                        {{$mark->note}}
                        <p class="list-group-item">
                            {{$mark->point}}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

