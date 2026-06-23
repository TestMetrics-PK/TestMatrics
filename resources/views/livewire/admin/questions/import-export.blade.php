<div class="mt-4">
  @if(session()->has('message'))
    <div class="bg-green-100 text-green-800 p-2 rounded mb-2">{{ session('message') }}</div>
  @endif
  <div class="flex gap-2 items-center">
    <button wire:click="exportCsv" class="px-3 py-2 bg-gray-700 text-white rounded">Export CSV</button>
    <label class="px-3 py-2 bg-gray-200 rounded cursor-pointer">
      Import CSV
      <input type="file" wire:model="importFile" class="hidden">
    </label>
  </div>
</div>
