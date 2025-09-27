@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-green-100 flex items-center justify-center p-4">
    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold mb-4 text-green-700 text-center">Forgot Password</h2>

        @if (session('status'))
            <div class="bg-green-100 text-green-800 p-2 rounded mb-4 text-sm text-center">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <label for="email" class="block mb-2 text-sm font-semibold text-green-700">Email Address</label>
            <input id="email" type="email" name="email" class="w-full px-4 py-2 border border-green-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-400" required autofocus>

            @error('email')
                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
            @enderror

            <button type="submit" class="mt-4 w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg font-semibold transition duration-200">
                Send Password Reset Link
            </button>
        </form>
    </div>
</div>
@endsection
