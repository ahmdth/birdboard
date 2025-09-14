<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center">
      <h2 class="font-semibold text-gray-600 leading-tight uppercase">
        Create Project
      </h2>
    </div>
  </x-slot>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6 bg-white border-b border-gray-200">
        <form action="{{ route('projects.store') }}" method="post">
          @include('partials.project-form', ['project' => new App\Models\Project()])
          <x-primary-button>create</x-primary-button>
          <x-button-link
            href="{{ route('projects.index') }}"
            class="bg-transparent text-gray-700 border-gray-500">
            Cancel
          </x-button-link>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
