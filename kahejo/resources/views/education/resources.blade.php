@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('education') }}" class="inline-flex items-center text-green-600 hover:text-green-700">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Education
        </a>
    </div>

    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Learning Resources</h1>
        <p class="mt-2 text-gray-600">Access our curated collection of educational materials and guides about environmental sustainability.</p>
    </div>

    <!-- Resources Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- PDF Guides -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <div class="flex items-center mb-4">
                    <div class="p-3 rounded-full bg-green-50">
                        <i class="fas fa-file-pdf text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="ml-4 text-xl font-semibold text-gray-900">PDF Guides</h3>
                </div>
                <ul class="space-y-3">
                    <li>
                        <a href="#" class="flex items-center text-green-600 hover:text-green-700">
                            <i class="fas fa-download mr-2"></i>
                            Carbon Footprint Calculator Guide
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-green-600 hover:text-green-700">
                            <i class="fas fa-download mr-2"></i>
                            Sustainable Living Handbook
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-green-600 hover:text-green-700">
                            <i class="fas fa-download mr-2"></i>
                            Energy Conservation Tips
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Video Tutorials -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <div class="flex items-center mb-4">
                    <div class="p-3 rounded-full bg-green-50">
                        <i class="fas fa-video text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="ml-4 text-xl font-semibold text-gray-900">Video Tutorials</h3>
                </div>
                <ul class="space-y-3">
                    <li>
                        <a href="#" class="flex items-center text-green-600 hover:text-green-700">
                            <i class="fas fa-play-circle mr-2"></i>
                            Understanding Carbon Emissions
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-green-600 hover:text-green-700">
                            <i class="fas fa-play-circle mr-2"></i>
                            How to Reduce Your Carbon Footprint
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-green-600 hover:text-green-700">
                            <i class="fas fa-play-circle mr-2"></i>
                            Renewable Energy Basics
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- External Links -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <div class="flex items-center mb-4">
                    <div class="p-3 rounded-full bg-green-50">
                        <i class="fas fa-external-link-alt text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="ml-4 text-xl font-semibold text-gray-900">External Resources</h3>
                </div>
                <ul class="space-y-3">
                    <li>
                        <a href="https://www.un.org/en/climatechange" target="_blank" class="flex items-center text-green-600 hover:text-green-700">
                            <i class="fas fa-globe mr-2"></i>
                            UN Climate Change
                        </a>
                    </li>
                    <li>
                        <a href="https://www.ipcc.ch/" target="_blank" class="flex items-center text-green-600 hover:text-green-700">
                            <i class="fas fa-globe mr-2"></i>
                            IPCC Reports
                        </a>
                    </li>
                    <li>
                        <a href="https://www.epa.gov/climate-change" target="_blank" class="flex items-center text-green-600 hover:text-green-700">
                            <i class="fas fa-globe mr-2"></i>
                            EPA Climate Change
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Interactive Tools -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <div class="flex items-center mb-4">
                    <div class="p-3 rounded-full bg-green-50">
                        <i class="fas fa-tools text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="ml-4 text-xl font-semibold text-gray-900">Interactive Tools</h3>
                </div>
                <ul class="space-y-3">
                    <li>
                        <a href="#" class="flex items-center text-green-600 hover:text-green-700">
                            <i class="fas fa-calculator mr-2"></i>
                            Carbon Footprint Calculator
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-green-600 hover:text-green-700">
                            <i class="fas fa-chart-line mr-2"></i>
                            Energy Usage Tracker
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-green-600 hover:text-green-700">
                            <i class="fas fa-leaf mr-2"></i>
                            Sustainability Checklist
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Research Papers -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <div class="flex items-center mb-4">
                    <div class="p-3 rounded-full bg-green-50">
                        <i class="fas fa-book text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="ml-4 text-xl font-semibold text-gray-900">Research Papers</h3>
                </div>
                <ul class="space-y-3">
                    <li>
                        <a href="#" class="flex items-center text-green-600 hover:text-green-700">
                            <i class="fas fa-file-alt mr-2"></i>
                            Climate Change Impact Studies
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-green-600 hover:text-green-700">
                            <i class="fas fa-file-alt mr-2"></i>
                            Renewable Energy Research
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-green-600 hover:text-green-700">
                            <i class="fas fa-file-alt mr-2"></i>
                            Sustainable Development Reports
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Community Resources -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <div class="flex items-center mb-4">
                    <div class="p-3 rounded-full bg-green-50">
                        <i class="fas fa-users text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="ml-4 text-xl font-semibold text-gray-900">Community Resources</h3>
                </div>
                <ul class="space-y-3">
                    <li>
                        <a href="#" class="flex items-center text-green-600 hover:text-green-700">
                            <i class="fas fa-comments mr-2"></i>
                            Discussion Forums
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-green-600 hover:text-green-700">
                            <i class="fas fa-calendar-alt mr-2"></i>
                            Upcoming Events
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-green-600 hover:text-green-700">
                            <i class="fas fa-hands-helping mr-2"></i>
                            Volunteer Opportunities
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection 