@extends('layouts.app')

@section('title')
ميراج | تصفح كل الأعمال
@endsection

@section('content')

    <!-- Start Last Works -->
    <section class="mt-5" id="last-works">
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
        </div>
    </section>
    <!-- End Last Works -->
    @endsection