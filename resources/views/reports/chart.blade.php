@extends('layouts.app')

@section('content')
<div class="mt-8">
  <h2 class="text-xl font-bold">Reports</h2>
  <canvas id="myChart" width="400" height="200"></canvas>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const ctx = document.getElementById('myChart').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {labels:['A','B','C'], datasets:[{label:'Sample', data:[12,19,3], backgroundColor:['#3b82f6','#10b981','#f97316']}]},
      options: {}
    });
  </script>
</div>
@endsection
