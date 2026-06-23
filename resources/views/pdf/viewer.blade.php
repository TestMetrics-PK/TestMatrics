@extends('layouts.app')

@section('content')
<div class="mt-8">
  <h2 class="text-xl font-bold">PDF Viewer</h2>
  <div class="mt-4">
    <iframe src="/sample.pdf" style="width:100%;height:800px;border:0"></iframe>
  </div>
  <p class="text-sm text-gray-600 mt-2">Place a `sample.pdf` in the public folder to view.</p>
</div>
@endsection
