<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        return view('admin.educations.index', [
            'educations' => Education::query()
                ->orderBy('sort_order')
                ->orderByDesc('end_year')
                ->paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.educations.create', [
            'education' => new Education(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'institution' => ['required', 'string', 'max:255'],
            'degree' => ['nullable', 'string', 'max:255'],
            'field_of_study' => ['nullable', 'string', 'max:255'],
            'start_year' => ['nullable', 'integer'],
            'end_year' => ['nullable', 'integer'],
            'gpa' => ['nullable', 'numeric'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        Education::create($data);

        return redirect()
            ->route('admin.educations.index')
            ->with('success', 'Pendidikan berhasil ditambahkan.');
    }

    public function edit(Education $education)
    {
        return view('admin.educations.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $data = $request->validate([
            'institution' => ['required', 'string', 'max:255'],
            'degree' => ['nullable', 'string', 'max:255'],
            'field_of_study' => ['nullable', 'string', 'max:255'],
            'start_year' => ['nullable', 'integer'],
            'end_year' => ['nullable', 'integer'],
            'gpa' => ['nullable', 'numeric'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $education->update($data);

        return redirect()
            ->route('admin.educations.index')
            ->with('success', 'Pendidikan berhasil diperbarui.');
    }

    public function destroy(Education $education)
    {
        $education->delete();

        return redirect()
            ->route('admin.educations.index')
            ->with('success', 'Pendidikan berhasil dihapus.');
    }
}