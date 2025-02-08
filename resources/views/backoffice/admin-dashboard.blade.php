@extends('backoffice.layouts.master')
@section('page-title')
@include('backoffice.layouts.common.page-title', ['pagetitle' => 'Dashboard', 'title' => 'Dashboard'])
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
                            <span class="counter-value">0</span>
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
                            <span class="counter-value">0</span>
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
                            <span class="counter-value">0</span>
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
                            <span class="counter-value">0</span>
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

<div class="row px-2 mt-2">
    <h4 class="card-title mb-3">Recent Bookings</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User</th>
            </tr>
        </thead>
        <tbody id="booking-table">

                <tr>

                </tr>
           
                <tr>
                    <td colspan="8" class="text-center">No bookings found</td>
                </tr>
          
        </tbody>
    </table>
</div>
@endsection
@section('scripts')

@endsection