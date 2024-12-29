@extends('layouts.app')

@section('title')
ميراج | صفحة الخدمات الرئيسية
@endsection

@section('content')

    <!-- Start Tags -->
    <div class="container mb-5">
        <div class="row">
            <h6 class="text-white fw-bold"><i class="fas fa-hashtag"></i> استمتع بخدماتنا المتميزة
            </h6>
            <h3 class="color-primary fw-bold mb-4">خدمات الصيانة : </h3>
        </div>
        <div class="row mb-5">
            <center>

                <!-- Start Form -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title color-primary" id="exampleModalLabel">الصيانة الكهربائية</h5>
                                <button type="button" class="btn-close color-primary border-0 noborder"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center p-1">
                                    <form>
                                        <div class="row g-3">
                                            <!--  Start Notifications  -->
                                            <div class="col-md-12">
                                                <div class="success mb-4">
                                                    <p class="msg-success">تم إرسال الطلب
                                                        بنجاح <i class="fas fa-check mr-2"></i></p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="false mb-4">
                                                    <p class="msg-false">حدث خطأ ما ، حاول مرة ثانية ! <i
                                                            class="fas fa-times mr-2"></i> </p>
                                                </div>
                                            </div>
                                            <!--  End Notifications  -->
                                            <div class="col-12">
                                                <input type="text" class="form-control border-0 noborder"
                                                    placeholder="ادخل اسم طالب الخدمة ..." style="height:55px;">
                                            </div>
                                            <div class="col-12">
                                                <select class="form-select border-0 noborder" style="height: 55px;">
                                                    <option selected="">اختر منطقة سكنك</option>
                                                    @foreach ($cities as $city )
                                                        <option value="{{$city}}">{{$city}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <select class="form-select border-0 noborder" style="height: 55px;">
                                                    <option selected="">اختر نوع العقار</option>
                                                    @foreach ($property_types as $type )
                                                        <option value="{{$type}}">{{$type}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <select class="form-select border-0 noborder" style="height: 55px;"
                                                    id="LetterSelect" onchange="displayLetter()">
                                                    <option selected="">رمز القطاع</option>
                                                    @foreach ($sector_codes as $code )
                                                        <option value="{{$code}}">{{$code}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <select class="form-select border-0 noborder" style="height: 55px;"
                                                    id="numberSelect" onchange="displayNumber()">
                                                    <option selected="">رقم الكتلة</option>
                                                    @foreach ($block_numbers as $number )
                                                        <option value="{{$number}}">{{$number}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <input type="number" maxlength="6" id="inputCode"
                                                    oninput="displayCode()" class="form-control border-0 noborder"
                                                    placeholder="ادخل رقم البناء ..." style="height:55px;">
                                            </div>
                                            <div class="col-12">
                                                <input type="text" class="form-control border-0 noborder"
                                                    placeholder="ادخل بعض المعلومات حول الشكلة ..."
                                                    style="height:75px;">
                                            </div>
                                            <div class="col-12 text-white">
                                                <div class="code-house"
                                                    style="padding: 5px; margin: 3px ; border-radius: 3px ; border:2px solid #fe3c00;color:#fe3c00;">
                                                    <span class="h5" id="outputLetter">A</span><span class="ml-3 h5"
                                                        id="outputNumber" style="letter-spacing: 2px;">01</span>
                                                    <h5 lang="en" style="letter-spacing: 2px;" class="mt-2"
                                                        id="outputCode">00123</h5>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button
                                                    class="btn btn-primary bg-active-button w-100 py-3 noborder border-0 "
                                                    type="submit">اطلب الخدمة</button>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary bg-green w-100 py-3 noborder border-0 "
                                                    type="submit"><i class="fab fa-whatsapp"></i> اطلب عبر
                                                    الواتساب</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Form -->

                <div class="col-md-12">
                    <div class="tags">
                        @foreach ($maintenance_services as $service )

                            <a style="cursor: pointer;"> <img src="{{asset($service->image)}}" alt="electric" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"></a>
                            
                        @endforeach

                        {{-- <a> <img src="icon/electric.png" alt="electric" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"></a>
                        <a href="#"> <img src="icon/plumber.png" alt="plumber" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"></a>
                        <a href="#"> <img src="icon/build.png" alt="build" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"></a>
                        <a href="#"><img src="icon/paved.png" alt="paved" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"></a>
                        <a href="#"> <img src="icon/washing.png" alt="washing" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"></a>
                        <a href="#"> <img src="icon/brad.png" alt="brad" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"></a>
                        <a href="#"> <img src="icon/sun_energy.png" alt="sun_energy" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"></a>
                        <a href="#"> <img src="icon/paint.png" alt="paint" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"></a>
                        <a href="#"> <img src="icon/clean.png" alt="clean" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"></a> --}}
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
                                <a href="#" class="a-file" data-bs-toggle="modal" data-bs-target="#exampleModal">طلب
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
    <!-- Start Form Bulldozer -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title color-primary" id="HeavyModalLabel">الآليات الثقيلة</h5>
                    <button type="button" class="btn-close color-primary border-0 noborder" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center p-1">
                        <form>
                            <div class="row g-3">
                                <!--  Start Notifications  -->
                                <div class="col-md-12">
                                    <div class="success mb-4">
                                        <p class="msg-success">تم إرسال الطلب
                                            بنجاح <i class="fas fa-check mr-2"></i></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="false mb-4">
                                        <p class="msg-false">حدث خطأ ما ، حاول مرة ثانية ! <i
                                                class="fas fa-times mr-2"></i> </p>
                                    </div>
                                </div>
                                <!--  End Notifications  -->
                                <div class="col-12">
                                    <input type="text" class="form-control border-0 noborder"
                                        placeholder="ادخل اسم طالب الخدمة ..." style="height:55px;">
                                </div>
                                <div class="col-12">
                                    <select class="form-select border-0 noborder" style="height: 55px;">
                                        <option selected="">اختر منطقة سكنك</option>
                                        @foreach ($cities as $city )
                                            <option value="{{$city}}">{{$city}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <select class="form-select border-0 noborder" style="height: 55px;">
                                        <option selected="">اختر نوع العقار</option>
                                        @foreach ($property_types as $type )
                                            <option value="{{$type}}">{{$type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control border-0 noborder"
                                        placeholder="ادخل موقعك بشكل يدوي ..." style="height:55px;">
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary bg-active-button w-100 py-3 noborder border-0 "
                                        type="submit">اطلب الخدمة</button>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary bg-green w-100 py-3 noborder border-0 "
                                        type="submit"><i class="fab fa-whatsapp"></i> اطلب عبر
                                        الواتساب</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Form Bulldozer-->
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
                                <a href="#" class="a-file" data-bs-toggle="modal" data-bs-target="#exampleModal2"
                                 heavy-name="{{$machine->name}}" onclick="heavyModal(this)">طلب الآلية</a>
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
    <!-- Start Contact -->
    <div class="container-xxl mb-5">
        <div class="container">
            <div class="row  align-items-center">
                <div class="col-lg-5 mb-2">
                    <h6 class="text-white fw-bold"><i class="fa-solid fa-helmet-safety"></i> نحن مستعدون على
                        مدار الساعة
                    </h6>
                    <h3 class="color-primary fw-bold mb-4">اطلب خدماتنا المتنوعة :</h3>

                    <p class="text-white mb-4">
                        قم بتصميم ورشة خاصة بك واطلبها بشكل مباشر من خلال موقعنا ، أو
                        تواصل معنا عبر الواتساب أو البريد الإلكتروني .</p>
                    <div class="d-flex align-items-center mb-4">
                        <i class="fa-brands fa-whatsapp p-3 fa-2x  bg-active text-white"></i>
                        <div style="padding-right: 1.5rem !important;">
                            <h6 class="text-white mb-1">رقم الواتساب :</h6>
                            <h4 class="text-white m-0" style="text-align: right;">00963945881302</h4>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <i class="fa-regular fa-envelope p-3 fa-2x  bg-active text-white"></i>
                        <div style="padding-right: 1.5rem !important;">
                            <h6 class="text-white mb-1">البريد الإلكتروني :</h6>
                            <h4 class="text-white m-0" style="text-align: right;">mirag@mirag.pro</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="bg-primary text-center p-5" style="border-top: 3px solid var(--second-color);">
                        <form>
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0 noborder" placeholder="ادخل اسمك"
                                        style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control border-0 noborder"
                                        placeholder="ادخل بريدك الإلكتروني" style="height: 55px; ">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0 noborder"
                                        placeholder="ادخل عنوان الرسالة" style="height: 55px; ">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select class="form-select border-0 noborder" style="height: 55px;">
                                        <option selected="">اختر الخدمة التي تحتاجها</option>
                                        @foreach ($maintenance_services as $service )
                                            <option value="{{$service->id}}">{{$service->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control border-0 noborder p-3"
                                        placeholder="ادخل بعض التفاصيل (إختياري)"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary bg-active w-100 py-3 noborder border-0 "
                                        type="submit">ارسل البريد</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact -->

    @section('script')
        <script>
            function heavyModal(event){
                heavyName=event.getAttribute('heavy-name');
                document.getElementById('HeavyModalLabel').innerText=heavyName;
            }
        </script>
    @endsection
@endsection