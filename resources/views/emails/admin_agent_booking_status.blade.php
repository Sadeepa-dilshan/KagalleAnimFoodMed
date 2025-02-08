<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Booking Status Update Notification</title>
</head>

<body style="margin: 0; padding: 0; background-color: #f4f4f4; font-family: Arial, sans-serif; color: #333;">

    <!-- Main Container -->
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f4f4f4; padding: 20px 0;">
        <tr>
            <td align="center">

                <!-- Inner Container -->
                <table width="650" cellpadding="0" cellspacing="0"
                    style="background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.3);">

                    <!-- Header Section -->
                    <tr>
                        <td align="center"
                            style="background-color: #ffb71c; color: black; padding: 20px; border-radius: 8px 8px 0 0;">
                            <h2 style="margin: 0; font-size: 24px;">New Booking Status Update</h2>
                            <p style="margin: 5px 0 0; font-size: 16px;">A booking has been updated by
                                {{ $booking['user_name'] }} ({{ $booking['user_email'] }})</p>
                        </td>
                    </tr>

                    <!-- Booking Details Section -->
                    <tr>
                        <td style="padding: 20px; font-size: 16px;">
                            <p><strong>Booking No : {{$booking['id']}}</strong></p>
                            <p>Here are the updated details for the booking:</p>

                            <p><strong>Booking Status:</strong> {{ $booking['booking_status'] }}</p>

                            <p><strong>Vehicle:</strong>{{$booking['vehicle_name']}}</p>
                            <p><strong>Pickup Date:</strong> {{ $booking['pickup_date'] }}</p>
                            <p><strong>Pickup Time:</strong> {{ $booking['pickup_time'] }}</p>
                            @if ($booking['trip_type'] == "return")
                                <p><strong>Return Date:</strong> {{ $booking['return_date'] }}</p>
                                <p><strong>Return Time:</strong> {{ $booking['return_time'] }}</p>
                            @endif

                            <!-- Pickup Location with Google Maps Link -->
                            <p><strong>Pickup Location:</strong>
                                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($booking['pickup_coordinates']) }}"
                                    style="color: #1a73e8; text-decoration: none; font-weight: bold;" target="_blank">
                                    View in map
                                </a>
                            </p>

                            <!-- Dropoff Location with Google Maps Link -->
                            <p><strong>Dropoff Location:</strong>
                                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($booking['dropoff_coordinates']) }}"
                                    style="color: #1a73e8; text-decoration: none; font-weight: bold;" target="_blank">
                                    View in map
                                </a>
                            </p>
                            <p><strong>Distance:</strong> {{ $booking['distance_km'] }}Kms
                            <p><strong>Price:</strong> {{ $currencySymbol . number_format($booking['price'], 2) }}</p>

                            <p style="margin-top: 20px;">Please log in to the admin dashboard to view additional booking
                                details.</p>
                        </td>
                    </tr>

                    <!-- Footer Section -->
                    <tr>
                        <td align="center"
                            style="background-color: #282834; color: #ffffff; padding: 20px; border-radius: 0 0 8px 8px;">
                            <p style="margin: 0;">Need more information? <a
                                    href="https://yourwebsite.com/admin-dashboard"
                                    style="color: #ffffff; text-decoration: underline;">Go to Admin Dashboard</a></p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>

</html>