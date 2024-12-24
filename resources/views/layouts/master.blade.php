<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'ميراج')</title>
  <!-- favicon -->
  <link rel="icon" type="/image/png" href="imgs/icon.png">
  <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/framework.css') }}">
  <link rel="stylesheet" href="{{ asset('css/master.css') }}">
  
  <link
    href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
    rel="stylesheet">
    <style>
      .form-inline{
        display: inline;
      }
    </style>
    @yield('head')
</head>

<body id="body">
    @include('layouts.admin_sidebar')

    @yield('content')

    {{-- script for delete confirmation --}}
    <script>
      // Get the form element
      const deleteForm = document.getElementById('deleteForm');

      // Add a submit event listener
      deleteForm.addEventListener('submit', function (event) {
          // Display a confirmation dialog
          const confirmation = confirm('هل أنت متأكد من الحذف؟');

          // If the user cancels, prevent form submission
          if (!confirmation) {
              event.preventDefault();
          }
      });
    </script>
    @yield('script')

</body>
