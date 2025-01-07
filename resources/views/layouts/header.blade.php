<div id="header"></div>
<!--Start Navbar -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand d-inline" href="index.html" style="font-size: 22px;">
            <img src="/brand/icon.png" class="d-inline" height="75px" alt="logo-sera"> مـيـراج
        </a>
        <div class="link">
            <a class="p-2 p-lg-3 a-link bg-active" title="الصفحة الرئيسية" aria-current="page" href="/"><i
                    class="fas fa-home"></i></a>

            @guest
                @if (Route::has('login'))

                    <a class="p-2 p-lg-3 a-link" title="تسجيل الدخول" aria-current="page" href="{{ route('login') }}">
                        <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                @endif

                {{-- @if (Route::has('register'))
                <a class="p-2 p-lg-3 a-link" title="إنشاء حساب" aria-current="page" href="{{ route('register') }}">
                    <i class="fa fa-user-plus" aria-hidden="true"></i></a>

                @endif --}}
            @else
            <a class="p-2 p-lg-3 a-link" title="الملف الشخصي" aria-current="page" href="{{ route('profile') }}"><i
                    class="fas fa-user"></i></a>
            @endguest

            @isAdmin
            <a class="p-2 p-lg-3 a-link" title="الملف الشخصي" aria-current="page" href="{{ route('settings') }}">
                <i class="fa fa-cog" aria-hidden="true"></i></i></a>
            @endisAdmin

        </div>
    </div>
</nav>
<!-- End Navbar -->

<!-- Start Header -->
<div class="container mb-4 mt-5">
    <div class="row justify-content-center">
        <h1 class="color-primary text-center mb-4 fw-bold">أهـلاً بـكم فـي مـيـراج</h1>
    </div>
</div>
<!-- End Header -->
