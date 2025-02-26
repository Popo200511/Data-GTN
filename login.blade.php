@extends('layouts.Tailwind')
@section('title', 'Login')
@section('content')

<div class="flex items-center justify-center min-h-screen bg-gray-900 relative">
    <!-- Background Image -->
    <div class="absolute inset-0 bg-cover bg-center opacity-70" 
        style="background-image: url('https://img.pikbest.com/wp/202347/pastel-green-background-3d-rendering-of-a-winner-s-podium-on-matching_9767186.jpg!bw700');">
    </div>

    <!-- Login Card -->
    <div class="relative z-10 w-full max-w-md bg-white bg-opacity-10 backdrop-blur-lg border border-white border-opacity-20 
        p-8 rounded-2xl shadow-xl animate-fade-up">

        <h2 class="text-center text-3xl font-bold text-white">Login</h2>
        <p class="text-center text-gray-300 mt-2">Sign in to continue</p>

        <form method="POST" action="{{ route('login') }}" class="mt-6">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-300 mb-1">Email</label>
                <input id="email" type="email" name="email" required autocomplete="email"
                    class="w-full px-4 py-3 rounded-lg bg-white bg-opacity-20 text-stone-950 
                    placeholder-gray-200 focus:ring-2 focus:ring-blue-400 outline-none">
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm text-gray-300 mb-1">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="w-full px-4 py-3 rounded-lg bg-white bg-opacity-20 text-stone-950 
                    placeholder-gray-200 focus:ring-2 focus:ring-blue-400 outline-none">
            </div>

            <!-- Remember me & Forgot Password -->
            <div class="flex items-center justify-between text-gray-300 text-sm">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="mr-2">
                    Remember me
                </label>
                @if (Route::has('password.request'))
                    <a href="{{-- {{ route('password.request') }} --}}" class="hover:underline">Forgot password?</a>
                @endif
            </div>


            <!-- Submit Button -->
            <button type="submit" 
                class="w-full mt-6 py-3 rounded-lg bg-blue-500 text-white font-semibold 
                shadow-lg hover:bg-blue-600 transition-all duration-300">
                Login
            </button>

            <!-- Register Link -->
            <!--
            <p class="text-center text-gray-300 mt-4">
                Don't have an account? 
                <a href=" {{-- {{ route('register') }} --}}" class="text-blue-400 hover:underline">Sign up</a>
            </p> -->
            
        </form>
    </div>
</div>

@endsection
