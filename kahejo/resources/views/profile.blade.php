@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <!-- Profile Header -->
    <div class="bg-white dark:bg-dark-bg-secondary shadow rounded-lg mb-6">
        <div class="px-4 py-5 sm:px-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-16 w-16 rounded-full ring-4 ring-green-500" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User">
                </div>
                <div class="ml-4">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-dark-text-primary">{{ Auth::user()->name }}</h2>
                    <p class="text-sm text-gray-500 dark:text-dark-text-secondary">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Content -->
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        <!-- Personal Information -->
        <div class="bg-white dark:bg-dark-bg-secondary shadow rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-dark-text-primary">Personal Information</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-dark-text-secondary">Update your personal details and preferences.</p>
            </div>
            <div class="border-t border-gray-200 dark:border-dark-border px-4 py-5 sm:p-6">
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-dark-text-secondary">Name</label>
                            <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-dark-border dark:bg-dark-bg-primary shadow-sm focus:border-green-500 focus:ring-green-500 dark:text-dark-text-primary">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-dark-text-secondary">Email</label>
                            <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-dark-border dark:bg-dark-bg-primary shadow-sm focus:border-green-500 focus:ring-green-500 dark:text-dark-text-primary">
                        </div>

                        <div>
                            <label for="company" class="block text-sm font-medium text-gray-700 dark:text-dark-text-secondary">Company</label>
                            <input type="text" name="company" id="company" value="{{ Auth::user()->company }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-dark-border dark:bg-dark-bg-primary shadow-sm focus:border-green-500 focus:ring-green-500 dark:text-dark-text-primary">
                        </div>

                        <div>
                            <label for="position" class="block text-sm font-medium text-gray-700 dark:text-dark-text-secondary">Position</label>
                            <input type="text" name="position" id="position" value="{{ Auth::user()->position }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-dark-border dark:bg-dark-bg-primary shadow-sm focus:border-green-500 focus:ring-green-500 dark:text-dark-text-primary">
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Password Update -->
        <div class="bg-white dark:bg-dark-bg-secondary shadow rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-dark-text-primary">Update Password</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-dark-text-secondary">Change your password to keep your account secure.</p>
            </div>
            <div class="border-t border-gray-200 dark:border-dark-border px-4 py-5 sm:p-6">
                <form action="{{ route('password.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-6">
                        <div>
                            <label for="current_password" class="block text-sm font-medium text-gray-700 dark:text-dark-text-secondary">Current Password</label>
                            <input type="password" name="current_password" id="current_password" class="mt-1 block w-full rounded-md border-gray-300 dark:border-dark-border dark:bg-dark-bg-primary shadow-sm focus:border-green-500 focus:ring-green-500 dark:text-dark-text-primary">
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-dark-text-secondary">New Password</label>
                            <input type="password" name="password" id="password" class="mt-1 block w-full rounded-md border-gray-300 dark:border-dark-border dark:bg-dark-bg-primary shadow-sm focus:border-green-500 focus:ring-green-500 dark:text-dark-text-primary">
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-dark-text-secondary">Confirm New Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full rounded-md border-gray-300 dark:border-dark-border dark:bg-dark-bg-primary shadow-sm focus:border-green-500 focus:ring-green-500 dark:text-dark-text-primary">
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                Update Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection