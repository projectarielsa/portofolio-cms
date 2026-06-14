@extends('admin.layout')
@section('title', 'Testimonials')
@section('heading', 'Testimonials')

@section('content')
<div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
    <p class="text-sm text-slate-500">Kelola testimoni dari klien atau rekan kerja.</p>
    <a href="{{ route('admin.testimonials.create') }}"
       class="inline-flex items-center gap-2 rounded-xl btn-primary-admin px-4 py-2.5 text-sm font-bold shadow-md shadow-indigo-200">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
        Tambah Testimonial
    </a>
</div>
<div class="rounded-2xl border border-slate-200 bg-white overflow-hidden shadow-sm">
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead>
                <tr class="border-b border-slate-100 bg-slate-50">
                    <th class="px-6 py-3 text-left text-[10px] font-bold uppercase tracking-widest text-slate-400">Nama</th>
                    <th class="px-4 py-3 text-left text-[10px] font-bold uppercase tracking-widest text-slate-400">Role & Perusahaan</th>
                    <th class="px-4 py-3 text-left text-[10px] font-bold uppercase tracking-widest text-slate-400">Pesan</th>
                    <th class="px-4 py-3 text-left text-[10px] font-bold uppercase tracking-widest text-slate-400">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse ($testimonials as $testimonial)
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                @if ($testimonial->photo)
                                    <img src="{{ asset($testimonial->photo) }}" alt="{{ $testimonial->name }}"
                                         class="h-9 w-9 rounded-full object-cover border border-slate-200 shrink-0">
                                @else
                                    <div class="h-9 w-9 rounded-full bg-indigo-50 border border-indigo-100 flex items-center justify-center shrink-0">
                                        <span class="text-sm font-bold text-indigo-500">{{ strtoupper(substr($testimonial->name, 0, 1)) }}</span>
                                    </div>
                                @endif
                                <span class="font-semibold text-slate-800">{{ $testimonial->name }}</span>
                            </div>
                        </td>
                        <td class="px-4 py-4">
                            <p class="text-sm text-slate-700">{{ $testimonial->role ?: '—' }}</p>
                            @if ($testimonial->company)<p class="text-xs text-slate-400 mt-0.5">{{ $testimonial->company }}</p>@endif
                        </td>
                        <td class="px-4 py-4 max-w-xs">
                            <p class="text-xs leading-5 text-slate-500 line-clamp-2">{{ $testimonial->message }}</p>
                        </td>
                        <td class="px-4 py-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.testimonials.edit', $testimonial) }}"
                                   class="rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-semibold text-slate-600 hover:border-indigo-300 hover:text-indigo-600 hover:bg-indigo-50 transition-all">Edit</a>
                                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Hapus testimonial ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-semibold text-rose-500 hover:border-rose-200 hover:bg-rose-50 transition-all">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-6 py-14 text-center text-slate-400">Belum ada testimonial.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@if ($testimonials->hasPages())<div class="mt-6">{{ $testimonials->links() }}</div>@endif
@endsection
