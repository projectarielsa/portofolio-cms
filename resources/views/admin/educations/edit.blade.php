@extends('admin.layout')

@section('content')

<div class="max-w-3xl">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-800">
            Edit Education
        </h1>
    </div>

    <form action="{{ route('admin.educations.update', $education) }}"
          method="POST"
          class="bg-white border border-slate-200 rounded-xl p-6 space-y-5">

        @csrf
        @method('PUT')

        @include('admin.educations.form')

        <div class="flex gap-3 pt-3">

            <a href="{{ route('admin.educations.index') }}"
               class="px-4 py-2 rounded-lg border border-slate-300 text-slate-600">

                Batal

            </a>

            <button type="submit"
                    class="px-5 py-2 rounded-lg bg-indigo-600 text-white font-semibold hover:bg-indigo-700">

                Update

            </button>

        </div>

    </form>

</div>

@endsection