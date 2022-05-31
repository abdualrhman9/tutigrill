<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Search Meta -->

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="theme-color" content="#4c4355">
  <link rel="icon" href="" type="image/x-icon">
  <meta name="title" content="tutigrill">
  <meta name="description" content="TutiGrill offers a range of grilled delicacies">
  <meta name="keywords" content="tutigrill, restaurants, restaurant, restaurant in colorado, grilled dishes, fast food in colorado   ">
  <meta name="robots" content="index, follow">
  <meta name="language" content="English">
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://www.tutigrill.com">
  <meta property="og:title" content="tutigrill">
  <meta property=" og:description" content="TutiGrill offers a range of grilled delicacies">
  <meta property="og:image" content="">
  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="">
  <meta property="twitter:title" content="tutigrill">
  <meta property=" twitter:description" content="TutiGrill offers a range of grilled delicacies">
  <meta property="twitter:image" content="">


    <!-- Search Meta -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'tutigrill') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    @yield('content')
</div>
</body>
</html>
