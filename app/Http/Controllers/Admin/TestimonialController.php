<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Traits\CompressesImage;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    use CompressesImage;

    public function index()
    {
        return view('admin.testimonials.index', ['testimonials' => Testimonial::query()->latest()->paginate(12)]);
    }

    public function create()
    {
        return view('admin.testimonials.create', ['testimonial' => new Testimonial()]);
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->compressAndSaveImage($request->file('photo'), 'uploads/testimonials', maxDimension: 800, quality: 80);
        }
        Testimonial::create($data);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial berhasil dibuat.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $this->validatedData($request);
        if ($request->hasFile('photo')) {
            if ($testimonial->photo && file_exists(public_path($testimonial->photo))) {
                @unlink(public_path($testimonial->photo));
            }
            $data['photo'] = $this->compressAndSaveImage($request->file('photo'), 'uploads/testimonials', maxDimension: 800, quality: 80);
        }
        $testimonial->update($data);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial berhasil diperbarui.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->photo && file_exists(public_path($testimonial->photo))) {
            @unlink(public_path($testimonial->photo));
        }
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial berhasil dihapus.');
    }

    protected function validatedData(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['nullable', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string'],
            'photo' => ['nullable', 'image'],
        ]);
    }
}
