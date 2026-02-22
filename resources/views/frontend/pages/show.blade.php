@extends('layouts.app')

@section('title', $page->title . ' - SD Negeri 1 Tengguli')

@section('content')
<!-- Hero -->
<div class="bg-gradient-to-r from-red-600 to-red-700 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-bold">{{ $page->title }}</h1>
    </div>
</div>

<!-- Content -->
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="prose prose-lg max-w-none">
        {!! nl2br(e($page->content)) !!}
    </div>
</div>
@endsection
