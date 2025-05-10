@extends('layouts.admin')  

@section('main-content')  
    <!-- Page Heading -->  
    <h1 class="text-3xl font-bold text-gray-800 mb-6">{{ $title ?? __('Create Reward') }}</h1>  

    <div class="card shadow-lg rounded-lg p-6 bg-white">  
        <div class="card-body">  
            <form action="{{ route('admin.rewards.store') }}" method="post" enctype="multipart/form-data">  
                @csrf  

                <!-- Nama Reward -->
                <div class="mb-4">
                    <label for="reward_name" class="block text-gray-700 font-medium">Nama Reward</label>
                    <input type="text" class="form-control @error('reward_name') is-invalid @enderror mt-2 p-3 border rounded-lg w-full" name="reward_name" id="reward_name" placeholder="Nama Reward" autocomplete="off" value="{{ old('reward_name') }}">
                    @error('reward_name')  
                        <span class="text-sm text-red-500">{{ $message }}</span>  
                    @enderror  
                </div>  

                <!-- Deskripsi Reward -->
                <div class="mb-4">
                    <label for="reward_description" class="block text-gray-700 font-medium">Deskripsi Reward</label>
                    <textarea class="form-control @error('reward_description') is-invalid @enderror mt-2 p-3 border rounded-lg w-full" name="reward_description" id="reward_description" placeholder="Deskripsi Reward">{{ old('reward_description') }}</textarea>  
                    @error('reward_description')  
                        <span class="text-sm text-red-500">{{ $message }}</span>  
                    @enderror  
                </div>  

                <!-- Poin yang Diperlukan -->
                <div class="mb-4">
                    <label for="points_required" class="block text-gray-700 font-medium">Poin yang Diperlukan</label>
                    <input type="number" class="form-control @error('points_required') is-invalid @enderror mt-2 p-3 border rounded-lg w-full" name="points_required" id="points_required" placeholder="Jumlah Poin" value="{{ old('points_required') }}">
                    @error('points_required')  
                        <span class="text-sm text-red-500">{{ $message }}</span>  
                    @enderror  
                </div>  

                <!-- Gambar Reward -->
                <div class="mb-4">
                    <label for="reward_image" class="block text-gray-700 font-medium">Gambar Reward</label>
                    <input type="file" class="form-control @error('reward_image') is-invalid @enderror mt-2 p-3 border rounded-lg w-full" name="reward_image" id="reward_image">
                    @error('reward_image')  
                        <span class="text-sm text-red-500">{{ $message }}</span>  
                    @enderror  
                </div>  

                <div class="flex justify-between">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 focus:outline-none">Save</button>  
                    <a href="{{ route('admin.rewards.index') }}" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 focus:outline-none">Back to list</a>
                </div>
            </form>  
        </div>  
    </div>  

@endsection


@push('notif')  
    @if (session('success'))  
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">  
            {{ session('success') }}  
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">  
                <span aria-hidden="true">&times;</span>  
            </button>  
        </div>  
    @endif  

    @if (session('status'))  
        <div class="alert alert-success border-left-success" role="alert">  
            {{ session('status') }}  
        </div>  
    @endif  
@endpush
