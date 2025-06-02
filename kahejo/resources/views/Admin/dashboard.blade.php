@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Recent Activity Section -->
    <div class="mt-8">
        <h2 class="text-2xl font-bold mb-4">Recent Activity</h2>
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="space-y-4">
                <div class="flex items-center justify-between border-b pb-4">
                    <div>
                        <p class="font-medium text-gray-800">New Point Rule Created</p>
                        <p class="text-sm text-gray-600">Carbon Reduction Achievement: 100kg CO₂</p>
                    </div>
                    <span class="text-sm text-gray-500">2 hours ago</span>
                </div>
                <div class="flex items-center justify-between border-b pb-4">
                    <div>
                        <p class="font-medium text-gray-800">User Achievement Unlocked</p>
                        <p class="text-sm text-gray-600">John Doe earned "Carbon Warrior" badge</p>
                    </div>
                    <span class="text-sm text-gray-500">5 hours ago</span>
                </div>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-medium text-gray-800">System Update</p>
                        <p class="text-sm text-gray-600">Point calculation algorithm updated</p>
                    </div>
                    <span class="text-sm text-gray-500">1 day ago</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- //dashboard, recent activity, total user point dll  -->