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
                        <h4 class="text-white m-0" style="text-align: right;">{{$settings_info['whatsapp']}}</h4>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-4">
                    <i class="fa-regular fa-envelope p-3 fa-2x  bg-active text-white"></i>
                    <div style="padding-right: 1.5rem !important;">
                        <h6 class="text-white mb-1">البريد الإلكتروني :</h6>
                        <h4 class="text-white m-0" style="text-align: right;">{{$settings_info['email']}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="bg-primary text-center p-5" style="border-top: 3px solid var(--second-color);">
                    <form action="{{ route('sendEmail') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control border-0 noborder" placeholder="ادخل اسمك"
                                    style="height: 55px;" name="name" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" class="form-control border-0 noborder"
                                    placeholder="ادخل بريدك الإلكتروني" style="height: 55px; " name="email" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control border-0 noborder"
                                    placeholder="ادخل عنوان الرسالة" style="height: 55px; " name="message_title" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <select class="form-select border-0 noborder" style="height: 55px;" name="service" required>
                                    <option selected="">اختر الخدمة التي تحتاجها</option>
                                    @foreach ($maintenance_services as $service )
                                        <option value="{{$service->id}}">{{$service->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-0 noborder p-3"
                                    placeholder="ادخل بعض التفاصيل (إختياري)" name="details"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary bg-active w-100 py-3 noborder border-0 "
                                    type="submit">ارسل البريد</button>
                            </div>

                            @if(session('email_message_errors'))
                                {{-- if app debug enable --}}
                                @if (config('app.debug'))
                                    <div class="col-md-12">
                                        <div class="false mb-4">
                                            <p class="msg-false">{{session('email_message_errors')}}<i
                                                    class="fas fa-times mr-2"></i> </p>
                                        </div>
                                    </div>
                                @endif

                                <div class="col-md-12">
                                    <div class="false mb-4">
                                        <p class="msg-false">حدث خطأ ما ! <i
                                                class="fas fa-times mr-2"></i> </p>
                                    </div>
                                </div>

                            @elseif (session('email_message_success'))
                                <div class="col-md-12">
                                    <div class="success mb-4">
                                        <p class="msg-success">{{session('email_message_success')}} <i class="fas fa-check mr-2"></i></p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Contact -->
