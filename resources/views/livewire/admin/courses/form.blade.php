<div class="max-w-3xl">
  <div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">{{ $courseId ? 'Edit' : 'Create' }} Course</h2>
    @if(session()->has('message'))<div class="bg-green-100 text-green-800 p-2 rounded mb-4">{{ session('message') }}</div>@endif
    <div class="mb-3"><label class="block text-sm">Title</label><input type="text" wire:model.defer="title" class="w-full border rounded px-3 py-2" /></div>
    <div class="mb-3"><label class="block text-sm">Slug</label><input type="text" wire:model.defer="slug" class="w-full border rounded px-3 py-2" /></div>
    <div class="mb-3"><label class="block text-sm">Description</label><textarea wire:model.defer="description" class="w-full border rounded px-3 py-2" rows="4"></textarea></div>
    <div class="mb-3"><label class="inline-flex items-center"><input type="checkbox" wire:model.defer="published" class="mr-2"> Published</label></div>
    <div class="mt-4"><button wire:click="save" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button> <a href="/admin/courses" class="ml-3 text-gray-600">Cancel</a></div>
  </div>
</div>
