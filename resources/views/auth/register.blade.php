@extends('layouts.app')

@section('content')
    <div class="p-6 bg-indigo-900 min-h-screen flex justify-center items-center">
        <div class="w-full max-w-md">
            <div class="flex justify-center text-white mb-6 text-5xl font-bold">
                <img class="w-48" alt="AnonAddy Logo" src="/svg/logo.svg">
            </div>
            <div class="flex flex-col break-words bg-white border border-2 rounded-lg shadow-lg overflow-hidden">
                <form class="" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="px-6 py-8 md:p-10">

                        <h1 class="text-center font-bold text-3xl">
                            {{ __('Register') }}
                        </h1>

                        <div class="mx-auto mt-6 w-24 border-b-2 border-grey-200"></div>

                        <div class="mt-8 flex flex-wrap mb-6">
                            <label for="username" class="block text-grey-700 text-sm mb-2">
                                {{ __('Username') }}:
                            </label>

                            <div class="table w-full">
                                <input id="username" type="text" class="table-cell relative appearance-none bg-grey-100 rounded-l w-full p-3 text-grey-700 focus:shadow-outline{{ $errors->has('username') ? ' border-red-500' : '' }}" name="username" value="{{ old('username') }}" placeholder="johndoe" required autofocus>
                                <div class="py-3 px-2 table-cell align-middle bg-grey-200 rounded-r text-grey-600">
                                    .{{ config('anonaddy.domain') }}
                                </div>
                            </div>


                            @if ($errors->has('username'))
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $errors->first('username') }}
                                </p>
                            @endif
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label for="email" class="block text-grey-700 text-sm mb-2">
                                {{ __('Email') }}:
                            </label>

                            <input id="email" type="email" class="appearance-none bg-grey-100 rounded w-full p-3 text-grey-700 focus:shadow-outline{{ $errors->has('email') ? ' border-red-500' : '' }}" name="email" value="{{ old('email') }}" placeholder="johndoe@example.com" required>

                            @if ($errors->has('email'))
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label for="email-confirm" class="block text-grey-700 text-sm mb-2">
                                {{ __('Confirm Email') }}:
                            </label>

                            <input id="email-confirm" type="email" class="appearance-none bg-grey-100 rounded w-full p-3 text-grey-700 focus:shadow-outline" name="email_confirmation" placeholder="johndoe@example.com" required>
                        </div>

                        <div class="flex flex-wrap mb-4">
                            <label for="password" class="block text-grey-700 text-sm mb-2">
                                {{ __('Password') }}:
                            </label>

                            <input id="password" type="password" class="appearance-none bg-grey-100 rounded w-full p-3 text-grey-700 focus:shadow-outline{{ $errors->has('password') ? ' border-red-500' : '' }}" name="password" placeholder="********" required>

                            @if ($errors->has('password'))
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif
                        </div>

                        <div class="flex flex-wrap">
                            <input type="checkbox" class="mr-2" id="terms">

                            <label class="text-sm text-grey-700" for="terms">
                                I accept the <a href="https://anonaddy.com/terms" class="text-indigo-800" target="_blank" rel="nofollow noreferrer noopener">terms</a> and <a href="https://anonaddy.com/privacy" class="text-indigo-800" target="_blank" rel="nofollow noreferrer noopener">privacy policy</a>
                            </label>

                            @if ($errors->has('terms'))
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $errors->first('terms') }}
                                </p>
                            @endif
                        </div>

                    </div>

                    <div class="px-6 md:px-10 py-4 bg-grey-50 border-t border-grey-100 flex flex-wrap items-center">
                        <button type="submit" class="bg-cyan-400 w-full hover:bg-cyan-300 text-cyan-900 font-bold py-3 px-4 rounded focus:outline-none">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
            @if (Route::has('register'))
                <p class="w-full text-xs text-center text-indigo-100 mt-6">
                    Already have an account?
                    <a class="text-white hover:text-indigo-50 no-underline" href="{{ route('login') }}">
                        Login
                    </a>
                </p>
            @endif
        </div>
    </div>
@endsection