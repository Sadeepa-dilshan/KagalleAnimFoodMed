<!-- resources/views/admin/dashboard.blade.php -->

@extends('backoffice.layouts.master')

@section('page-title')
    @include("backoffice.layouts.common.page-title", ["pagetitle" => "Dashboard", "title" => "Categories"])
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Categories</h4>
                    <p class="card-title-desc">Add your categories you want for any type</p>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <form id="AddCategoriesForm" action="">
                            @csrf
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-text-input" class="form-label">Name</label>
                                        <input class="form-control" name="name" type="text" id="example-text-input">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-url-input" class="form-label">Slug</label>
                                        <input class="form-control" name="slug" type="url" id="example-url-input">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-url-input" class="form-label">Type</label>
                                        <select class="form-control" name="vehicle_type" id="type-select">
                                            @foreach($vehicleTypes as $type)
                                                <option value="{{ $type->id }}">{{ $type->type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-number-input" class="form-label">Vehicle Count</label>
                                        <input class="form-control" name="vehicle_count" type="number" id="example-number-input">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-number-input" class="form-label">Passenger Count</label>
                                        <input class="form-control" name="passenger_count" type="number" id="example-number-input">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-number-input" class="form-label">Suitcase Count</label>
                                        <input class="form-control" name="suitcase_count" type="number" id="example-number-input">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-number-input" class="form-label">Hand Luggage Count</label>
                                        <input class="form-control" name="hand_luggage_count" type="number" id="example-number-input">
                                    </div>
                                  
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-number-input" class="form-label">Doors Count</label>
                                        <input class="form-control" name="door_count" type="number" id="example-number-input">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-number-input" class="form-label">Seats Count</label>
                                        <input class="form-control" name="seats_count" type="number" id="example-number-input">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-number-input" class="form-label">Air Conditioned</label>
                                        <select class="form-control" name="air-conditioned" id="transmission">
                                            <option value="Air Conditioned">Air Conditioned</option>
                                            <option value="Non-Air Conditioned">Non-Air Conditioned</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-number-input" class="form-label">Transmission</label>
                                        <select class="form-control" name="transmission" id="transmission">
                                            <option value="Automatic">Automatic</option>
                                            <option value="Manual">Manual</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-number-input" class="form-label">Fuel Type</label>
                                        <select class="form-control" name="fuel" id="transmission">
                                            <option value="Petrol">Petrol</option>
                                            <option value="Diesel">Diesel</option>
                                            <option value="Electric">Electric</option>
                                        </select>
                                    </div>
                                    <hr class="mt-3 mb-3">
                                    <label class="mb-4" for="">Arrival Transfer Section</label>
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-number-input" class="form-label">1st {{$systemSettings->where('item_name', 'DefinedFirstKm')->first()->value ?? 0}} KM Price</label>
                                        <input class="form-control" name="arrival_first_km_price" type="number" id="example-number-input">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-number-input" class="form-label">Next {{$systemSettings->where('item_name', 'DefinedSecondKm')->first()->value ?? 0}} KM Price</label>
                                        <input class="form-control" name="arrival_second_km_price" type="number" id="example-number-input">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-number-input" class="form-label">Extra KM Price</label>
                                        <input class="form-control" name="arrival_extra_km_price" type="number" id="example-number-input">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-number-input" class="form-label">Flat Rate</label>
                                        <input class="form-control" name="arrival_flat_Rate" type="number" id="example-number-input">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-number-input" class="form-label">Displaying Extra KM Price</label>
                                        <input class="form-control" name="arrival_display_extra_km_price" type="number" id="example-number-input">
                                    </div>
                                    <hr class="mt-3 mb-3">
                                    <label class="mb-4" for="">Departure Transfer Section</label>
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-number-input" class="form-label">1st {{$systemSettings->where('item_name', 'DefinedFirstKm')->first()->value ?? 0}} KM Price</label>
                                        <input class="form-control" name="departure_first_km_price" type="number" id="example-number-input">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-number-input" class="form-label">Next {{$systemSettings->where('item_name', 'DefinedSecondKm')->first()->value ?? 0}} KM Price</label>
                                        <input class="form-control" name="departure_second_km_price" type="number" id="example-number-input">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-number-input" class="form-label">Extra KM Price</label>
                                        <input class="form-control" name="departure_extra_km_price" type="number" id="example-number-input">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-number-input" class="form-label">Flat Rate</label>
                                        <input class="form-control" name="departure_flat_Rate" type="number" id="example-number-input">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-number-input" class="form-label">Displaying Extra KM Price</label>
                                        <input class="form-control" name="departure_display_extra_km_price" type="number" id="example-number-input">
                                    </div>

                                    <hr class="mt-3 mb-3">
                                    <label class="mb-4" for="">Point to Point Transfer Section</label>
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-number-input" class="form-label">1st {{$systemSettings->where('item_name', 'DefinedFirstKm')->first()->value ?? 0}} KM Price</label>
                                        <input class="form-control" name="p2p_first_km_price" type="number" id="example-number-input">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-number-input" class="form-label">Next {{$systemSettings->where('item_name', 'DefinedSecondKm')->first()->value ?? 0}} KM Price</label>
                                        <input class="form-control" name="p2p_second_km_price" type="number" id="example-number-input">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-number-input" class="form-label">Extra KM Price</label>
                                        <input class="form-control" name="p2p_extra_km_price" type="number" id="example-number-input">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-number-input" class="form-label">Flat Rate</label>
                                        <input class="form-control" name="p2p_flat_Rate" type="number" id="example-number-input">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="example-number-input" class="form-label">Displaying Extra KM Price</label>
                                        <input class="form-control" name="p2p_display_extra_km_price" type="number" id="example-number-input">
                                    </div>

                                    <hr class="mt-3 mb-5">

                                    <div class="col-lg-6 mb-3">
                                        <label for="example-number-input" class="form-label">Image</label>
                                        <input name="image" type="file" class="dropify" data-height="100" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button type="button" id="submit-btn" class="btn btn-secondary">Submit</button>
                                        <div class="vr"></div>
                                        <button type="reset" class="btn btn-outline-danger">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#submit-btn').on('click', function() {
                var formData = new FormData($('#AddCategoriesForm')[0]);

                $.ajax({
                    url: '{{ url('/admin/add-categories-data') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        Notiflix.Loading.Pulse('Sending...');
                    },
                    success: function(response) {
                        Notiflix.Loading.Remove();
                        if (response.status == "SUCCESS") {
                            Notiflix.Notify.Success('Category Added Successfully');
                            window.location.replace("/admin/view-categories");
                        } else {
                            Notiflix.Report.Failure('Error', 'Form submission failed!', 'Try Again');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Notiflix.Loading.Remove();
                        Notiflix.Report.Failure('Error', 'Form submission failed!', 'Try Again');
                    }
                });
            });
        });
    </script>
@endsection
