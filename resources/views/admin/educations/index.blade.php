@extends('admin.layout')

@section('content')

<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">
            Education
        </h1>

        <p class="text-sm text-slate-500 mt-1">
            Kelola riwayat pendidikan.
        </p>
    </div>

    <a href="{{ route('admin.educations.create') }}"
       class="px-4 py-2 rounded-lg bg-indigo-600 text-white text-sm font-semibold hover:bg-indigo-700">
        + Tambah Education
    </a>
</div>

@if(session('success'))
    <div class="mb-5 rounded-lg bg-green-50 border border-green-200 px-4 py-3 text-green-700">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white border border-slate-200 rounded-xl overflow-hidden">

    <table class="w-full text-sm">

        <thead class="bg-slate-50 border-b">
            <tr>
                <th class="px-5 py-3 text-left">Institusi</th>
                <th class="px-5 py-3 text-left">Jurusan</th>
                <th class="px-5 py-3 text-left">Tahun</th>
                <th class="px-5 py-3 text-left">IPK</th>
                <th class="px-5 py-3 text-right">Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse($educations as $education)

                <tr class="border-b last:border-0">

                    <td class="px-5 py-4">
                        <div class="font-semibold text-slate-800">
                            {{ $education->institution }}
                        </div>

                        @if($education->degree)
                            <div class="text-xs text-slate-500 mt-1">
                                {{ $education->degree }}
                            </div>
                        @endif
                    </td>

                    <td class="px-5 py-4 text-slate-600">
                        {{ $education->field_of_study ?? '-' }}
                    </td>

                    <td class="px-5 py-4 text-slate-600">
                        {{ $education->start_year ?? '-' }}
                        -
                        {{ $education->end_year ?? 'Sekarang' }}
                    </td>

                    <td class="px-5 py-4 text-slate-600">
                        {{ $education->gpa ?? '-' }}
                    </td>

                    <td class="px-5 py-4 text-right">

                        <a href="{{ route('admin.educations.edit', $education) }}"
                           class="text-indigo-600 font-semibold hover:underline">
                            Edit
                        </a>

                        <form action="{{ route('admin.educations.destroy', $education) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Hapus pendidikan ini?')">

                            @csrf
                            @method('DELETE')

                            <button class="ml-3 text-red-600 font-semibold hover:underline">
                                Hapus
                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="5"
                        class="px-5 py-10 text-center text-slate-400">

                        Belum ada data pendidikan.

                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

<div class="mt-6">
    {{ $educations->links() }}
</div>

@endsection