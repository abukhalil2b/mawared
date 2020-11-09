@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table">
                <tr>
                    <td>#</td>
                    <td>name</td>
                </tr>
                <tr>
                    <td>[{{$teacher->user->id}}]</td>
                    <td>{{$teacher->user->name}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
