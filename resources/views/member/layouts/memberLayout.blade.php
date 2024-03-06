<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description"
    content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
  <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
  <title>{{ config('app.name') }} - @yield('title')</title>

  <!-- ========== Css Files ========== -->
  <link href="{{ asset('') }}user/css/root.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
@yield('css')

</head>

<body>
  <!-- Start Page Loading -->
  <div class="loading"><img src="{{ asset('') }}user/img/loading.gif" alt="loading-img"></div>
  <!-- End Page Loading -->
  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START TOP -->
  @include('member.layouts.partials.header')
  <!-- END TOP -->
  <!-- //////////////////////////////////////////////////////////////////////////// -->
  @include('member.layouts.partials.aside')

  <!-- //////////////////////////////////////////////////////////////////////////// -->
  <!-- START SIDEBAR -->

  <!-- END SIDEBAR -->
  <!-- //////////////////////////////////////////////////////////////////////////// -->



  <!-- //////////////////////////////////////////////////////////////////////////// -->
  <!-- START CONTENT -->
  <div class="content">



    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START CONTAINER -->
    <div class="container-widget">


    @yield('member')


    </div>
    <!-- END CONTAINER -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- Start Footer -->
    @include('member.layouts.partials.footer')
    <!-- End Footer -->


  </div>
  <!-- End Content -->
  <!-- //////////////////////////////////////////////////////////////////////////// -->


  <!-- //////////////////////////////////////////////////////////////////////////// -->
  <!-- START SIDEPANEL -->
  @include('member.layouts.partials.rightBar')
  <!-- END SIDEPANEL -->
  <!-- //////////////////////////////////////////////////////////////////////////// -->

@include('member.layouts.partials.scripts')

  </body>

    </html>
