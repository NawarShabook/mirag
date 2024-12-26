@extends('layouts.master')

@section('title')
ميراج | إضافة آلة ثقيلة
@endsection

@section('content')
  
    <div class="content w-full">
      <h1 class="p-relative">الآليات الثقيلة</h1>
      <div class="settings-page m-20 d-grid gap-20">
        <!-- Start Add Category Box -->
        <div class="p-20 bg-primary rad-10">
          <h2 class="mt-0 mb-10 color-primary">إضافة آلية جديدة</h2>
          <p class="mt-0 mb-20 c-grey fs-15">ادخل معلومات الآلية بعناية</p>
          @if(session('errors'))
            {{-- if app debug enable --}}
            @if (config('app.debug'))
              <p class="p-10 rad-10 m-20 bg-red c-white">{{session('errors')}}</p>
            @endif

            <p class="p-10 rad-10 m-20 bg-red c-white">حدث خطأ ما !</p>
          @endif

          <form action="{{route('heavy_machines.store')}}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf

            <div class="mb-15">
              <label class="fs-14 c-grey d-block mb-10" for="first">اسم الآلية *</label>
              <input class="b-none border-ccc p-10 rad-6 d-block w-full" type="text" id="first" name="name" required
                placeholder="ادخل اسم الآلية" />
            </div>
            <div class="mb-15">
              <label class="fs-14 c-grey d-block mb-10" for="img">صورة توضيحية للآلية 480*480</label>
              <input class="b-none bg-white border-ccc p-10 rad-6 d-block w-full" type="file" id="img" name="image" required />
            </div>
            <button class="label btn-shape bg-blue c-white btn-h">رفع الآلية</button>
          </form>
        </div>
        <!-- End Add Category Box -->
      </div>
      <!-- Start Tags Table -->
      <div class="projects p-20 bg-primary rad-10 m-20">
        <h2 class="mt-0 mb-20 color-primary">الآليات الثقيلة</h2>
        <div class="responsive-table">
          <table class="fs-15 w-full">
            <thead>
              <tr>
                <td>الاسم</td>
                <td>تاريخ الرفع</td>
                <td>تعديل</td>
                <td>حذف</td>
              </tr>
            </thead>
            <tbody>
                @foreach ($heavy_machines as $machine )
                    <tr>
                        <td>{{$machine->name}}</td>
                        <td>{{$machine->created_at->format('Y-m-d')}}</td>
                        <td><a href="{{route('heavy_machines.edit', $machine)}}" class="label btn-shape bg-violet c-white btn-update arrow">تعديل</a></td>
                        <td>
                            <form action="{{route('heavy_machines.destroy', $machine)}}" method="post" id="deleteForm" class="form-inline">
                                @csrf
                                @method('DELETE')
                                <button role='submit' class="label btn-shape bg-red c-white btn-delete arrow">حذف</button>
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