<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    public function edit()
    {
        return view('admin.about.edit', [
            'about' => About::query()->firstOrCreate(['id' => 1]),
        ]);
    }

    public function update(Request $request)
    {
        $about = About::query()->firstOrCreate(['id' => 1]);
        $data = $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'headline' => ['nullable', 'string', 'max:255'],
            'short_bio' => ['nullable', 'string'],
            'full_bio' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'email' => ['nullable', 'email', 'max:255'],
            'whatsapp' => ['nullable', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'linkedin' => ['nullable', 'string', 'max:255'],
            'instagram' => ['nullable', 'string', 'max:255'],
            'github' => ['nullable', 'string', 'max:255'],
            'cta_text' => ['nullable', 'string'],
            'open_to_work' => ['sometimes', 'boolean'],
        ]);

        $data['open_to_work'] = $request->boolean('open_to_work');

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time().'_'.Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/about'), $filename);
            $data['photo'] = 'uploads/about/'.$filename;
        }

        $about->update($data);

        return redirect()->route('admin.about.edit')->with('success', 'Profil berhasil diperbarui.');
    }
}
