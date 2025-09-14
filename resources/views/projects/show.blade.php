<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center">
      <h2 class="font-semibold text-gray-600 leading-tight uppercase">
        My Projects
      </h2>
      <x-button-link
        href="{{ route('projects.edit', $project) }}"
        class="text-white bg-gray-800 hover:bg-gray-700 active:bg-gray-900 border-transparent">
        Edit Project
      </x-button-link>
    </div>
  </x-slot>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-2 gap-6">
      <div class=sm:rounded-lg">
        <div class="flex justify-between items-center mb-4">
          <div class="font-semibold text-gray-600 leading-tight">
            <a href="{{ route('projects.index') }}">
              My Projects
            </a>
            <span>/ {{ $project->title }}</span>
          </div>
          {{-- Create Task Modal --}}
          @include('partials.create-task-modal', $project)
        </div>
        <div class="bg-white text-gray-700 shadow-sm px-4 py-2">
          <div>
            @forelse($project->tasks as $task)
              @include('partials.task', [$project, $task])
            @empty
              <li class="py-2">No Tasks Added yet.</li>
            @endforelse
          </div>
          @include('partials.project-notes', $project)
        </div>
      </div>
      <div>
        <div class="bg-white h-fit overflow-hidden shadow-sm py-2">
          <a href="{{ route('projects.show', $project) }}"
             class="pl-4 py-2 block text-lg font-semibold capitalize border-l-4 border-blue-400 overflow-hidden">{{ $project->title }}</a>
          <p class="px-5 py-3 text-gray-600">{{ $project->description }}</p>
        </div>
        <ul class="bg-white h-fit overflow-hidden shadow-sm px-4 py-2 mt-4">
          @foreach($project->activity as $activity)
              @include("projects.events.$activity->description")
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</x-app-layout>
