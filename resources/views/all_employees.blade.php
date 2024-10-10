<!DOCTYPE html>
<html>
<head>
    <title>All Employees</title>
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
    <h1>All Employees</h1>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Job</th>
            <th>Department</th>
            <th>Hire Date</th>
            <th>Email</th>
            <th>Salary</th>
            <!-- Add more columns as needed -->
        </tr>
        @foreach ($employees as $employee)
        <tr>
            <td>{{ $employee->first_name }}</td>
            <td>{{ $employee->last_name }}</td>
            <td>{{ $employee->job_name }}</td>
            <td>{{ $employee->department_name }}</td>
            <td>{{ $employee->hiredate }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->salary }}</td>
            <!-- Add more fields as needed -->
        </tr>
        @endforeach
    </table>
    {{-- <form action="{{ route('exportPDF') }}" method="get">
        <button type="submit" name="export" class="btn">Export as PDF</button>
    </form> --}}

</body>
</html>
