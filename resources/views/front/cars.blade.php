@extends('front.layouts.master')

@section('content')
    <!-- Page Header Start -->
    <!-- Page Header End -->
    <div class="container pt-5">
        <div class="row">
            <div class="col-12 d-flex" style="align-items: center;">
                <h3>Select a Vehicle Category</h3>&nbsp;&nbsp;&nbsp;
                <a href="#" class="section-icon-btn">
                    <img style="transform: rotate(45deg);" src="{{ asset('images/arrow-white.svg') }}" alt="">
                </a>
            </div>
        </div>
    </div>

    <!-- Page Fleets Start -->
    <div class="page-fleets" style="padding-top:40px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <!-- Fleets Sidebar Start -->
                    <div class="fleets-sidebar wow fadeInUp">
                        <!-- Fleets Search Box Start -->
                        <div class="fleets-search-box">
                            <form id="fleetsForm" method="POST">
                                <div class="form-group">
                                    <h5>Filters</h5>
                                    <button type="submit" id="filter" class="section-icon-btn">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>
                        </div>
                        <!-- Fleets Search Box End -->

                        <div class="fleets-sidebar-list-box">
                            <!-- Categories Filter -->
                            <div class="fleets-sidebar-list">
                                <div class="fleets-list-title">
                                    <h3>Categories</h3>
                                </div>
                                <ul id="category-list"></ul>
                            </div>

                            <!-- Passengers Filter -->
                            <div class="fleets-sidebar-list">
                                <div class="fleets-list-title">
                                    <h3>Passengers</h3>
                                </div>
                                <input id="passenger" type="number" class="form-control">
                            </div>

                            <!-- Bags Filter -->
                            <div class="fleets-sidebar-list">
                                <div class="fleets-list-title">
                                    <h3>Bags</h3>
                                </div>
                                <input id="bag" type="number" class="form-control">
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- Fleets Sidebar End -->
                </div>

                <div class="col-lg-9">
                    <!-- Fleets Collection Box Start -->
                    <div class="fleets-collection-box">
                        <div id="vehicles" class="row">
                            @foreach ($vehicles as $vehicle)
                                <div class="col-lg-4 col-md-6">
                                    <div class="perfect-fleet-item fleets-collection-item wow fadeInUp">
                                        <div class="image-box">
                                            <img src="{{ asset($vehicle->image) }}" alt="{{ $vehicle->name }}">
                                        </div>
                                        <div class="perfect-fleet-content">
                                            <div class="perfect-fleet-title">
                                                <h3>{{ $vehicle->name }}</h3>
                                            </div>
                                            <div class="perfect-fleet-body">
                                                <ul>
                                                    <li><img src="{{ asset('images/icon-fleet-list-1.svg') }}"
                                                            alt="">{{ $vehicle->passengers }} Persons</li>
                                                    <li><img src="{{ asset('images/icon-fleet-list-2.svg') }}"
                                                            alt="">{{ $vehicle->doors }} doors</li>
                                                    <li><img src="{{ asset('images/icon-fleet-list-3.svg') }}"
                                                            alt="">{{ $vehicle->suitcases }} bags</li>
                                                    <li><img src="{{ asset('images/icon-fleet-list-4.svg') }}"
                                                            alt="">{{ ucfirst($vehicle->transmission) }}</li>
                                                </ul>
                                            </div>
                                            <div class="perfect-fleet-footer">
                                                <div class="perfect-fleet-pricing">
                                                    <h2>Rs.{{ $vehicle->price }}</h2>
                                                </div>
                                                <div class="perfect-fleet-btn">
                                                    <a href="{{ route('book.vehicle', [$vehicle->id]) }}"
                                                        class="section-icon-btn">
                                                        <img src="{{ asset('images/arrow-white.svg') }}" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @include('front.components.pagination')
                        </div>
                    </div>
                    <!-- Fleets Collection Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Fleets End -->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // Fetch categories initially
            axios.get('/fetch-vehicle-categories')
                .then(response => {
                    if (response.data.success) {
                        const categories = response.data.data;
                        const categoryList = $('#category-list');
                        categoryList.empty();

                        categories.forEach((category, index) => {
                            const listItem = `
                                <li class="form-check">
                                    <input class="form-check-input" type="checkbox" value="${category.id}" id="checkbox${index}">
                                    <label class="form-check-label" for="checkbox${index}">${category.type}</label>
                                </li>
                            `;
                            categoryList.append(listItem);
                        });
                    }
                })
                .catch(error => {
                    console.error("Error fetching categories:", error);
                });

            // Handle filter form submission
            $('#fleetsForm').on('submit', function(event) {
                event.preventDefault();

                // Gather filter values
                const filters = {
                    passenger: $('#passenger').val(),
                    bags: $('#bag').val(),
                    categories: $('#category-list input[type="checkbox"]:checked').map(function() {
                        return $(this).val();
                    }).get(),
                };

                // Send GET request with Axios
                axios.get('/filter-fleets', { params: filters })
                    .then(response => {
                        if (response.data.success) {
                            const vehicles = response.data.vehicles.data;
                            $('#vehicles').empty();

                            // Render each vehicle dynamically
                            vehicles.forEach(vehicle => {
                                const vehicleHTML = `
                                    <div class="col-lg-4 col-md-6">
                                        <div class="perfect-fleet-item fleets-collection-item wow fadeInUp">
                                            <div class="image-box">
                                                <img src="${vehicle.image}" alt="${vehicle.name}">
                                            </div>
                                            <div class="perfect-fleet-content">
                                                <div class="perfect-fleet-title">
                                                    <h3>${vehicle.name}</h3>
                                                </div>
                                                <div class="perfect-fleet-body">
                                                    <ul>
                                                        <li><img src="/images/icon-fleet-list-1.svg" alt=""> ${vehicle.passengers} Persons</li>
                                                        <li><img src="/images/icon-fleet-list-2.svg" alt=""> ${vehicle.doors} doors</li>
                                                        <li><img src="/images/icon-fleet-list-3.svg" alt=""> ${vehicle.suitcases} bags</li>
                                                        <li><img src="/images/icon-fleet-list-4.svg" alt=""> ${vehicle.transmission}</li>
                                                    </ul>
                                                </div>
                                                <div class="perfect-fleet-footer">
                                                    <div class="perfect-fleet-pricing">
                                                        <h2>Rs.${vehicle.price}</h2>
                                                    </div>
                                                    <div class="perfect-fleet-btn">
                                                        <a href="/book/vehicle/${vehicle.id}" class="section-icon-btn">
                                                            <img src="/images/arrow-white.svg" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                                $('#vehicles').append(vehicleHTML);
                            });
                        }
                    })
                    .catch(error => {
                        console.error("Error fetching filtered fleets:", error);
                    });
            });
        });
    </script>
@endsection
