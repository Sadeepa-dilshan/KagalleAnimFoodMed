<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Booking Notification</title>
</head>

<body style="margin: 0; padding: 0; background-color: #f4f4f4; font-family: Arial, sans-serif; color: #333;">

    <!-- Main Email Container -->
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f4f4f4; padding: 20px 0;">
        <tr>
            <td align="center">

                <!-- Inner Email Container -->
                <table width="650" cellpadding="0" cellspacing="0"
                    style="background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.3);">

                    <!-- Header Section -->
                    <tr>
                        <td align="center"
                            style="background-color: #ffb71c; color: #ffffff; padding: 20px; border-radius: 8px 8px 0 0;">
                            <h2 style="margin: 0; color:black; font-size: 24px;">New Booking Notification</h2>
                            <p style="margin: 5px 0 0; color:black; font-size: 16px;">A new booking has been made by
                                {{ $bookingData['name'] }} ({{ $bookingData['email'] }})
                            </p>
                        </td>
                    </tr>

                    <!-- Booking Details Section -->
                    <tr>
                        <td style="padding: 20px; font-size: 16px;">
                            <p><strong>Booking No : {{$bookingData['booking_id']}}</strong></p>
                            <p><strong>Vehicle:</strong>{{$bookingData['vehicle']}}</p>
                            <p><strong>Pickup Date:</strong> {{ $bookingData['pickup_date'] }}</p>
                            <p><strong>Pickup Time:</strong> {{ $bookingData['pickup_time'] }}</p>
                            @if ($bookingData['trip_type'] == "return")
                                <p><strong>Return Date:</strong> {{ $bookingData['return_date'] }}</p>
                                <p><strong>Return Time:</strong> {{ $bookingData['return_time'] }}</p>
                            @endif

                            <!-- Pickup Location with Google Maps Link -->
                            <p><strong>Pickup Location:</strong>
                                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($bookingData['pickup_coordinates']) }}"
                                    style="color: #1a73e8; text-decoration: none; font-weight: bold;" target="_blank">
                                    View in map
                                </a>
                            </p>

                            <!-- Dropoff Location with Google Maps Link -->
                            <p><strong>Dropoff Location:</strong>
                                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($bookingData['dropoff_coordinates']) }}"
                                    style="color: #1a73e8; text-decoration: none; font-weight: bold;" target="_blank">
                                    View in map
                                </a>
                            </p>
                            <p><strong>Distance:</strong> {{ $bookingData['distance_km'] }}Kms
                            <p><strong>Price:</strong> {{ $currencySymbol . number_format($bookingData['price'], 2) }}
                            </p>
                        </td>
                    </tr>

                    <!-- Footer Section -->
                    <tr>
                        <td align="center"
                            style="background-color: #282834; color: #ffffff; padding: 20px; border-radius: 0 0 8px 8px;">
                            <p style="margin: 0;">Please log in to view full booking details.</p>
                            <p style="margin: 5px 0 0;"><a href="{{url("dashboard")}}"
                                    style="color: #ffffff; text-decoration: underline;">Go to Admin Dashboard</a></p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>

</html>