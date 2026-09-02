@extends('admin.layout')

@section('title', 'Account Settings')

@section('content')

<div class="mx-auto max-w-4xl">

    {{-- HEADER --}}
    <div class="mb-8">

        <p class="text-sm font-medium text-indigo-600">
            Account
        </p>

        <h1 class="mt-1 text-2xl font-bold text-slate-800">
            Account Settings
        </h1>

        <p class="mt-2 text-sm text-slate-500">
            Kelola email dan keamanan akun administrator.
        </p>

    </div>


    {{-- SUCCESS MESSAGE --}}
    @if (session('success'))

        <div class="mb-6 flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4">

            <svg
                class="h-5 w-5 shrink-0 text-emerald-600"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M9 12l2 2 4-4"
                />

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                />
            </svg>

            <p class="text-sm font-medium text-emerald-700">
                {{ session('success') }}
            </p>

        </div>

    @endif


    <div class="space-y-6">


        {{-- =====================================================
             EMAIL
        ====================================================== --}}

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

            <div class="mb-6">

                <div class="flex items-center gap-3">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25H4.5a2.25 2.25 0 0 1-2.25-2.25V6.75"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m3 7.5 7.94 4.63a2.25 2.25 0 0 0 2.12 0L21 7.5"
                            />
                        </svg>

                    </div>


                    <div>

                        <h2 class="font-semibold text-slate-800">
                            Email Address
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Email digunakan untuk login ke dashboard admin.
                        </p>

                    </div>

                </div>

            </div>


            {{-- EMAIL FORM --}}
            <form
                method="POST"
                action="{{ route('admin.account.email') }}"
            >

                @csrf

                @method('PUT')


                <div>

                    <label
                        for="email"
                        class="mb-2 block text-sm font-medium text-slate-700"
                    >
                        Email
                    </label>


                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', $user->email) }}"
                        required
                        autocomplete="email"
                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100"
                    >


                    @error('email')

                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                <div class="mt-5 flex justify-end">

                    <button
                        type="submit"
                        class="inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700"
                    >

                        <svg
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M5 13l4 4L19 7"
                            />
                        </svg>

                        Simpan Email

                    </button>

                </div>

            </form>

        </div>



        {{-- =====================================================
             PASSWORD
        ====================================================== --}}

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

            <div class="mb-6">

                <div class="flex items-center gap-3">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-violet-50 text-violet-600">

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M16.5 10.5V6.75a4.5 4.5 0 0 0-9 0v3.75"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6.75 10.5h10.5A2.25 2.25 0 0 1 19.5 12.75v6A2.25 2.25 0 0 1 17.25 21h-10.5A2.25 2.25 0 0 1 4.5 18.75v-6a2.25 2.25 0 0 1 2.25-2.25Z"
                            />
                        </svg>

                    </div>


                    <div>

                        <h2 class="font-semibold text-slate-800">
                            Change Password
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Gunakan password yang kuat untuk menjaga keamanan akun.
                        </p>

                    </div>

                </div>

            </div>


            {{-- PASSWORD FORM --}}
            <form
                method="POST"
                action="{{ route('admin.account.password') }}"
            >

                @csrf

                @method('PUT')


                {{-- CURRENT PASSWORD --}}
                <div>

                    <label
                        for="current_password"
                        class="mb-2 block text-sm font-medium text-slate-700"
                    >
                        Password Saat Ini
                    </label>


                    <input
                        type="password"
                        id="current_password"
                        name="current_password"
                        required
                        autocomplete="current-password"
                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-violet-500 focus:ring-4 focus:ring-violet-100"
                    >


                    @error('current_password')

                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>

                    @enderror

                </div>



                {{-- NEW PASSWORD --}}
                <div class="mt-5">

                    <label
                        for="password"
                        class="mb-2 block text-sm font-medium text-slate-700"
                    >
                        Password Baru
                    </label>


                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        autocomplete="new-password"
                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-violet-500 focus:ring-4 focus:ring-violet-100"
                    >


                    @error('password')

                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>

                    @enderror

                </div>



                {{-- CONFIRM PASSWORD --}}
                <div class="mt-5">

                    <label
                        for="password_confirmation"
                        class="mb-2 block text-sm font-medium text-slate-700"
                    >
                        Konfirmasi Password Baru
                    </label>


                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-violet-500 focus:ring-4 focus:ring-violet-100"
                    >

                </div>


                <div class="mt-5 rounded-xl border border-amber-100 bg-amber-50 px-4 py-3">

                    <p class="text-xs leading-6 text-amber-700">

                        Password minimal 8 karakter.
                        Setelah password berhasil diubah, gunakan password baru saat login berikutnya.

                    </p>

                </div>


                <div class="mt-5 flex justify-end">

                    <button
                        type="submit"
                        class="inline-flex items-center gap-2 rounded-xl bg-violet-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-violet-700"
                    >

                        <svg
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M5 13l4 4L19 7"
                            />
                        </svg>

                        Update Password

                    </button>

                </div>

            </form>

        </div>


        {{-- ACCOUNT INFO --}}
        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">

            <p class="text-xs font-bold uppercase tracking-widest text-slate-400">
                Account Information
            </p>


            <div class="mt-4 grid gap-4 sm:grid-cols-2">

                <div>

                    <p class="text-xs text-slate-400">
                        Nama
                    </p>

                    <p class="mt-1 text-sm font-semibold text-slate-700">
                        {{ $user->name }}
                    </p>

                </div>


                <div>

                    <p class="text-xs text-slate-400">
                        Email
                    </p>

                    <p class="mt-1 text-sm font-semibold text-slate-700">
                        {{ $user->email }}
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection