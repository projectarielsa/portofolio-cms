@if ($errors->any())
    <div class="mb-6 rounded-xl border border-rose-200 bg-rose-50 px-5 py-4">
        <p class="text-sm font-bold text-rose-700 mb-1">Terdapat kesalahan:</p>
        <ul class="list-disc list-inside space-y-1">
            @foreach ($errors->all() as $error)<li class="text-sm text-rose-600">{{ $error }}</li>@endforeach
        </ul>
    </div>
@endif
<div class="grid gap-5 md:grid-cols-2">
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Posisi / Jabatan <span class="text-rose-500">*</span></label>
        <input type="text" name="position" value="{{ old('position', $experience->position) }}"
               class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
               placeholder="IT Support, Web Developer..." required>
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Perusahaan <span class="text-rose-500">*</span></label>
        <input type="text" name="company" value="{{ old('company', $experience->company) }}"
               class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
               placeholder="Nama perusahaan..." required>
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tanggal Mulai</label>
        <input type="date" name="start_date" value="{{ old('start_date', $experience->start_date) }}"
               class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100">
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tanggal Selesai <span class="ml-1 text-xs font-normal text-slate-400">(kosongkan jika masih aktif)</span></label>
        <input type="date" name="end_date" value="{{ old('end_date', $experience->end_date) }}"
               class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100">
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Deskripsi Pekerjaan</label>
        <textarea name="description" rows="5"
                  class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                  placeholder="Deskripsikan tanggung jawab dan pencapaian Anda...">{{ old('description', $experience->description) }}</textarea>
    </div>
</div>
<div class="mt-8 flex items-center gap-3 border-t border-slate-100 pt-6">
    <button type="submit" class="inline-flex items-center gap-2 rounded-xl btn-primary-admin px-5 py-2.5 text-sm font-bold shadow-md shadow-indigo-200">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
        Simpan
    </button>
    <a href="{{ route('admin.experiences.index') }}" class="rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-50 transition-all">Batal</a>
</div>
