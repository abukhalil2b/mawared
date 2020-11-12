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
                    <h4> التوصيف </h4>
                </div>
                <div class="card-body">
					<form method="post" action="{{route('admin.course.detail.subtitle.store')}}">
					@csrf
                    <table class="table">
                    	<tr>
                    		<td colspan="2">
                    			<center><h2>{{$detail->title}}</h2></center>
                    		</td>
                    	</tr>
                    	<tr>
                    		<td>العنوان الفرعي</td>
                    		<td><input name="title" class="form-control"></td>
                    	</tr>
                        <tr>
                            <td colspan="2">
                            	<input type="hidden" name="detail_id" value="{{$detail->id}}">
                                <button class="btn btn-info btn-block">حفظ</button>
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
