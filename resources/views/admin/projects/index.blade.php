@extends('admin.layout')
@section('title', 'Projects')
@section('heading', 'Projects')

@section('content')

{{-- Header bar --}}
<div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
    <p class="text-sm text-slate-500">Kelola semua project yang ditampilkan di portfolio.</p>
    <a href="{{ route('admin.projects.create') }}"
       class="inline-flex items-center gap-2 rounded-xl btn-primary-admin px-4 py-2.5 text-sm font-bold shadow-md shadow-indigo-200">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
        </svg>
        Tambah Project
    </a>
</div>

{{-- Table --}}
<div class="rounded-2xl border border-slate-200 bg-white overflow-hidden shadow-sm">
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead>
                <tr class="border-b border-slate-100 bg-slate-50">
                    <th class="px-6 py-3 text-left text-[10px] font-bold uppercase tracking-widest text-slate-400">Judul</th>
                    <th class="px-4 py-3 text-left text-[10px] font-bold uppercase tracking-widest text-slate-400">Kategori</th>
                    <th class="px-4 py-3 text-left text-[10px] font-bold uppercase tracking-widest text-slate-400">Status</th>
                    <th class="px-4 py-3 text-left text-[10px] font-bold uppercase tracking-widest text-slate-400">Featured</th>
                    <th class="px-4 py-3 text-left text-[10px] font-bold uppercase tracking-widest text-slate-400">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse ($projects as $project)
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4 font-semibold text-slate-800">{{ $project->title }}</td>
                        <td class="px-4 py-4 text-slate-500">{{ $project->category ?: '—' }}</td>
                        <td class="px-4 py-4">
                            @if ($project->status === 'published')
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 border border-emerald-200 px-2.5 py-1 text-[11px] font-bold text-emerald-700">
                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>Published
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 border border-amber-200 px-2.5 py-1 text-[11px] font-bold text-amber-700">
                                    <span class="h-1.5 w-1.5 rounded-full bg-amber-400"></span>Draft
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-4">
                            @if ($project->is_featured)
                                <span class="inline-flex items-center rounded-full bg-indigo-50 border border-indigo-200 px-2.5 py-1 text-[11px] font-bold text-indigo-600">Ya</span>
                            @else
                                <span class="text-slate-400 text-xs">—</span>
                            @endif
                        </td>
                        <td class="px-4 py-4">
                            <div class="flex items-center gap-3">
                                <a href="{{ route('admin.projects.edit', $project) }}"
                                   class="rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-semibold text-slate-600 hover:border-indigo-300 hover:text-indigo-600 hover:bg-indigo-50 transition-all">
                                    Edit
                                </a>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                                      onsubmit="return confirm('Hapus project ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-semibold text-rose-500 hover:border-rose-200 hover:bg-rose-50 transition-all">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-14 text-center text-slate-400">
                            <div class="mx-auto mb-3 flex h-10 w-10 items-center justify-center rounded-xl bg-slate-100">
                                <svg class="h-5 w-5 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776"/>
                                </svg>
                            </div>
                            Belum ada project.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Pagination --}}
@if ($projects->hasPages())
    <div class="mt-6">{{ $projects->links() }}</div>
@endif

@endsection
