@extends('layouts.admin')  

@section('main-content')  

    <h1 class="h3 mb-4 text-gray-800">  
    Dashboard Reward
    </h1>
    
    <a href="{{ route('admin.rewards.create') }}" class="btn btn-primary mb-3">New Reward</a>

    @if (session('success'))  
        <div class="alert alert-success">  
            {{ session('success') }}  
        </div>  
    @endif  

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">  
        <thead>  
            <tr>  
                <th>No</th>  
                <th>Reward Name</th>  
                <th>Description</th>  
                <th>Points Required</th>  
                <th>Reward Image</th>  
                <th>Actions</th>  
            </tr>  
        </thead>  
        <tbody>  
            @foreach ($rewards as $item)  
                <tr>  
                    <td scope="row">{{ $loop->iteration }}</td>  
                    <td>{{ $item->reward_name }}</td>  
                    <td>{{ $item->reward_description }}</td>  
                    <td>{{ $item->points_required }}</td>  
                    <td>
                        @if($item->reward_image)
                            <img src="{{ asset($item->reward_image) }}" alt="{{ $item->reward_name }}" width="100">
                        @else
                            <span>No Image</span>
                        @endif
                    </td>  
                    <td>  
                        <div class="d-flex">  
                            <a href="{{ route('admin.rewards.edit', $item->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a>  
                            <!-- Trigger Modal -->  
                            <button type="button" class="btn btn-sm btn-info mr-2" data-toggle="modal" data-target="#rewardDetailModal-{{ $item->id }}">Detail</button>  

                            <form action="{{ route('admin.rewards.destroy', $item->id) }}" method="post">  
                                @csrf  
                                @method('delete')  
                                <button type="submit" class="btn btn-sm btn-danger"  
                                    onclick="return confirm('Are you sure to delete this?')">Delete</button>  
                            </form>  
                        </div>  
                    </td>  
                </tr>  
            @endforeach  
        </tbody>  
    </table>  

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
                                <img src="{{ asset($item->reward_image) }}" alt="{{ $item->reward_name }}" width="100"></li>
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

@endsection
