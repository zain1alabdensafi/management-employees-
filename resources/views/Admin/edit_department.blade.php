<!DOCTYPE html>
<html>
<head>
    <title>Edit Department</title>
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
   <form class="container" action="/edit_department" method="post">
    @csrf
    <label for="department_name"><b>Current Department Name</b></label>
    <input type="text" placeholder="Please Enter The Current Department Name" name="department_name" required>

    <label for="new_department_name"><b>New Department Name</b></label>
    <input type="text" placeholder="Please Enter The New Department Name" name="new_department_name" required>

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

    <button type="submit" class="btn">Update Department</button>
</form>

</body>
</html>
