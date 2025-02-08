@extends('front.layouts.master')

@section('content')
<div class="container mt-5 mb-5">

    <!-- Hidden input fields for coordinates -->
    <input type="hidden" id="pick" value="{{ $pickupCoordinates }}">
    <input type="hidden" id="off" value="{{ $dropoffCoordinates }}">

    <form id="bookingForm">
        @csrf
        <div class="row">
            <!-- Left Column (6 cols): Form Details -->
            <div class="col-md-6 order-2 order-md-1">
                <div class="row">
                    <div class="col-6 ">
                        <img src="{{url($vehicle->image)}}" style="width:150px;" alt="">
                    </div>
                    @php
                        $vehiclePrices = session('vehicle_prices', []);
                        $price = $vehiclePrices[$vehicle->id] ?? 'Price not available';
                        $tripType = session(['trip_type']);

                    @endphp

                    <div style="flex-direction: column; justify-content: center;" class="col-6 d-flex ">
                        <span style="font-weight:700;">{{ $vehicle->name }}</span>
                        <span>Price: {{$currencySymbol}}{{ number_format($price, 2) }}</span>
                        <span>No Of Km: {{ implode(',', session('trip_type', ['one_way'])) == "return" ? session('no_of_km') * 2 : session('no_of_km') }} Kms</span>
                    </div>
                </div>

                <div class="row">
                    <!-- Column for User Details -->
                    <div class="col-md-12">
                        <div class="row">
                            <!-- User Name -->
                            <div class="col-md-6 form-group">
                                <label for="name" class="small">Name</label>
                                <input type="text" id="name" name="name" class="form-control form-control-sm"
                                    value="{{ $user->name }}" readonly>
                            </div>

                            <!-- User Email -->
                            <div class="col-md-6 form-group">
                                <label for="email" class="small">Email</label>
                                <input type="email" id="email" name="email" class="form-control form-control-sm"
                                    value="{{ $user->email }}" readonly>
                            </div>

                            <!-- Mobile -->
                            <div class="col-md-6 form-group">
                                <label for="mobile" class="small">Mobile</label>
                                <input type="text" class="form-control form-control-sm" id="mobile" name="mobile"
                                    required value="{{ old('mobile', auth()->user()->mobile ?? '') }}"
                                    placeholder="Enter your mobile number">
                            </div>

                            <!-- Vehicle Price (from session) - Hidden -->
                            @php
                                $vehiclePrices = session('vehicle_prices', []);
                                $price = $vehiclePrices[$vehicle->id] ?? 'Price not available';
                            @endphp
                            <div class="col-md-6 form-group" hidden>
                                <label for="price" class="small">Price per trip (Rs)</label>
                                <input type="hidden" id="price" name="price" class="form-control form-control-sm"
                                    value="{{ $price }}" readonly>
                            </div>
                        </div>
                    </div>

                    <!-- Column for Trip Details -->
                    <div class="col-md-12">
                        <div class="row">
                            <!-- Pickup Date -->
                            <div class="col-md-6 form-group">
                                <label for="pickup_date" class="small">Pickup Date</label>
                                <input type="text" id="pickup_date" name="pickup_date"
                                    class="form-control form-control-sm" value="{{ session('pickup_date') }}" required
                                    readonly>
                            </div>

                            <!-- Pickup Time -->
                            <div class="col-md-6 form-group">
                                <label for="pickup_time" class="small">Pickup Time</label>
                                <input type="time" id="pickup_time" name="pickup_time"
                                    class="form-control form-control-sm" value="{{ session('pickup_time') }}" required
                                    readonly>
                            </div>

                            @if (session('return_date') && session('return_time'))
                                <div class="col-md-6 form-group">
                                    <label for="return_date" class="small">Return Date</label>
                                    <input type="text" id="return_date" name="return_date"
                                        class="form-control form-control-sm" value="{{ session('return_date') }}" required
                                        readonly>

                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="return_time" class="small">Return Time</label>
                                    <input type="time" id="return_time" name="return_time"
                                        class="form-control form-control-sm" value="{{ session('return_time') }}" required
                                        readonly>
                                </div>
                            @endif

                            <!-- Booking Note -->
                            <div class="col-12 form-group">
                                <label for="note" class="small">Booking Note</label>
                                <textarea id="note" name="note" class="form-control form-control-sm"
                                    placeholder="Enter any additional notes for the booking" rows="3"></textarea>
                            </div>

                            <!-- Distance - Hidden -->
                            <div class="col-12 form-group" hidden>
                                <label for="no_of_km" class="small">No of km</label>
                                <input type="hidden" id="no_of_km" name="no_of_km" class="form-control form-control-sm"
                                    value="{{ session('no_of_km') }}" required readonly>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 text-end mt-4">
                                <button type="submit" class="btn btn-primary btn-sm">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <!-- Right Column Map and Address Details -->
            <div class="col-md-6 map-section order-1 order-md-2">
                <!-- Map Container -->
                <div id="map" style="width: 100%; height: 100%; border-radius: 10px;"></div>


            </div>
        </div>

        <!-- Pickup and Drop-off Locations -->
        <input type="hidden" id="pickloc" name="pickloc" value="{{ $pickupCoordinates }}">
        <input type="hidden" id="droploc" name="droploc" value="{{ $dropoffCoordinates }}">

        <input type="hidden" name="trip_type" id="trip_type"
            value="{{ implode(',', session('trip_type', ['one_way'])) }}">
        <input type="hidden" name="return_date" id="return_date" value="{{ session('return_date', '') }}">
        <input type="hidden" name="return_time" id="return_time" value="{{ session('return_time', '') }}">
    </form>
