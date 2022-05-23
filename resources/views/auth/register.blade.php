{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
@csrf

<!-- Name -->
<div>
    <x-label for="name" :value="__('Name')" />

    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
</div>

<!-- Email Address -->
<div class="mt-4">
    <x-label for="email" :value="__('Email')" />

    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
</div>

<!-- Password -->
<div class="mt-4">
    <x-label for="password" :value="__('Password')" />

    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
        autocomplete="new-password" />
</div>

<!-- Confirm Password -->
<div class="mt-4">
    <x-label for="password_confirmation" :value="__('Confirm Password')" />

    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
        required />
</div>

<div class="flex items-center justify-end mt-4">
    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
        {{ __('Already registered?') }}
    </a>

    <x-button class="ml-4">
        {{ __('Register') }}
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

    <title>Register</title>

    <!-- vendor css -->
    <link href="{{ asset('backend') }}/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/select2/css/select2.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('backend') }}/css/bracket.css">
</head>

<body>

    <div class="row no-gutters flex-row-reverse ht-100v">
        <div class="col-md-6 bg-gray-200 d-flex align-items-center justify-content-center">
            <div class="login-wrapper wd-250 wd-xl-350 mg-y-30">
                <h4 class="tx-inverse tx-center">Sign Up</h4>
                <p class="tx-center mg-b-60">Create your own account.</p>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input value="{{ old('name') }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter your Name">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div><!-- form-group -->
                    <div class="form-group">
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your Email">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div><!-- form-group -->
                    <div class="form-group">
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your Password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div><!-- form-group -->

                    <div class="form-group">
                        <input name ="password_confirmation" type="password" class="form-control" placeholder="Enter your Confirm Password">
                    </div><!-- form-group -->
                    {{-- Birthday --}}
                    {{-- <div class="form-group">
                        <label class="d-block tx-11 tx-uppercase tx-medium tx-spacing-1">Birthday</label>
                        <div class="row row-xs">
                            <div class="col-sm-4">
                                <select class="form-control select2" data-placeholder="Month">
                                    <option label="Month">Month</option>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                </select>
                            </div><!-- col-4 -->
                            <div class="col-sm-4 mg-t-20 mg-sm-t-0">
                                <select class="form-control select2" data-placeholder="Day">
                                    <option label="Day">Day</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div><!-- col-4 -->
                            <div class="col-sm-4 mg-t-20 mg-sm-t-0">
                                <select class="form-control select2" data-placeholder="Year">
                                    <option label="Year">Year</option>
                                    <option value="1">2010</option>
                                    <option value="2">2011</option>
                                    <option value="3">2012</option>
                                    <option value="4">2013</option>
                                    <option value="5">2014</option>
                                </select>
                            </div>
                        </div>
                    </div> --}}
                    <!-- form-group -->
                    {{-- Birthday End--}}

                    <div class="form-group tx-12">By clicking the Sign Up button below you agreed to our privacy policy
                        and
                        terms of use of our website.</div>
                    <button type="submit" class="btn btn-info btn-block">Sign Up</button>

                </form>
                <div class="mg-t-60 tx-center">Already a member? <a href="{{ route('login') }}" class="tx-info">Sign
                        In</a></div>
            </div><!-- login-wrapper -->
        </div><!-- col -->
        <div class="col-md-6 bg-br-primary d-flex align-items-center justify-content-center">
            <div class="wd-250 wd-xl-450 mg-y-30">
                <div class="signin-logo tx-28 tx-bold tx-white"><span class="tx-normal">[</span> Khayrul <span
                        class="tx-info">Shanto</span> <span class="tx-normal">]</span></div>
                <div class="tx-white-7 mg-b-60">Register For User</div>

                <h5 class="tx-white">Why bracket plus?</h5>
                <p class="tx-white-6">When it comes to websites or apps, one of the first impression you consider is the
                    design. It needs to be high quality enough otherwise you will lose potential users due to bad
                    design.</p>
                <p class="tx-white-6 mg-b-60">When your website or app is attractive to use, your users will not simply
                    be using it, they’ll look forward to using it. This means that you should fashion the look and feel
                    of your interface for your users.</p>
                <a target="_blank" href="https://www.khayrulshanto.xyz"
                    class="btn btn-outline-light bd bd-white bd-2 tx-white pd-x-25 tx-uppercase tx-12 tx-spacing-2 tx-medium">Visit Portfolio</a>
            </div><!-- wd-500 -->
        </div>
    </div><!-- row -->

    <script src="{{ asset('backend') }}/lib/jquery/jquery.min.js"></script>
    <script src="{{ asset('backend') }}/lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="{{ asset('backend') }}/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('backend') }}/lib/select2/js/select2.min.js"></script>
    <script>
        $(function () {
            'use strict';

            $('.select2').select2({
                minimumResultsForSearch: Infinity
            });
        });

    </script>

</body>

</html>
