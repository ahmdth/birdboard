<form action="{{ route('projects.update', $project) }}" method="post">
  @csrf
  @method('PATCH')
  <x-textarea name="notes" class="w-full mb-2">{{ $project->notes }}</x-textarea>
  @error('notes')
  <x-error message="{{ $message }}" />
  @enderror
  <x-primary-button class="mb-2">Add Note</x-primary-button>
</form>
