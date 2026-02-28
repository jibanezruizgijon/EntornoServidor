 <div {{ $attributes->merge(['class' => 'p-4 mb-4 text-sm' . $class]) }} role="alert">
     <span class="font-medium">{{ $title ?? 'Información:' }}</span> {{ $slot }}
 </div>
