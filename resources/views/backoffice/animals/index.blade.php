@extends('backoffice.layouts.master')

@section('page-title')
    @include("backoffice.layouts.common.page-title", ["pagetitle" => "Dashboard", "title" => "Animal Management"])
@endsection

@section('content')
<div class="container">
    <h1 class="mb-4">Animal Management</h1>
    <!-- Add Animal Button -->
    <button class="btn btn-success mb-3" id="openAddAnimalModal">Add Animal</button>
    <table id="animalTable" class="table display">
        <thead>
            <tr>
                <th>Name</th>
                <th>Species</th>
                <th>Breed</th>
                <th>Age Group</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<!-- Include the Animal Edit Modal Component -->
<x-animal-edit-modal />
<!-- Include the Add Animal Modal Component -->
<x-animal-modal />

@endsection

@section('scripts')
<!-- DataTables & jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function () {
    let table = $('#animalTable').DataTable({
        processing: true,
        serverSide: false, // Set to false since Axios is fetching data
        ajax: {
            url: "{{ route('animals.index') }}",
            type: "GET",
            dataSrc: 'data',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Accept', 'application/json'); // Ensure JSON response
            }
        },
        columns: [
            { data: "name" },
            { data: "species" },
            { data: "breed" },
            { data: "age_group" },
            {
                data: "id",
                render: function (data, type, row) {
                    return `
                        <button class="btn btn-primary btn-sm edit-btn" data-id="${data}">Edit</button>
                        <button class="btn btn-danger btn-sm delete-btn" data-id="${data}">Delete</button>
                    `;
                }
            }
        ]
    });

   // Open Add Animal Modal
   $("#openAddAnimalModal").click(function () {
        $("#addAnimalForm")[0].reset();
        $("#addAnimalModal").modal('show');
    });

     // Handle Save New Animal
     $("#saveNewAnimal").click(function () {
        let data = {
            name: $("#add-name").val(),
            species: $("#add-species").val(),
            breed: $("#add-breed").val(),
            age_group: $("#add-age-group").val(),
        };

        axios.post("/animals", data)
            .then(response => {
                alert("Animal added successfully!");
                $("#addAnimalModal").modal('hide');
                table.ajax.reload();
            })
            .catch(error => console.error("Error adding animal:", error));
    });

    // Open Edit Modal & Load Data
    $(document).on('click', '.edit-btn', function () {
        let id = $(this).data('id');
        axios.get(`/animals/${id}`)
            .then(response => {
                let animal = response.data;
                $("#edit-animal-id").val(animal.id);
                $("#edit-name").val(animal.name);
                $("#edit-species").val(animal.species);
                $("#edit-breed").val(animal.breed);
                $("#edit-age-group").val(animal.age_group);
                $("#editAnimalModal").modal('show');
            })
            .catch(error => console.error("Error fetching animal:", error));
    });

    // Handle Save Changes
    $("#saveAnimalChanges").click(function () {
        let id = $("#edit-animal-id").val();
        let data = {
            name: $("#edit-name").val(),
            species: $("#edit-species").val(),
            breed: $("#edit-breed").val(),
            age_group: $("#edit-age-group").val(),
            _method: 'PUT'
        };

        axios.post(`/animals/${id}`, data)
            .then(response => {
                alert("Animal updated successfully!");
                $("#editAnimalModal").modal('hide');
                table.ajax.reload(null, false); 
            })
            .catch(error => console.error("Error updating animal:", error));
    });

    

    // Handle Delete
    $(document).on('click', '.delete-btn', function () {
        let id = $(this).data('id');
        if (confirm("Are you sure you want to delete this animal?")) {
            axios.delete(`/animals/${id}`)
                .then(response => {
                    alert("Animal deleted successfully!");
                    table.ajax.reload(null, false);  // Reload DataTable
                })
                .catch(error => console.error("Error deleting animal:", error));
        }
    });
});
</script>
@endsection
