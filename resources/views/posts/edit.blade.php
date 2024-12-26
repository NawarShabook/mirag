@extends('layouts.master')

@section('title')
ميراج | تعديل خبر
@endsection

@section('content')
    <div class="content w-full">
      <h1 class="p-relative">آخر الأخبار</h1>
      <div class="settings-page m-20 d-grid gap-20">
        <!-- Start Add Category Box -->
        <div class="p-20 bg-primary rad-10">
          <h2 class="mt-0 mb-10 color-primary">تعديل معلومات الخبر </h2>
          <p class="mt-0 mb-20 c-grey fs-15">ادخل معلومات الخبر بعناية</p>
          @if(session('errors'))
            {{-- if app debug enable --}}
            @if (config('app.debug'))
                <p class="p-10 rad-10 m-20 bg-red c-white">{{session('errors')}}</p>
            @endif
            <p class="p-10 rad-10 m-20 bg-red c-white">حدث خطأ ما !</p>
          @endif
          <form action="{{route('posts.update', $post)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-15">
              <label class="fs-14 c-grey d-block mb-10" for="first">عنوان جديد للخبر *</label>
              <input class="b-none border-ccc p-10 rad-6 d-block w-full" type="text" id="first" name="title" value={{$post->title}}
                placeholder="ادخل عنوان الخبر" />
            </div>
            <div class="mb-15">
              <label class="fs-14 c-grey d-block mb-10" for="img">صورة توضيحية للخبر 426*640</label>
              <input class="b-none bg-white border-ccc p-10 rad-6 d-block w-full" type="file" id="img" name="image" />
            </div>
            <div class="mb-15">
              <label class="fs-14 c-grey d-block mb-10" for="img">معلومات جديدة عن الخبر</label>
              <textarea class="close-message p-10 rad-6 d-block w-full mb-15" name="content" 
                placeholder="إضافة معلومات عن الخبر">{{$post->content}}</textarea>
            </div>
            <button role="submit" class="label btn-shape bg-blue c-white btn-h">تعديل الخبر</button>
          </form>
        </div>
        <!-- End Add Category Box -->
      </div>
    </div>
  </div>
@endsection