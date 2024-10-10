<!DOCTYPE html>
<html>
<head>
    <title>Add Department</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, #f2f2f2, #2196F3);
        }
        .container {
            width: 300px;
            padding: 16px;
            background-color: white;
            margin: 0 auto;
            margin-top: 100px;
            border: 1px solid #BDBDBD;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input[type=text] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #E0E0E0;
        }
        input[type=text]:focus {
            background-color: #BBDEFB;
            outline: none;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }
        .btn:hover {
            background-color: #388E3C;
        }
        .error {
            color: #f44336;
        }
        .success {
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <form class="container" action="/add_department" method="post">
        @csrf
        <label for="department_name"><b>Department name</b></label>
        <input type="text" placeholder="please enter Department name" name="department_name" required pattern="[A-Za-z]+" title="Department name should only contain letters.">

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <span>{{ $error }}</span>
                @endforeach
            </div>
        @endif

        <button type="submit" class="btn">Add Department</button>
        </form>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
                <form action="/add_employee" method="get">
                    <input type="hidden" name="department_id" value="{{ session('department_id') }}">
                    <input type="submit" value="Add Employees to this Department">
                </form>
            </div>
        @endif
</body>
</html>
