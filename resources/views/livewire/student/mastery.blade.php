<div>
  <h3 class="text-lg font-semibold">Mastery</h3>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
    @foreach($masteries as $m)
      <div class="bg-white p-4 rounded shadow">
        <div class="font-semibold">{{ $m->skill }}</div>
        <div class="text-sm text-gray-600">Level: {{ $m->level }}</div>
        <div class="mt-2">Progress: {{ round($m->progress,1) }}%</div>
      </div>
    @endforeach
  </div>
</div>
