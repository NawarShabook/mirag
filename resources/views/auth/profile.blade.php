@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{asset('css/login.css')}}" />
@endsection

@section('title')
ميراج | صفحة الملف الشخصي والطلبات
@endsection


@section('content')

    <!-- Start Profile -->
    <div class="container-fluid mt-5 text-white px-sm-3 px-md-5">
        <div class="container">
            <div class="row pt-5">
                <div class="col-lg-7 col-md-6">
                    <div class="row">
                        <div class="col-md-6 text-center mb-4">
                            <h3 class="active mb-4">الملف الشخصي :</h3>
                            <img src="brand/myprofile-mirag.png" width="128" alt="myprofile-mirag">
                        </div>
                        <div class="col-md-6 mb-5">
                            <h3 class="active mb-4">المعلومات الرئيسية :</h3>
                            <div class="d-flex flex-column justify-content-start">
                                <a class="text-white mb-4 h6 "><i class="fa fa-user ml-3 active"></i>الاسم : {{$user->name}}</a>
                                <a class="text-white mb-4 h6"><i class="fa fa-earth ml-3 active"></i>المنطقة : {{$user->city}}</a>
                                <a class="text-white mb-4 h6"><i
                                        class="fa fa-envelope ml-3 active"></i>{{$user->email}}</a>
                                <a class="text-white mb-4 h6" href="change-password.html"><i
                                        class="fa fa-key ml-3 active"></i>********
                                    <span class="bg-white bg-danger p-1 rounded">تغيير كلمة السر</span></a>

                                <a class="text-white mb-4 h6" href="#"><i
                                        class="fa fa-hands-helping ml-3 active"></i>مساعدة</a>

                                <a class="text-danger mb-4 h6" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fas fa-power-off ml-3 active"></i>تسجيل الخروج</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 ">
                    <h3 class="active mb-4">الطلبات :</h3>
                    <div class="all-requests">
                        <div class="boc requests">
                            <i class="fas fa-tools bg-active p-2 text-white fa-2x"></i>
                            <span>طلبات الصيانة ( 1 طلب )</span>
                            <a class="requests-number " href="#maintenance-requests">انتقال</a>
                        </div>
                        <div class="boc requests">
                            <i class="fas fa-users bg-active p-2 text-white fa-2x"></i>
                            <span>طلبات الورشات ( 2 طلب )</span>
                            <a class="requests-number " href="#workshop-requests">انتقال</a>
                        </div>
                        <div class="boc requests">
                            <i class="fas fa-snowplow bg-active p-2 text-white fa-2x"></i>
                            <span>طلبات الآليات ( 1 طلب )</span>
                            <a class="requests-number " href="#heavy-machinery-requests">انتقال</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Profile -->

    <!-- Start All Requests -->
    <hr class="text-white justify-content-center" width="100%">
    <div class="container-fluid mt-5 text-white px-sm-3 px-md-5">
        <div class="container">
            <!-- بداية طلبات الصيانة -->
            <div class="row" id="maintenance-requests">
                <h6 class="text-white fw-bold"><i class="fas fa-tools"></i>
                    طلبات الصيانة
                </h6>
                <h3 class="color-primary fw-bold mb-4">قم بمتابعة طلبك بعناية :</h3>
            </div>
            <div class="row pt-3">
                <div class="col-lg-6 mb-3">
                    <div class="file">
                        <div class="info-button border-0">
                            <img class="mb-1" decoding="async" src="brand/icon.png" width="40" alt="logo" />
                            <p>2024/01/01 09:10 PM</p>
                        </div>
                        <div class="timeline">
                            <div class="timeline-item">
                                <p>الطلب</p>
                                <div class="iconic active-icon"><i class="fas fa-plus-circle"></i>
                                </div>
                                <br>
                                <p class="number-icon active-icon">1</p>
                            </div>

                            <div class="timeline-item">
                                <p>قيد الإنتظار</p>
                                <div class="iconic active-icon"><i class="fas fa-hourglass-half"></i>
                                </div>
                                <br>
                                <p class="number-icon active-icon">2</p>
                            </div>

                            <div class="timeline-item">
                                <p>في الطريق</p>
                                <div class="iconic"><i class="fas fa-angle-double-left"></i>
                                </div>
                                <br>
                                <p class="number-icon">3</p>
                            </div>

                            <div class="timeline-item">
                                <p>تم الوصول</p>
                                <div class="iconic"><i class="fas fa-check-circle"></i>
                                </div>
                                <br>
                                <p class="number-icon">4</p>
                            </div>
                        </div>
                        <div class="name-ship">الصيانة الكهربائية</div>
                        <div class="info-between">
                            <a href="#" class="a-file" data-bs-toggle="modal" data-bs-target="#exampleModal2">إلغاء
                                الطلب</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-3">
                    <div class="file">
                        <div class="info-button border-0">
                            <img class="mb-1" decoding="async" src="brand/icon.png" width="40" alt="logo" />
                            <p>2024/01/01 09:10 PM</p>
                        </div>
                        <div class="timeline">
                            <div class="timeline-item">
                                <p>الطلب</p>
                                <div class="iconic active-icon"><i class="fas fa-plus-circle"></i>
                                </div>
                                <br>
                                <p class="number-icon active-icon">1</p>
                            </div>

                            <div class="timeline-item">
                                <p>قيد الإنتظار</p>
                                <div class="iconic active-icon"><i class="fas fa-hourglass-half"></i>
                                </div>
                                <br>
                                <p class="number-icon active-icon">2</p>
                            </div>

                            <div class="timeline-item">
                                <p>في الطريق</p>
                                <div class="iconic active-icon"><i class="fas fa-angle-double-left"></i>
                                </div>
                                <br>
                                <p class="number-icon active-icon">3</p>
                            </div>

                            <div class="timeline-item">
                                <p>تم الوصول</p>
                                <div class="iconic"><i class="fas fa-check-circle"></i>
                                </div>
                                <br>
                                <p class="number-icon">4</p>
                            </div>
                        </div>
                        <div class="name-ship">السباكة</div>
                        <div class="info-between">
                            <a href="#" class="a-file" data-bs-toggle="modal" data-bs-target="#exampleModal2">إلغاء
                                الطلب</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="file">
                        <div class="info-button border-0">
                            <img class="mb-1" decoding="async" src="brand/icon.png" width="40" alt="logo" />
                            <p>2024/01/01 09:10 PM</p>
                        </div>
                        <div class="timeline">
                            <div class="timeline-item">
                                <p>الطلب</p>
                                <div class="iconic active-icon"><i class="fas fa-plus-circle"></i>
                                </div>
                                <br>
                                <p class="number-icon active-icon">1</p>
                            </div>

                            <div class="timeline-item">
                                <p>قيد الإنتظار</p>
                                <div class="iconic active-icon"><i class="fas fa-hourglass-half"></i>
                                </div>
                                <br>
                                <p class="number-icon active-icon">2</p>
                            </div>

                            <div class="timeline-item">
                                <p>في الطريق</p>
                                <div class="iconic active-icon"><i class="fas fa-angle-double-left"></i>
                                </div>
                                <br>
                                <p class="number-icon active-icon">3</p>
                            </div>

                            <div class="timeline-item">
                                <p>تم الوصول</p>
                                <div class="iconic active-icon"><i class="fas fa-check-circle"></i>
                                </div>
                                <br>
                                <p class="number-icon active-icon">4</p>
                            </div>
                        </div>
                        <div class="name-ship">الطاقة الشمسية</div>
                        <div class="info-between">

                        </div>
                    </div>
                </div>
            </div>
            <!-- نهاية طلبات الصيانة -->

            <!-- بداية طلبات الورشات -->
            <div class="row mt-5" id="workshop-requests">
                <h6 class="text-white fw-bold"><i class="fas fa-users"></i>
                    طلبات الورشات
                </h6>
                <h3 class="color-primary fw-bold mb-4">قم بمتابعة طلبك بعناية :</h3>
            </div>
            <div class="row pt-3">
                <div class="col-lg-6 mb-3">
                    <div class="file">
                        <div class="info-button border-0">
                            <img class="mb-1" decoding="async" src="brand/icon.png" width="40" alt="logo" />
                            <p>2024/01/01 09:10 PM</p>
                        </div>
                        <div class="timeline">
                            <div class="timeline-item">
                                <p>طلب الورشة</p>
                                <div class="iconic active-icon"><i class="fas fa-plus-circle"></i>
                                </div>
                                <br>
                                <p class="number-icon active-icon">1</p>
                            </div>

                            <div class="timeline-item">
                                <p>قيد الإنتظار</p>
                                <div class="iconic active-icon"><i class="fas fa-hourglass-half"></i>
                                </div>
                                <br>
                                <p class="number-icon active-icon">2</p>
                            </div>

                            <div class="timeline-item">
                                <p>في الطريق</p>
                                <div class="iconic"><i class="fas fa-angle-double-left"></i>
                                </div>
                                <br>
                                <p class="number-icon">3</p>
                            </div>

                            <div class="timeline-item">
                                <p>تم الوصول</p>
                                <div class="iconic"><i class="fas fa-check-circle"></i>
                                </div>
                                <br>
                                <p class="number-icon">4</p>
                            </div>
                        </div>
                        <div class="name-ship">ورشة عمارة</div>
                        <div class="info-between">
                            <a href="#" class="a-file" data-bs-toggle="modal" data-bs-target="#exampleModal2">إلغاء
                                الطلب</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-3">
                    <div class="file">
                        <div class="info-button border-0">
                            <img class="mb-1" decoding="async" src="brand/icon.png" width="40" alt="logo" />
                            <p>2024/01/01 09:10 PM</p>
                        </div>
                        <div class="timeline">
                            <div class="timeline-item">
                                <p>طلب الورشة</p>
                                <div class="iconic active-icon"><i class="fas fa-plus-circle"></i>
                                </div>
                                <br>
                                <p class="number-icon active-icon">1</p>
                            </div>

                            <div class="timeline-item">
                                <p>قيد الإنتظار</p>
                                <div class="iconic active-icon"><i class="fas fa-hourglass-half"></i>
                                </div>
                                <br>
                                <p class="number-icon active-icon">2</p>
                            </div>

                            <div class="timeline-item">
                                <p>في الطريق</p>
                                <div class="iconic active-icon"><i class="fas fa-angle-double-left"></i>
                                </div>
                                <br>
                                <p class="number-icon active-icon">3</p>
                            </div>

                            <div class="timeline-item">
                                <p>تم الوصول</p>
                                <div class="iconic"><i class="fas fa-check-circle"></i>
                                </div>
                                <br>
                                <p class="number-icon">4</p>
                            </div>
                        </div>
                        <div class="name-ship">ورشة حجر ورخام</div>
                        <div class="info-between">
                            <a href="#" class="a-file" data-bs-toggle="modal" data-bs-target="#exampleModal2">إلغاء
                                الطلب</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="file">
                        <div class="info-button border-0">
                            <img class="mb-1" decoding="async" src="brand/icon.png" width="40" alt="logo" />
                            <p>2024/01/01 09:10 PM</p>
                        </div>
                        <div class="timeline">
                            <div class="timeline-item">
                                <p>طلب الورشة</p>
                                <div class="iconic active-icon"><i class="fas fa-plus-circle"></i>
                                </div>
                                <br>
                                <p class="number-icon active-icon">1</p>
                            </div>

                            <div class="timeline-item">
                                <p>قيد الإنتظار</p>
                                <div class="iconic active-icon"><i class="fas fa-hourglass-half"></i>
                                </div>
                                <br>
                                <p class="number-icon active-icon">2</p>
                            </div>

                            <div class="timeline-item">
                                <p>في الطريق</p>
                                <div class="iconic active-icon"><i class="fas fa-angle-double-left"></i>
                                </div>
                                <br>
                                <p class="number-icon active-icon">3</p>
                            </div>

                            <div class="timeline-item">
                                <p>تم الوصول</p>
                                <div class="iconic active-icon"><i class="fas fa-check-circle"></i>
                                </div>
                                <br>
                                <p class="number-icon active-icon">4</p>
                            </div>
                        </div>
                        <div class="name-ship">ورشة البلاط والسيراميك</div>
                        <div class="info-between">

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="file">
                        <div class="info-button border-0">
                            <img class="mb-1" decoding="async" src="brand/icon.png" width="40" alt="logo" />
                            <p>2024/01/01 09:10 PM</p>
                        </div>
                        <div class="timeline">
                            <div class="timeline-item">
                                <p>طلب الورشة</p>
                                <div class="iconic active-icon"><i class="fas fa-plus-circle"></i>
                                </div>
                                <br>
                                <p class="number-icon active-icon">1</p>
                            </div>

                            <div class="timeline-item">
                                <p>قيد الإنتظار</p>
                                <div class="iconic active-icon"><i class="fas fa-hourglass-half"></i>
                                </div>
                                <br>
                                <p class="number-icon active-icon">2</p>
                            </div>

                            <div class="timeline-item">
                                <p>في الطريق</p>
                                <div class="iconic active-icon"><i class="fas fa-angle-double-left"></i>
                                </div>
                                <br>
                                <p class="number-icon active-icon">3</p>
                            </div>

                            <div class="timeline-item">
                                <p>تم الوصول</p>
                                <div class="iconic active-icon"><i class="fas fa-check-circle"></i>
                                </div>
                                <br>
                                <p class="number-icon active-icon">4</p>
                            </div>
                        </div>
                        <div class="name-ship">ورشة التنظيف والتعزيل</div>
                        <div class="info-between">

                        </div>
                    </div>
                </div>
            </div>
            <!-- نهاية طلبات الورشات -->

            <!-- بداية طلبات الآليات الثقيلة -->
            <div class="row mt-5" id="heavy-machinery-requests">
                <h6 class="text-white fw-bold"><i class="fas fa-snowplow"></i>
                    طلبات الآليات الثقيلة
                </h6>
                <h3 class="color-primary fw-bold mb-4">قم بمتابعة طلبك بعناية :</h3>
            </div>
            <div class="row pt-3">
                <div class="col-lg-6 mb-3">
                    <div class="file">
                        <div class="info-button border-0">
                            <img class="mb-1" decoding="async" src="brand/icon.png" width="40" alt="logo" />
                            <p>2024/01/01 09:10 PM</p>
                        </div>
                        <div class="timeline">
                            <div class="timeline-item">
                                <p>طلب الورشة</p>
                                <div class="iconic active-icon"><i class="fas fa-plus-circle"></i>
                                </div>
                                <br>
                                <p class="number-icon active-icon">1</p>
                            </div>

                            <div class="timeline-item">
                                <p>قيد الإنتظار</p>
                                <div class="iconic active-icon"><i class="fas fa-hourglass-half"></i>
                                </div>
                                <br>
                                <p class="number-icon active-icon">2</p>
                            </div>

                            <div class="timeline-item">
                                <p>في الطريق</p>
                                <div class="iconic"><i class="fas fa-angle-double-left"></i>
                                </div>
                                <br>
                                <p class="number-icon">3</p>
                            </div>

                            <div class="timeline-item">
                                <p>تم الوصول</p>
                                <div class="iconic"><i class="fas fa-check-circle"></i>
                                </div>
                                <br>
                                <p class="number-icon">4</p>
                            </div>
                        </div>
                        <div class="name-ship">بلدوزر</div>
                        <div class="info-between">
                            <a href="#" class="a-file" data-bs-toggle="modal" data-bs-target="#exampleModal2">إلغاء
                                الطلب</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-3">
                    <div class="file">
                        <div class="info-button border-0">
                            <img class="mb-1" decoding="async" src="brand/icon.png" width="40" alt="logo" />
                            <p>2024/01/01 09:10 PM</p>
                        </div>
                        <div class="timeline">
                            <div class="timeline-item">
                                <p>طلب الورشة</p>
                                <div class="iconic active-icon"><i class="fas fa-plus-circle"></i>
                                </div>
                                <br>
                                <p class="number-icon active-icon">1</p>
                            </div>

                            <div class="timeline-item">
                                <p>قيد الإنتظار</p>
                                <div class="iconic active-icon"><i class="fas fa-hourglass-half"></i>
                                </div>
                                <br>
                                <p class="number-icon active-icon">2</p>
                            </div>

                            <div class="timeline-item">
                                <p>في الطريق</p>
                                <div class="iconic active-icon"><i class="fas fa-angle-double-left"></i>
                                </div>
                                <br>
                                <p class="number-icon active-icon">3</p>
                            </div>

                            <div class="timeline-item">
                                <p>تم الوصول</p>
                                <div class="iconic"><i class="fas fa-check-circle"></i>
                                </div>
                                <br>
                                <p class="number-icon">4</p>
                            </div>
                        </div>
                        <div class="name-ship">صهريج ماء</div>
                        <div class="info-between">
                            <a href="#" class="a-file" data-bs-toggle="modal" data-bs-target="#exampleModal2">إلغاء
                                الطلب</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- نهاية طلبات الآليات الثقيلة -->
        </div>
    </div>
    <!-- End All Requests -->
@endsection