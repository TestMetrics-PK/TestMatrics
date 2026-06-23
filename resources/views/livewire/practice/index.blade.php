<div>
  @if($finished)
    <div class="bg-white p-6 rounded shadow text-center">
      <h2 class="text-2xl font-bold">Practice Complete</h2>
      <p class="mt-2">Score: {{ $score }} / {{ count($questions) }}</p>
      <div class="mt-4">
        <button wire:click="resetPractice" class="px-4 py-2 bg-blue-600 text-white rounded">Retry</button>
      </div>
    </div>
  @else
    @php $q = $questions[$currentIndex]; @endphp
    <div class="bg-white p-6 rounded shadow">
      <div class="flex justify-between items-center">
        <h3 class="font-semibold">Question {{ $currentIndex + 1 }} of {{ count($questions) }}</h3>
        <div class="text-sm text-gray-600">Score: {{ $score }}</div>
      </div>
      <div class="mt-4">
        <div class="text-lg">{!! nl2br(e($q['body'])) !!}</div>
        <div class="mt-4 grid gap-2">
          @foreach($q['options'] as $opt)
            <label class="block border rounded p-2">
              <input type="radio" wire:model="selected" value="{{ $opt }}" class="mr-2"> {{ $opt }}
            </label>
          @endforeach
        </div>
        <div class="mt-4">
          <button wire:click="submit" class="px-4 py-2 bg-green-600 text-white rounded">Submit</button>
        </div>
      </div>
    </div>
  @endif
</div>
