@extends('backoffice.layouts.master')

@section('page-title')
    @include("backoffice.layouts.common.page-title", ["pagetitle" => "Dashboard", "title" => "Food Management"])
@endsection

@section('content')
<div class="container">
    <h1 class="mb-4">Food Management</h1>

    <!-- Search Input -->
    <div class="d-flex gap-4">
        <input type="text" id="search" placeholder="Search by name" class="form-control mb-3">
    </div>

    <!-- Foods Table -->
    <table id="foodTable" class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <!-- Create Button -->
    <button class="btn btn-primary mb-3" id="openAddFoodModal">Create New Food</button>
</div>

<!-- Include the Add & Edit Food Modals -->
<x-food-add-modal />
<x-food-edit-modal />

@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
$(document).ready(function () {
    let table = $('#foodTable').DataTable({
        processing: true,
        serverSide: false,
        ajax: {
            url: "{{ route('foods.index') }}",
            type: "GET",
            dataSrc: 'data'
        },
        columns: [
            { data: "name" },
            { 
                data: "category", 
                render: function (data) { 
                    return data ? data.name : "No Category"; 
                }
            },
            {
                data: "id",
                render: function (data) {
                    return `
                        <button class="btn btn-primary btn-sm edit-btn" data-id="${data}">Edit</button>
                        <button class="btn btn-danger btn-sm delete-btn" data-id="${data}">Delete</button>
                    `;
                }
            }
        ]
    });

    // Search functionality
    $('#search').on('keyup', function () {
        let query = $(this).val().toLowerCase();
        $("#foodTable tbody tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(query) > -1);
        });
    });

    // Open Add Food Modal
    $("#openAddFoodModal").click(function () {
        $("#addFoodForm")[0].reset();
        $("#addFoodModal").modal('show');
    });

    // Handle Save New Food
    $("#saveNewFood").click(function () {
        let data = {
            name: $("#add-food-name").val(),
            food_category_id: $("#add-food-category").val()
        };

        axios.post("/foods", data)
            .then(response => {
                alert("Food added successfully!");
                $("#addFoodModal").modal('hide');
                table.ajax.reload();
            })
            .catch(error => console.error("Error adding food:", error));
    });

    // Open Edit Food Modal
    $(document).on('click', '.edit-btn', function () {
        let id = $(this).data('id');
        axios.get(`/foods/${id}`)
            .then(response => {
                let food = response.data;
                $("#edit-food-id").val(food.id);
                $("#edit-food-name").val(food.name);
                $("#edit-food-category").val(food.food_category_id);
                $("#editFoodModal").modal('show');
            });
    });

    // Handle Update Food
    $("#updateFood").click(function () {
        let id = $("#edit-food-id").val();
        let data = {
            name: $("#edit-food-name").val(),
            food_category_id: $("#edit-food-category").val()
        };

        axios.put(`/foods/${id}`, data)
            .then(response => {
                alert("Food updated successfully!");
                $("#editFoodModal").modal('hide');
                table.ajax.reload();
            })
            .catch(error => console.error("Error updating food:", error));
    });

    // Handle Delete
    $(document).on('click', '.delete-btn', function () {
        let id = $(this).data('id');
        axios.delete(`/foods/${id}`)
            .then(response => {
                alert("Food deleted successfully!");
                table.ajax.reload();
            });
    });
});
</script>
@endsection
