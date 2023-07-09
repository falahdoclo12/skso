<!DOCTYPE html>
<html lang="{{ str_replace( '_', '-', app()->getLocale())}}">
<head>
    @include('includes.auth.meta')
    <title>@yield('title') | Website SKSO</title>
    @stack('before-styles')
    @include('includes.auth.styles')
    @stack('after-styles')
</head>
<body class="auth-body-bg">
    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">
                @yield('content')
            </div>
        </div>
    </div>
    @stack('before-script')
    @include('includes.auth.script')
    @stack('after-script')
</body>
</html>