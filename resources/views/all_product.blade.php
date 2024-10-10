<!DOCTYPE html>
<html>
<head>
    <title>All products</title>
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
    <h1>All products</h1>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Quantity</th>
        </tr>
        @foreach ($product as $products)
        <tr>
            <td>{{ $products->product_name }}</td>
            <td>{{ $products->quantity }}</td>
            
            <!-- Add more fields as needed -->
        </tr>
        @endforeach
    </table>
    {{-- <form action="{{ route('exportPDF') }}" method="get">
        <button type="submit" name="export" class="btn">Export as PDF</button>
    </form> --}}

</body>
</html>
