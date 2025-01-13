@extends('layouts.app')
@section('title')
ميراج | تغيير كلمة السر
@endsection
@section('head')
<link rel="stylesheet" href="{{asset('css/login.css')}}" />
@endsection
@section('content')
    <!-- Start Contact -->
    <div class="container-xxl mb-5 mt-5">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-7">
                    <div class="bg-primary text-center p-5" style="border-top: 3px solid var(--second-color);">


                            <!--  Start Notifications  -->
                            @if(session('errors'))
                                {{-- if app debug enable --}}
                                @if (config('app.debug'))
                                    <div class="col-md-12">
                                        <div class="false mb-4">
                                            <p class="msg-false">{{session('errors')}}<i class="fas fa-times mr-2"></i> </p>
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
                                        <p class="msg-success">تم تغيير كلمة السر
                                            بنجاح <i class="fas fa-check mr-2"></i></p>
                                    </div>
                                </div>
                            @endif


                            <!--  End Notifications  -->

                            <form action="{{route('password.update')}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="row g-3">
                                <div class="col-12">
                                    <input type="password" name="password" minlength="8" class="form-control border-0 noborder"
                                        placeholder="ادخل كلمة السر الجديدة" style="height: 55px;" required>
                                </div>
                                <div class="col-12">
                                    <input type="password" name="password_confirmation" minlength="8" class="form-control border-0 noborder"
                                        placeholder="تأكيد كلمة السر الجديدة" style="height: 55px; " required>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary bg-active w-100 py-3 noborder border-0 "
                                        type="submit">تفيير كلمة السر</button>
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
