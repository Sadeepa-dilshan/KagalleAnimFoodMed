<!-- resources/views/admin/dashboard.blade.php -->

@extends('backoffice.layouts.master')

@section('page-title')
@include("backoffice.layouts.common.page-title", ["pagetitle" => "Dashboard", "title" => "Dashboard"])
@endsection

@section('content')
<div class="row">
    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-h-100">
            <!-- card body --> 
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Bookings</span>
                        <h4 class="mb-3">
                            <span class="counter-value" data-target="{{$monthlyBookings}}">0</span>
                        </h4>
                    </div>

                    <div class="col-6">
                        <div id="mini-chart1" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                    </div>
                </div>
                <div class="text-nowrap">
                    <!-- <span class="badge bg-success-subtle text-success">+$20.9k</span> -->
                    <span class="ms-1 text-muted font-size-13">Within this month</span>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Users</span>
                        <h4 class="mb-3">
                            <span class="counter-value" data-target="{{$totalUsers}}">0</span>
                        </h4>
                    </div>
                    <div class="col-6">
                        <div id="mini-chart2" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                    </div>
                </div>
                <div class="text-nowrap">
                    <!-- <span class="badge bg-danger-subtle text-danger">-29 Trades</span> -->
                    <span class="ms-1 text-muted font-size-13">Since launch</span>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col-->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Drivers</span>
                        <h4 class="mb-3">
                            <span class="counter-value" data-target="{{$Drivers}}">0</span>
                        </h4>
                    </div>
                    <div class="col-6">
                        <div id="mini-chart3" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                    </div>
                </div>
                <div class="text-nowrap">
                    <!-- <span class="badge bg-success-subtle text-success">+ $2.8k</span> -->
                    <span class="ms-1 text-muted font-size-13">Since launch</span>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Vehicles</span>
                        <h4 class="mb-3">
                            <span class="counter-value" data-target="{{$VehicleCategories}}">0</span>
                        </h4>
                    </div>
                    <div class="col-6">
                        <div id="mini-chart4" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                    </div>
                </div>
                <div class="text-nowrap">
                    <!-- <span class="badge bg-success-subtle text-success">+2.95%</span> -->
                    <span class="ms-1 text-muted font-size-13">Since launch</span>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row-->

<div class="row px-2">
<h4 class="card-title mb-3">Recent Bookings</h4>
    <table class="table table-bordered">
        <thead>
            <tr>

                <th>User</th>
                <th>Vehicle Category</th>
                <th>Pickup Date</th>
                <th>Pickup Time</th>
                <th>Mobile</th>

                <th>Price(Rs)</th>
               
                <th>Map Link</th>


            </tr>
        </thead>
        <tbody id="booking-table">
            @forelse ($bookings as $booking)
                <tr>

                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->vehicleCategory->name }}</td>
                    <td>{{ $booking->pickup_date }}</td>
                    <td>{{ $booking->pickup_time }}</td>
                    <td>{{ $booking->user->mobile }}</td>

                    <td>{{ $booking->price ? $booking->price : 'N/A' }}</td>
                    
                   
                    <td>
                        @if ($booking->location_link)
                            <a href="{{ $booking->location_link }}" target="_blank">View Location</a>
                        @else
                            N/A
                        @endif
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

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#submit-btn').on('click', function () {
            var formData = new FormData($('#AddCategoriesForm')[0]);

            $.ajax({
                url: '{{ url('/admin/add-categories-data') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    Notiflix.Loading.Pulse('Sending...');
                },
                success: function (response) {
                    Notiflix.Loading.Remove();
                    if (response.status == "SUCCESS") {
                        Notiflix.Notify.Success('Category Added Successfully');
                        window.location.replace("/admin/view-categories");
                    } else {
                        Notiflix.Report.Failure('Error', 'Form submission failed!', 'Try Again');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    Notiflix.Loading.Remove();
                    Notiflix.Report.Failure('Error', 'Form submission failed!', 'Try Again');
                }
            });
        });
    });
</script>
@endsection