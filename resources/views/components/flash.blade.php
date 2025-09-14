@props(['on'])

<div x-data="{ shown: false, timeout: null }"
     x-init="() => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);}"
     x-show.transition.out.opacity.duration.1500ms="shown"
     x-transition:leave.opacity.duration.1500ms
     class="fixed px-4 py-2 rounded-lg bg-gray-800 text-white text-sm border bottom-6 right-6"
     style="display: none;"
  {{ $attributes->merge(['class' => 'text-sm text-gray-600']) }}>
  {{ $slot->isEmpty() ? 'Saved.' : $slot }}
</div>
