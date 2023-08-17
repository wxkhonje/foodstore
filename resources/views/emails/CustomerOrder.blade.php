<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmed</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="flex items-center justify-center min-h-screen p-5 bg-blue-100 min-w-screen">
        <div class="max-w-xl p-8 text-center text-gray-800 bg-white shadow-xl lg:max-w-3xl rounded-3xl lg:p-12">
            <h3 class="text-2xl font-bold uppercase">Thank you for choosing Foodhut, Your order has Been Successfully Received</h3>
            <div class="flex justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 text-green-400" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76" />
                </svg>
            </div>

            <div class="mt-6 text-left">
                <p class="text-lg font-medium">Order Details:</p>
                <ul class="list-disc pl-6">
                    <li>Order Number: {{ $ordernumber }}</li>
                    <li>Delivery Address: {{ $deliveryaddress }}</li>
                    <li>First Name: {{ $FirstName }}</li>
                    <li>Middle Name: {{ $MiddleName }}</li>
                    <li>Last Name: {{ $LastName }}</li>
                </ul>
            </div>

            <div class="mt-6">
                <table class="w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 bg-gray-200 font-medium">Product Name</th>
                            <th class="py-2 px-4 bg-gray-200 font-medium">Description</th>
                            <th class="py-2 px-4 bg-gray-200 font-medium">Price</th>
                            <th class="py-2 px-4 bg-gray-200 font-medium">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td class="py-2 px-4 border">{{ $product['name'] }}</td>
                            <td class="py-2 px-4 border">{{ $product['description'] }}</td>
                            <td class="py-2 px-4 border">{{ $product['price'] }}</td>
                            <td class="py-2 px-4 border">{{ $product['price'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>