@extends('admin.layout')
@section('title', 'Experiences')
@section('heading', 'Experiences')

@section('content')
<div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
    <p class="text-sm text-slate-500">Kelola riwayat pengalaman kerja Anda.</p>
    <a href="{{ route('admin.experiences.create') }}"
       class="inline-flex items-center gap-2 rounded-xl btn-primary-admin px-4 py-2.5 text-sm font-bold shadow-md shadow-indigo-200">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
        Tambah Experience
    </a>
</div>
<div class="rounded-2xl border border-slate-200 bg-white overflow-hidden shadow-sm">
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead>
                <tr class="border-b border-slate-100 bg-slate-50">
                    <th class="px-6 py-3 text-left text-[10px] font-bold uppercase tracking-widest text-slate-400">Posisi</th>
                    <th class="px-4 py-3 text-left text-[10px] font-bold uppercase tracking-widest text-slate-400">Perusahaan</th>
                    <th class="px-4 py-3 text-left text-[10px] font-bold uppercase tracking-widest text-slate-400">Periode</th>
                    <th class="px-4 py-3 text-left text-[10px] font-bold uppercase tracking-widest text-slate-400">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse ($experiences as $experience)
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4 font-semibold text-slate-800">{{ $experience->position }}</td>
                        <td class="px-4 py-4 text-sm font-medium text-indigo-600">{{ $experience->company }}</td>
                        <td class="px-4 py-4 text-xs text-slate-500">
                            {{ optional($experience->start_date)->format('M Y') ?? '—' }}
                            <span class="mx-1 text-slate-300">→</span>
                            {{ optional($experience->end_date)->format('M Y') ?? 'Sekarang' }}
                        </td>
                        <td class="px-4 py-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.experiences.edit', $experience) }}"
                                   class="rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-semibold text-slate-600 hover:border-indigo-300 hover:text-indigo-600 hover:bg-indigo-50 transition-all">Edit</a>
                                <form action="{{ route('admin.experiences.destroy', $experience) }}" method="POST" onsubmit="return confirm('Hapus experience ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-semibold text-rose-500 hover:border-rose-200 hover:bg-rose-50 transition-all">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-6 py-14 text-center text-slate-400">Belum ada experience.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@if ($experiences->hasPages())<div class="mt-6">{{ $experiences->links() }}</div>@endif
@endsection
