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
                                                    <option value="1">جسر الشغور</option>
                                                    <option value="2">الجانودية</option>
                                                    <option value="3">الشغر</option>
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <select class="form-select border-0 noborder" style="height: 55px;">
                                                    <option selected="">اختر نوع العقار</option>
                                                    <option value="1">منزل</option>
                                                    <option value="2">دكان</option>
                                                    <option value="3">بناء</option>
                                                    <option value="4">شركة</option>
                                                    <option value="5">مصنع</option>
                                                    <option value="6">أرض زراعية</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <select class="form-select border-0 noborder" style="height: 55px;"
                                                    id="LetterSelect" onchange="displayLetter()">
                                                    <option selected="">رمز القطاع</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>
                                                    <option value="E">E</option>
                                                    <option value="F">F</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <select class="form-select border-0 noborder" style="height: 55px;"
                                                    id="numberSelect" onchange="displayNumber()">
                                                    <option selected="">رقم الكتلة</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
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
                        <a> <img src="icon/electric.png" alt="electric" data-bs-toggle="modal"
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
                                data-bs-target="#exampleModal"></a>
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

                <div class="col-lg-3 mb-3">
                    <div class="file">
                        <div class="info-button border-bottom">
                            <i class="fas fa-shapes icon-file mb-2"></i>
                            <p>MIRAG Company</p>
                        </div>
                        <p class="mt-3">عدد العمال : 2</p>
                        <div class="icon text-center">
                            <img decoding="async" src="warshat/Electrician-Mirag.png" width="200" alt="Electrician" />
                        </div>
                        <div class="name-ship">الصيانة الكهربائية</div>
                        <div class="info-between">
                            <a href="#" class="a-file" data-bs-toggle="modal" data-bs-target="#exampleModal">طلب
                                الورشة</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 mb-3">
                    <div class="file">
                        <div class="info-button border-bottom">
                            <i class="fas fa-shapes icon-file mb-2"></i>
                            <p>MIRAG Company</p>
                        </div>
                        <p class="mt-3">عدد العمال : 3</p>
                        <div class="icon text-center">
                            <img decoding="async" src="warshat/plumber-Mirag.png" width="200" alt="plumber" />
                        </div>
                        <div class="name-ship">التمديدات الصحية</div>
                        <div class="info-between">
                            <a href="#" class="a-file" data-bs-toggle="modal" data-bs-target="#exampleModal">طلب
                                الورشة</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="file">
                        <div class="info-button border-bottom">
                            <i class="fas fa-shapes icon-file mb-2"></i>
                            <p>MIRAG Company</p>
                        </div>
                        <p class="mt-3">عدد العمال : 3</p>
                        <div class="icon text-center">
                            <img decoding="async" src="warshat/painting-Mirag.png" width="200" alt="painting" />
                        </div>
                        <div class="name-ship">الطلاء والعزل</div>
                        <div class="info-between">
                            <a href="#" class="a-file" data-bs-toggle="modal" data-bs-target="#exampleModal">طلب
                                الورشة</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="file">
                        <div class="info-button border-bottom">
                            <i class="fas fa-shapes icon-file mb-2"></i>
                            <p>MIRAG Company</p>
                        </div>
                        <p class="mt-3">عدد العمال : 5</p>
                        <div class="icon text-center">
                            <img decoding="async" src="warshat/building-Mirag.png" width="200" alt="building" />
                        </div>
                        <div class="name-ship">البناء والتأسيس</div>
                        <div class="info-between">
                            <a href="#" class="a-file" data-bs-toggle="modal" data-bs-target="#exampleModal">طلب
                                الورشة</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="file">
                        <div class="info-button border-bottom">
                            <i class="fas fa-shapes icon-file mb-2"></i>
                            <p>MIRAG Company</p>
                        </div>
                        <p class="mt-3">عدد العمال : 2</p>
                        <div class="icon text-center">
                            <img decoding="async" src="warshat/Tileder-Mirag.png" width="200" alt="Tileder-Mirag" />
                        </div>
                        <div class="name-ship">البلاط والسيراميك</div>
                        <div class="info-between">
                            <a href="#" class="a-file" data-bs-toggle="modal" data-bs-target="#exampleModal">طلب
                                الورشة</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="file">
                        <div class="info-button border-bottom">
                            <i class="fas fa-shapes icon-file mb-2"></i>
                            <p>MIRAG Company</p>
                        </div>
                        <p class="mt-3">عدد العمال : 2</p>
                        <div class="icon text-center">
                            <img decoding="async" src="warshat/rock-Mirag.png" width="200" alt="Tileder-Mirag" />
                        </div>
                        <div class="name-ship">حجر ورخام</div>
                        <div class="info-between">
                            <a href="#" class="a-file" data-bs-toggle="modal" data-bs-target="#exampleModal">طلب
                                الورشة</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="file">
                        <div class="info-button border-bottom">
                            <i class="fas fa-shapes icon-file mb-2"></i>
                            <p>MIRAG Company</p>
                        </div>
                        <p class="mt-3">عدد العمال : 3</p>
                        <div class="icon text-center">
                            <img decoding="async" src="warshat/sun-energy-Mirag.png" width="200"
                                alt="sun-energy-Mirag" />
                        </div>
                        <div class="name-ship">الطاقة الشمسية</div>
                        <div class="info-between">
                            <a href="#" class="a-file" data-bs-toggle="modal" data-bs-target="#exampleModal">طلب
                                الورشة</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="file">
                        <div class="info-button border-bottom">
                            <i class="fas fa-shapes icon-file mb-2"></i>
                            <p>MIRAG Company</p>
                        </div>
                        <p class="mt-3">عدد العمال : 4</p>
                        <div class="icon text-center">
                            <img decoding="async" src="warshat/clean-Mirag.png" width="200" alt="clean-Mirag" />
                        </div>
                        <div class="name-ship">التنظيف والتعزيل</div>
                        <div class="info-between">
                            <a href="#" class="a-file" data-bs-toggle="modal" data-bs-target="#exampleModal">طلب
                                الورشة</a>
                        </div>
                    </div>
                </div>
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
                    <h5 class="modal-title color-primary" id="exampleModalLabel">الآليات الثقيلة</h5>
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
                                        <option value="1">جسر الشغور</option>
                                        <option value="2">الجانودية</option>
                                        <option value="3">الشغر</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <select class="form-select border-0 noborder" style="height: 55px;">
                                        <option selected="">اختر نوع العقار</option>
                                        <option value="1">منزل</option>
                                        <option value="2">دكان</option>
                                        <option value="3">بناء</option>
                                        <option value="4">شركة</option>
                                        <option value="5">مصنع</option>
                                        <option value="6">أرض زراعية</option>
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
                <div class="col-lg-3 mb-3">
                    <div class="file">
                        <div class="info-button border-0">
                            <img class="mb-1" decoding="async" src="brand/icon.png" width="40" alt="logo" />
                            <p>MIRAG Company</p>
                        </div>
                        <div class="icon text-center">
                            <img decoding="async" src="imgs/wheel-bulldozer.png" width="100" alt="wheel-bulldozer" />
                        </div>
                        <div class="name-ship">بلدوزر</div>
                        <div class="info-between">
                            <a href="#" class="a-file" data-bs-toggle="modal" data-bs-target="#exampleModal2">طلب
                                الآلية</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="file">
                        <div class="info-button border-0">
                            <img class="mb-1" decoding="async" src="brand/icon.png" width="40" alt="logo" />
                            <p>MIRAG Company</p>
                        </div>
                        <div class="icon text-center">
                            <img decoding="async" src="imgs/transfer-dump-truck.png" width="100"
                                alt="transfer-dump-truck" />
                        </div>
                        <div class="name-ship">شاحنة</div>
                        <div class="info-between">
                            <a href="#" class="a-file" data-bs-toggle="modal" data-bs-target="#exampleModal2">طلب
                                الآلية</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="file">
                        <div class="info-button border-0">
                            <img class="mb-1" decoding="async" src="brand/icon.png" width="40" alt="logo" />
                            <p>MIRAG Company</p>
                        </div>
                        <div class="icon text-center">
                            <img decoding="async" src="imgs/track-loader.png" width="100" alt="track-loader" />
                        </div>
                        <div class="name-ship">بوك</div>
                        <div class="info-between">
                            <a href="#" class="a-file" data-bs-toggle="modal" data-bs-target="#exampleModal2">طلب
                                الآلية</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="file">
                        <div class="info-button border-0">
                            <img class="mb-1" decoding="async" src="brand/icon.png" width="40" alt="logo" />
                            <p>MIRAG Company</p>
                        </div>
                        <div class="icon text-center">
                            <img decoding="async" src="imgs/fuel-truck.png" width="100" alt="fuel-truck" />
                        </div>
                        <div class="name-ship">صهريج ماء</div>
                        <div class="info-between">
                            <a href="#" class="a-file" data-bs-toggle="modal" data-bs-target="#exampleModal2">طلب
                                الآلية</a>
                        </div>
                    </div>
                </div>
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
                    <!-- Start Artical Work -->
                    <div class="course">
                        <a href="#"><img class="cover" src="imgs/blog-1.jpg" alt="صورة ضمن العمل" /></a>
                        <a href="#"><img class="instructor" src="icon/electric.png" alt="electric" /></a>
                        <p class="instructor2">2024/09/22</p>
                        <div class="info-product">

                            <h4 class="name-product">صيانة كهربائية</h4>
                            <p class="description-product">
                                قامت شركة ميراج لخدمات الصيانة المنزلية بإجراء عملية صيانة شاملة لعلبة الكهرباء في منزل
                                الزبون. شملت الفحص الدقيق لجميع الأسلاك والمكونات الكهربائية، واستبدال الأجزاء التالفة،
                                لضمان سلامة وكفاءة النظام الكهربائي في المنزل .
                            </p>
                        </div>
                        <div class="info-between">
                            <a href="article.html" class="a-file">المزيد عن العمل</a>
                        </div>
                    </div>
                    <!-- End Artical Work -->
                    <!-- Start Artical Work -->
                    <div class="course">
                        <a href="#"><img class="cover" src="imgs/blog-2.jpg" alt="صورة ضمن العمل" /></a>
                        <a href="#"><img class="instructor" src="icon/plumber.png" alt="plumber" /></a>
                        <p class="instructor2">2024/09/25</p>
                        <div class="info-product">
                            <h4 class="name-product">تمديدات صحية</h4>
                            <p class="description-product">
                                نفذت شركة ميراج لخدمات الصيانة المنزلية عملية تركيب حوض المغسلة في منزل الزبون. تضمنت
                                العملية قياس المساحة بدقة، وتثبيت الحوض بشكل آمن، والتأكد من عدم وجود تسريبات. تم تسليم
                                العمل بجودة عالية وبما يتناسب مع احتياجات الزبون .
                            </p>
                        </div>
                        <div class="info-between">
                            <a href="article.html" class="a-file">المزيد عن العمل</a>
                        </div>
                    </div>
                    <!-- End Artical Work -->
                    <!-- Start Artical Work -->
                    <div class="course">
                        <a href="#"><img class="cover" src="imgs/blog-3.jpg" alt="صورة ضمن العمل" /></a>
                        <a href="#"><img class="instructor" src="icon/paint.png" alt="paint" /></a>
                        <p class="instructor2">2024/10/02</p>
                        <div class="info-product">
                            <h4 class="name-product">دهان منزل</h4>
                            <p class="description-product">
                                قامت شركة ميراج لخدمات الصيانة المنزلية بعملية دهان جدران منزل الزبون. شملت العملية
                                اختيار الألوان المناسبة، وتحضير السطح بشكل جيد، وتطبيق طبقات الطلاء بدقة. تم الانتهاء من
                                العمل بأعلى معايير الجودة، مما أضفى لمسة جمالية جديدة على المنزل .
                            </p>
                        </div>
                        <div class="info-between">
                            <a href="article.html" class="a-file">المزيد عن العمل</a>
                        </div>
                    </div>
                    <!-- End Artical Work -->
                    <!-- Start Artical Work -->
                    <div class="course">
                        <a href="#"><img class="cover" src="imgs/blog-4.jpg" alt="صورة ضمن العمل" /></a>
                        <a href="#"><img class="instructor" src="icon/washing.png" alt="washing" /></a>
                        <p class="instructor2">2024/10/04</p>
                        <div class="info-product">
                            <h4 class="name-product">تصليح غسالات</h4>
                            <p class="description-product">
                                قامت شركة ميراج لخدمات الصيانة المنزلية بعملية تصليح الغسالة في منزل الزبون. شملت
                                العملية تشخيص المشكلة بدقة، واستبدال الأجزاء التالفة، وضبط الإعدادات. تم اختبار الغسالة
                                بعد الإصلاح لضمان عملها بكفاءة، مما أعاد الراحة للزبون .
                            </p>
                        </div>
                        <div class="info-between">
                            <a href="article.html" class="a-file">المزيد عن العمل</a>
                        </div>
                    </div>
                    <!-- End Artical Work -->
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
                                        <option value="1">الصيانة الكهربائية</option>
                                        <option value="2">التمديدات الصحية</option>
                                        <option value="3">العمارة</option>
                                        <option value="3">التبليط</option>
                                        <option value="3">الطاقة الشمسية</option>
                                        <option value="3">تصليح الغسالات</option>
                                        <option value="3">تصليح البرادات</option>
                                        <option value="3">الطلاء والعزل</option>
                                        <option value="3">التنظيف</option>
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
@endsection