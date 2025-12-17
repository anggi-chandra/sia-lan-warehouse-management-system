<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Manajemen Gudang')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="main-container">
        <!-- SIDEBAR -->
        @include('partials.sidebar')

        <!-- CONTENT AREA -->
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>

</html>
