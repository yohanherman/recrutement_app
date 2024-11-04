<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
@vite('resources/css/app.css')
<script src="https://kit.fontawesome.com/b713960f0d.js" crossorigin="anonymous"></script>

{{-- For telephone international input --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@24.6.0/build/css/intlTelInput.css">
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@24.6.0/build/js/intlTelInput.min.js"></script>
{{--  --}}

{{-- stylesheer --}}
<link rel="stylesheet" href="{{asset('css/style.css')}}">

<script src="{{ asset('javascript/script.js')}}"></script>
<title>@yield('title')</title>