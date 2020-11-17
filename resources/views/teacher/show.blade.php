@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 display-flex flex-center">
			@if($teacher->avatar)
			<img class="teacher-show-avatar" src="{{$teacher->avatar}}" alt="avatar">
			@else
			<img class="teacher-show-avatar" src="{{asset('img/avatar/avatar.png')}}" alt="avatar">
			@endif

		</div>
		<div class="col-lg-12">
			<span class="teacher-show-username">الإسم: {{$teacher->user->name}}</span>
		</div>
	</div>
</div>
@endsection




