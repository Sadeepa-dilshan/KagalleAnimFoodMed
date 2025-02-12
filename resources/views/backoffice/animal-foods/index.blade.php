@extends('backoffice.layouts.master')

@section('page-title')
    @include('backoffice.layouts.common.page-title', [
        'pagetitle' => 'Dashboard',
        'title' => 'Animal-Food Management',
    ])
@endsection

@section('content')
    <div class="container">
        <h1 class="mb-4">Animal-Food Management</h1>

        <!-- Search Input -->
        <div class="d-flex gap-4">
            <input type="text" id="search" placeholder="Search by animal name" class="form-control mb-3">
        </div>

        <!-- Animal-Food Table -->
        <table id="animalFoodTable" class="table">
            <thead>
                <tr>
                    <th>Animal</th>
                    <th>Foods</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

        <!-- Assign Button -->
        <button class="btn btn-primary mb-3" id="openAssignFoodModal">Assign Foods</button>
    </div>

    <!-- Include the Assign & Edit Animal-Food Modals -->
    <x-animal-food-assign-modal />
    <x-animal-food-edit-modal />
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        $(document).ready(function() {
            let table = $('#animalFoodTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: {
                    url: "{{ route('animal-foods.index') }}",
                    type: "GET",
                    dataSrc: 'data'
                },
                columns: [{
                        data: "name"
                    },
                    {
                        data: "foods",
                        render: function(data) {
                            return data.map(food => food.name).join(', ');
                        }
                    },
                    {
                        data: "id",
                        render: function(data, type, row) {
                            let editBtn =
                                `<button class="btn btn-primary btn-sm edit-animal-food-btn" data-id="${row.id}" data-name="${row.name}">Edit</button>`;
                            let deleteBtns = row.foods.map(food =>
                               `<button class="btn btn-danger btn-sm remove-food-btn" data-id="${food.pivot.id}">Remove ${food.name}</button>`
                            ).join(' ');
                            return editBtn + " " + deleteBtns;
                        }
                    }
                ]
            });

            // Search functionality
            $('#search').on('keyup', function() {
                let query = $(this).val().toLowerCase();
                $("#animalFoodTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(query) > -1);
                });
            });

            // Open Assign Food Modal
            $("#openAssignFoodModal").click(function() {
                $("#assignFoodForm")[0].reset();
                $("#assignFoodModal").modal('show');
            });

            // Handle Assign Foods
            $("#saveAssignFood").click(function() {
                let data = {
                    animal_id: $("#assign-animal").val(),
                    food_ids: $("#assign-foods").val()
                };

                axios.post("{{ route('animal-foods.store') }}", data)
                    .then(response => {
                        alert("Foods assigned to animal successfully!");
                        $("#assignFoodModal").modal('hide');
                        table.ajax.reload();
                    })
                    .catch(error => console.error("Error assigning foods:", error));
            });

            // Open Edit Animal-Food Modal
            $(document).on('click', '.edit-animal-food-btn', function() {
                let animalId = $(this).data('id');
                let animalName = $(this).data('name');

                axios.get(`/animal-foods/${animalId}`)
                    .then(response => {
                        let foodIds = response.data.foods.map(food => food.id);
                        $("#edit-animal-id").val(animalId);
                        $("#edit-animal-name").val(animalName);
                        $("#edit-animal-foods").val(foodIds).change();
                        $("#editAnimalFoodModal").modal('show');
                    })
                    .catch(error => console.error("Error fetching animal foods:", error));
            });

            // Handle Update Animal-Food Assignment
            $("#updateAnimalFood").click(function() {
                let animalId = $("#edit-animal-id").val();
                let data = {
                    food_ids: $("#edit-animal-foods").val()
                };

                axios.put(`/animal-foods/${animalId}`, data)
                    .then(response => {
                        alert("Animal food assignment updated successfully!");
                        $("#editAnimalFoodModal").modal('hide');
                        table.ajax.reload();
                    })
                    .catch(error => console.error("Error updating animal foods:", error));
            });

            // Remove Food from Animal
            $(document).on('click', '.remove-food-btn', function() {
                let id = $(this).data('id'); // Get `id` from `animal_foods` table

                axios.delete(`/animal-foods/${id}`)
                    .then(response => {
                        alert(response.data.message);
                        $('#animalFoodTable').DataTable().ajax.reload();
                    })
                    .catch(error => console.error("Error removing food:", error));
            });
        });
    </script>
@endsection
