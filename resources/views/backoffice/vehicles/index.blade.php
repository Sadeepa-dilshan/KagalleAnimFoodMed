@extends('backoffice.layouts.master')

@section('page-title')
@include("backoffice.layouts.common.page-title", ["pagetitle" => "Dashboard", "title" => "Vehicle Management"])
@endsection

@section('content')
<div class="container">

    <!-- Search Input -->

    <input type="text" class="form-control mb-3" id="search" placeholder="Search for a Vehicles...">


    <!-- Table -->
    <table class="table table-bordered" id="vehicleCategoriesTable">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Vehicle Count</th>
                <th>Suitcases</th>
                <th>Passengers</th>
                <th>Type</th>
                <th>Transmission</th>
                <th>Doors</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehicleCategories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->vehicle_count }}</td>
                    <td>{{ $category->suitcases }}</td>
                    <td>{{ $category->passengers }}</td>
                    <td>{{ $category->vehicle_type }}</td> <!-- Display the type from vehicle_types table -->
                    <td>{{ $category->transmission }}</td>
                    <td>{{ $category->doors }}</td>
                    <td>
                        <img src="{{ asset($category->image) }}" alt="Category Image" width="100" height="100">
                    </td>
                    <td>
                        <a href="{{ route('vehicle-categories.edit', $category->id) }}"
                            class="btn btn-primary btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm" onclick="deleteCategory({{ $category->id }})">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Create Button -->
    <button class="btn btn-primary mb-3" onclick="openCreateModal()">Create Vehicle Category</button>

    <!-- Create Modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Add Vehicle</h5>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="categoryForm">
                        <input type="hidden" id="categoryId">
                        <div class="row mt-2">
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" required oninput="generateSlug()">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="slug" readonly required>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="form-group col-md-6">
                                <label for="vehicle_count">Vehicle Count</label>
                                <input type="number" class="form-control" id="vehicle_count" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="suitcases">Suitcases</label>
                                <input type="number" class="form-control" id="suitcases" required>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="form-group col-md-6">
                                <label for="passengers">Passengers</label>
                                <input type="number" class="form-control" id="passengers" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="type">Type</label>
                                <select class="form-control" id="type_id" name="type_id" required>
                                    <option value="">Loading types...</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="form-group col-md-6">
                                <label for="doors">Doors</label>
                                <input type="number" class="form-control" id="doors" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="transmission">Transmission</label>
                                <select class="form-control" id="transmission" name="transmission" required>
                                    <option value="Auto">Auto</option>
                                    <option value="Manual">Manual</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">

                            <div class="form-group col-md-6">
                                <label for="p2p_first_km_price">First Km Price (Rs)</label>
                                <input type="number" class="form-control" id="p2p_first_km_price" step="0.01" min="0"
                                    placeholder="Enter amount" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="p2p_extra_km_price">Extra Km Price (Rs)</label>
                                <input type="number" class="form-control" id="p2p_extra_km_price" step="0.01" min="0"
                                    placeholder="Enter amount" required>
                            </div>
                        </div>
                        <div class="row mt-2">

                            <div class="form-group col-md-6">
                                <label for="image">Image</label>
                                <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                                <img id="imagePreview" src="" alt="Category Image"
                                    style="display: none; width: 100px; margin-top: 10px;">
                            </div>
                        </div>
                        <button type="button" class="mt-3 btn btn-primary" onclick="saveCategory()">Save</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    // Search
    $('#search').on('keyup', function () {
        var searchText = $(this).val().toLowerCase();
        $('#vehicleCategoriesTable tbody tr').filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(searchText) > -1)
        });
    });
    // Open Create Modal
    function openCreateModal() {
        $('#categoryForm')[0].reset();
        $('#categoryId').val('');
        $('#modalLabel').text('Add Vehicle Category');
        $('#categoryModal').modal('show');
    }

    // Save category
    function saveCategory() {
        const id = $('#categoryId').val();
        const imageFile = $('#image')[0]?.files[0]; // Safely access the image file
        let data;
        // Check if an image file exists, use FormData if so
        if (imageFile) {
            data = new FormData();
            data.append('name', $('#name').val());
            data.append('vehicle_count', $('#vehicle_count').val());
            data.append('slug', $('#slug').val());
            data.append('suitcases', $('#suitcases').val());
            data.append('passengers', $('#passengers').val());
            data.append('type_id', $('#type_id').val());
            data.append('doors', $('#doors').val());
            data.append('transmission', $('#transmission').val());
            data.append('p2p_first_km_price', $('#p2p_first_km_price').val());
            data.append('p2p_extra_km_price', $('#p2p_extra_km_price').val());
            data.append('image', imageFile); // Append the image file
        } else {
            // Use a plain object if no image is provided
            data = {
                name: $('#name').val(),
                vehicle_count: $('#vehicle_count').val(),
                slug: $('#slug').val(),
                suitcases: $('#suitcases').val(),
                passengers: $('#passengers').val(),
                type_id: $('#type_id').val(),
                doors: $('#doors').val(),
                transmission: $('#transmission').val(),
                p2p_first_km_price: $('#p2p_first_km_price').val(),
                p2p_extra_km_price: $('#p2p_extra_km_price').val(),
            };
        }
        const config = {
            headers: {
                'Content-Type': imageFile ? 'multipart/form-data' : 'application/json'
            }
        };
        // Determine whether to create or update the category
        const request = id
            ? axios.put(`/vehicle-categories/${id}`, data, config)
            : axios.post(`/vehicle-categories`, data, config);
        request
            .then(() => {
                Notiflix.Notify.Success('Category saved successfully!');
                location.reload();
            })
            .catch(error => {
                console.error('Error saving category:', error);
                Notiflix.Notify.Failure('Failed to save category. Please try again.');
            });
    }
    // Delete category
    function deleteCategory(id) {
        if (confirm('Are you sure you want to delete this category?')) {
            axios.delete(`/vehicle-categories/${id}`)
                .then(() => location.reload())
                .catch(error => console.error(error));
        }
    }
    document.addEventListener('DOMContentLoaded', function () {
        axios.get('{{ route("vehicle-types.index") }}')
            .then(function (response) {
                let typeSelect = document.getElementById('type_id');
                typeSelect.innerHTML = '';
                typeSelect.innerHTML += '<option value="">Select a vehicle type</option>';
                response.data.forEach(function (vehicleType) {
                    typeSelect.innerHTML += `
                        <option value="${vehicleType.id}">${vehicleType.type}</option>
                    `;
                });
            })
            .catch(function (error) {
                console.error('Error fetching vehicle types:', error);
                alert('Failed to load vehicle types. Please try again.');
            });
    });

    function generateSlug() {
        const nameInput = document.getElementById("name").value;
        const slugInput = document.getElementById("slug");

        // Convert name to lowercase, replace spaces with hyphens, and remove special characters
        const slug = nameInput
            .toLowerCase()
            .trim()
            .replace(/ /g, "-")            // Replace spaces with hyphens
            .replace(/[^\w-]+/g, "");      // Remove any special characters

        slugInput.value = slug;
    }
</script>
@endsection