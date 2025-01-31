@extends('layouts.app')

@section('title')
ميراج | حذف الحساب
@endsection

@section('content')

<!-- Start Contact -->
<div class="container-xxl mb-5 mt-5">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-7">
                <div class="bg-primary text-center p-5" style="border-top: 3px solid var(--second-color);">
                    <form method="POST" action="{{ route('delete-account.destroy') }}">
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
                            @endif
                            <!--  End Notifications  -->

                                @csrf
                                @method('POST')
                                <div class="col-12">
                                    <input type="password" name="password" minlength="8" required class="form-control border-0 noborder"
                                        placeholder="ادخل كلمة السر لحذف الحساب" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary bg-active w-100 py-3 noborder border-0 "
                                        type="submit">حذف الحساب</button>
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
