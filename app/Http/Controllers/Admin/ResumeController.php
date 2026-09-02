<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ResumeController extends Controller
{
    public function index()
    {
        $resumes = Resume::orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.resumes.index', compact('resumes'));
    }

    public function create()
    {
        return view('admin.resumes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'file' => ['required', 'file', 'mimes:pdf', 'max:10240'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $file = $request->file('file');

        $filename = time().'_'.Str::slug(
            pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)
        ).'.'.$file->getClientOriginalExtension();

        $file->move(public_path('uploads/resumes'), $filename);

        $data['file_path'] = 'uploads/resumes/'.$filename;
        $data['is_active'] = $request->boolean('is_active');

        unset($data['file']);

        Resume::create($data);

        return redirect()
            ->route('admin.resumes.index')
            ->with('success', 'CV berhasil ditambahkan.');
    }

    public function edit(Resume $resume)
    {
        return view('admin.resumes.edit', compact('resume'));
    }

    public function update(Request $request, Resume $resume)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'file' => ['nullable', 'file', 'mimes:pdf', 'max:10240'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $filename = time().'_'.Str::slug(
                pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)
            ).'.'.$file->getClientOriginalExtension();

            $file->move(public_path('uploads/resumes'), $filename);

            $data['file_path'] = 'uploads/resumes/'.$filename;
        }

        $data['is_active'] = $request->boolean('is_active');

        unset($data['file']);

        $resume->update($data);

        return redirect()
            ->route('admin.resumes.index')
            ->with('success', 'CV berhasil diperbarui.');
    }

    public function destroy(Resume $resume)
    {
        if ($resume->file_path) {
            $filePath = public_path($resume->file_path);

            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $resume->delete();

        return redirect()
            ->route('admin.resumes.index')
            ->with('success', 'CV berhasil dihapus.');
    }
}