</div>
@endsection

@section('script')
<script>
    function initMap() {
        let pickupRaw = document.getElementById("pick").value.replace(/^"|"$/g, '');
        let dropoffRaw = document.getElementById("off").value.replace(/^"|"$/g, '');
        googleMapsLink = `https://www.google.com/maps/dir/?api=1&origin=${pickupRaw}&destination=${dropoffRaw}`;
        const [pickupLat, pickupLng] = pickupRaw.split(",").map(coord => parseFloat(coord.trim()));
        const [dropoffLat, dropoffLng] = dropoffRaw.split(",").map(coord => parseFloat(coord.trim()));

        if (isNaN(pickupLat) || isNaN(pickupLng) || isNaN(dropoffLat) || isNaN(dropoffLng)) {
            console.error("Invalid coordinates");
            return;
        }

        const map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: (pickupLat + dropoffLat) / 2,
                lng: (pickupLng + dropoffLng) / 2
            },
            zoom: 10,
            disableDefaultUI: true
        });

        const directionsService = new google.maps.DirectionsService();
        const directionsRenderer = new google.maps.DirectionsRenderer({
            map: map,
            suppressMarkers: true
        });

        directionsService.route({
            origin: {
                lat: pickupLat,
                lng: pickupLng
            },
            destination: {
                lat: dropoffLat,
                lng: dropoffLng
            },
            travelMode: google.maps.TravelMode.DRIVING
        }, (response, status) => {
            if (status === google.maps.DirectionsStatus.OK) {
                directionsRenderer.setDirections(response);
            }
        });

        const geocoder = new google.maps.Geocoder();

        const pickupInfoWindow = new google.maps.InfoWindow();
        const dropoffInfoWindow = new google.maps.InfoWindow();

        const pickupMarker = new google.maps.Marker({
            position: {
                lat: pickupLat,
                lng: pickupLng
            },
            map: map,
            title: "Pickup Location"
        });

        const dropoffMarker = new google.maps.Marker({
            position: {
                lat: dropoffLat,
                lng: dropoffLng
            },
            map: map,
            title: "Dropoff Location"
        });

        geocoder.geocode({
            location: {
                lat: pickupLat,
                lng: pickupLng
            }
        }, (results, status) => {
            if (status === "OK" && results[0]) {
                const pickupContent = results[0].formatted_address;
                pickupInfoWindow.setContent(pickupContent);
                pickupMarker.addListener("mouseover", () => pickupInfoWindow.open(map, pickupMarker));
                pickupMarker.addListener("mouseout", () => pickupInfoWindow.close());
                pickupMarker.addListener("click", () => pickupInfoWindow.open(map, pickupMarker));
            }
        });

        geocoder.geocode({
            location: {
                lat: dropoffLat,
                lng: dropoffLng
            }
        }, (results, status) => {
            if (status === "OK" && results[0]) {
                const dropoffContent = results[0].formatted_address;
                dropoffInfoWindow.setContent(dropoffContent);
                dropoffMarker.addListener("mouseover", () => dropoffInfoWindow.open(map, dropoffMarker));
                dropoffMarker.addListener("mouseout", () => dropoffInfoWindow.close());
                dropoffMarker.addListener("click", () => dropoffInfoWindow.open(map, dropoffMarker));
            }
        });
    }

    $(document).ready(function () {
        initMap();
        // Display or store the link
        $('#bookingForm').submit(function (e) {
            e.preventDefault();
            let formData = {
                name: $('#name').val(),
                email: $('#email').val(),
                pickup_date: $('#pickup_date').val(),
                trip_type: $('#trip_type').val(),
                return_date: $('#return_date').val(),
                return_time: $('#return_time').val(),
                note: $('#note').val(),
                pickup_time: $('#pickup_time').val(),
                mobile: $('#mobile').val(),
                price: $('#price').val(),
                price: $('#price').val(),
                price: $('#price').val(),
                price: $('#price').val(),
                pickloc: $('#pickloc').val(),
                droploc: $('#droploc').val(),
                no_of_km: $('#no_of_km').val(),
                link: googleMapsLink,
                _token: '{{ csrf_token() }}'
            };

            Notiflix.Loading.Standard('Processing...');

            axios.post('{{ route('booking.submit', $vehicle->id) }}', formData)
                .then(function (response) {

                    if (response.data.redirect_url) {
                        Notiflix.Loading.Remove();
                        window.location.href = response.data.redirect_url;
                    } else {
                        Notiflix.Loading.Remove();
                        Notiflix.Notify.Success('Booking successful!');
                        console.log(response.data);
                    }
                })
                .catch(function (error) {
                    Notiflix.Loading.Remove();
                    console.error(error);
                    Notiflix.Notify.Failure('Booking failed, please try again.');
                });
        });
    });
</script>
<style>
    .gm-ui-hover-effect {
        display: none !important;
    }

    @media (max-width: 767px) {
        .map-section {
            height: 500px;
        }
    }
</style>
@endsection