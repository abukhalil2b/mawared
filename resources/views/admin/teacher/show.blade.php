@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table">
                <tr>
                    <td>الإسم</td>
                    <td>ادارة</td>
                </tr>
                <tr>
                    <td>{{$teacher->user->name}}</td>
                    <td>
                        <a class="btn btn-sm btn-info" href="">تعديل</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
