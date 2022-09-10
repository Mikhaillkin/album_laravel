{{--<x-guest-layout>--}}
{{--    <x-auth-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <a href="/">--}}
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
{{--            </a>--}}
{{--        </x-slot>--}}

{{--        <!-- Validation Errors -->--}}
{{--        <x-auth-validation-errors class="mb-4" :errors="$errors" />--}}

{{--        <form method="POST" action="{{ route('register') }}">--}}
{{--            @csrf--}}

{{--            <!-- Name -->--}}
{{--            <div>--}}
{{--                <x-label for="name" :value="__('Name')" />--}}

{{--                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus/>--}}
{{--            </div>--}}
{{--            <br>--}}
{{--            <!-- Phone Number -->--}}
{{--            <div>--}}
{{--                <x-label for="phone_number" :value="__('Phone')" />--}}

{{--                <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" required autofocus placeholder="+7ХХХХХХХХХХ" />--}}
{{--            </div>--}}

{{--            <!-- Email Address -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="email" :value="__('Email')" />--}}

{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />--}}
{{--            </div>--}}

{{--            <!-- Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password" :value="__('Password')" />--}}

{{--                <x-input id="password" class="block mt-1 w-full"--}}
{{--                                type="password"--}}
{{--                                name="password"--}}
{{--                                required autocomplete="new-password" />--}}
{{--            </div>--}}

{{--            <!-- Confirm Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password_confirmation" :value="__('Confirm Password')" />--}}

{{--                <x-input id="password_confirmation" class="block mt-1 w-full"--}}
{{--                                type="password"--}}
{{--                                name="password_confirmation" required />--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">--}}
{{--                    {{ __('Already registered?') }}--}}
{{--                </a>--}}


{{--                <div>--}}
{{--                    <x-button class="ml-4">--}}
{{--                        {{ __('Register') }}--}}
{{--                    </x-button>--}}
{{--                    Or--}}
{{--                    <a class="ml-3" href="{{ route('login') }}">--}}
{{--                        {{ __('Sign in') }}--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-auth-card>--}}
{{--</x-guest-layout>--}}
        <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/login/signin.css" rel="stylesheet">
</head>

<body class="text-center">
<form action="{{ route('register') }}" method="POST" class="form-signin">
    @csrf
    <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
    <label for="name" class="sr-only">Name</label>
    <input type="text" id="name" name="name" class="form-control" placeholder="Name" required autofocus>
    <label for="phone_number" class="sr-only">Phone number</label>
    <input type="text" id="phone_number" name="phone_number" class="form-control"  placeholder="+7ХХХХХХХХХХ" required autofocus>
    <label for="email" class="sr-only">Email address</label>
    <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
    <label for="password" class="sr-only">Password</label>
    <input type="password" id="password" style="margin-bottom: 0;" name="password" class="form-control" placeholder="Password" required>
    <label for="password_confirmation" class="sr-only">Confirm Password</label>
    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>

    <x-button class="btn btn-lg btn-primary btn-block" type="submit">
        {{ __('Register') }}
    </x-button>
    <strong>Or</strong>
    <a href="{{ route('login') }}" class="btn btn-lg btn-primary btn-block" >Login</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2022</p>
</form>
</body>
</html>
