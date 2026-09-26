@extends('layouts.app')

@section('title', 'Register')

@section('body')
    <main class="flex min-h-full flex-col justify-center px-6 py-12">
        <div class="mx-auto w-full max-w-md">
            <div class="text-center">
                <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Create your account</h1>
                <p class="mt-2 text-sm text-slate-600">
                    Already registered?
                    <a href="{{ route('login') }}" class="font-semibold text-slate-900 underline underline-offset-4 hover:text-slate-600">Log in</a>
                </p>
            </div>

            <div class="mt-8 rounded-xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-900">Name</label>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="name"
                            class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-slate-900 focus:ring-1 focus:ring-slate-900 focus:outline-none"
                        >
                        @error('name')
                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-900">Email</label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            required
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
                            autocomplete="new-password"
                            class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-slate-900 focus:ring-1 focus:ring-slate-900 focus:outline-none"
                        >
                        @error('password')
                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-slate-900">Confirm password</label>
                        <input
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            required
                            autocomplete="new-password"
                            class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-slate-900 focus:ring-1 focus:ring-slate-900 focus:outline-none"
                        >
                        @error('password_confirmation')
                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button
                        type="submit"
                        class="w-full rounded-lg bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-slate-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-900"
                    >
                        Register
                    </button>
                </form>
            </div>
        </div>
    </main>
@endsection
