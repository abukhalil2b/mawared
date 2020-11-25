@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if($errors->any())
                        @foreach($errors->all() as $error)
                            <li class="text-danger">{{$error}}</li>
                        @endforeach
                    @endif
            <div class="card">
                <div class="card-header">
                    <h4>كتابة التقرير</h4>
                </div>
                <div class="card-body">
					<form method="post" action="{{route('admin.statement.store')}}">
						@csrf
                    <table class="table">
						<tr>
                    		<td>التأريخ</td>
                    		<td>
                          		<input type="date" name="date" value="{{date('Y-m-d',time())}}" class="form-control">
                            </td>
                    	</tr>
                    	<tr>
                    		<td>العملية</td>
                    		<td>
                    			<select name="state" class="form-control">
                    				<option value="income">إيرادات</option>
                    				<option value="expense">مصروفات</option>
                    			</select>
                    		</td>
                    	</tr>
                    	<tr>
                    		<td>المبلغ</td>
                    		<td><input type="number" step="0.1" name="amount" class="form-control"></td>
                    	</tr>
                    	<tr>
                    		<td>الدورة (اتركه فارغ في حالة المصروفات)</td>
                    		<td>
                    			<select name="course_id" class="form-control">
                    				<option></option>
                    				@foreach($courses as $course)
                    				<option value="{{$course->id}}">{{$course->title}} - {{$course->startAt}}</option>
                    				@endforeach
                    			</select>
                    		</td>
                    	</tr>
                        <tr>
                            <td colspan="2">
                                <button class="btn btn-info btn-block">حفظ</button>
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
        	<div class="alert alert-info mt-1">الأشهر</div>
            @foreach($months as $month)
            <a href="{{route('admin.statement.details',['date'=>$month->date])}}" >
        	<div class="alert alert-warning">شهر <b>{{$month->month}}</b> ({{$month->count($month->date)}})</div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
