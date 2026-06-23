<div class="max-w-md mx-auto mt-20 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-semibold mb-4">Register</h2>
    <form wire:submit.prevent="register">
        <div class="mb-3">
            <label class="block text-sm">Name</label>
            <input type="text" wire:model.defer="name" class="w-full border rounded px-3 py-2" />
            @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label class="block text-sm">Email</label>
            <input type="email" wire:model.defer="email" class="w-full border rounded px-3 py-2" />
            @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label class="block text-sm">Password</label>
            <input type="password" wire:model.defer="password" class="w-full border rounded px-3 py-2" />
            @error('password') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label class="block text-sm">Confirm Password</label>
            <input type="password" wire:model.defer="password_confirmation" class="w-full border rounded px-3 py-2" />
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Register</button>
            <a href="/login" class="text-sm text-gray-600">Login</a>
        </div>
    </form>
</div>
