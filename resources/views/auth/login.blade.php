{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
@csrf

<!-- Email Address -->
<div>
    <x-label for="email" :value="__('Email')" />

    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
</div>

<!-- Password -->
<div class="mt-4">
    <x-label for="password" :value="__('Password')" />

    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
        autocomplete="current-password" />
</div>

<!-- Remember Me -->
<div class="block mt-4">
    <label for="remember_me" class="inline-flex items-center">
        <input id="remember_me" type="checkbox"
            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            name="remember">
        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
    </label>
</div>

<div class="flex items-center justify-end mt-4">
    @if (Route::has('password.request'))
    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
        {{ __('Forgot your password?') }}
    </a>
    @endif

    <x-button class="ml-3">
        {{ __('Log in') }}
    </x-button>
</div>
</form>
</x-auth-card>
</x-guest-layout> --}}



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket Plus">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracketplus">
    <meta property="og:title" content="Bracket Plus">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Login</title>

    <!-- vendor css -->
    <link href="{{ asset('backend') }}/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('backend') }}/css/bracket.css">
</head>

<body>

    <div class="d-flex align-items-center justify-content-center ht-100v">
        <video id="headVideo" class="pos-absolute a-0 wd-100p ht-100p object-fit-cover" autoplay muted loop>
            <source src="{{ asset('backend') }}/videos/video1.mp4" type="video/mp4">
            <source src="{{ asset('backend') }}/videos/video1.ogv" type="video/ogg">
            <source src="{{ asset('backend') }}/videos/video1.webm" type="video/webm">
        </video><!-- /video -->
        <div class="overlay-body bg-black-7 d-flex align-items-center justify-content-center">
            <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 rounded bg-black-6">
                <div class="signin-logo tx-center tx-28 tx-bold tx-white"><span class="tx-normal">[</span> Khayrul <span
                        class="tx-info">Shanto</span> <span class="tx-normal">]</span></div>
                <div class="tx-white-5 tx-center mg-b-60">Login To Admin Panel</div>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input name="email" id="email" type="text" class="form-control fc-outline-dark  @error('email') is-invalid @enderror" placeholder="Enter your username">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div><!-- form-group -->
                    <div class="form-group">
                        <input name="password" id="password" type="password" class="form-control fc-outline-dark  @error('password') is-invalid @enderror" placeholder="Enter your password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <a href="{{ route('password.request') }}" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
                    </div><!-- form-group -->
                    <button type="submit" class="btn btn-info btn-block">Sign In</button>
                </form>
                @if (Route::has('password.request'))
                <div class="mg-t-60 tx-center">Not yet a member? <a href="{{ route('register') }}" class="tx-info">Sign Up</a></div>
                @endif
            </div><!-- login-wrapper -->
        </div><!-- overlay-body -->
    </div><!-- d-flex -->

    <script src="{{ asset('backend') }}/lib/jquery/jquery.min.js"></script>
    <script src="{{ asset('backend') }}/lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="{{ asset('backend') }}/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        $(function () {
            'use strict';

            // Check if video can play, and play it
            var video = document.getElementById('headVideo');
            video.addEventListener('canplay', function () {
                video.play();
            });

        });

    </script>

</body>

</html>
