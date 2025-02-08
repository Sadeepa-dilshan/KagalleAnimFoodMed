@extends('backoffice.layouts.master')

@section('page-title')
    @include("backoffice.layouts.common.page-title", ["pagetitle" => "Dashboard", "title" => "Drivers Management"])
@endsection


@section('content')
<div class="container">

    <!-- Search Input Field -->
    <input type="text" id="searchDriver" class="form-control mb-3" placeholder="Search drivers by name, email, or mobile">

    <!-- Add Driver Button -->
    <button type="button" class="btn btn-primary mb-3" id="addDriverBtn">Add Driver</button>

    <!-- Table for displaying drivers -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>License Number</th>
                <th>License Expiry Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="driversTable">
            <!-- AJAX will populate this -->
        </tbody>
    </table>
</div>

<!-- Add/Edit Driver Modal -->
<div class="modal fade" id="driverModal" tabindex="-1" role="dialog" aria-labelledby="driverModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="driverModalLabel">Add Driver</h5>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="driverForm">
                    @csrf
                    <input type="hidden" id="driver_id">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" required>
                    </div>
                    <div class="form-group">
                        <label for="license_number">License Number</label>
                        <input type="text" class="form-control" id="license_number" name="license_number" required>
                    </div>
                    <div class="form-group">
                        <label for="license_expiry_date">License Expiry Date</label>
                        <input type="date" class="form-control" id="license_expiry_date" name="license_expiry_date" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3" id="saveBtn">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')
    <script>
$(document).ready(function() {
    // Fetch and display all drivers 
    fetchDrivers();
    // Listen for changes in the search input field and fetch filtered results
    $('#searchDriver').on('keyup', function() {
        const searchQuery = $(this).val();
        fetchDrivers(searchQuery);
    });

    // fetch drivers (with or without a search)
    function fetchDrivers(search = '') {
        axios.get('/drivers/fetch', {
            params: {
                search: search
            }
        }).then(function(response) {
            let drivers = response.data;
            let tableBody = '';
            drivers.forEach(driver => {
                tableBody += `
                    <tr>
                        <td>${driver.id}</td>
                        <td>${driver.name}</td>
                        <td>${driver.email}</td>
                        <td>${driver.mobile}</td>
                        <td>${driver.license_number}</td>
                        <td>${driver.license_expiry_date}</td>
                        <td>
                            <button class="btn btn-primary btn-sm editBtn" data-id="${driver.id}">Edit</button>
                            <button class="btn btn-danger btn-sm deleteBtn" data-id="${driver.id}">Delete</button>
                        </td>
                    </tr>
                `;
            });
            $('#driversTable').html(tableBody);
        });
    }
    // Show Add Driver Modal
    $('#addDriverBtn').click(function() {
        $('#driverModalLabel').text('Add Driver');
        $('#driverForm')[0].reset();
        $('#driver_id').val('');
        $('#driverModal').modal('show');
    });
    // Handle form submit (Add/Edit driver)
    $('#driverForm').submit(function(event) {
        event.preventDefault();
        
        let driverId = $('#driver_id').val();
        let url = driverId ? `/drivers/update/${driverId}` : '/drivers/store';
        let method = driverId ? 'put' : 'post';

        axios[method](url, {
            name: $('#name').val(),
            email: $('#email').val(),
            mobile: $('#mobile').val(),
            license_number: $('#license_number').val(),
            license_expiry_date: $('#license_expiry_date').val()
        })
        .then(function(response) {
            $('#driverModal').modal('hide');
            fetchDrivers();  
            if (driverId) {
                Notiflix.Notify.Success('Driver updated successfully');
            } else {
                Notiflix.Notify.Success('Driver added successfully');
            }
        })
        .catch(function(error) {
            console.log(error.response.data);
            alert('An error occurred while saving the driver.');
        });
    });
    // Edit Driver - populate the form with data
    $(document).on('click', '.editBtn', function() {
        let id = $(this).data('id');
        axios.get(`/drivers/edit/${id}`).then(function(response) {
            let driver = response.data;
            $('#driverModalLabel').text('Edit Driver');
            $('#driver_id').val(driver.id);
            $('#name').val(driver.name);
            $('#email').val(driver.email);
            $('#mobile').val(driver.mobile);
            $('#license_number').val(driver.license_number);
            $('#license_expiry_date').val(driver.license_expiry_date);
            $('#driverModal').modal('show');
        }).catch(function(error) {
            console.log(error.response.data);
            alert('An error occurred while fetching the driver data.');
        });
    });
    // Delete Driver
    $(document).on('click', '.deleteBtn', function() {
        let id = $(this).data('id');
        if(confirm('Are you sure you want to delete this driver?')) {
            axios.delete(`/drivers/destroy/${id}`).then(function(response) {
                fetchDrivers();  // Refresh the table after deletion
                alert('Driver deleted successfully');
            }).catch(function(error) {
                console.log(error.response.data);
                alert('An error occurred while deleting the driver.');
            });
        }
    });
});
</script>
@endsection



