@props(['message'])
<div {{ $attributes->merge(['class'=>'font-medium text-sm text-red-600']) }}>
    {{ $message }}
</div>
