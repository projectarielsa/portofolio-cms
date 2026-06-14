{{-- Validation errors --}}
@if ($errors->any())
    <div class="mb-6 rounded-xl border border-rose-200 bg-rose-50 px-5 py-4">
        <p class="text-sm font-bold text-rose-700 mb-2">Terdapat kesalahan input:</p>
        <ul class="list-disc list-inside space-y-1">
            @foreach ($errors->all() as $error)
                <li class="text-sm text-rose-600">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid gap-5 md:grid-cols-2">

    {{-- Title --}}
    <div class="md:col-span-2">
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Judul <span class="text-rose-500">*</span></label>
        <input type="text" name="title" value="{{ old('title', $project->title) }}"
               class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
               placeholder="Nama project" required>
    </div>

    {{-- Category --}}
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Kategori</label>
        <input type="text" name="category" value="{{ old('category', $project->category) }}"
               class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
               placeholder="Web App, Landing Page, dll">
    </div>

    {{-- Status --}}
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Status <span class="text-rose-500">*</span></label>
        <select name="status"
                class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100">
            <option value="draft" @selected(old('status', $project->status) === 'draft')>Draft</option>
            <option value="published" @selected(old('status', $project->status) === 'published')>Published</option>
        </select>
    </div>

    {{-- Cover Image --}}
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Cover Image</label>
        <input type="file" name="cover_image" accept="image/*"
               class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-600 file:mr-3 file:rounded-lg file:border-0 file:bg-indigo-50 file:px-3 file:py-1.5 file:text-xs file:font-semibold file:text-indigo-600 hover:file:bg-indigo-100">
        @if ($project->cover_image)
            <div class="mt-3">
                <img src="{{ asset($project->cover_image) }}" alt="cover"
                     class="h-24 w-auto rounded-xl border border-slate-200 object-cover shadow-sm">
                <p class="mt-1 text-xs text-slate-400">Cover saat ini. Upload baru untuk mengganti.</p>
            </div>
        @endif
    </div>

    {{-- Gallery --}}
    <div class="md:col-span-2">
        <label class="block text-sm font-semibold text-slate-700 mb-1">
            Gallery Foto
            <span class="ml-1.5 text-xs font-normal text-slate-400">(bisa pilih beberapa sekaligus)</span>
        </label>

        {{-- Existing gallery photos --}}
        @if ($project->gallery_list)
            <div class="mb-3">
                <p class="text-xs text-slate-500 mb-2">Foto saat ini — centang untuk hapus:</p>
                <div class="flex flex-wrap gap-3">
                    @foreach ($project->gallery_list as $i => $photo)
                        <div class="relative group">
                            <img src="{{ asset($photo) }}" alt="gallery {{ $i + 1 }}"
                                 class="h-24 w-32 rounded-xl border border-slate-200 object-cover shadow-sm">
                            {{-- Hidden input to keep this photo --}}
                            <input type="hidden" name="gallery_keep[]" value="{{ $photo }}" id="keep_{{ $i }}">
                            {{-- Checkbox to delete --}}
                            <label class="absolute top-1 right-1 cursor-pointer">
                                <input type="checkbox" id="del_{{ $i }}" class="gallery-delete-cb sr-only"
                                       onchange="toggleDelete(this, {{ $i }})">
                                <span class="flex h-6 w-6 items-center justify-center rounded-full bg-white/90 border border-slate-300 shadow text-slate-400 group-hover:border-rose-400 transition-colors" id="del_icon_{{ $i }}">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Upload new photos --}}
        <input type="file" name="gallery[]" accept="image/*" multiple
               id="galleryInput"
               class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-600 file:mr-3 file:rounded-lg file:border-0 file:bg-violet-50 file:px-3 file:py-1.5 file:text-xs file:font-semibold file:text-violet-600 hover:file:bg-violet-100">
        <p class="mt-1.5 text-xs text-slate-400">Format: JPG, PNG, WebP. Maks 4MB per foto.</p>

        {{-- Preview foto baru sebelum upload --}}
        <div id="galleryPreview" class="mt-3 flex flex-wrap gap-3 hidden"></div>
    </div>

    {{-- Tech Stack --}}
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tech Stack</label>
        <input type="text" name="tech_stack" value="{{ old('tech_stack', $project->tech_stack) }}"
               class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
               placeholder="Laravel, Tailwind, MySQL (pisah dengan koma)">
    </div>

    {{-- Description --}}
    <div class="md:col-span-2">
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Deskripsi Singkat</label>
        <textarea name="description" rows="3"
                  class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 resize-none"
                  placeholder="Deskripsi singkat yang ditampilkan di listing projects...">{{ old('description', $project->description) }}</textarea>
    </div>

    {{-- Content --}}
    <div class="md:col-span-2">
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Konten Detail</label>
        <textarea name="content" rows="8"
                  class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                  placeholder="Penjelasan detail project, fitur, keputusan teknis...">{{ old('content', $project->content) }}</textarea>
    </div>

    {{-- Demo URL --}}
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Demo URL</label>
        <input type="url" name="demo_url" value="{{ old('demo_url', $project->demo_url) }}"
               class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
               placeholder="https://...">
    </div>

    {{-- Repo URL --}}
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Repository URL</label>
        <input type="url" name="repo_url" value="{{ old('repo_url', $project->repo_url) }}"
               class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
               placeholder="https://github.com/...">
    </div>

    {{-- Publish Date --}}
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tanggal Publikasi</label>
        <input type="datetime-local" name="published_at"
               value="{{ old('published_at', optional($project->published_at)->format('Y-m-d\TH:i')) }}"
               class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100">
    </div>

    {{-- Featured --}}
    <div class="flex items-center gap-3 pt-7">
        <input type="hidden" name="is_featured" value="0">
        <input type="checkbox" id="is_featured" name="is_featured" value="1"
               @checked(old('is_featured', $project->is_featured))
               class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
        <label for="is_featured" class="text-sm font-semibold text-slate-700 cursor-pointer">
            Tampilkan sebagai <span class="text-indigo-600">Featured Project</span>
        </label>
    </div>
