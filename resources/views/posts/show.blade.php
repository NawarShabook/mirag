

@extends('layouts.app')

@section('title')
ميراج | {{$post->title}}
@endsection

@section('content')

    <!-- Start Last Works -->
    <section class="mt-5" id="last-works">
        <div class="container">
            <div class="row">
                <h6 class="text-white fw-bold"><i class="fas fa-star"></i> الإبداع لا ينتهي
                </h6>
                <h3 class="color-primary fw-bold mb-4">{{$post->title}} :</h3>
            </div>
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                <div class="col-lg-7"><img class="img-fluid radius-logo mb-4 mb-lg-0"
                        style="border-radius: 0 0 50% 0 !important;" src="{{ asset($post->image) }}" alt="صورة توضيحية عن الخبر">
                </div>
                <div class="col-lg-5">
                    <div>
                        <h2 class="color-primary fw-bold">عنوان الخبر</h2>
                        <p class="text-white">{{$post->title}}</p>
                    </div>
                    <h3 class="active fw-bold">الموضوع :</h3>
                    <p class="mt-3 text-white">{{$post->content}}</p>
                    <a class="active mt-2"><img src="{{ asset('brand/icon.png') }}" width="64" alt="logo-mirag"></a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 justify-content-center text-center">
                    <a href="{{route('posts.index')}}" class="btn btn-primary bg-active text-center py-2 noborder border-0">استعراض
                        كافة الأعمال</a> 
                </div>
            </div>
        </div>
    </section>
    <!-- End Last Works -->

@endsection