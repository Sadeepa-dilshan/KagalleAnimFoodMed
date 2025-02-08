
@extends('backoffice.layouts.master')
@section('page-title')
    @include("backoffice.layouts.common.page-title", ["pagetitle" => "Dashboard", "title" => "Bookings Management"])     
@endsection

@section('content')
<div class="container">

    <!-- Search Input -->
    <input type="text" id="search" placeholder="Search bookings" class="form-control mb-3">

    <!-- Bookings Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>                     
                <th>User</th>
                <th>Vehicle Category</th>
                <th>Type</th>
                <th>Pickup Date</th>
                <th>Pickup Time</th>
                <th>Return Date</th>
                <th>Return Time</th>
                <th>Kms</th>
                <th>Mobile</th>
                
                <th>Price(Rs)</th>
                <th>Driver</th>
                <th>Status</th>
                <th>Payment Status</th>
                <th>Map Link</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="booking-table">
            @forelse ($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->vehicleCategory->name }}</td>
                    <td>{{ $booking->trip_type }}</td>
                    <td>{{ $booking->pickup_date }}</td>
                    <td>{{ $booking->pickup_time }}</td>
                    <td>{{ $booking->return_date }}</td>
                    <td>{{ $booking->return_time }}</td>
                    <td>{{ $booking->distance_km }}</td>
                    <td>{{ $booking->user->mobile }}</td>
                    
                    <td>{{ $booking->price ? $booking->price : 'N/A' }}</td>
                    <td>{{ $booking->driver ? $booking->driver->name : 'Not assigned' }}</td>
                    <td>{{ $booking->booking_status ? $booking->booking_status : 'N/A' }}</td>
                    <td>{{ $booking->payment_status ? $booking->payment_status : 'N/A' }}</td>
                    <td>
                        @if ($booking->location_link)
                            <a href="{{ $booking->location_link }}" target="_blank">View Location</a>
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $booking->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <div class="d-flex">
                            <button class="btn btn-primary btn-sm assign-btn me-2" data-id="{{ $booking->id }}">Assign Driver</button>
                            <button class="btn btn-success btn-sm b-status-btn me-2" data-id="{{ $booking->id }}">Booking Status</button>
                            <button class="btn btn-danger btn-sm p-status-btn" data-id="{{ $booking->id }}">Payment Status</button>
                        </div>
                    </td>                           
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No bookings found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Modal for Updating Booking Status -->
<div class="modal fade" id="bookingStatusModal" tabindex="-1" role="dialog" aria-labelledby="bookingStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingStatusModalLabel">Update Booking Status</h5>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="bookingStatusForm">
                    <input type="hidden" id="bookingId">
                    <div class="form-group">
                        <label for="bookingStatus">Booking Status</label>
                        <select id="bookingStatus" class="form-control">
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary mt-3" onclick="updateBookingStatus()">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Updating Booking Payment Status -->
<div class="modal fade" id="paymentStatusModal" tabindex="-1" role="dialog" aria-labelledby="paymentStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentStatusModalLabel">Update payment Status</h5>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="paymentStatusForm">
                    <input type="hidden" id="paymentId">
                    <div class="form-group">
                        <label for="paymentStatus">payment Status</label>
                        <select id="paymentStatus" class="form-control">
                            <option value="paid">Paid</option>
                            <option value="unpaid">Unpaid</option>
                            <option value="refunded">Refunded</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary mt-3" onclick="updatePaymentStatus()">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Assign Driver Modal -->
