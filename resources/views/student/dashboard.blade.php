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
            <div class="card mt-3">
                <div class="card-header">
                    <span class="material-icons account_balance_wallet">account_balance_wallet</span>
                    <span class="card-header-txt">المالية</span>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>الدورة</th>
                                <th>المبلغ</th>
                                <th>الحالة</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($student->payments as $payment)
                            <tr>
                                <td>{{$payment->title}}</td>
                                <td>{{$payment->price}}</td>
                                @if($payment->payment->ispaid)
                                <td class="bgcolor1">تم الدفع</td>
                                @else
                                <td >
                                    لم يدفع
                                    <button class="btn">ادفع الآن</button>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <span class="material-icons redeem">redeem</span>
                    <span class="card-header-txt">{{__('pages.totalpoints')}}</span>
                </div>
                <div class="card-body">
                    <span class="badge badge-secondary">{{$totalMarks}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <span class="material-icons layers">layers</span>
                    <span class="card-header-txt">{{__('pages.mycomingcourse')}}</span>
                </div>
                <div class="card-body">
                    @foreach($myComingCourses as $myComingCourse)
                        <div>{{$myComingCourse->title}}</div>
                        {{__('pages.points')}}
                        @if($myComingCourse->marks)
                        <span class="badge badge-secondary">
                            {{$myComingCourse->marks->where('student_id',$student->id)->sum('point')}}
                        </span>
                        @else
                        <span class="badge badge-secondary">0</span>
                        @endif
                        <div class="divider"></div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <span class="material-icons local_library">local_library</span>
                    <span class="card-header-txt">{{__('pages.mynowcourse')}}</span>
                </div>
                <div class="card-body">
                    @foreach($myNowCourses as $myNowCourse)
                        <div>{{$myNowCourse->title}}</div>
                        {{__('pages.points')}}
                        @if($myNowCourse->marks)
                        <span class="badge badge-secondary">
                            {{$myNowCourse->marks->where('student_id',$student->id)->sum('point')}}
                        </span>
                        @else
                        <span class="badge badge-secondary">0</span>
                        @endif
                        <div class="divider"></div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <span class="material-icons business_center">business_center</span>
                    <span class="card-header-txt">{{__('pages.mypastcourse')}}</span>
                </div>
                <div class="card-body">
                    @foreach($myPastCourses as $myPastCourse)
                        <div>{{$myPastCourse->title}}</div>
                        {{__('pages.points')}}
                        @if($myPastCourse->marks)
                        <span class="badge badge-secondary">
                            {{$myPastCourse->marks->where('student_id',$student->id)->sum('point')}}
                        </span>
                        @else
                        <span class="badge badge-secondary">0</span>
                        @endif
                        <div class="divider"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="row ">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-body">
                    <a href="{{route('user.shiftaccount.toteacher')}}" class="btn-block btn color1">التبديل إلى حساب المحاضر</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




