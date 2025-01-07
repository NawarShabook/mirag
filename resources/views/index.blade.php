@extends('layouts.app')

@section('title')
ميراج | صفحة الخدمات الرئيسية
@endsection

@section('content')

@if(session('error'))
{{-- if app debug enable --}}
@if (config('app.debug'))
    <p class="p-10 rad-10 m-20 bg-red c-white" style="color:white">{{session('error')}}</p>
@endif
@endif
    <!-- Start Tags -->
    <div class="container mb-5">
        <div class="row">
            <h6 class="text-white fw-bold"><i class="fas fa-hashtag"></i> استمتع بخدماتنا المتميزة
            </h6>
            <h3 class="color-primary fw-bold mb-4">خدمات الصيانة : </h3>
        </div>
        <div class="row mb-5">
            <center>
                @include('order_forms.service')
                @include('order_forms.heavy_machine')

                <div class="col-md-12">
                    <div class="tags">
                        @foreach ($maintenance_services as $service )

                            <a style="cursor: pointer;"> <img src="{{asset($service->image)}}" alt="service image" data-bs-toggle="modal"
                                onclick="serviceModalForm(this)" id='{{"service-$service->id"}}' data-bs-target="#ServiceModal" service-id="{{$service->id}}" service-name="{{$service->name}}"></a>

                        @endforeach
                    </div>
                </div>
            </center>
        </div>
    </div>
    <!-- End Tags -->
    <!-- Start Categories -->
    <section class="mb-5" id="categories">
        <div class="container">
            <div class="row">
                <h6 class="text-white fw-bold"><i class="fas fa-check-double"></i> نحن هنا لمساعدتك
                </h6>
                <h3 class="color-primary fw-bold mb-4">الورشات المتاحة لدينا :</h3>
            </div>
            <div class="row justify-content-center">
                @foreach ($workshops as $workshop )
                    <div class="col-lg-3 mb-3">
                        <div class="file">
                            <div class="info-button border-bottom">
                                <i class="fas fa-shapes icon-file mb-2"></i>
                                <p>MIRAG Company</p>
                            </div>
                            <p class="mt-3">عدد العمال : {{$workshop->workers_count}}</p>
                            <div class="icon text-center">
                                <img decoding="async" src="{{asset($workshop->image)}}" width="200" alt="صورة الورشة" />
                            </div>
                            <div class="name-ship">{{$workshop->name}}</div>
                            <div class="info-between">
                                <a href="#" class="a-file" id='{{"workshop-$workshop->id"}}' data-bs-toggle="modal" data-bs-target="#ServiceModal" onclick="workshopModalForm(this)" workshop-id="{{$workshop->id}}" workshop-name="{{$workshop->name}}">طلب
                                    الورشة</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End Categories -->

    <!-- Start Bulldozer -->

    <section class="mb-5" id="categories">
        <div class="container">
            <div class="row">
                <h6 class="text-white fw-bold"><i class="fas fa-snowplow"></i> من الثقيل إلى الأثقل <span
                        class="soon">قريباً</span>
                </h6>
                <h3 class="color-primary fw-bold mb-4">الآليات الثقيلة والنقل :</h3>
            </div>
            <div class="row justify-content-center">
                @foreach ( $heavy_machines as $machine )
                    <div class="col-lg-3 mb-3">
                        <div class="file">
                            <div class="info-button border-0">
                                <img class="mb-1" decoding="async" src="brand/icon.png" width="40" alt="logo" />
                                <p>MIRAG Company</p>
                            </div>
                            <div class="icon text-center">
                                <img decoding="async" src="{{asset($machine->image)}}" width="100" alt="wheel-bulldozer" />
                            </div>
                            <div class="name-ship">{{$machine->name}}</div>
                            <div class="info-between">
                                <a href="#" class="a-file" data-bs-toggle="modal" data-bs-target="#HeavyModal" id='{{"machine-$machine->id"}}' heavy-id="{{$machine->id}}"
                                 heavy-name="{{$machine->name}}" onclick="heavyModalForm(this)">طلب الآلية</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End Bulldozer -->

    <!-- Start Last Works -->
    <section class="" id="last-works">
        <div class="container">
            <div class="row">
                <h6 class="text-white fw-bold"><i class="fas fa-star"></i> الإبداع لا ينتهي
                </h6>
                <h3 class="color-primary fw-bold mb-4">تصفح آخر أعمالنا :</h3>
            </div>
            <div class="row justify-content-center">
                <div class="courses-page">
                    @foreach ($posts as $post)
                        <!-- Start Artical Work -->
                        <div class="course">
                            <a href="#"><img class="cover" src="{{ asset($post->image) }}" alt="صورة ضمن العمل" /></a>
                            <a href="#"><img class="instructor" src="icon/electric.png" alt="electric" /></a>
                            <p class="instructor2">{{ $post->created_at->format('Y/m/d') }}</p>
                            <div class="info-product">

                                <h4 class="name-product">{{$post->title}}</h4>
                                <p class="description-product">{{ \Illuminate\Support\Str::limit($post->content, 150, '...') }}</p>
                            </div>
                            <div class="info-between">
                                <a href="{{route('posts.show', $post)}}" class="a-file">المزيد عن العمل</a>
                            </div>
                        </div>
                        <!-- End Artical Work -->
                    @endforeach

                </div>
            </div>
            <div class="row">
                <div class="col-12 justify-content-center text-center">
                    <a href="{{route('posts.index')}}"
                        class="btn btn-primary bg-active text-center py-2 noborder border-0 mb-5">استعراض كافة
                        الأعمال</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Last Works -->
    @include('layouts.contact_us')
    @section('script')
        @if (session('errors') || session('success'))
            @include('order_forms.response')
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    order_link_id = localStorage.getItem("order_request_link_id");
                    localStorage.removeItem("order_request_link_id");
                    document.getElementById(order_link_id).click();
                    // document.getElementById('responseModalLabel').innerText=order_type;
                    // var myModal = new bootstrap.Modal(document.getElementById('responseModal'));
                    // myModal.show();
                });
            </script>
        @endif
        <script>
            function serviceModalForm(event){
                serviceName=event.getAttribute('service-name');
                document.getElementById('ServiceModalLabel').innerText=serviceName;
                localStorage.setItem("order_request_link_id", event.id);
                @auth
                serviceId=event.getAttribute('service-id');
                document.getElementById('workshop_id').value=null;
                document.getElementById('service_id').value=serviceId;
                @endauth

            }

            function workshopModalForm(event){
                serviceName=event.getAttribute('workshop-name');
                document.getElementById('ServiceModalLabel').innerText=serviceName;
                localStorage.setItem("order_request_link_id", event.id);
                @auth
                serviceId=event.getAttribute('workshop-id');
                document.getElementById('service_id').value=null;
                document.getElementById('workshop_id').value=serviceId;
                @endauth
            }

            function heavyModalForm(event){
                heavyName=event.getAttribute('heavy-name');
                document.getElementById('HeavyModalLabel').innerText=heavyName;
                localStorage.setItem("order_request_link_id", event.id);
                @auth
                heavyId=event.getAttribute('heavy-id');
                document.getElementById('heavy_id').value=heavyId;
                @endauth
            }
        </script>
    @endsection
@endsection
