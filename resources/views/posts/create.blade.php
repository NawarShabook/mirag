@extends('layouts.master')

@section('title')
ميراج | إضافة خبر
@endsection

@section('content')
  
    
    <div class="content w-full">
      <h1 class="p-relative">آخر الأخبار</h1>
      <div class="settings-page m-20 d-grid gap-20">
        <!-- Start Add Category Box -->
        <div class="p-20 bg-primary rad-10">
          <h2 class="mt-0 mb-10 color-primary">إضافة خبر جديد</h2>
          <p class="mt-0 mb-20 c-grey fs-15">ادخل معلومات الخبر بعناية</p>

          @if(session('errors'))
            {{-- if app debug enable --}}
            @if (config('app.debug'))
              <p class="p-10 rad-10 m-20 bg-red c-white">{{session('errors')}}</p>
            @endif

            <p class="p-10 rad-10 m-20 bg-red c-white">حدث خطأ ما !</p>
          @endif

          <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="mb-15">
              <label class="fs-14 c-grey d-block mb-10" for="first">عنوان الخبر *</label>
              <input class="b-none border-ccc p-10 rad-6 d-block w-full" type="text" id="first" name="title" required
                placeholder="ادخل عنوان الخبر" />
            </div>
            <div class="mb-15">
              <label class="fs-14 c-grey d-block mb-10" for="img">صورة توضيحية للخبر 426*640</label>
              <input class="b-none bg-white border-ccc p-10 rad-6 d-block w-full" type="file" id="img" name="image" required />
            </div>
            <div class="mb-15">
              <label class="fs-14 c-grey d-block mb-10" for="img">معلومات عن الخبر</label>
              <textarea class="close-message p-10 rad-6 d-block w-full mb-15" name="content" required
                placeholder="إضافة معلومات عن الخبر"></textarea>
            </div>
            <button class="label btn-shape bg-blue c-white btn-h">رفع الخبر</button>
          </form>
        </div>
        <!-- End Add Category Box -->
      </div>
      <!-- Start Tags Table -->
      <div class="projects p-20 bg-primary rad-10 m-20">
        <h2 class="mt-0 mb-20 color-primary">آخر الأخبار</h2>
        <div class="responsive-table">
          <table class="fs-15 w-full">
            <thead>
              <tr>
                <td>عنوان الخبر</td>
                <td>تاريخ الرفع</td>
                <td>تعديل</td>
                <td>حذف</td>
              </tr>
            </thead>
            <tbody>
              @foreach ($posts as $post)
                <tr>
                  <td><a href="{{route('posts.show',$post)}}" style="color: inherit">{{$post->title}}</a></td>
                  <td>{{$post->created_at->format('Y-m-d')}}</td>
                  <td><a href="{{route('posts.edit', $post)}}" class="label btn-shape bg-violet c-white btn-update arrow">تعديل</a></td>
                  <td>
                    <form action="{{route('posts.destroy', $post)}}" method="post" id="deleteForm" class="form-inline">
                      @csrf
                      @method('DELETE')
                      <button type='submit' class="label btn-shape bg-red c-white btn-delete arrow">حذف</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- End Tags Table -->
    </div>
  </div>
@endsection