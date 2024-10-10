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
    {{-- <form action="{{ route('exportPDF') }}" method="get">
        <button type="submit" name="export" class="btn">Export as PDF</button>
    </form> --}}

    
    <form action="/search_employees" method="post">
        @csrf
        <input type="text" id="search" name="name">
        <button type="submit">Search</button>
    </form>
    
    @if(isset($employee))
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Hire Date</th>
            <th>Salary</th>
            <th>Department</th>
            <th>Job</th>
            <th>Salary</th>
            <th>Comissions</th>
        </tr>
        @foreach ($employee as $emp)
        <tr>
            <td>{{ $emp->first_name }}</td>
            <td>{{ $emp->last_name }}</td>
            <td>{{ $emp->email }}</td>
            <td>{{ $emp->hiredate }}</td>
            <td>{{ $emp->salary }}</td>
            <td>{{ $emp->department_name }}</td>
            <td>{{ $emp->job_name }}</td>
            <td>{{ $emp->salary }}</td>
            <td>{{ $emp->comissions }}</td>
        </tr>
        @endforeach
    </table>
    
    @endif
</body>
</html>
