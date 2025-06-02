@extends('layouts.admin')

@section('main-content')

<body>
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">User Achievements Management</h1>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Achievement</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Achieved</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($userAchievements as $userAchievement)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $userAchievement->user->name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">{{ $userAchievement->achievement->name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">{{ $userAchievement->created_at }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex space-x-2">
                        <button type="button" class="text-blue-600 hover:text-blue-900" data-toggle="modal" data-target="#userAchievementDetailModal-{{ $userAchievement->id }}">Detail</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

      <!-- Modals for Each Reward -->
    @foreach($userAchievements as $userAchievement)
        <div class="modal fade" id="userAchievementDetailModal-{{ $userAchievement->id }}" tabindex="-1" role="dialog" aria-labelledby="userAchievementDetailModalLabel-{{ $userAchievement->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="userAchievementDetailModalLabel-{{ $userAchievement->id }}">Achievement Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>User:</strong> {{ $userAchievement->user->name }}</p>
                        <p><strong>Achievement:</strong> {{ $userAchievement->achievement->name }}</p>    
                        <p><strong>Description:</strong> {{ $userAchievement->achievement->description }}</p>
                        <p><strong>Date Achieved:</strong> {{ $userAchievement->created_at }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Pagination -->
    <div class="mt-4">
        {{ $userAchievements->links() }}
    </div>
</div>


<!-- monitoring each user achievement  -->

</body>
@endsection
