@extends('admin.layout')
@section('title', 'Edit Testimonial')
@section('heading', 'Edit Testimonial')
@section('content')
<div class="mb-6">
    <a href="{{ route('admin.testimonials.index') }}" class="inline-flex items-center gap-1.5 text-sm text-slate-500 hover:text-indigo-600 transition-colors">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg>
        Kembali ke Testimonials
    </a>
</div>
<form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data"
      class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
    @csrf @method('PUT')
    @include('admin.testimonials._form')
</form>
@endsection
