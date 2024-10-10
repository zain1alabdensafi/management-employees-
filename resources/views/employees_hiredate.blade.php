<!DOCTYPE html>
<html>
<head>
    <title>Employees Hire Date</title>
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
    <h1>Employees Hire Date</h1>
    <form action="{{ route('employees_hiredate') }}" method="post">
        @csrf
        <label for="startDate">From:</label><br>
        <input type="date" id="startDate" name="startDate"><br>
        <label for="endDate">To:</label><br>
        <input type="date" id="endDate" name="endDate"><br>
        <input type="submit" value="Submit">
    </form>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Job</th>
            <th>Salary</th>
            <th>Comissions</th>
            <th>Hire Date</th>
        </tr>
        @isset($employees)
    @foreach ($employees as $employee)
    <tr>
        <td>{{ $employee->first_name }}</td>
        <td>{{ $employee->last_name }}</td>
        <td>{{ $employee->email }}</td>
        <td>{{ $employee->department_name }}</td>
        <td>{{ $employee->job_name }}</td>
        <td>{{ $employee->salary }}</td>
        <td>{{ $employee->comissions }}</td>
        <td>{{ $employee->hiredate }}</td>
    </tr>
    @endforeach
@endisset

    </table>
    {{-- <form action="{{ route('exportPDF') }}" method="get">
        <button type="submit" name="export" class="btn">Export as PDF</button>
    </form> --}}


    @if (session('success'))
    <div class="success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="error">
        @foreach ($errors->all() as $error)
            <span>{{ $error }}</span>
        @endforeach
    </div>
@endif

</body>
</html>
