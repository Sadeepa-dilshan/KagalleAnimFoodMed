<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation Invoice</title>
    <style type="text/css">
        body {
            font-family: 'Roboto Condensed', sans-serif;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            padding: 20px 0;
        }

        .email-wrapper {
            max-width: 650px;
            margin: 0 auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.3);
        }

        .header, .footer {
            background-color: #282834;
            color: #ffffff;
            padding: 20px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }

        .header h1, .footer p {
            margin: 0;
        }

        .header h2 {
            color: white;
            font-size: 24px;
            margin: 0;
        }

        .content {
            padding: 20px;
            font-size: 16px;
        }

        .text-bold {
            font-weight: bold;
        }

        .gray-color {
            color: #5D5D5D;
        }

        .mt-10 {
            margin-top: 10px;
        }

        .w-100 {
            width: 100%;
        }

        .table-section {
            margin-top: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #d2d2d2;
            padding: 7px 8px;
        }

        th {
            background: #f4f4f4;
            font-size: 15px;
        }

        td {
            font-size: 13px;
        }

        .total-part {
            font-size: 16px;
            line-height: 20px;
            text-align: right;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="email-wrapper">
        <!-- Header Section -->
        <div class="header">
            <h2>Booking Confirmation</h2>
            <p>Thank you for your booking, {{ $bookingData['name'] }}</p>
        </div>

        <!-- Booking Details Section -->
        <div class="content">
            <p class="text-bold mt-10">
                Booking ID - <span class="gray-color">
                    {{ str_pad($bookingData['booking_id'], 5, '0', STR_PAD_LEFT) }}
                </span>
            </p>            
            <p class="text-bold">Vehicle - <span class="gray-color">{{ $bookingData['vehicle'] }}</span></p>
            <p class="text-bold">Pickup Date - <span class="gray-color">{{ $bookingData['pickup_date'] }}</span></p>
            <p class="text-bold">Pickup Time - <span class="gray-color">{{ $bookingData['pickup_time'] }}</span></p>
            @if ($bookingData['trip_type'] == "return")
                <p class="text-bold">Return Date - <span class="gray-color">{{ $bookingData['return_date'] }}</span></p>
                <p class="text-bold">Return Time - <span class="gray-color">{{ $bookingData['return_time'] }}</span></p>
            @endif
        </div>

        <!-- Pickup and Dropoff Locations Section -->
        <div class="table-section">
            <table>
                <tr>
                    <th>Pickup Location</th>
                    <th>Dropoff Location</th>
                </tr>
                <tr>
                    <td>
                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($bookingData['pickup_coordinates']) }}"
                           style="color: #1a73e8; text-decoration: none;" target="_blank">View in Map</a>
                    </td>
                    <td>
                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($bookingData['dropoff_coordinates']) }}"
                           style="color: #1a73e8; text-decoration: none;" target="_blank">View in Map</a>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Pricing Section -->
        <div class="table-section">
            <table>
                <tr>
                    <th>Distance</th>
                    <th>Price</th>
                </tr>
                <tr align="center">
                    <td>{{ $bookingData['distance_km'] }} Kms</td>
                    <td>{{ $currencySymbol . number_format($bookingData['price'], 2) }}</td>
                </tr>
            </table>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p>Need help? Call us at 1-978-8767</p>
            <p><a href="{{ url('login') }}" style="color: #ffffff; text-decoration: underline;">Log into your account</a></p>
        </div>
    </div>
</div>

</body>
</html>
