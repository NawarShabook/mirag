@extends('layouts.master')

@section('title')
ميراج | الطلبات
@endsection

@section('content')

    <div class="content w-full">
        <h1 class="p-relative">طلبات الورشات (الجديدة)</h1>
        <p class="m-15 c-orange">عند قبول طلب يتم إرساله إلى قسم (على الطريق)</p>
        <div class="friends-page d-grid m-20 gap-20">

            @foreach ($orders as $order )

                <!-- Start Order Type Card -->
                <div class="friend bg-primary p-20 p-relative">
                    <div class="contact">
                        <span class="bg-orange c-white p-10">جديد</span>
                    </div>
                    <div class="txt-c">
                        <div class="code-house c-orange fw-bold" style="letter-spacing: 2px; font-size: 20px;">
                            <span>{{$order->sector_code}}</span><span>{{$order->block_number}}</span>
                            <p>{{$order->building_number}}</p>
                        </div>
                        <h4 class="m-0 bg-orange c-white">{{$order->$order_type->name}}</h4>
                    </div>
                    <div class="icons fs-14 p-relative">
                        <div class="items d-flex space-between pt-15 pb-15">
                            <span class="c-white"><i class="fas fa-user bg-orange c-white p-5 rad-6 fw-bold"></i>{{$order->user_name}}</span>
                        </div>
                        <div class="items d-flex space-between pt-15 pb-15">
                            <span class="c-white"><i
                                    class="fas fa-map-marker-alt bg-orange c-white p-5 rad-6 fw-bold"></i>{{$order->city}}</span>
                        </div>
                        <div class="items d-flex space-between pt-15 pb-15">
                            <span class="c-white"><i
                                    class="far fa-clock bg-orange c-white p-5 rad-6 fw-bold"></i>{{$order->created_at}}</span>
                        </div>
                        <div class="items d-flex space-between pt-15 pb-15">
                            <span class="c-white"><i
                                    class="fas fa-house-user bg-orange c-white p-5 rad-6 fw-bold"></i>{{$order->property_type}}</span>
                        </div>
                        <div class="items d-flex space-between pt-15 pb-15">
                            <span class="c-white"><i
                                    class="fas fa-lightbulb bg-orange c-white p-5 rad-6 fw-bold"></i>جاري
                                الإنتظار</span>
                        </div>
                        <div class="items d-flex space-between pt-15 pb-15">
                            <span class="c-white"><i
                                    class="fas fa-info-circle bg-orange c-white p-5 rad-6 fw-bold"></i>{{$order->problem_information}}</span>
                        </div>
                    </div>
                    <div class="info between-flex fs-13">
                        <form action="{{route('orders.update', $order)}}" method="post">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="status" value="accepted">
                            <button type="submit" class="bg-green c-white btn-shape rad-0"  style="cursor: pointer"><i class="fas fa-check"></i> قبول</button>
                        </form>

                        <form action="{{route('orders.update', $order)}}" method="post">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="status" value="cancelled">
                            <button type="submit" class="bg-red c-white btn-shape rad-0" style="cursor: pointer"><i class="fas fa-ban"></i> إلغاء</button>
                        </form>

                    </div>
                </div>
                <!-- End Order Type Card -->
            @endforeach
        </div>
    </div>

@endsection
