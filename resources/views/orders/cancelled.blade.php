@extends('layouts.master')

@section('title')
ميراج | الطلبات
@endsection

@section('content')
    <div class="content w-full">
        <h1 class="p-relative">طلبات الورشات (ملغية)</h1>
        <div class="friends-page d-grid m-20 gap-20">
            @foreach ($orders as $order)
                <!-- Start Mainteance Services -->
                <div class="friend bg-primary p-20 p-relative">
                    <div class="contact">
                        <span class="bg-violet c-white p-10">ملغية</span>
                    </div>
                    <div class="txt-c">
                        <div class="code-house color-violet fw-bold" style="letter-spacing: 2px; font-size: 20px;">
                            <span>{{$order->sector_code}}</span><span>{{$order->block_number}}</span>
                            <p>{{$order->building_number}}</p>
                        </div>
                        <h4 class="m-0 bg-violet c-white">{{$order->$order_type->name}}</h4>
                    </div>
                    <div class="icons fs-14 p-relative">
                        <div class="items d-flex space-between pt-15 pb-15">
                            <span class="c-white"><i class="fas fa-user bg-violet c-white p-5 rad-6 fw-bold"></i>{{$order->user_name}}</span>
                        </div>
                        <div class="items d-flex space-between pt-15 pb-15">
                            <span class="c-white"><i
                                    class="fas fa-map-marker-alt bg-violet c-white p-5 rad-6 fw-bold"></i>{{$order->city}}</span>
                        </div>
                        <div class="items d-flex space-between pt-15 pb-15">
                            <span class="c-white"><i
                                    class="far fa-clock bg-violet c-white p-5 rad-6 fw-bold"></i>{{$order->created_at}}</span>
                        </div>
                        <div class="items d-flex space-between pt-15 pb-15">
                            <span class="c-white"><i
                                    class="fas fa-house-user bg-violet c-white p-5 rad-6 fw-bold"></i>{{$order->property_type}}</span>
                        </div>
                        <div class="items d-flex space-between pt-15 pb-15">
                            <span class="c-white"><i
                                    class="fas fa-lightbulb bg-violet c-white p-5 rad-6 fw-bold"></i>ملغية</span>
                        </div>
                        <div class="items d-flex space-between pt-15 pb-15">
                            <span class="c-white"><i
                                    class="fas fa-info-circle bg-violet c-white p-5 rad-6 fw-bold"></i>{{$order->problem_information}}</span>
                        </div>
                    </div>
                    <div class="info between-flex fs-13 txt-c">
                        <a class="bg-violet c-white btn-shape rad-0" style="width: 100%;"><i class="fas fa-times"></i>
                            تم إلغاء المهمة</a>
                    </div>
                </div>
                <!-- End Mainteance Services -->
            @endforeach
        </div>
    </div>
@endsection