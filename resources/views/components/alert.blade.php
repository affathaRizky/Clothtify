@props(['type' => 'success'])

@php
$styles = [
'success' => 'bg-green-50 border-green-200 text-green-700',
'error' => 'bg-red-50 border-red-200 text-red-700',
'warning' => 'bg-yellow-50 border-yellow-200 text-yellow-700',
'info' => 'bg-blue-50 border-blue-200 text-blue-700',
];

$icons = [
'success' => 'fa-circle-check',
'error' => 'fa-circle-xmark',
'warning' => 'fa-triangle-exclamation',
'info' => 'fa-circle-info',
];

$style = $styles[$type] ?? $styles['success'];
$icon = $icons[$type] ?? $icons['success'];
@endphp

<div class="flex items-center gap-3 p-4 rounded-xl border {{ $style }} text-sm font-medium mb-4" role="alert">
    <i class="fa-solid {{ $icon }} text-lg flex-shrink-0"></i>
    <p class="flex-1">{{ $slot }}</p>
</div>