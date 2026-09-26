@extends('layouts.app')

@section('title', 'Dashboard')

@section('body')
    <div class="min-h-full">
        <header class="border-b border-slate-200 bg-white">
            <div class="mx-auto flex max-w-5xl items-center justify-between gap-4 px-6 py-4">
                <a href="{{ route('dashboard') }}" class="text-sm font-semibold tracking-tight text-slate-900">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <div class="flex items-center gap-4">
                    <span class="hidden text-sm text-slate-600 sm:inline">{{ $user->email }}</span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            type="submit"
                            class="rounded-lg border border-slate-300 px-3 py-1.5 text-sm font-medium text-slate-700 transition hover:bg-slate-100"
                        >
                            Log out
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <main class="mx-auto max-w-5xl px-6 py-10">
            <h1 class="text-2xl font-semibold tracking-tight text-slate-900">
                Welcome, {{ $user->name }}
            </h1>
            <p class="mt-2 text-sm text-slate-600">This is your dashboard. Anything you add here lives behind authentication.</p>

            <dl class="mt-8 grid gap-4 sm:grid-cols-3">
                <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                    <dt class="text-sm font-medium text-slate-600">Name</dt>
                    <dd class="mt-1 text-lg font-semibold text-slate-900">{{ $user->name }}</dd>
                </div>

                <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                    <dt class="text-sm font-medium text-slate-600">Email</dt>
                    <dd class="mt-1 text-lg font-semibold break-all text-slate-900">{{ $user->email }}</dd>
                </div>

                <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                    <dt class="text-sm font-medium text-slate-600">Member since</dt>
                    <dd class="mt-1 text-lg font-semibold text-slate-900">{{ $user->created_at->toFormattedDateString() }}</dd>
                </div>
            </dl>
        </main>
    </div>
@endsection
