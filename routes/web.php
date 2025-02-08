<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DispatcherController;
use App\Http\Controllers\VehicleCategoryController;

Route::get('/', function () {
    return view('front.index'); });
Route::get('/about', function () {
    return view('front.about'); });
Route::get('/services', function () {
    return view('front.services'); });
Route::get('/contact', function () {
    return view('front.contact'); });
Route::post('/submit-contact', [ContactController::class, 'submitContact']);

Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->role === 'admin') {
        return redirect('admin/dashboard');
    } elseif ($user->role === 'agent') {
        return redirect('agent/dashboard');
    } elseif ($user->role === 'user') {
        return redirect('dashboard/bookings');
    }

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/select-vehicle', [BookingController::class, 'select_vehicle']);
    Route::get('/show-details', [BookingController::class, 'showVehicleDetails'])->name('vehicle.details');
    Route::get('/book-vehicle/{vehicle}', [BookingController::class, 'showBookingForm'])->name('book.vehicle');
    Route::post('/booking-submit/{vehicle}', [BookingController::class, 'submitBooking'])->name('booking.submit');//Email to Admins & User on User Booking
    Route::put('/bookings/{id}/status', [BookingController::class, 'updateStatus']);//Email to Admins & User on User Status (Cancellation) Update

    //dashboard
    Route::get('/dashboard/bookings', [DashboardController::class, 'index'])->name('dashboard.bookings');
    Route::get('/booking/get/{id}', [DashboardController::class, 'getBookingByID'])->name('booking.get');

    Route::get('/booking-success', function () {
        return view('front.booking-success');
    })->name('booking.success');

});


//admin routes
Route::middleware(['auth', 'role:admin,agent'])->group(function () {
    //Drivers
    Route::get('/drivers', [DriverController::class, 'index'])->name('drivers.index');
    Route::get('/drivers/fetch', [DriverController::class, 'fetchDrivers']);
    Route::post('/drivers/store', [DriverController::class, 'store']);
    Route::get('/drivers/edit/{id}', [DriverController::class, 'edit']);
    Route::put('/drivers/update/{id}', [DriverController::class, 'update']);
    Route::delete('/drivers/destroy/{id}', [DriverController::class, 'destroy']);

    //dispatcher
    // assigning a driver to a booking
    Route::post('/dispatcher/bookings/{bookingId}/assign-driver', [DispatcherController::class, 'assignDriver'])->name('dispatcher.assignDriver');//need to add mail update to user
    Route::put('/bookings/{id}/update-status', [DispatcherController::class, 'updateStatus']);//need to add mail update to user 
    Route::put('/payment/{id}/update-payment-status', [DispatcherController::class, 'updatePaymentStatus']);
    Route::get('/bookings/status/{id}', [BookingController::class, 'statusShow']); //current status
    Route::get('/payment/pstatus/{id}', [BookingController::class, 'paymentStatusShow']); //current payment status

    //vehicles
    Route::resource('fetch-vehicle-categories', VehicleCategoryController::class);
    Route::get('/fetch-vehicle-categories', [VehicleCategoryController::class, 'fetchIndex']);
    Route::get('/vehicle-types', [VehicleCategoryController::class, 'getVehicleTypeNames'])->name('vehicle-types.index');
});

//admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    //Users
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');

    //Settings
    Route::get('/settings', [AdminController::class, 'settings']);

    //currency
    Route::put('/update-currency', [AdminController::class, 'updateCurrency']);
});

//agent routes
Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'dashboard'])->name('agent.dashboard');
});

Route::get('/filter-fleets', [BookingController::class, 'filterFleets'])->name('filter.fleets');





require __DIR__ . '/auth.php';
