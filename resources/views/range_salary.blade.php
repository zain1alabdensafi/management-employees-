<!DOCTYPE html>
<html>
<head>
    <title>Range Salary</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000000ad;
            background-size: cover;
        }
        h1 {
            color: #00f50c;
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
    <h1>Range Salary</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Salary</th>
            <th>Salary Compared to Range</th>
            <th>Department</th>
        </tr>
        @foreach ($employees as $employee)
        <tr>
            <td>{{ $employee->first_name }}</td>
            <td>{{ $employee->salary }}</td>
            <td>{{ $employee->salary_compared_to_range }}</td>
            <td>{{ $employee->department_name }}</td
        </tr>
        @endforeach
    </table>
    
    {{-- <form method="get" action="{{ route('exportPDF', ['viewName' => 'range_salary', 'data' => $employees]) }}">
        <button type="submit">تحميل PDF</button>
    </form> --}}
    
    
</body>
</html>
