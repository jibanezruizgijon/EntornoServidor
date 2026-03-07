@props([
    'sidebar' => false,
])

@if($sidebar)
    <flux:sidebar.brand name="Galería de Arte" style="font-size: 1.5rem; font-weight: bold; white-space: nowrap;" {{ $attributes }} />
@else
    <flux:brand name="Galería de Arte" style="font-size: 1.5rem; font-weight: bold; white-space: nowrap;" {{ $attributes }} />
@endif