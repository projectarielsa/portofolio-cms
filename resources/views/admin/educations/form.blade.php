<div>

    <label class="block text-sm font-semibold text-slate-700 mb-2">
        Nama Institusi
    </label>

    <input type="text"
           name="institution"
           value="{{ old('institution', $education->institution) }}"
           class="w-full rounded-lg border-slate-300"
           placeholder="Contoh: Universitas Pelita Bangsa"
           required>

</div>


<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    <div>

        <label class="block text-sm font-semibold text-slate-700 mb-2">
            Jenjang
        </label>

        <input type="text"
               name="degree"
               value="{{ old('degree', $education->degree) }}"
               class="w-full rounded-lg border-slate-300"
               placeholder="Contoh: S1">

    </div>


    <div>

        <label class="block text-sm font-semibold text-slate-700 mb-2">
            Jurusan
        </label>

        <input type="text"
               name="field_of_study"
               value="{{ old('field_of_study', $education->field_of_study) }}"
               class="w-full rounded-lg border-slate-300"
               placeholder="Contoh: Teknik Informatika">

    </div>

</div>


<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    <div>

        <label class="block text-sm font-semibold text-slate-700 mb-2">
            Tahun Mulai
        </label>

        <input type="number"
               name="start_year"
               value="{{ old('start_year', $education->start_year) }}"
               class="w-full rounded-lg border-slate-300"
               placeholder="2021">

    </div>


    <div>

        <label class="block text-sm font-semibold text-slate-700 mb-2">
            Tahun Selesai
        </label>

        <input type="number"
               name="end_year"
               value="{{ old('end_year', $education->end_year) }}"
               class="w-full rounded-lg border-slate-300"
               placeholder="2025">

    </div>

</div>


<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    <div>

        <label class="block text-sm font-semibold text-slate-700 mb-2">
            IPK
        </label>

        <input type="number"
               step="0.01"
               name="gpa"
               value="{{ old('gpa', $education->gpa) }}"
               class="w-full rounded-lg border-slate-300"
               placeholder="3.52">

        <p class="text-xs text-slate-400 mt-1">
            Kosongkan jika tidak menggunakan IPK.
        </p>

    </div>


    <div>

        <label class="block text-sm font-semibold text-slate-700 mb-2">
            Urutan
        </label>

        <input type="number"
               name="sort_order"
               value="{{ old('sort_order', $education->sort_order ?? 0) }}"
               class="w-full rounded-lg border-slate-300">

        <p class="text-xs text-slate-400 mt-1">
            Angka kecil tampil lebih atas.
        </p>

    </div>

</div>