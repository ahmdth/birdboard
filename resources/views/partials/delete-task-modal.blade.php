<x-modal>
  <x-slot:trigger>
    <button @click="on = true" class="px-4 py-2">
      <x-trash-icon/>
    </button>
  </x-slot:trigger>
  <x-slot:header>
    <h3 class="flex items-center font-medium text-gray-900 mb-4">
      <span class="inline-flex bg-gray-100 p-2 rounded-full">
        <x-trash-icon/>
      </span>
      <span class="font-semibold ml-2">Delete Task</span>
    </h3>
  </x-slot:header>
  <form action="{{ route('projects.tasks.destroy', [$project, $task]) }}" method="post">
    @csrf
    @method('DELETE')
    <p>Are you sure you want to delete?</p>
    <div class="mt-4 sm:flex sm:flex-row-reverse">
      <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
        <x-primary-button>Delete</x-primary-button>
      </span>
      <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
        <x-primary-button
          type="button"
          @click="on = false"
          default="text-gray-800 bg-transparent border-gray-500 hover:bg-gray-100 active:bg-gray-100 focus:border-gray-900 focus:ring ring-gray-300"
        >
          Cancel
          </x-primary-button>
      </span>
    </div>
  </form>
</x-modal>
