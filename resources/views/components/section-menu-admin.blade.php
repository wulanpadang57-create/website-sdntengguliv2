@props(['label', 'items'])

@php
    $currentRoute = Route::current()->getName();
@endphp

<div class="mt-6">
    <h3 class="px-6 text-xs uppercase font-semibold text-gray-400 mb-3">{{ $label }}</h3>
    @foreach($items as $item)
        @php
            $isActive = $currentRoute && strpos($currentRoute, $item[1]) === 0;
        @endphp
        <a href="{{ route($item[1]) }}" class="block px-6 py-2 text-sm hover:bg-gray-800 transition {{ $isActive ? 'bg-red-600' : '' }}">
            <i class="{{ $item[2] }} mr-3"></i> {{ $item[0] }}
        </a>
    @endforeach
</div>
