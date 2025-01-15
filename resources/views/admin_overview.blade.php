@extends('layouts.master')

@section('title')
ميراج | لوحة التحكم
@endsection

@section('content')
    <div class="content w-full">
      <h1 class="p-relative">لوحة التحكم</h1>
      <div class="wrapper d-grid gap-20">

        <!-- Start Statistics -->
        <div class="search-items p-20 bg-white rad-10">
          <h2 class="mt-0 mb-20 color-primary "><i class="fas fa-boxes"></i> الطلبات</h2>
          <hr class="color-primary">
          <div class="items-head d-flex space-between c-white mb-10">
            <div class="fw-bold ">النوع</div>
            <div class="fw-bold ">العدد</div>
          </div>
          <hr class="color-primary">
          <div class="items d-flex space-between pt-15 pb-15">
            <span class="c-white"><i class="fas fa-hashtag color-primary fw-bold"></i> خدمات الصيانة</span>
            <span class="bg-second c-white fs-13 btn-shape">{{$orders['maintenance_service']}}</span>
          </div>
          <div class="items d-flex space-between pt-15 pb-15">
            <span class="c-white"><i class="fas fa-check-double color-primary fw-bold"></i> الورشات</span>
            <span class="bg-second c-white btn-shape fs-13">{{$orders['workshop']}}</span>
          </div>
          <div class="items d-flex space-between pt-15 pb-15">
            <span class="c-white"><i class="fas fa-snowplow color-primary fw-bold"></i> الآليات الثقيلة</span>
            <span class="bg-second c-white btn-shape fs-13">{{$orders['heavy_machine']}}</span>
          </div>
        </div>
        <!-- End Statistics -->

        <!-- Start Statistics -->
        <div class="search-items p-20 bg-white rad-10">
          <h2 class="mt-0 mb-20 color-primary "><i class="fas fa-tags"></i> التصنيفات</h2>
          <hr class="color-primary">
          <div class="items-head d-flex space-between c-white mb-10">
            <div class="fw-bold ">الاسم</div>
            <div class="fw-bold ">العدد</div>
          </div>
          <hr class="color-primary">
          <div class="items d-flex space-between pt-15 pb-15">
            <span class="c-white"><i class="fas fa-hashtag color-primary fw-bold"></i> خدمات الصيانة</span>
            <span class="bg-second c-white fs-13 btn-shape">{{$categories['maintenance_service']}}</span>
          </div>
          <div class="items d-flex space-between pt-15 pb-15">
            <span class="c-white"><i class="fas fa-check-double color-primary fw-bold"></i> الورشات</span>
            <span class="bg-second c-white btn-shape fs-13">{{$categories['workshop']}}</span>
          </div>
          <div class="items d-flex space-between pt-15 pb-15">
            <span class="c-white"><i class="fas fa-snowplow color-primary fw-bold"></i> الآليات الثقيلة</span>
            <span class="bg-second c-white btn-shape fs-13">{{$categories['heavy_machine']}}</span>
          </div>
        </div>
        <!-- End Statistics -->

      </div>

    </div>
@endsection
