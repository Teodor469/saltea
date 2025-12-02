<div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Add New Admin User</h1>
    </div>
    
    <div class="bg-white dark:bg-zinc-900 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6">
        <form wire:submit="save" class="space-y-6">
            <!-- User Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">
                    Full Name <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    id="name" 
                    wire:model="name"
                    class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-zinc-800 px-4 py-3 text-gray-900 dark:text-white focus:border-blue-500 focus:ring-blue-500"
                    placeholder="Enter full name"
                    required
                >
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">
                    Email Address <span class="text-red-500">*</span>
                </label>
                <input 
                    type="email" 
                    id="email" 
                    wire:model="email"
                    class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-zinc-800 px-4 py-3 text-gray-900 dark:text-white focus:border-blue-500 focus:ring-blue-500"
                    placeholder="Enter email address"
                    required
                >
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">
                    Password <span class="text-red-500">*</span>
                </label>
                <input 
                    type="password" 
                    id="password" 
                    wire:model="password"
                    class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-zinc-800 px-4 py-3 text-gray-900 dark:text-white focus:border-blue-500 focus:ring-blue-500"
                    placeholder="Enter password"
                    required
                    minlength="8"
                >
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Password must be at least 8 characters</p>
                @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">
                    Confirm Password <span class="text-red-500">*</span>
                </label>
                <input 
                    type="password" 
                    id="password_confirmation" 
                    wire:model="password_confirmation"
                    class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-zinc-800 px-4 py-3 text-gray-900 dark:text-white focus:border-blue-500 focus:ring-blue-500"
                    placeholder="Confirm password"
                    required
                    minlength="8"
                >
                @error('password_confirmation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Role Selection -->
            <div>
                <label for="role" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">
                    User Role <span class="text-red-500">*</span>
                </label>
                <select 
                    id="role" 
                    wire:model="role"
                    class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-zinc-800 px-4 py-3 text-gray-900 dark:text-white focus:border-blue-500 focus:ring-blue-500"
                    required
                >
                    <option value="">Select a role</option>
                    <option value="admin">Administrator</option>
                    <option value="user">Regular User</option>
                </select>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Administrators have full access to the admin panel</p>
                @error('role') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Email Verification -->
            <div>
                <label class="flex items-center">
                    <input 
                        type="checkbox" 
                        wire:model="email_verified"
                        class="rounded border-gray-300 dark:border-gray-600 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        checked
                    >
                    <span class="ml-2 text-sm text-gray-900 dark:text-white">Mark email as verified</span>
                </label>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">If unchecked, user will need to verify their email before accessing the system</p>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end space-x-4 pt-4">
                <a 
                    href="{{ route('admin.dashboard') }}" 
                    class="px-6 py-3 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-zinc-800 transition-colors"
                >
                    Cancel
                </a>
                <button 
                    type="submit" 
                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors disabled:opacity-50"
                    wire:loading.attr="disabled"
                >
                    <span wire:loading.remove>Add User</span>
                    <span wire:loading>Adding User...</span>
                </button>
            </div>
        </form>
    </div>
</div>
