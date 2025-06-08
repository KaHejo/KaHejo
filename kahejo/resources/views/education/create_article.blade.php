@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8 sm:px-6 lg:px-8">
    <!-- Back Button -->
    <div class="mb-8">
        <a href="{{ route('education') }}" class="inline-flex items-center text-green-600 hover:text-green-700 transition-colors duration-200 group">
            <i class="fas fa-arrow-left mr-2 transform group-hover:-translate-x-1 transition-transform duration-200"></i>
            <span class="font-medium">Back to Education</span>
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-2xl overflow-hidden transform hover:scale-[1.01] transition-transform duration-300">
        <div class="px-8 py-6 bg-gradient-to-r from-green-500 via-green-600 to-green-700">
            <h1 class="text-4xl font-bold text-white flex items-center">
                <i class="fas fa-pen-fancy mr-3"></i>
                Create New Article
            </h1>
        </div>

        <form action="{{ route('education.articles.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
            @csrf

            <div class="space-y-8">
                <!-- Title -->
                <div class="group">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2 group-hover:text-green-600 transition-colors duration-200">Title</label>
                    <div class="relative">
                        <input type="text" name="title" id="title" 
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 shadow-sm hover:border-green-400" 
                            placeholder="Enter article title" required>
                        <i class="fas fa-heading absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- Image Upload -->
                <div class="group">
                    <label class="block text-sm font-medium text-gray-700 mb-2 group-hover:text-green-600 transition-colors duration-200">Featured Image</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-green-500 transition-all duration-200 hover:bg-green-50">
                        <div class="space-y-2 text-center">
                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 group-hover:text-green-500 transition-colors duration-200"></i>
                            <div class="flex text-sm text-gray-600">
                                <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-green-600 hover:text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500">
                                    <span>Upload a file</span>
                                    <input type="file" name="image" id="image" class="sr-only" accept="image/*">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Reading Time -->
                    <div class="group">
                        <label for="reading_time" class="block text-sm font-medium text-gray-700 mb-2 group-hover:text-green-600 transition-colors duration-200">Reading Time (minutes)</label>
                        <div class="relative">
                            <input type="number" name="reading_time" id="reading_time" 
                                class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 shadow-sm hover:border-green-400" 
                                min="1" required>
                            <i class="fas fa-clock absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Published Date -->
                    <div class="group">
                        <label for="published_at" class="block text-sm font-medium text-gray-700 mb-2 group-hover:text-green-600 transition-colors duration-200">Published Date (Optional)</label>
                        <div class="relative">
                            <input type="date" name="published_at" id="published_at" 
                                class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 shadow-sm hover:border-green-400">
                            <i class="fas fa-calendar absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="group">
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2 group-hover:text-green-600 transition-colors duration-200">Content</label>
                    <div class="relative">
                        <textarea name="content" id="content" rows="8" 
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 shadow-sm hover:border-green-400" 
                            placeholder="Write your article content here..." required></textarea>
                        <i class="fas fa-align-left absolute right-4 top-4 text-gray-400"></i>
                    </div>
                </div>

                <!-- Description -->
                <div class="group">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2 group-hover:text-green-600 transition-colors duration-200">Short Description</label>
                    <div class="relative">
                        <textarea name="description" id="description" rows="3" 
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 shadow-sm hover:border-green-400" 
                            placeholder="Write a brief description of your article..." required></textarea>
                        <i class="fas fa-info-circle absolute right-4 top-4 text-gray-400"></i>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-10 flex justify-end">
                <button type="submit" 
                    class="inline-flex items-center px-8 py-4 border border-transparent text-base font-medium rounded-xl text-white bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transform hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-xl">
                    <i class="fas fa-save mr-2"></i>
                    Save Article
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Preview image before upload
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.createElement('img');
                preview.src = e.target.result;
                preview.className = 'mt-4 mx-auto h-40 w-auto object-cover rounded-xl shadow-lg transform hover:scale-105 transition-transform duration-200';
                
                const container = document.querySelector('.border-dashed');
                const existingPreview = container.querySelector('img');
                if (existingPreview) {
                    container.removeChild(existingPreview);
                }
                container.insertBefore(preview, container.firstChild);
            }
            reader.readAsDataURL(file);
        }
    });

    // Add floating label effect
    document.querySelectorAll('input, textarea').forEach(element => {
        element.addEventListener('focus', function() {
            this.parentElement.classList.add('ring-2', 'ring-green-500');
        });
        element.addEventListener('blur', function() {
            this.parentElement.classList.remove('ring-2', 'ring-green-500');
        });
    });
</script>
@endpush
@endsection 