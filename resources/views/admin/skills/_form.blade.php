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
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nama Skill <span class="text-rose-500">*</span></label>
        <input type="text" name="name" value="{{ old('name', $skill->name) }}"
               class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
               placeholder="Laravel, MySQL, Linux..." required>
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Kategori</label>
        <input type="text" name="category" value="{{ old('category', $skill->category) }}"
               class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
               placeholder="Backend, Networking, Tools...">
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Level <span class="ml-1 text-xs font-normal text-slate-400">(1–100, opsional)</span></label>
        <input type="number" min="1" max="100" name="level" value="{{ old('level', $skill->level) }}"
               class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
               placeholder="85">
    </div>
</div>

<div class="mt-8 flex items-center gap-3 border-t border-slate-100 pt-6">
    <button type="submit" class="inline-flex items-center gap-2 rounded-xl btn-primary-admin px-5 py-2.5 text-sm font-bold shadow-md shadow-indigo-200">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
        Simpan
    </button>
    <a href="{{ route('admin.skills.index') }}" class="rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-50 transition-all">Batal</a>
</div>
