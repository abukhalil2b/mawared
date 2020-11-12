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
                    <h4>التوصيف </h4>
                </div>
                <div class="card-body">
					<form method="post" action="{{route('admin.course.detail.title.store')}}">
					@csrf
                    <table class="table">
                        <tr>
                            <td colspan="2">
                                {{$course->title}}
                            </td>
                        </tr>
                    	<tr>
                    		<td>الايقونة</td>
                    		<td>
                    			<select name="icon" class="form-control">
                    				<option value="book">book</option>
                    				<option value="pen">pen</option>
                    			</select>
                    		</td>
                    	</tr>
                    	<tr>
                    		<td>العنوان الرئيسي</td>
                    		<td><input name="title" class="form-control"></td>
                    	</tr>
                        <tr>
                            <td colspan="2">
                                <input type="hidden" name="course_id" value="{{$course->id}}">
                                <button class="btn btn-info btn-block">حفظ</button>
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
                <div class="card-footer">
                    <table class="table">
                        <tr>
                            <td>title</td>
                            <td>manage</td>
                        </tr>
                        @foreach($course->details as $detail)
                        <tr>
                            <td>
                            @if($detail->ishead==1)
                                <h3>
                                    <a href="{{route('admin.course.detail.subtitle.create',['id'=>$detail->id])}}">
                                        {{$detail->title}}
                                    </a>
                                </h3>
                            </div>
                            @else
                            <h5>{{$detail->title}}</h5>
                            @endif
                            </td>
                            <td>
                                <a href="">edit</a>
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
