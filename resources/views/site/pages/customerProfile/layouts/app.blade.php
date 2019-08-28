<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Autosheba') }}</title>
  
  <link href="{{ asset('css/global/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/global/fa5/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/site/plugin/material-design-iconic-font.css') }}" rel="stylesheet">
  <link href="{{ asset('css/site/plugin/site-wizard-validation.css') }}" rel="stylesheet">
  <link href="{{ asset('css/site/site_wizard.css') }}" rel="stylesheet">
  <link href="{{ asset('css/site/custom.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    @include('site.inc.header')
    <div class="container" style="min-height: 300px; padding-top:50px; padding-bottom:50px; background-color:aliceblue;">
      <div class="row">
        <div class="col-sm-3">
          @include('site.pages.customerProfile.inc.sidebar')
        </div>
        <div class="col-sm-9">
          @yield('content')
        </div>
      </div>
    </div>
    @include('site.inc.footer')
  </div>
  <script src="{{ asset('js/global/jquery.min.js') }}"></script>
  <script src="{{ asset('js/global/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/site/plugin/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('js/site/plugin/additional-methods.min.js') }}"></script>
  <script src="{{ asset('js/site/plugin/jquery.steps.js') }}"></script>
  <script src="{{ asset('js/site/site_wizard.js') }}"></script>
  <script src="{{ asset('js/site/site_custom.js') }}"></script>
</body>
</html>
