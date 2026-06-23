@extends('layouts.app')

@section('content')
<div class="mt-4">
    <h1 class="text-2xl font-bold">Student Dashboard</h1>
    <p class="text-sm text-gray-600">Overview of your learning progress.</p>

    <div class="mt-6">
        @livewire('student.dashboard')
    </div>

    <form method="POST" action="/logout" class="mt-6">
        @csrf
        <button class="px-3 py-2 bg-red-600 text-white rounded">Logout</button>
    </form>
</div>
@endsection
