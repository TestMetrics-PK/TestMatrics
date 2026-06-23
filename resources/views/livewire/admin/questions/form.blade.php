<div class="max-w-3xl">
  <div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">{{ $questionId ? 'Edit' : 'Create' }} Question</h2>

    @if(session()->has('message'))
      <div class="bg-green-100 text-green-800 p-2 rounded mb-4">{{ session('message') }}</div>
    @endif

    <div class="mb-3">
      <label class="block text-sm">Title</label>
      <input type="text" wire:model.defer="title" class="w-full border rounded px-3 py-2" />
      @error('title') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="block text-sm">Body</label>
      <textarea wire:model.defer="body" class="w-full border rounded px-3 py-2" rows="4"></textarea>
      @error('body') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="block text-sm">Options (one per line)</label>
      <textarea wire:model.defer="optionsText" class="w-full border rounded px-3 py-2" rows="4"></textarea>
    </div>

    <div class="mb-3">
      <label class="block text-sm">Answer</label>
      <input type="text" wire:model.defer="answer" class="w-full border rounded px-3 py-2" />
    </div>

    <div class="mb-3">
      <label class="block text-sm">Explanation</label>
      <textarea wire:model.defer="explanation" class="w-full border rounded px-3 py-2" rows="3"></textarea>
    </div>

    <div class="grid grid-cols-2 gap-4">
      <div>
        <label class="block text-sm">Difficulty</label>
        <select wire:model.defer="difficulty" class="w-full border rounded px-3 py-2">
          <option value="easy">Easy</option>
          <option value="medium">Medium</option>
          <option value="hard">Hard</option>
        </select>
      </div>
      <div>
        <label class="block text-sm">Type</label>
        <select wire:model.defer="type" class="w-full border rounded px-3 py-2">
          <option value="mcq">MCQ</option>
          <option value="short">Short Answer</option>
        </select>
      </div>
    </div>

    <div class="mt-4">
      <button wire:click="save" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
      <a href="/admin/questions" class="ml-3 text-gray-600">Cancel</a>
    </div>
  </div>
</div>
