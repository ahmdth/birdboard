<div>
  <p>Task Created Successfully</p>
  <time class="text-sm text-gray-500">{{ \Carbon\Carbon::make($activity->created_at)->diffForHumans() }}</time>
</div>
