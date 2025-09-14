<div class="flex justify-between items-center">
  <form
    method="post"
    action="{{ route('projects.tasks.update', [$project, $task]) }}"
    class="flex-1 flex items-center py-2"
  >
    @csrf
    @method('PATCH')
    <input
      class="mr-2 rounded"
      name="complated"
      type="checkbox"
      onchange="this.form.submit()"
      value="{{ $task->complated ? 0 : 1 }}"
      @checked($task->complated)>
    <input
      type="text"
      name="body"
      value="{{ $task->body }}"
      onblur="this.form.submit()"
      class="flex-1 border-transparent focus:shadow-none focus:outline-0 focus:ring-0"
      @class(['line-through text-gray-500' => $task->complated, '' => true])
    />
  </form>
  {{-- Delete task modal --}}
  @include('partials.delete-task-modal', [$project, $task])
</div>
