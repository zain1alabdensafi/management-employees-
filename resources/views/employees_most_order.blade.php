<!DOCTYPE html>
<html>
<head>
    <title>Employees Most Orders</title>
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
    <h1>Employees Most Orders</h1>
    <form action="{{ route('employees_most_order') }}" method="post">
        @csrf
        <label for="start_date">From:</label><br>
        <input type="date" id="start_date" name="start_date"><br>
        <label for="end_date">To:</label><br>
        <input type="date" id="end_date" name="end_date"><br>
        <input type="submit" value="Submit">
            <form action="{{ route('exportPDF') }}" method="get">
        <button type="submit" name="export" class="btn">Export as PDF</button>
    </form>

    </form>
    <table>
        <tr>
            <th>Employee Name</th>
            <th>Number of Orders</th>
        </tr>
        @isset($employees)
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->Number_of_orders }}</td>
                </tr>
            @endforeach
        @endisset
    </table>
    
</body>
</html>