<div id="assignDriverModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="assignDriverForm">
                <div class="modal-header">
                    <h5 class="modal-title">Assign Driver</h5>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="booking-id">
                    <div class="form-group">
                        <label for="driver-select">Select Driver</label>
                        <select id="driver-select" class="form-control" required>
                            <!-- Driver options will be dynamically loaded here -->
                        </select>
                    </div>
                </div>
                <div class="modal-footer">                  
                    <button type="submit" class="btn btn-primary">Assign Driver</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        // Open modal and load drivers when clicking Assign button
        $(document).on('click', '.assign-btn', function () {
            const bookingId = $(this).data('id');
            $('#booking-id').val(bookingId);

            // Load available drivers into the select dropdown
            axios.get('/drivers/fetch')
                .then(response => {
                    const drivers = response.data;                    
                    if (!Array.isArray(drivers)) {
                        console.error('Expected an array of drivers');
                        return;
                    }
                    let options = '<option value="">Select Driver</option>';
                    drivers.forEach(driver => {
                        options += `<option value="${driver.id}">${driver.name}</option>`;
                    });
                    $('#driver-select').html(options);
                    $('#assignDriverModal').modal('show');
                })
                .catch(error => {
                    console.error('Error loading drivers:', error);
                });
        });
        // Assign driver to a booking via form submission
        $('#assignDriverForm').on('submit', function (e) {
            e.preventDefault();
            const bookingId = $('#booking-id').val();
            const driverId = $('#driver-select').val();

            if (!driverId) {
                alert('Please select a driver.');
                return;
            }

            axios.post(`/dispatcher/bookings/${bookingId}/assign-driver`, { driver_id: driverId })
                .then(response => {
                    $('#assignDriverModal').modal('hide');
                    Notiflix.Notify.Success(response.data.message);
                    location.reload();
                })
                .catch(error => console.error('Error assigning driver:', error));
        });
        // Search functionality to filter bookings
        $('#search').on('keyup', function () {
            const query = $(this).val().toLowerCase();
            $('#booking-table tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(query) > -1);
            });
        });

        $(document).on('click', '.b-status-btn', function() {
        const bookingId = $(this).data('id');
        
        // Fetch current booking status
        axios.get(`/bookings/status/${bookingId}`)
            .then(response => {
                const booking = response.data;
                $('#bookingId').val(booking.id); // Set booking ID in hidden input
                $('#bookingStatus').val(booking.booking_status); // Set current status in select
                $('#bookingStatusModal').modal('show');
            })
            .catch(error => {
                console.error("Error fetching booking details:", error);
                alert("Error fetching booking details");
            });
    });
    
        $(document).on('click', '.p-status-btn', function() {
        const bookingId = $(this).data('id');
        // Fetch current payment status
        axios.get(`/payment/pstatus/${bookingId}`)
            .then(response => {
                const booking = response.data;
                $('#paymentId').val(booking.id); // Set booking ID in hidden input
                $('#paymentStatus').val(booking.booking_status); // Set current status in select
                $('#paymentStatusModal').modal('show');
            })
            .catch(error => {
                console.error("Error fetching booking  details:", error);
                alert("Error fetching booking details");
            });
    });

    // Update booking status when form is submitted
    window.updateBookingStatus = function() {
        const bookingId = $('#bookingId').val();
        const newStatus = $('#bookingStatus').val();

        axios.put(`/bookings/${bookingId}/update-status`, {
            booking_status: newStatus
        })
        .then(response => {
            $('#bookingStatusModal').modal('hide'); 
            Notiflix.Notify.Success('Booking status updated successfully!');
            location.reload();
        })
        .catch(error => {
            console.error("Error updating booking status:", error);
            Notiflix.Notify.Success('Failed to update booking status');
        });
    }

    // Update booking status when form is submitted
    window.updatePaymentStatus = function() {
        const paymentId = $('#paymentId').val();
        const newStatus = $('#paymentStatus').val();

        axios.put(`/payment/${paymentId}/update-payment-status`, {
            payment_status: newStatus
        })
        .then(response => {
            $('#paymentStatusModal').modal('hide'); 
            Notiflix.Notify.Success('payment status updated successfully!');
            location.reload();
        })
        .catch(error => {
            console.error("Error updating payment status:", error);
            Notiflix.Notify.Success('Failed to update payment status');
        });
    }
    });
</script>
@endsection