</div>

{{-- Actions --}}
<div class="mt-8 flex items-center gap-3 border-t border-slate-100 pt-6">
    <button type="submit"
        class="inline-flex items-center gap-2 rounded-xl btn-primary-admin px-5 py-2.5 text-sm font-bold shadow-md shadow-indigo-200">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
        </svg>
        Simpan Project
    </button>
    <a href="{{ route('admin.projects.index') }}"
       class="rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-50 transition-all">
        Batal
    </a>
</div>

<script>
// Preview foto baru sebelum upload
document.getElementById('galleryInput')?.addEventListener('change', function () {
    const preview = document.getElementById('galleryPreview');
    preview.innerHTML = '';
    if (this.files.length === 0) { preview.classList.add('hidden'); return; }
    preview.classList.remove('hidden');
    Array.from(this.files).forEach(file => {
        const reader = new FileReader();
        reader.onload = e => {
            const wrap = document.createElement('div');
            wrap.className = 'relative';
            wrap.innerHTML = `<img src="${e.target.result}" class="h-24 w-32 rounded-xl border border-violet-200 object-cover shadow-sm">
                <span class="absolute top-1 left-1 rounded-full bg-violet-500 px-2 py-0.5 text-[10px] font-bold text-white">Baru</span>`;
            preview.appendChild(wrap);
        };
        reader.readAsDataURL(file);
    });
});

// Toggle hapus foto existing
function toggleDelete(cb, i) {
    const keepInput = document.getElementById('keep_' + i);
    const icon = document.getElementById('del_icon_' + i);
    if (cb.checked) {
        keepInput.disabled = true;
        icon.style.background = '#fee2e2';
        icon.style.borderColor = '#f87171';
        icon.style.color = '#ef4444';
    } else {
        keepInput.disabled = false;
        icon.style.background = '';
        icon.style.borderColor = '';
        icon.style.color = '';
    }
}
</script>
