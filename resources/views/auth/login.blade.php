@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{asset('css/login.css')}}" />
@endsection
@section('title')
ميراج | تسجيل الدخول
@endsection


@section('content')

<!-- Start Header -->
<div class="container mt-2">
    <p class="m-0 text-white text-center"><img src="brand/icon.png" width="150" alt="icon"></p>
    <div class="row justify-content-center">
        <h1 class="color-primary text-center mb-4 fw-bold">شركة مـيـراج</h1>
        <h1 class="text-white text-center fw-bold mb-1">لخدمات الصيانة المنزلية</h1>
        <span class="mt-3 mb-3 text-white text-center">
            سجل الدخول واستمتع بأفضل خدمات الصيانة
        </span>
    </div>
</div>
<!-- End Header -->
<!-- Start Login -->
<section id="features" style="margin-bottom: 50px;">
    <div class="container px-5 my-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="banar">
                    <!--  Start Notifications  -->
                    {{-- <div class="col-md-12">
                        <div class="success mb-4">
                            <p class="msg-success">تمت دخول الحساب بنجاح</p>
                        </div>
                    </div> --}}
                    @if ($errors->has('email') || $errors->has('password'))
                        
                        @if (config('app.debug'))
                        @php
                            $errorMessage = $errors->first('email') ? $errors->first('email') : $errors->first('password');
                        @endphp
                            <div class="col-md-12">
                                <div class="false mb-4">
                                    <p class="msg-false"><strong>{{ $errorMessage }}</strong></p>
                                </div>
                            </div>
                        @endif

                        <div class="col-md-12">
                            <div class="false mb-4">
                                <p class="msg-false">خطأ في الإيميل أو كلمة السر !</p>
                            </div>
                        </div>
                    @endif

                    
                    <!--  End Notifications  -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input type="email" name="email" id="email" class="input-elem" required
                                        placeholder="ادخل البريد الإلكتروني" autocomplete="off" />
                                    <label for="email">الإيميل</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input type="password" name="password" id="pass-word" class="input-elem" minlength="8" required 
                                        placeholder="ادخل كلمة المرور" autocomplete="off" />
                                    <label for="pass-word">كلمة المرور</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-register border-0">تسجيل الدخول</button>
                            </div>
                        </div>
                    </form>
                    <div class="col-md-12 mt-5 text-center">
                        <p class="text-white">ليس لدي حساب <a href="{{route('register')}}" class="mr-1 color-primary">حساب
                                جديد</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Login -->

@endsection