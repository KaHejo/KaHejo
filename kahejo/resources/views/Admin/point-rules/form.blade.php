@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">{{ isset($pointRule) ? 'Edit Point Rule' : 'Create Point Rule' }}</h1>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ isset($pointRule) ? route('admin.point-rules.update', $pointRule) : route('admin.point-rules.store') }}" 
              method="POST" 
              enctype="multipart/form-data"
              class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @if(isset($pointRule))
                @method('PUT')
            @endif

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Rule Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       id="name"
                       type="text"
                       name="name"
                       value="{{ old('name', $pointRule->name ?? '') }}"
                       required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                    Description
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                          id="description"
                          name="description"
                          rows="3"
                          required>{{ old('description', $pointRule->description ?? '') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="carbon_reduction_threshold">
                    Carbon Reduction Threshold (kg CO₂)
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       id="carbon_reduction_threshold"
                       type="number"
                       step="0.01"
                       min="0"
                       name="carbon_reduction_threshold"
                       value="{{ old('carbon_reduction_threshold', $pointRule->carbon_reduction_threshold ?? '') }}"
                       required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="points_awarded">
                    Points Awarded
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       id="points_awarded"
                       type="number"
                       min="1"
                       name="points_awarded"
                       value="{{ old('points_awarded', $pointRule->points_awarded ?? '') }}"
                       required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="badge_name">
                    Badge Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       id="badge_name"
                       type="text"
                       name="badge_name"
                       value="{{ old('badge_name', $pointRule->badge_name ?? '') }}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="badge_image">
                    Badge Image
                </label>
                @if(isset($pointRule) && $pointRule->badge_image)
                    <div class="mb-2">
                        <img src="{{ Storage::url($pointRule->badge_image) }}" alt="Current badge" class="h-16 w-16">
                    </div>
                @endif
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       id="badge_image"
                       type="file"
                       name="badge_image"
                       accept="image/*">
            </div>

            <div class="mb-6">
                <label class="flex items-center">
                    <input type="checkbox"
                           name="is_active"
                           class="form-checkbox"
                           value="1"
                           {{ old('is_active', $pointRule->is_active ?? true) ? 'checked' : '' }}>
                    <span class="ml-2 text-gray-700">Active</span>
                </label>
            </div>

            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                    {{ isset($pointRule) ? 'Update Rule' : 'Create Rule' }}
                </button>
                <a href="{{ route('admin.point-rules.index') }}"
                   class="text-gray-600 hover:text-gray-800">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection 