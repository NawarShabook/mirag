@extends('layouts.master')

@section('title')
ميراج | تعديل معلومات الورشة
@endsection

@section('content')

    <div class="content w-full">
      <h1 class="p-relative">الورشات</h1>
      <div class="settings-page m-20 d-grid gap-20">
        <!-- Start Edit Category Box -->
        <div class="p-20 bg-primary rad-10">
          <h2 class="mt-0 mb-10 color-primary">تعديل الورشة</h2>
          <p class="mt-0 mb-20 c-grey fs-15">ادخل معلومات الورشة بعناية</p>

          @if(session('errors'))
            {{-- if app debug enable --}}
            @if (config('app.debug'))
                <p class="p-10 rad-10 m-20 bg-red c-white">{{session('errors')}}</p>
            @endif
            <p class="p-10 rad-10 m-20 bg-red c-white">حدث خطأ ما !</p>
          @endif

          <form action="{{route('workshops.update', $workshop)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-15">
              <label class="fs-14 c-grey d-block mb-10" for="first">تعديل اسم الورشة *</label>
              <input class="b-none border-ccc p-10 rad-6 d-block w-full" type="text" name="name" value="{{$workshop->name}}" required
                placeholder="ادخل اسم الخدمة الجديد" />
            </div>
            <div class="mb-15">
              <label class="fs-14 c-grey d-block mb-10" for="first">تعديل عدد العمال *</label>
              <input class="b-none border-ccc p-10 rad-6 d-block w-full" type="number"  name="workers_count" value="{{$workshop->workers_count}}" 
              min="1" max="50" placeholder="ادخل عدد العمال الجديد" required/>
            </div>
            <div class="mb-15">
              <label class="fs-14 c-grey d-block mb-10" for="img">تعديل صورة الورشة 480*480</label>
              <input class="b-none bg-white border-ccc p-10 rad-6 d-block w-full" type="file" id="img" name="image" />
            </div>
            <button type="submit" class="label btn-shape bg-blue c-white btn-h">تعديل</button>
          </form>
        </div>
        <!-- End Edit Category Box -->
      </div>
    </div>
@endsection