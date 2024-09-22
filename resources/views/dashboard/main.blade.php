
@include('dashboard.header')
  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
      

     @include('dashboard.sidemenu')


        <!-- Layout container -->
        <div class="layout-page">
         @include('dashboard.navbar')

          <!-- Content wrapper -->
          <div class="content-wrapper">
         @yield('content')
    @include('dashboard.footer')