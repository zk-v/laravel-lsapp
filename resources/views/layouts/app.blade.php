<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Link to bootstrap that is shipped with Laravel and compiled to the app.css file in css folder -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Return app name as configured in .env APP_NAME, or return default (second parameter)
            if it is not declared -->
            <title>{{ config('app.name', 'Zakodos') }}</title>
    </head>
    <body>
        @include('inc.navbar')

        <div class="container mt-3">
            <!-- Error / success messages -->
            @include('inc.messages')
            <!-- Display content of the page -->
            @yield('content')
        </div>

        <!-- Includes the editor for submitting posts -->
        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'article-ckeditor' );
        </script>
    </body>
</html>
