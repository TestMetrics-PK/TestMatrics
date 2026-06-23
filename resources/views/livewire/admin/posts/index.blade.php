<div>
  <div class="flex items-center justify-between mb-4">
    <h2 class="text-xl font-bold">Posts</h2>
    <a href="/admin/posts/create" class="px-3 py-2 bg-green-600 text-white rounded">Create Post</a>
  </div>
  <div class="mb-4"><input wire:model.debounce.300ms="search" type="text" placeholder="Search posts..." class="w-full border rounded px-3 py-2" /></div>
  <div class="bg-white rounded shadow overflow-hidden"><table class="min-w-full"><thead class="bg-gray-50"><tr><th class="p-3">ID</th><th class="p-3">Title</th><th class="p-3">Published</th><th class="p-3">Actions</th></tr></thead><tbody>@foreach($posts as $p)<tr class="border-t"><td class="p-3">{{ $p->id }}</td><td class="p-3">{{ $p->title }}</td><td class="p-3">{{ $p->published ? 'Yes' : 'No' }}</td><td class="p-3"><a href="/admin/posts/{{ $p->id }}/edit" class="text-blue-600">Edit</a></td></tr>@endforeach</tbody></table></div>
  <div class="mt-4">{{ $posts->links() }}</div>
</div>
