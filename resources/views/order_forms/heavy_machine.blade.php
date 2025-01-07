<!-- Start Form Bulldozer -->
<div class="modal fade" id="HeavyModal" tabindex="-1" aria-labelledby="HeavyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title color-primary" id="HeavyModalLabel"></h5>
                <button type="button" class="btn-close color-primary border-0 noborder" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center p-1">

                @auth
                <form action="{{route('orders.store')}}" method="POST" >
                @method('POST')
                @csrf
                @else
                <form>
                @endauth
                    <div class="row g-3">

                        <!--  Start Notifications  -->
                        @if(session('errors'))
                            {{-- if app debug enable --}}
                            @if (config('app.debug'))
                                <div class="col-md-12">
                                    <div class="false mb-4">
                                        <p class="msg-false">{{session('errors')}}<i
                                                class="fas fa-times mr-2"></i> </p>
                                    </div>
                                </div>
                            @endif

                            <div class="col-md-12">
                                <div class="false mb-4">
                                    <p class="msg-false">حدث خطأ ما ، حاول مرة ثانية ! <i
                                            class="fas fa-times mr-2"></i> </p>
                                </div>
                            </div>

                        @elseif (session('success'))
                            <div class="col-md-12">
                                <div class="success mb-4">
                                    <p class="msg-success">تم إرسال الطلب
                                        بنجاح <i class="fas fa-check mr-2"></i></p>
                                </div>
                            </div>
                        @endif
                        <!--  End Notifications  -->
                            @auth
                            <input type="hidden" id="heavy_id" name="heavy_machine_id">

                            <div class="col-12">
                                <input type="text" class="form-control border-0 noborder" value="{{auth()->user()->name}}"
                                    placeholder="ادخل اسم طالب الخدمة ..." style="height:55px;" name="user_name" required>
                            </div>
                            <div class="col-12">
                                <select class="form-select border-0 noborder" style="height: 55px;" name="city" required>
                                    <option selected="">اختر منطقة سكنك</option>
                                    @foreach ($cities as $city )
                                        <option value="{{$city}}">{{$city}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <select class="form-select border-0 noborder" style="height: 55px;" name="property_type" required>
                                    <option selected="">اختر نوع العقار</option>
                                    @foreach ($property_types as $type )
                                        <option value="{{$type}}">{{$type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control border-0 noborder"
                                    placeholder="ادخل موقعك بشكل يدوي ..." style="height:55px;" name="manual_location" required>
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control border-0 noborder"
                                    placeholder="ادخل بعض المعلومات حول المشكلة ..."
                                    style="height:75px;" name="problem_information" required>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary bg-active-button w-100 py-3 noborder border-0 "
                                    type="submit">اطلب الخدمة</button>
                            </div>

                            @else
                            <div class="col-12">
                                <a href="{{route('login')}}" class="btn btn-primary bg-active-button w-100 py-3 noborder border-0 ">تسجيل الدخول</a>
                            </div>
                            @endauth

                            <div class="col-12">
                                <button class="btn btn-primary bg-green w-100 py-3 noborder border-0 "
                                    type="button"><i class="fab fa-whatsapp"></i> اطلب عبر
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
