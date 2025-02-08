<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
     // Return the view for the drivers listing
     public function index()
     {
         return view('backoffice.drivers.index');
     }
 
     // Store a new driver
     public function store(Request $request)
     {
         $request->validate([
             'name' => 'required',
             'email' => 'required|email|unique:drivers',
             'mobile' => 'required|unique:drivers',
             'license_number' => 'required',
             'license_expiry_date' => 'required|date',
         ]);
 
         $driver = Driver::create($request->all());
         return response()->json(['success' => 'Driver added successfully.', 'driver' => $driver]);
     }
 
     // Fetch a specific driver for editing
     public function edit($id)
     {
         $driver = Driver::findOrFail($id);
         return response()->json($driver);
     }
 
     // Update a driver
     public function update(Request $request, $id)
     {
         $driver = Driver::findOrFail($id);
 
         $request->validate([
             'name' => 'required',
             'email' => 'required|email|unique:drivers,email,' . $driver->id,
             'mobile' => 'required|unique:drivers,mobile,' . $driver->id,
             'license_number' => 'required',
             'license_expiry_date' => 'required|date',
         ]);
 
         $driver->update($request->all());
         return response()->json(['success' => 'Driver updated successfully.', 'driver' => $driver]);
     }
 
     // Delete a driver
     public function destroy($id)
     {
         $driver = Driver::findOrFail($id);
         $driver->delete();
         return response()->json(['success' => 'Driver deleted successfully.']);
     }

     //search and fetch
     public function fetchDrivers(Request $request)
     {
         $search = $request->get('search');
         $columns = ['id', 'name', 'email', 'mobile', 'license_number', 'license_expiry_date'];
         if ($search) {
             $drivers = Driver::select($columns)
                              ->where('name', 'LIKE', "%{$search}%")
                              ->orWhere('email', 'LIKE', "%{$search}%")
                              ->orWhere('mobile', 'LIKE', "%{$search}%")
                              ->get();
         } else {
             $drivers = Driver::select($columns)->get();
         }
         return response()->json($drivers);
     }
}
