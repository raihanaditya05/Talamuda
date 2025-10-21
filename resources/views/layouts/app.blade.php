<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  {{-- AdminLTE CSS --}}
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">

  {{-- Tambahan CSS jika ada --}}
  @stack('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  {{-- Navbar (menu bar horizontal di bawah header) --}}
  @include('layouts.navbar')

    {{-- Header (misal berisi logo besar / judul aplikasi) --}}
  @include('layouts.header')
 
  {{-- Sidebar --}}
  @include('layouts.sidebar')


    <section class="content">
      @yield('content')
    </section>
  </div>

{{-- AdminLTE JS --}}
<script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>

{{-- Tambahan JS jika ada --}}
@stack('scripts')
</body>
</html>
