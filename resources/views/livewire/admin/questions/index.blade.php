<div>
  <div class="flex items-center justify-between mb-4">
    <h2 class="text-xl font-bold">Question Bank</h2>
    <div class="flex items-center gap-2">
      <a href="/admin/questions/create" class="px-3 py-2 bg-green-600 text-white rounded">Create Question</a>
      <a href="/admin/questions/export" class="px-3 py-2 bg-gray-700 text-white rounded" wire:click.prevent="$emit('exportCsv')">Export CSV</a>
      <label class="px-3 py-2 bg-gray-200 rounded cursor-pointer">
        Import
        <input type="file" wire:model="importFile" class="hidden">
      </label>
    </div>
  </div>

  <div class="mb-4">
    <input wire:model.debounce.300ms="search" type="text" placeholder="Search questions..." class="w-full border rounded px-3 py-2" />
  </div>

  <div class="mb-4">
    @livewire('admin.questions.import-export')
  </div>

  <div class="bg-white rounded shadow overflow-hidden">
    <table class="min-w-full">
      <thead class="bg-gray-50">
        <tr>
          <th class="p-3"><input type="checkbox" wire:model="selectAll" /></th>
          <th class="p-3 text-left">ID</th>
          <th class="p-3 text-left">Title</th>
          <th class="p-3 text-left">Difficulty</th>
          <th class="p-3 text-left">Type</th>
          <th class="p-3 text-left">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($questions as $q)
        <tr class="border-t">
          <td class="p-3"><input type="checkbox" wire:model="selected" value="{{ $q->id }}"></td>
          <td class="p-3">{{ $q->id }}</td>
          <td class="p-3">{{ $q->title ?? Str::limit($q->body, 60) }}</td>
          <td class="p-3">{{ $q->difficulty }}</td>
          <td class="p-3">{{ $q->type }}</td>
          <td class="p-3">
            <a href="/admin/questions/{{ $q->id }}/edit" class="text-blue-600 mr-3">Edit</a>
            <button wire:click="delete({{ $q->id }})" onclick="return confirm('Delete this question?')" class="text-red-600">Delete</button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="mt-4 flex items-center justify-between">
    <div>
      <button wire:click="bulkDelete" class="px-3 py-2 bg-red-600 text-white rounded">Delete Selected</button>
    </div>
    <div>
      {{ $questions->links() }}
    </div>
  </div>
</div>
