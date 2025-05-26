@extends('layouts.admin')

@section('main-content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Dashboard Achievement</h1>
        <a href="{{ route('admin.achievements.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            New Achievement
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Point Needed</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Point Awarded</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Icon</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($achievements as $achievement)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $loop->iteration }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $achievement->name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $achievement->description }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $achievement->category ?? '-' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $achievement->points_needed }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $achievement->points_awarded }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($achievement->icon)
                            <img src="{{ asset($achievement->icon) }}" alt="{{ $achievement->name }}" class="h-16 w-16 object-cover rounded">
                        @else
                            <span class="text-xs text-gray-400">No Icon</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex space-x-2">
                        <a href="{{ route('admin.achievements.edit', $achievement->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <button type="button" class="text-blue-600 hover:text-blue-900" data-toggle="modal" data-target="#achievementDetailModal-{{ $achievement->id }}">Detail</button>
                        <form action="{{ route('admin.achievements.destroy', $achievement->id) }}" method="post" onsubmit="return confirm('Are you sure to delete this?')" class="inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Modals for Each Achievement -->
    @foreach ($achievements as $item)
        <div class="modal fade" id="achievementDetailModal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="achievementDetailModalLabel-{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="achievementDetailModalLabel-{{ $item->id }}">Achievement: {{ $item->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4>Details:</h4>
                        <ul>
                            <li>Achievement Name: {{ $item->name }}</li>
                            <li>Points Required: {{ $item->points_needed }}</li>
                            <li>Points Awarded: {{ $item->points_awarded }}</li>
                            <li>Category: {{ $item->category ?? '-' }}</li>
                            <li>Description: {{ $item->description }}</li>
                            <li>Image: <br>
                                @if($item->icon)
                                    <img src="{{ asset($item->icon) }}" alt="{{ $item->name }}" class="h-24 w-24 object-cover rounded">
                                @else
                                    <span class="text-xs text-gray-400">No Image</span>
                                @endif
                            </li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>

    <div class="mt-4">
        {{ $achievements->links() }}
    </div>
</div>
@endsection