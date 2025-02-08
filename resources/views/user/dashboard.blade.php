@extends('front.layouts.master')

@section('content')
<div class="container py-5 min-vh-100">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
        <h1 class="display-6 mb-0">My Bookings</h1>
        </div>
        <br>
        <div class="card-body">
            <div class="table-responsive rounded-3">
                <table class="table table-hover table-striped align-middle">
                    <thead class="table-dark">
                        <tr> 
                            <th scope="col">Vehicle</th>
                            <th scope="col">Location Link</th>
                            <th scope="col">Booking Status</th>
                            <th scope="col">Option</th>
                            <th scope="col">Action</th> <!-- New Action Column -->
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bookings as $booking)
                            <tr id="booking-row-{{ $booking->id }}">
                                <td>{{ $booking->vehicleCategory->name }}</td>
                                <td>
                                    @if ($booking->location_link)
                                        <a href="{{ $booking->location_link }}" target="_blank">View Location</a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td id="status-{{ $booking->id }}">{{ $booking->booking_status }}</td>
                                <td>
                                    @if($booking->booking_status != 'cancelled')
                                        <button class="btn btn-warning btn-sm" 
                                                onclick="openCancelModal({{ $booking->id }})">
                                            Cancel Booking
                                        </button>
                                    @else
                                        <span class="text-muted">Already Cancelled</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-info btn-sm" onclick="openDetailsModal({{ $booking->id }})">
                                        See More
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">No bookings found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--  Modal for Cancel Confirmation -->
<div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h5 class="modal-title" id="cancelModalLabel">Cancel Booking</h5>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to cancel this booking?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="confirmCancelButton">Confirm Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Viewing Full Details -->
<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h5 class="modal-title" id="detailsModalLabel">Booking Details</h5>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Type:</strong> <span id="trip_type"></span></p>
                <p><strong>Pickup Date:</strong> <span id="pickupDate"></span></p>
                <p><strong>Pickup Time:</strong> <span id="pickupTime"></span></p>
                <p><strong>Return Date:</strong> <span id="returnDate"></span></p>
                <p><strong>Return Time:</strong> <span id="returnTime"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function() { 
        let bookingIdToCancel = null;
        let bookingDetails = null;

        // Open the cancel modal and store the booking ID
        window.openCancelModal = function(bookingId) {
            bookingIdToCancel = bookingId;
            $('#cancelModal').modal('show');
        };

        // Handle confirm cancel button click
        $('#confirmCancelButton').on('click', function() {
            if (bookingIdToCancel) {
                Notiflix.Loading.Standard('Processing...');
                axios.put(`/bookings/${bookingIdToCancel}/status`, { booking_status: 'cancelled' })
                    .then(response => {
                        Notiflix.Loading.Remove();
                        $('#status-' + bookingIdToCancel).text('cancelled');
                        $('#cancelModal').modal('hide');
                        Notiflix.Notify.Success('Successful!');
                        window.location.reload();
                    })
                    .catch(error => {
                        Notiflix.Loading.Remove();
                        console.error('Error cancelling booking:', error);
                        Notiflix.Notify.Failure('Failed to cancel booking. Please try again.');
                        //window.location.reload(); 
                    });
            }
        });

        // Open the "See More" modal and load booking details
        window.openDetailsModal = function(bookingId) {
            axios.get(`/booking/get/${bookingId}`)
                .then(response => {
                    bookingDetails = response.data;

                    // Populate the modal with pickup and return details
                    document.getElementById("trip_type").innerText = bookingDetails.trip_type;
                    document.getElementById("pickupDate").innerText = bookingDetails.pickup_date;
                    document.getElementById("pickupTime").innerText = bookingDetails.pickup_time;
                    document.getElementById("returnDate").innerText = bookingDetails.return_date;
                    document.getElementById("returnTime").innerText = bookingDetails.return_time;

                    $('#detailsModal').modal('show');
                })
                .catch(error => {
                    console.error('Error loading booking details:', error);
                    alert('Failed to load booking details. Please try again.');
                });
        };
    });
</script>
@endsection
