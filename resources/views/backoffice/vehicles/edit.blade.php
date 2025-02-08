@extends('backoffice.layouts.master')

@section('page-title')
    @include("backoffice.layouts.common.page-title", ["pagetitle" => "Dashboard", "title" => "Vehicle Management"])
@endsection

@section('content')
    <h1>Edit Category</h1>
    <form action="{{ route('vehicle-categories.update', $vehicleCategory->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="row mt-2">
            <!-- Name Field -->
            <div class="form-group col-6">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $vehicleCategory->name) }}" required>
            </div>
            <!-- Slug Field -->
            <div class="form-group col-6">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $vehicleCategory->slug) }}" required>
            </div>
        </div>

        <div class="row mt-3">
            <!-- Vehicle Count Field -->
            <div class="form-group col-6">
                <label for="vehicle_count">Vehicle Count</label>
                <input type="number" class="form-control" id="vehicle_count" name="vehicle_count" value="{{ old('vehicle_count', $vehicleCategory->vehicle_count) }}" required>
            </div>
            <!-- Suitcases Field -->
            <div class="form-group col-6">
                <label for="suitcases">Suitcases</label>
                <input type="number" class="form-control" id="suitcases" name="suitcases" value="{{ old('suitcases', $vehicleCategory->suitcases) }}" required>
            </div>
        </div>

        <div class="row mt-3">
            <!-- Passengers Field -->
            <div class="form-group col-6">
                <label for="passengers">Passengers</label>
                <input type="number" class="form-control" id="passengers" name="passengers" value="{{ old('passengers', $vehicleCategory->passengers) }}" required>
            </div>
            <!-- Type Field -->
            <div class="form-group col-6">
                <label for="type_id">Type</label>
                <select class="form-control" id="type_id" name="type_id" required>
                    <option value="">Select a vehicle type</option>
                    @foreach($vehicleTypes as $type)
                        <option value="{{ $type->id }}" {{ $type->id == $vehicleCategory->type_id ? 'selected' : '' }}>{{ $type->type }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <!-- Doors Field -->
            <div class="form-group col-6">
                <label for="doors">Doors</label>
                <input type="number" class="form-control" id="doors" name="doors" value="{{ old('doors', $vehicleCategory->doors) }}" required>
            </div>
            <!-- P2P First Km Price -->
            <div class="form-group col-6">
                <label for="p2p_first_km_price">First Km Price (Rs)</label>
                <input type="number" class="form-control" id="p2p_first_km_price" name="p2p_first_km_price" value="{{ old('p2p_first_km_price', $vehicleCategory->p2p_first_km_price) }}" step="0.01" min="0" placeholder="Enter amount" required>
            </div>
        </div>

        <div class="row mt-3">
            <!-- P2P Second Km Price -->
            <div class="form-group col-6">
                <label for="p2p_second_km_price">Extra Km Price (Rs)</label>
                <input type="number" class="form-control" id="p2p_second_km_price" name="p2p_extra_km_price" value="{{ old('p2p_extra_km_price', $vehicleCategory->p2p_extra_km_price) }}" step="0.01" min="0" placeholder="Enter amount" required>
            </div>
            <!-- Transmission Field -->
            <div class="form-group col-6">
                <label for="transmission">Transmission</label>
                <select class="form-control" id="transmission" name="transmission" required>
                    <option value="Auto" {{ $vehicleCategory->transmission == 'Auto' ? 'selected' : '' }}>Auto</option>
                    <option value="Manual" {{ $vehicleCategory->transmission == 'Manual' ? 'selected' : '' }}>Manual</option>
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <!-- Image Preview -->
            @if($vehicleCategory->image)
                <div class="form-group col-6">
                    <label>Current Image:</label>
                    <img src="{{ $vehicleCategory->image }}" alt="Current Image" style="width: 100px;">
                </div>
            @endif
            <!-- Image Upload Field -->
            <div class="form-group col-6">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
@endsection
