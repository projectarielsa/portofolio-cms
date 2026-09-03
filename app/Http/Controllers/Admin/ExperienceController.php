<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        return view('admin.experiences.index', ['experiences' => Experience::query()->latest()->paginate(12)]);
    }

    public function create()
    {
        return view('admin.experiences.create', ['experience' => new Experience()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'position' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date'],
            'description' => ['nullable', 'string'],
        ]);
        Experience::create($data);
        return redirect()->route('admin.experiences.index')->with('success', 'Experience berhasil dibuat.');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $data = $request->validate([
            'position' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date'],
            'description' => ['nullable', 'string'],
        ]);
        $experience->update($data);
        return redirect()->route('admin.experiences.index')->with('success', 'Experience berhasil diperbarui.');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('admin.experiences.index')->with('success', 'Experience berhasil dihapus.');
    }
}
