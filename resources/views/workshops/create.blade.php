@extends('layouts.master')

@section('title')
ميراج | الورشات
@endsection

@section('content')

    <div class="content w-full">
      <h1 class="p-relative">الورشات</h1>
      <div class="settings-page m-20 d-grid gap-20">
        <!-- Start Add Category Box -->
        <div class="p-20 bg-primary rad-10">
          <h2 class="mt-0 mb-10 color-primary">إضافة ورشة جديدة</h2>
          <p class="mt-0 mb-20 c-grey fs-15">ادخل معلومات الورشة بعناية</p>

          @if(session('errors'))
          {{-- if app debug enable --}}
          @if (config('app.debug'))
            <p class="p-10 rad-10 m-20 bg-red c-white">{{session('errors')}}</p>
          @endif
          <p class="p-10 rad-10 m-20 bg-red c-white">حدث خطأ ما !</p>
          @endif

          @session('success')
          <p class="p-10 rad-10 m-20 bg-green c-white">{{session('success')}}</p>
          @endsession
          <form action="{{route('workshops.store')}}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="mb-15">
              <label class="fs-14 c-grey d-block mb-10" for="first">اسم الورشة *</label>
              <input class="b-none border-ccc p-10 rad-6 d-block w-full" type="text" id="first" name="name" required
                placeholder="ادخل اسم الخدمة" />
            </div>
            <div class="mb-15">
              <label class="fs-14 c-grey d-block mb-10" for="first">عدد العمال *</label>
              <input class="b-none border-ccc p-10 rad-6 d-block w-full" type="number" min="1" max="50" placeholder="ادخل عدد العمال" name="workers_count" required />
            </div>
            <div class="mb-15">
              <label class="fs-14 c-grey d-block mb-10" for="img">صورة توضيحية للورشة 480*480</label>
              <input class="b-none bg-white border-ccc p-10 rad-6 d-block w-full" type="file" id="img" name="image" required />
            </div>
            <button type="submit" class="label btn-shape bg-blue c-white btn-h">رفع الورشة</button>
          </form>
        </div>
        <!-- End Add Category Box -->
      </div>
      <!-- Start Tags Table -->
      <div class="projects p-20 bg-primary rad-10 m-20">
        <h2 class="mt-0 mb-20 color-primary">الورشات</h2>
        <div class="responsive-table">
          <table class="fs-15 w-full">
            <thead>
              <tr>
                <td>الاسم</td>
                <td>تاريخ الرفع</td>
                <td>عدد العمال</td>
                <td>تعديل</td>
                <td>حذف</td>
              </tr>
            </thead>
            <tbody>
              @foreach ($workshops as $workshop )
                <tr>
                  <td>{{$workshop->name}}</td>
                  <td>{{$workshop->created_at->format('Y-m-d')}}</td>
                  <td>{{$workshop->workers_count}}</td>
                  <td><a href="{{route('workshops.edit', $workshop)}}" class="label btn-shape bg-violet c-white btn-update arrow">تعديل</a></td>
                  <td>
                    <form action="{{route('workshops.destroy', $workshop)}}" method="post" id="deleteForm" class="form-inline">
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
@endsection
