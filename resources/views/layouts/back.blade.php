<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{URl('css/back/back.css')}}">

</head>
<body>

<section>
    <div class="left-menu">
        @include('back.dashboard.index')
    </div>
    <div class="right-menu">

        @include('back.navbar.nav')



    </div>
</section>


<div class="content-nav">

</div>

{{--content start--}}

{{--content end--}}
</body>
<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>


<script src="{{URL('js/back/main.js')}}"></script>

<script src="{{URL('js/back/back.js')}}"></script>

</html>
