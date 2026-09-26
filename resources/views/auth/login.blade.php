@extends('layouts.app')

@section('title', 'Log in')

@section('body')
    <main class="flex min-h-full flex-col justify-center px-6 py-12">
        <div class="mx-auto w-full max-w-md">
            <div class="text-center">
                <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Log in to your account</h1>
                <p class="mt-2 text-sm text-slate-600">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="font-semibold text-slate-900 underline underline-offset-4 hover:text-slate-600">Register</a>
                </p>
            </div>

            <div class="mt-8 rounded-xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-900">Email</label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-slate-900 focus:ring-1 focus:ring-slate-900 focus:outline-none"
                        >
                        @error('email')
                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-900">Password</label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            autocomplete="current-password"
                            class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-slate-900 focus:ring-1 focus:ring-slate-900 focus:outline-none"
                        >
                        @error('password')
                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-2">
                        <input
                            id="remember"
                            name="remember"
                            type="checkbox"
                            value="1"
                            class="size-4 rounded border-slate-300 text-slate-900 focus:ring-slate-900"
                        >
                        <label for="remember" class="text-sm text-slate-600">Remember me</label>
                    </div>

                    <button
                        type="submit"
                        class="w-full rounded-lg bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-slate-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-900"
                    >
                        Log in
                    </button>
                </form>
            </div>
        </div>
    </main>
@endsection
