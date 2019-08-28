<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Autosheba') }}</title>
  
  <link href="{{ asset('css/global/fa5/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/admin/style.min.css') }}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/css/bootstrap-colorpicker.min.css" rel="stylesheet">
  <link href="{{ asset('css/admin/custom.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">

  <link href="{{ asset('css/admin/plugin/dataTable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>
<body>
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <!--Modal Start -->
  <div id="addingDataModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" id="modalClose" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="addingDataModalBody" class="modal-body">
        </div>
      </div>
    </div>
  </div>

  <div id="main-wrapper">
    @include('admin.inc.header')
    @include('admin.inc.sidebar')
    <div class="page-wrapper">
      @include('admin.inc.breadcrumb')
      <div class="body-container mt-3" style="min-height:500px;">
        @yield('content')
      </div>
      @include('admin.inc.footer')
    </div>
  </div>
  <script src="{{ asset('js/global/jquery.min.js') }}" defer></script>
  <script src="{{ asset('js/global/popper.min.js') }}" defer></script>
  <script src="{{ asset('js/global/bootstrap.min.js') }}" defer></script>
  <script src="{{ asset('js/admin/plugin/perfect-scrollbar.jquery.min.js') }}" defer></script>
  <script src="{{ asset('js/admin/plugin/sparkline.js') }}" defer></script>
  <script src="{{ asset('js/admin/plugin/chart.min.js') }}" defer></script>
  <script src="{{ asset('js/admin/waves.js') }}" defer></script>
  <script src="{{ asset('js/admin/sidebarmenu.js') }}" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/js/bootstrap-colorpicker.min.js" defer></script>  
  <script src="{{ asset('js/admin/custom.min.js') }}" defer></script>
  <script src="{{ asset('js/admin/custom_chart.js') }}" defer></script>






</body>
</html>
