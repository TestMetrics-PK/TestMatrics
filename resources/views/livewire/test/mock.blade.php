<div>
  @if($finished)
    <div class="bg-white p-6 rounded shadow text-center">
      <h2 class="text-2xl font-bold">Mock Test Complete</h2>
      <p class="mt-2">Score: {{ $score }} / {{ count($questions) }}</p>
    </div>
  @else
    @php $q = $questions[$current]; @endphp
    <div class="bg-white p-6 rounded shadow">
      <h3 class="font-semibold">Question {{ $current + 1 }} / {{ count($questions) }}</h3>
      <div class="mt-3">{!! nl2br(e($q['body'])) !!}</div>
      <div class="mt-4 grid gap-2">
        @foreach($q['options'] as $opt)
          <label class="block border rounded p-2">
            <input type="radio" wire:model="answers.{{ $current }}" value="{{ $opt }}" class="mr-2"> {{ $opt }}
          </label>
        @endforeach
      </div>
      <div class="mt-4 flex justify-between">
        <button wire:click="next" class="px-4 py-2 bg-blue-600 text-white rounded">Next</button>
        <div class="text-sm text-gray-600">Score: {{ $score }}</div>
      </div>
    </div>
  @endif
</div>
