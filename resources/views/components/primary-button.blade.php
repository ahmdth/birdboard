@props(['type' => 'submit', 'default'=>' text-white bg-gray-800 hover:bg-gray-700 active:bg-gray-900 focus:border-gray-900 focus:ring ring-gray-300'])
<button {{ $attributes->merge(['type' => $type, 'class' => 'inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none disabled:opacity-25 transition ease-in-out duration-150'. $default]) }}>
  {{ $slot }}
</button>
