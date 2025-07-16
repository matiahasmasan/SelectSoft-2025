@props([
    'title' => '',
    'maxWidth' => 'md',
])

<div
    {{ $attributes->merge([
        'class' => "fixed inset-0 z-50 flex items-center justify-center bg-black/40"
    ]) }}
    style="display: none;"
>
    <div class="bg-base-100 rounded-lg shadow-lg w-full max-w-{{ $maxWidth }} p-6 relative">
        @if($title)
            <h2 class="text-lg font-semibold mb-4">{{ $title }}</h2>
        @endif
        <div class="mb-4">
            {{ $body ?? $slot }}
        </div>
        <div class="flex justify-end gap-2">
            {{ $footer ?? '' }}
        </div>
    </div>
</div> 