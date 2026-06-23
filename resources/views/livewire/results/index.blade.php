<div>
  <h2 class="text-xl font-bold mb-4">Results</h2>
  <div class="bg-white rounded shadow overflow-hidden">
    <table class="min-w-full">
      <thead class="bg-gray-50">
        <tr>
          <th class="p-3 text-left">ID</th>
          <th class="p-3 text-left">User</th>
          <th class="p-3 text-left">Score</th>
          <th class="p-3 text-left">Percent</th>
          <th class="p-3 text-left">Date</th>
        </tr>
      </thead>
      <tbody>
        @foreach($results as $r)
        <tr class="border-t">
          <td class="p-3">{{ $r->id }}</td>
          <td class="p-3">{{ $r->user->name ?? '—' }}</td>
          <td class="p-3">{{ $r->score }} / {{ $r->total }}</td>
          <td class="p-3">{{ number_format($r->percent,2) }}%</td>
          <td class="p-3">{{ $r->created_at->format('Y-m-d H:i') }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="mt-4">{{ $results->links() }}</div>
</div>
