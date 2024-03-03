<!DOCTYPE html>
<!--
   Template Name: NobleUI - Laravel Admin Dashboard Template
   Author: NobleUI
   Website: https://www.nobleui.com
   Portfolio: https://themeforest.net/user/nobleui/portfolio
   Contact: nobleui123@gmail.com
   Purchase: https://1.envato.market/nobleui_laravel
   License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
   -->
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="description" content="Responsive Laravel Admin Dashboard Template based on Bootstrap 5">
      <meta name="author" content="NobleUI">
      <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, laravel, theme, front-end, ui kit, web">
      <title>NobleUI - Laravel Admin Dashboard Template</title>
      <!-- Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
      <!-- End fonts -->
      <!-- CSRF Token -->
      <meta name="_token" content="nhpH9qP9bhS3PMGJiP7mHOOUALhiZgMq8kyiVbEJ">
      <link rel="shortcut icon" href="{{ asset('admin') }}/favicon.ico">
      <!-- plugin css -->
      <link href="{{ asset('admin') }}/assets/fonts/feather-font/css/iconfont.css" rel="stylesheet" />
      <link href="{{ asset('admin') }}/assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" />
      <!-- end plugin css -->
      <link href="{{ asset('admin') }}/assets/plugins/flatpickr/flatpickr.min.css" rel="stylesheet" />
      <!-- common css -->
      <link href="{{ asset('admin') }}/css/app.css" rel="stylesheet" />
      <!-- end common css -->

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
      <link rel="stylesheet" href="//cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css">
      <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
      
      <style>
         .hide {
            display: none;
         }
         .hover-text:hover {
            color: white
         }
      </style>
   </head>
   <body >
      <script src="{{ asset('admin') }}/assets/js/spinner.js"></script>
      <div class="main-wrapper" id="app">
         @include('layouts.sidebar')
         <div class="page-wrapper">
            @include('layouts.navbar')
            @yield('content')
            <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
               <p class="text-muted mb-1 mb-md-0">Copyright © 2023 <a href="https://www.nobleui.com" target="_blank">NobleUI</a>.</p>
               <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
            </footer>
         </div>
      </div>
      <!-- base js -->
      <script src="{{ asset('admin') }}/js/app.js"></script>
      <script src="{{ asset('admin') }}/assets/plugins/feather-icons/feather.min.js"></script>
      <script src="{{ asset('admin') }}/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
      <!-- end base js -->
      <!-- plugin js -->
      <script src="{{ asset('admin') }}/assets/plugins/flatpickr/flatpickr.min.js"></script>
      <script src="{{ asset('admin') }}/assets/plugins/apexcharts/apexcharts.min.js"></script>
      <!-- end plugin js -->
      <!-- common js -->
      <script src="{{ asset('admin') }}/assets/js/template.js"></script>
      <!-- end common js -->
      <script src="{{ asset('admin') }}/assets/js/dashboard.js"></script>
      <script src="{{ asset('') }}admin/app-assets/vendors/js/extensions/sweetalert2.all.js" type="text/javascript"></script>
      <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css " rel="stylesheet">
      <script src="//cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>


      <script>
         var simplemde = new SimpleMDE({ element: document.getElementById("ckeditor") });
      </script>
      
      <script>
         $(document).ready(function(){
            //  $('.dropify').dropify();
            let table = new DataTable('.table');
 
            //  $('.select2').select2({
            //      theme: 'bootstrap'
            //      // dropdownParent: $('#large')
            //  });
             @if (session('success'))
             swal("Great !", "{{ session('success') }}", "success");
             @endif ()
             @if (session('error'))
             swal("Oh No !", "{{ session('error') }}", "error");
             @endif ()
         });
     </script>
      @yield('scripts')
      
   </body>
</html>