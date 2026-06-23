<div>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <div class="bg-white p-4 rounded shadow">
      <h3 class="text-sm text-gray-500">Completed Practices</h3>
      <div class="text-2xl font-bold">{{ $stats['completed_practices'] }}</div>
    </div>
    <div class="bg-white p-4 rounded shadow">
      <h3 class="text-sm text-gray-500">Mock Tests</h3>
      <div class="text-2xl font-bold">{{ $stats['mock_tests_taken'] }}</div>
    </div>
    <div class="bg-white p-4 rounded shadow">
      <h3 class="text-sm text-gray-500">Accuracy</h3>
      <div class="text-2xl font-bold">{{ $stats['accuracy'] }}</div>
    </div>
  </div>

  <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="bg-white p-4 rounded shadow">
      <h3 class="font-semibold mb-2">Quick Practice</h3>
      <p class="text-sm text-gray-600">Start a short practice session tailored to your weak areas.</p>
      <div class="mt-4">
        <button wire:click="startPractice" class="px-4 py-2 bg-blue-600 text-white rounded">Start Practice</button>
      </div>
    </div>

    <div class="bg-white p-4 rounded shadow">
      <h3 class="font-semibold mb-2">Recent Activity</h3>
      <ul class="text-sm text-gray-700">
        <li>- Completed practice: Algebra basics</li>
        <li>- Took mock test: Science Mock 1</li>
        <li>- Scored 72% on Practice #11</li>
      </ul>
    </div>
  </div>
</div>
