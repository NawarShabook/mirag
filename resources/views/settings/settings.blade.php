@extends('layouts.master')

@section('title')
ميراج | إدارة المعلومات
@endsection

@section('content')
    <div class="content w-full">
        <h1 class="p-relative color-primary">معلومات التواصل</h1>
        <div class="settings-page m-20 d-grid gap-20">
            <!-- Start Social Media Stats Widget -->
            <div class="social-media p-20 bg-primary rad-10 p-relative">
                <h2 class="mt-0 mb-25 c-white">اسم المستخدم لكل تطبيق :</h2>
                <div class="box facebook p-15 p-relative mb-10 between-flex">
                    <i class="fa-brands fa-facebook-f fa-2x c-white h-full center-flex"></i>
                    <input class="b-none bg-none border-ccc p-10 rad-6 d-block w-full c-white" type="text"
                        id="facebook-val" value="{{$settings_array['facebook']??''}}" placeholder="username" />
                    <button input-val="facebook-val" class="label btn-shape bg-blue c-white btn-h mr-10 update-setting-btn">تعديل</button>
                </div>
                <div class="box instagram p-15 p-relative mb-10 between-flex">
                    <i class="fa-brands fa-instagram fa-2x c-white h-full center-flex"></i>
                    <input class="b-none bg-none border-ccc p-10 rad-6 d-block w-full c-white" type="text"
                        id="instagram-val" value="{{$settings_array['instagram']??''}}" placeholder="username" />
                    <button  input-val="instagram-val" class="label btn-shape bg-violet c-white btn-h mr-10 update-setting-btn">تعديل</button>
                </div>
                <div class="box linkedin p-15 p-relative mb-10 between-flex">
                    <i class="fa-brands fa-linkedin fa-2x c-white h-full center-flex"></i>
                    <input class="b-none bg-none border-ccc p-10 rad-6 d-block w-full c-white" type="text"
                        id="linkedin-val" value="{{$settings_array['linkedin']??''}}" placeholder="username" />
                    <button input-val="linkedin-val" class="label btn-shape bg-blue c-white btn-h mr-10 update-setting-btn">تعديل</button>
                </div>
                <div class="box instagram p-15 p-relative mb-10 between-flex">
                    <i class="fa-brands fa-twitter fa-2x c-white h-full center-flex"></i>
                    <input class="b-none bg-none border-ccc p-10 rad-6 d-block w-full c-white" type="text"
                        id="twitter-val" value="{{$settings_array['twitter']??''}}" placeholder="username" />
                    <button input-val="twitter-val" class="label btn-shape bg-violet c-white  btn-h mr-10 update-setting-btn">تعديل</button>
                </div>
                <div class="box whatsapp p-15 p-relative mb-10 between-flex">
                    <i class="fa-brands fa-whatsapp fa-2x c-white h-full center-flex"></i>
                    <input class="b-none bg-none border-ccc p-10 rad-6 d-block w-full c-white" type="number"
                        id="whatsapp-val" value="{{$settings_array['whatsapp']??''}}" placeholder="00963911111111" />
                    <button input-val="whatsapp-val" class="label btn-shape bg-green c-white  btn-h mr-10 update-setting-btn">تعديل</button>
                </div>
                <div class="box map p-15 p-relative mb-10 between-flex">
                    <i class="fas fa-map-marker-alt fa-2x c-white h-full center-flex bg-red"></i>
                    <input class="b-none bg-none border-ccc p-10 rad-6 d-block w-full c-white" type="text"
                        id="location-val" value="{{$settings_array['location']??''}}" placeholder="location" />
                    <button input-val="location-val" class="label btn-shape bg-violet c-white  btn-h mr-10 update-setting-btn">تعديل</button>
                </div>
                <div class="box linkedin p-15 p-relative mb-10 between-flex">
                    <i class="fas fa-envelope fa-2x c-white h-full center-flex"></i>
                    <input class="b-none bg-none border-ccc p-10 rad-6 d-block w-full c-white" type="text"
                        id="email-val" value="{{$settings_array['email']??''}}" placeholder="username" />
                    <button input-val="email-val" class="label btn-shape bg-blue c-white btn-h mr-10 update-setting-btn">تعديل</button>
                </div>
            </div>
            <!-- Start End Media Stats Widget -->
        </div>
    </div>

    @section('script')
        <script>
            const Settingbuttons = document.querySelectorAll('.update-setting-btn');
            Settingbuttons.forEach(button => {
                button.addEventListener('click', function () {
                    updateSetting(this);
                });
            });


            function updateSetting(settingBtn){
                setting = settingBtn.getAttribute('input-val');
                key = setting.split('-')[0];
                value = document.getElementById(setting).value;
                fetch('/settings/update', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: JSON.stringify({
                        key: key,
                        value: value,
                    }),
                })
                    .then(
                        response => response.json()
                    )
                    .then(
                        data => console.log(data)
                    )
                    .catch(error => console.error('Error:', error));
            }
        </script>

    @endsection
@endsection