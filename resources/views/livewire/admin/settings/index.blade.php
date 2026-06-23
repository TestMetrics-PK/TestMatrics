<div>
  <h2 class="text-xl font-bold mb-4">Settings</h2>
  @if(session()->has('message'))<div class="bg-green-100 text-green-800 p-2 rounded mb-4">{{ session('message') }}</div>@endif
  <div class="bg-white p-4 rounded shadow">
    <label class="block text-sm">Site Title</label>
    <input type="text" wire:model.defer="items.site_title" class="w-full border rounded px-3 py-2 mb-3">
    <label class="block text-sm">SEO Description</label>
    <textarea wire:model.defer="items.seo_description" class="w-full border rounded px-3 py-2 mb-3" rows="3"></textarea>
    <button wire:click="save" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
  </div>
</div>
