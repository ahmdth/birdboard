@props(['href'=>'#'])
<a {{ $attributes->merge(['href'=>$href, 'type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 border focus:outline-none focus:border-gray-900 rounded-md font-semibold text-xs uppercase tracking-widest focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
  {{ $slot }}
</a>
