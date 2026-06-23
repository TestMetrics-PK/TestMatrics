@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-20 bg-white p-6 rounded shadow">
  <h2 class="text-2xl font-semibold mb-4">Login</h2>
  <form method="POST" action="/login">
    <div class="mb-3">
      <label class="block text-sm">Email</label>
      <input type="email" name="email" class="w-full border rounded px-3 py-2" />
    </div>
    <div class="mb-3">
      <label class="block text-sm">Password</label>
      <input type="password" name="password" class="w-full border rounded px-3 py-2" />
    </div>
    <div class="flex items-center justify-between">
      <button class="px-4 py-2 bg-blue-600 text-white rounded">Login</button>
      <a href="#" class="text-sm text-gray-600">Forgot?</a>
    </div>
  </form>
</div>
@endsection
