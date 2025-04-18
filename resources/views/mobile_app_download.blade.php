@extends('layouts.app')

@section('title')
ميراج | تحميل التطبيق
@endsection

@section('content')

<div class="container-fluid py-5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-lg-7">
                <img class="img-fluid w-100" src="brand/mobile.png" alt="mobile">
                <h5 class="color-primary fw-bold mb-1"><img src="brand/icon.png" width="40" alt="logo"> ميراج |
                    لخدمات الصيانة المنزلية </h5>
                <a href="https://play.google.com/store/apps/details?id=com.mirag.pro" target="_blank"><img
                        src="brand/download-google.png" alt="download-google" width="220"></a>
                <a href="{{ route('download-app') }}" download><img class="mt-2" src="brand/download-web.png"
                        alt="download-web" width="220"></a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-secondry">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 justify-content-center text-center">
                <img class="img-fluid w-90" src="brand/man.png" alt="man">
            </div>
            <div class="col-lg-6 py-3 py-lg-0">
                <h3 class="color-primary fw-bold">لماذا ميراج ؟</h3>
                <h5 class="mb-4 text-white mt-3">لأننا نوفر لك العديد من الخدمات , وأهمها :</h5>
                <p class="mb-4">

                </p>
                <ul class="list-inline">
                    <li>
                        <h6 class="text-white"><i class="far fa-dot-circle color-primary ml-2"></i>الصيانة
                            الكهربائية</h6>
                    </li>
                    <li>
                        <h6 class="text-white"><i class="far fa-dot-circle color-primary ml-2"></i>السباكة</h6>
                    </li>
                    <li>
                        <h6 class="text-white"><i class="far fa-dot-circle color-primary ml-2"></i>الطلاء والديكور
                        </h6>
                    </li>
                    <li>
                        <h6 class="text-white"><i class="far fa-dot-circle color-primary ml-2"></i>الهدم والترحيل
                        </h6>
                    </li>
                    <li>
                        <h6 class="text-white"><i class="far fa-dot-circle color-primary ml-2"></i>البلاط والسيراميك
                        </h6>
                    </li>
                    <li>
                        <h6 class="text-white"><i class="far fa-dot-circle color-primary ml-2"></i>الطاقة الشمسية
                        </h6>
                    </li>
                    <li>
                        <h6 class="text-white"><i class="far fa-dot-circle color-primary ml-2"></i>التخطيط والإشراف
                            الهندسي</h6>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-primary">
    <div class="container">
        <div class="row py-5">
            <div class="col-lg-6 py-lg-0 justify-content-center">
                <h3 class="color-primary fw-bold">طريقة الإستخدام :</h3>
                <iframe class="w-100 h-100" src="https://www.youtube.com/embed/LnsHuA53VRs?si=2QLNx3_OgQscz3_C"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            <div class="col-lg-6 justify-content-center text-center">
                <img class="img-fluid w-50 mt-3" src="brand/man-2.png" alt="man">
            </div>
        </div>
    </div>
</div>

@endsection
