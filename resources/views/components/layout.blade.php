<!DOCTYPE HTML>
<html lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />

    @if (isset($title))
    <title>@setting('title') - {{ $title }}</title>
    @else
    <title>@setting('title')</title>
    @endif
    @include('components.custome-style')
    <meta name="theme-color" content="#66bb6a">
    <meta name="description" content="@setting('description')">
    <link rel="icon" type="image/png" href="@setting('favicon')">
    <link rel="stylesheet" type="text/css" href="{{ asset('/template/styles/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/template/styles/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons|Material+Icons+Outlined|Material+Icons+Round"
        rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/template/fonts/css/fontawesome-all.min.css') }}">
    <link rel="manifest" href="{{ asset('/template/_manifest.json') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/template/app/icons/icon-192x192.png') }}">

    <style>
        .material-icons {
            font-size: inherit;
        }
    </style>

    @stack('style')
    <script type="text/javascript" src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>
    <link href="/vendor/select2.min.css" rel="stylesheet" />
    <script src="/vendor/select2.min.js"></script>
</head>

<body class="theme-light" data-highlight="highlight-red">
    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>

    <div id="page">
        {{ $slot }}
    </div>



    <script type="text/javascript" src="{{ asset('/template/scripts/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/template/scripts/custom.js?r=').date('m') }}"></script>
    <script src="https://use.fontawesome.com/452826394c.js"></script>

    @stack('script')
</body>

</html>
