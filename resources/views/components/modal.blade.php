<!--
    This markup is available as one of the free preview components from TailwindUI.

    https://tailwindui.com/components/application-ui/overlays/modals
-->
<div x-data="{ on: false }">
  {{ $trigger }}

  <div class="fixed inset-x-0 px-4 sm:inset-0 sm:flex sm:items-center sm:justify-center" x-show="on" style="display: none;">
    <div
      class="fixed inset-0 transition-opacity"
      x-show="on"
      x-transition:enter="ease-out duration-300"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="ease-in duration-200"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
    >
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full"
         role="dialog"
         aria-modal="true"
         aria-labelledby="modal-headline"
         x-show="on"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    >
      <div class="bg-white p-4 sm:p-6 sm:pb-4">
        <div class="text-center sm:text-left">
          <div class="w-full">
            {{ $header }}
          </div>
          <div class="w-full">
            {{ $slot }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

