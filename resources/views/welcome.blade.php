<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Universal Pet ML') }}</title>
    <link rel="shortcut icon" href="{{ asset('/favicon.png') }}" type="image/x-icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/welcome.css?v=' . now()->format('H.s')) }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css?v=' . now()->format('H.s')) }}">
</head>

<body class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">


        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center">
                <x-jet-application-logo />
            </div>

            <div class="mt-8 overflow-hidden sm:rounded-lg">
                <div class="d-flex justify-content-center">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="mx-3 btn btn-info shadow btn-sm">{{ __('dashboard') }}</a>
                        @else
                            <a href="{{ route('login') }}" class="mx-3 btn btn-info shadow btn-sm">{{ __('Login') }}</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="mx-3 btn btn-info shadow btn-sm">{{ __('Register') }}</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>

</html>
