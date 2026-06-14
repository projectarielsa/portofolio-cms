<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\ContactSetting;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Testimonial;

class PublicController extends Controller
{
    public function home()
    {
        return view('public.home', [
            'about' => About::query()->first(),
            'featuredProjects' => Project::query()->where('status', 'published')->where('is_featured', true)->latest()->take(6)->get(),
            'services' => Service::query()->orderBy('sort_order')->get(),
            'skills' => Skill::query()->orderBy('category')->get(),
            'testimonials' => Testimonial::query()->latest()->take(6)->get(),
            'contact' => ContactSetting::query()->first(),
        ]);
    }

    public function about()
    {
        return view('public.about', [
            'about' => About::query()->first(),
            'experiences' => Experience::query()->latest('start_date')->get(),
            'skills' => Skill::query()->orderBy('category')->get(),
        ]);
    }

    public function projects()
    {
        return view('public.projects', [
            'about'    => About::query()->first(),
            'projects' => Project::query()->where('status', 'published')->latest('published_at')->paginate(9),
        ]);
    }

    public function projectShow(Project $project)
    {
        abort_unless($project->status === 'published', 404);

        return view('public.project-show', [
            'about'           => About::query()->first(),
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
            'about'    => About::query()->first(),
            'services' => Service::query()->orderBy('sort_order')->orderBy('title')->get(),
        ]);
    }

    public function experiences()
    {
        return view('public.experiences', [
            'about'       => About::query()->first(),
            'experiences' => Experience::query()->latest('start_date')->get(),
        ]);
    }

    public function skills()
    {
        return view('public.skills', [
            'about'  => About::query()->first(),
            'skills' => Skill::query()->orderBy('category')->orderBy('name')->get()->groupBy(fn ($skill) => $skill->category ?: 'General'),
        ]);
    }

    public function testimonials()
    {
        return view('public.testimonials', [
            'about'        => About::query()->first(),
            'testimonials' => Testimonial::query()->latest()->paginate(9),
        ]);
    }

    public function contact()
    {
        return view('public.contact', [
            'about' => About::query()->first(),
            'contact' => ContactSetting::query()->first(),
        ]);
    }
}
