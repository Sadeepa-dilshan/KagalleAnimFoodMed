@extends('front.layouts.master')

@section('content')
<div class="container d-flex align-items-center justify-content-center mt-5 mb-5">
    <div class="card shadow-lg border-0" style="max-width: 600px;">
        <div class="card-header text-white text-center py-4" style="background-color: #ffb71c;">
            <h1 class="display-5 mb-0">Booking Successful!</h1>
        </div>
        <div class="card-body text-center py-5">
            <p class="lead mb-3">Thank you for booking with us! Your trip has been successfully scheduled.</p>
            <p class="text-muted">We will notify you with further details shortly.</p>
            <div class="d-flex justify-content-center gap-3 mt-4">
                <a href="{{ route('dashboard.bookings') }}" class="btn btn-primary px-4">Go to Dashboard</a>
                <a href="/" class="btn btn-outline-secondary px-4">Home</a>
            </div>
        </div>
    </div>
</div>
@endsection
