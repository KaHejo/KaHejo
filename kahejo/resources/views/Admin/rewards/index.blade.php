@extends('layouts.admin')

@section('main-content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Dashboard Reward</h1>
        <a href="{{ route('admin.rewards.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            New Reward
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
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reward Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Points Required</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($rewards as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $loop->iteration }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $item->reward_name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $item->reward_description }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $item->points_required }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($item->reward_image)
                            <img src="{{ asset($item->reward_image) }}" alt="{{ $item->reward_name }}" class="h-16 w-16 object-cover rounded">
                        @else
                            <span class="text-xs text-gray-400">No Image</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex space-x-2">
                        <a href="{{ route('admin.rewards.edit', $item->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <button type="button" class="text-blue-600 hover:text-blue-900" data-toggle="modal" data-target="#rewardDetailModal-{{ $item->id }}">Detail</button>
                        <form action="{{ route('admin.rewards.destroy', $item->id) }}" method="post" onsubmit="return confirm('Are you sure to delete this?')" class="inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modals for Each Reward -->
    @foreach ($rewards as $item)
        <div class="modal fade" id="rewardDetailModal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="rewardDetailModalLabel-{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="rewardDetailModalLabel-{{ $item->id }}">Reward: {{ $item->reward_name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4>Details:</h4>
                        <ul>
                            <li>Reward Name: {{ $item->reward_name }}</li>
                            <li>Points Required: {{ $item->points_required }}</li>
                            <li>Description: {{ $item->reward_description }}</li>
                            <li>Image: <br>
                                @if($item->reward_image)
                                    <img src="{{ asset($item->reward_image) }}" alt="{{ $item->reward_name }}" class="h-24 w-24 object-cover rounded">
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

    <div class="mt-4">
        {{ $rewards->links() }}
    </div>
</div>
@endsection