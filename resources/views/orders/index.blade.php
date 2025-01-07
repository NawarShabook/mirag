@extends('layouts.master')

@section('title')
ميراج | الطلبات
@endsection

@section('content')


    <div class="content w-full">
        <h1 class="p-relative">الطلبات</h1>
        <div class="friends-page d-grid m-20 gap-20">
            <!-- Start Mainteance Services -->
            <div class="friend bg-primary rad-6 p-20 p-relative">
                <div class="txt-c">
                    <img decoding="async" class="mt-10 mb-10 w-100 h-100" src="{{asset('brand/icon.png')}}"
                        alt="يتم تحميل الصورة !" />
                    <h4 class="m-0 color-primary">خدمات الصيانة المنزلية</h4>
                </div>
                <div class="icons fs-14 p-relative">
                    <div class="items d-flex space-between pt-15 pb-15">
                        <span class="c-white"><i class="fas fa-hourglass-half color-primary fw-bold"></i> في
                            الإنتظار (جديد)</span>
                        <span class="bg-orange c-white fs-13 btn-shape">{{$order_status_counts['maintenance_service_waiting']}}</span>
                    </div>
                    <div class="items d-flex space-between pt-15 pb-15">
                        <span class="c-white"><i class="fas fa-route color-primary fw-bold"></i> في الطريق</span>
                        <span class="bg-second c-white fs-13 btn-shape">{{$order_status_counts['maintenance_service_accepted']}}</span>
                    </div>
                    <div class="items d-flex space-between pt-15 pb-15">
                        <span class="c-white"><i class="fas fa-check color-primary fw-bold"></i>مكتملة</span>
                        <span class="bg-green c-white fs-13 btn-shape">{{$order_status_counts['maintenance_service_completed']}}</span>
                    </div>
                    <div class="items d-flex space-between pt-15 pb-15">
                        <span class="c-white"><i class="fas fa-times color-primary fw-bold"></i>ملغية</span>
                        <span class="bg-violet c-white fs-13 btn-shape">{{$order_status_counts['maintenance_service_cancelled']}}</span>
                    </div>
                </div>

                <div class="info between-flex fs-13">
                    <a class="bg-orange c-white btn-shape" href="{{route('orders.show', ['maintenance_service', 'waiting'])}}">جديد</a>
                    <a class="bg-second c-white btn-shape" href="{{route('orders.show', ['maintenance_service', 'accepted'])}}">على الطريق</a>
                    <a class="bg-green c-white btn-shape"  href="{{route('orders.show', ['maintenance_service', 'completed'])}}">مكتملة</a>
                    <a class="bg-violet c-white btn-shape" href="{{route('orders.show', ['maintenance_service', 'cancelled'])}}">ملغية</a>
                </div>
            </div>
            <!-- End Mainteance Services -->

            <!-- Start Workshop -->
            <div class="friend bg-primary rad-6 p-20 p-relative">
                <div class="txt-c">
                    <img decoding="async" class="mt-10 mb-10 w-100 h-100" src="{{asset('brand/icon.png')}}"
                        alt="يتم تحميل الصورة !" />
                    <h4 class="m-0 color-primary">الورشات</h4>
                </div>
                <div class="icons fs-14 p-relative">
                    <div class="items d-flex space-between pt-15 pb-15">
                        <span class="c-white"><i class="fas fa-hourglass-half color-primary fw-bold"></i> في
                            الإنتظار (جديد)</span>
                        <span class="bg-orange c-white fs-13 btn-shape">{{$order_status_counts['workshop_waiting']}}</span>
                    </div>
                    <div class="items d-flex space-between pt-15 pb-15">
                        <span class="c-white"><i class="fas fa-route color-primary fw-bold"></i> في الطريق</span>
                        <span class="bg-second c-white fs-13 btn-shape">{{$order_status_counts['workshop_accepted']}}</span>
                    </div>
                    <div class="items d-flex space-between pt-15 pb-15">
                        <span class="c-white"><i class="fas fa-check color-primary fw-bold"></i>مكتملة</span>
                        <span class="bg-green c-white fs-13 btn-shape">{{$order_status_counts['workshop_completed']}}</span>
                    </div>
                    <div class="items d-flex space-between pt-15 pb-15">
                        <span class="c-white"><i class="fas fa-times color-primary fw-bold"></i>ملغية</span>
                        <span class="bg-violet c-white fs-13 btn-shape">{{$order_status_counts['workshop_cancelled']}}</span>
                    </div>
                </div>
                <div class="info between-flex fs-13">
                    <a class="bg-orange c-white btn-shape" href="{{route('orders.show', ['workshop', 'waiting'])}}">جديد</a>
                    <a class="bg-second c-white btn-shape" href="{{route('orders.show', ['workshop', 'accepted'])}}">على الطريق</a>
                    <a class="bg-green c-white btn-shape"  href="{{route('orders.show', ['workshop', 'completed'])}}">مكتملة</a>
                    <a class="bg-violet c-white btn-shape" href="{{route('orders.show', ['workshop', 'cancelled'])}}">ملغية</a>
                </div>
            </div>
            <!-- End Workshop -->

            <!-- Start Heavy -->
            <div class="friend bg-primary rad-6 p-20 p-relative">
                <div class="txt-c">
                    <img decoding="async" class="mt-10 mb-10 w-100 h-100" src="{{asset('brand/icon.png')}}"
                        alt="يتم تحميل الصورة !" />
                    <h4 class="m-0 color-primary">الآليات الثقيلة</h4>
                </div>
                <div class="icons fs-14 p-relative">
                    <div class="items d-flex space-between pt-15 pb-15">
                        <span class="c-white"><i class="fas fa-hourglass-half color-primary fw-bold"></i> في
                            الإنتظار (جديد)</span>
                        <span class="bg-orange c-white fs-13 btn-shape">{{$order_status_counts['heavy_machine_waiting']}}</span>
                    </div>
                    <div class="items d-flex space-between pt-15 pb-15">
                        <span class="c-white"><i class="fas fa-route color-primary fw-bold"></i> في الطريق</span>
                        <span class="bg-second c-white fs-13 btn-shape">{{$order_status_counts['heavy_machine_accepted']}}</span>
                    </div>
                    <div class="items d-flex space-between pt-15 pb-15">
                        <span class="c-white"><i class="fas fa-check color-primary fw-bold"></i>مكتملة</span>
                        <span class="bg-green c-white fs-13 btn-shape">{{$order_status_counts['heavy_machine_completed']}}</span>
                    </div>
                    <div class="items d-flex space-between pt-15 pb-15">
                        <span class="c-white"><i class="fas fa-times color-primary fw-bold"></i>ملغية</span>
                        <span class="bg-violet c-white fs-13 btn-shape">{{$order_status_counts['heavy_machine_cancelled']}}</span>
                    </div>
                </div>
                <div class="info between-flex fs-13">
                    <a class="bg-orange c-white btn-shape" href="{{route('orders.show', ['heavy_machine', 'waiting'])}}">جديد</a>
                    <a class="bg-second c-white btn-shape" href="{{route('orders.show', ['heavy_machine', 'accepted'])}}">على الطريق</a>
                    <a class="bg-green c-white btn-shape"  href="{{route('orders.show', ['heavy_machine', 'completed'])}}">مكتملة</a>
                    <a class="bg-violet c-white btn-shape" href="{{route('orders.show', ['heavy_machine', 'cancelled'])}}">ملغية</a>
                </div>
            </div>
            <!-- End Heavy -->
        </div>
    </div>

@endsection
