@csrf
<div class="block mb-4">
  <x-input-label for="title" :value="__('title')"/>
  <x-text-input
    id="title"
    class="block mt-1 w-full"
    type="text"
    name="title"
    value="{{ $project->title }}"
    autofocus
  />
  @error('title')
  <x-error message="{{ $message }}"></x-error>
  @enderror
</div>
<div class="block mb-4">
  <x-input-label for="description" :value="__('description')"/>
  <x-textarea
    id="description"
    name="description"
    class="block mt-1 w-full"
  >{{ $project->description }}</x-textarea>
  @error('description')
  <x-error message="{{ $message }}"></x-error>
  @enderror
</div>
