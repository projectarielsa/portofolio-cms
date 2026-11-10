<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Traits\CompressesImage;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    use CompressesImage;

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
            'photo' => ['nullable', 'image'],
            'email' => ['nullable', 'email', 'max:255'],
            'whatsapp' => ['nullable', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'work_preference' => ['nullable', 'string', 'max:255'],
            'linkedin' => ['nullable', 'string', 'max:255'],
            'instagram' => ['nullable', 'string', 'max:255'],
            'github' => ['nullable', 'string', 'max:255'],
            'cta_text' => ['nullable', 'string'],
            'open_to_work' => ['sometimes', 'boolean'],
        ]);

        $data['open_to_work'] = $request->boolean('open_to_work');

        if ($request->hasFile('photo')) {
            if ($about->photo && file_exists(public_path($about->photo))) {
                @unlink(public_path($about->photo));
            }

            $data['photo'] = $this->compressAndSaveImage(
                $request->file('photo'),
                'uploads/about',
                maxDimension: 1200,
                quality: 80
            );
        }

        $about->update($data);

        return redirect()->route('admin.about.edit')->with('success', 'Profil berhasil diperbarui.');
    }
}
