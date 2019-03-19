<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>
  {{config('bootplant.app_name')}} | @yield('section', 'Dashboard')
</title>
<meta name="description" content="Descrizione">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="{{asset('bootplant/css/font-awesome.min.css')}}" rel="stylesheet"/>
<link href="{{asset('bootplant/css/material-icons.css')}}" rel="stylesheet">
{{-- <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"> --}}
<link rel="stylesheet" data-version="{{config('bootplant.app_theme_version')}}" href="{{asset('bootplant/css/bootplant.css')}}">
@if(config('bootplant.app_color'))
  <link rel="stylesheet" href="{{asset('bootplant/css/accents/'.config('bootplant.app_color').'.'.config('bootplant.app_theme_version').'.min.css')}}">
@endif
<link href="{{asset('bootplant/css/responsive.dataTables.min.css')}}" rel="stylesheet"/>
<link href="{{asset('bootplant/css/animate.css')}}" rel="stylesheet"/>
<script async defer src="{{asset('bootplant/js/buttons.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/app.css')}}">

<link rel="apple-touch-icon" sizes="180x180" href="/icons/apple-touch-icon.png?v=dLJYYOG6RG">
<link rel="icon" type="image/png" sizes="32x32" href="/icons/favicon-32x32.png?v=dLJYYOG6RG">
<link rel="icon" type="image/png" sizes="16x16" href="/icons/favicon-16x16.png?v=dLJYYOG6RG">
<link rel="manifest" href="/icons/site.webmanifest?v=dLJYYOG6RG">
<link rel="mask-icon" href="/icons/safari-pinned-tab.svg?v=dLJYYOG6RG" color="#17be66">
<link rel="shortcut icon" href="/icons/favicon.ico?v=dLJYYOG6RG">

<meta name="msapplication-TileColor" content="#17BE66">
<meta name="msapplication-TileImage" content="{{asset('images/icons/ms-icon-144x144.png')}}">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="{{config('bootplant.app_name')}}">
<meta name="theme-color" content="#17BE66">
<meta name="csrf-token" content="{{ csrf_token() }}">
@yield('extrastyle')
