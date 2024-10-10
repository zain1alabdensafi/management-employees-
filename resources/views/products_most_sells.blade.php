<!DOCTYPE html>
<html>
<head>
    <title>Product Most Sells</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.8);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Product Most Sells</h1>
    <form action="{{ route('products_most_sells') }}" method="post">
        @csrf
        <label for="startDate">From:</label><br>
        <input type="date" id="startDate" name="startDate"><br>
        <label for="endDate">To:</label><br>
        <input type="date" id="endDate" name="endDate"><br>
        <input type="submit" value="Submit">
    </form>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Selling Category</th>
        </tr>
        @isset($products)
    @foreach ($products as $product)
    <tr>
        <td>{{ $product->product_name }}</td>
        <td>{{ $product->quantity }}</td>
        <td>{{ $product->selling_category }}</td>
    </tr>
    {{-- <form action="{{ route('exportPDF') }}" method="get">
        <button type="submit" name="export" class="btn">Export as PDF</button>
    </form> --}}



    @endforeach
@endisset

    </table>
</body>
</html>
