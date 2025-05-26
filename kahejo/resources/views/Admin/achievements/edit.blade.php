@extends('layouts.admin')

@section('main-content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Edit Achievement</h1>
        <a href="{{ route('admin.achievements.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            Back to Achievements
        </a>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.achievements.update', $achievement->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="bg-white rounded-lg shadow overflow-hidden p-6">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Achievement Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $achievement->name) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="3" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description', $achievement->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select name="category" id="category" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="" disabled {{ old('category', $achievement->category) ? '' : 'selected' }}>Select a category</option>
                    <option value="electricity" {{ old('category', $achievement->category) == 'electricity' ? 'selected' : '' }}>Electricity</option>
                    <option value="gasoline" {{ old('category', $achievement->category) == 'gasoline' ? 'selected' : '' }}>Gasoline</option>
                    <option value="diesel" {{ old('category', $achievement->category) == 'diesel' ? 'selected' : '' }}>Diesel</option>
                    <option value="gas" {{ old('category', $achievement->category) == 'gas' ? 'selected' : '' }}>Gas</option>
                    <option value="lpg" {{ old('category', $achievement->category) == 'lpg' ? 'selected' : '' }}>LPG</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="points" class="block text-sm font-medium text-gray-700">Points</label>
                <input type="number" name="points" id="points" value="{{ old('points', $achievement->points) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="icon" class="block text-sm font-medium text-gray-700">Icon</label>
                <input type="file" name="icon" id="icon" accept="image/*" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @if($achievement->icon)
                    <img src="{{ asset($achievement->icon) }}" alt="{{ $achievement->name }}" class="mt-2 h-16 w-16 object-cover rounded">
                @endif
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Update Achievement
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

