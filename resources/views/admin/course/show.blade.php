@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table>
                <tr>
                    <td>course</td>
                </tr>
                <tr>
                    <td>{{$course->title}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection