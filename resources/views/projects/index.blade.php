<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center">
      <h2 class="font-semibold text-gray-600 leading-tight uppercase">
        My Projects
      </h2>
      <x-button-link
        href="{{ route('projects.create') }}"
        class="text-white bg-gray-800 hover:bg-gray-700 active:bg-gray-900 border-transparent">
        Add Project
      </x-button-link>
    </div>
  </x-slot>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
      @forelse($projects as $project)
        <div class="bg-white overflow-hidden shadow-sm">
          <a href="{{ route('projects.show', $project) }}"
             class="bg-sky-50 pl-4 py-2 block text-lg font-semibold capitalize border-l-4 border-blue-400 overflow-hidden">{{ $project->title }}</a>
          <p class="mx-5 py-3 text-gray-600">{{ \Illuminate\Support\Str::limit($project->description) }}</p>
        </div>
      @empty
        <p>You haven't create project.</p>
      @endforelse
    </div>
  </div>
</x-app-layout>
