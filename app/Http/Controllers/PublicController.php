<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Education;
use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Testimonial;
use App\Models\Resume;

class PublicController extends Controller
{
    public function home()
    {
        return view('public.home', [
            'featuredProjects' => Project::query()->where('status', 'published')->where('is_featured', true)->latest()->take(6)->get(),
            'services' => Service::query()->orderBy('sort_order')->get(),
            'skills' => Skill::query()->orderBy('category')->get(),
            'testimonials' => Testimonial::query()->latest()->take(6)->get(),
        ]);
    }

    public function about()
    {
        return view('public.about', [
            'experiences' => Experience::query()
                ->latest('start_date')
                ->get(),

            'skills' => Skill::query()
                ->orderBy('category')
                ->get(),

            'educations' => Education::query()
                ->orderBy('sort_order')
                ->orderByDesc('end_year')
                ->get(),

            'resumes' => Resume::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get(),
            
        ]);
    }

    public function projects()
    {
        return view('public.projects', [
            'projects' => Project::query()->where('status', 'published')->latest('published_at')->paginate(9),
        ]);
    }

    public function projectShow(Project $project)
    {
        abort_unless($project->status === 'published', 404);

        return view('public.project-show', [
            'project'         => $project,
            'relatedProjects' => Project::query()
                ->where('id', '!=', $project->id)
                ->where('status', 'published')
                ->latest('published_at')
                ->take(3)
                ->get(),
        ]);
    }

    public function services()
    {
        return view('public.services', [
            'services' => Service::query()->orderBy('sort_order')->orderBy('title')->get(),
        ]);
    }

    public function experiences()
    {
        return view('public.experiences', [
            'experiences' => Experience::query()->latest('start_date')->get(),
        ]);
    }

    public function skills()
    {
        return view('public.skills', [
            'skills' => Skill::query()->orderBy('category')->orderBy('name')->get()->groupBy(fn ($skill) => $skill->category ?: 'General'),
        ]);
    }

    public function testimonials()
    {
        return view('public.testimonials', [
            'testimonials' => Testimonial::query()->latest()->paginate(9),
        ]);
    }

    public function contact()
    {
        return view('public.contact');
    }
}
