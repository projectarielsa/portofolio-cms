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
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nama <span class="text-rose-500">*</span></label>
        <input type="text" name="name" value="{{ old('name', $testimonial->name) }}"
               class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
               placeholder="Nama pemberi testimoni" required>
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Foto <span class="ml-1 text-xs font-normal text-slate-400">(opsional)</span></label>
        <input type="file" name="photo" accept="image/*"
               class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-600 file:mr-3 file:rounded-lg file:border-0 file:bg-indigo-50 file:px-3 file:py-1.5 file:text-xs file:font-semibold file:text-indigo-600 hover:file:bg-indigo-100">
        @if ($testimonial->photo)
            <div class="mt-2 flex items-center gap-2">
                <img src="{{ asset($testimonial->photo) }}" alt="photo" class="h-10 w-10 rounded-full border border-slate-200 object-cover">
                <p class="text-xs text-slate-400">Upload baru untuk mengganti.</p>
            </div>
        @endif
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Role / Jabatan</label>
        <input type="text" name="role" value="{{ old('role', $testimonial->role) }}"
               class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
               placeholder="Manager, Developer, HRD...">
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Perusahaan</label>
        <input type="text" name="company" value="{{ old('company', $testimonial->company) }}"
               class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
               placeholder="Nama perusahaan...">
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Pesan Testimoni <span class="text-rose-500">*</span></label>
        <textarea name="message" rows="5"
                  class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                  placeholder="Isi testimoni..." required>{{ old('message', $testimonial->message) }}</textarea>
    </div>
</div>
<div class="mt-8 flex items-center gap-3 border-t border-slate-100 pt-6">
    <button type="submit" class="inline-flex items-center gap-2 rounded-xl btn-primary-admin px-5 py-2.5 text-sm font-bold shadow-md shadow-indigo-200">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
        Simpan
    </button>
    <a href="{{ route('admin.testimonials.index') }}" class="rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-50 transition-all">Batal</a>
</div>
