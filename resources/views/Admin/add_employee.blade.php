<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, #f2f2f2, #2196F3);
            padding: 16px;
        }
        input[type=text], input[type=password], input[type=email], input[type=number], select {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #E0E0E0;
        }
        input[type=text]:focus, input[type=password]:focus, input[type=email]:focus, input[type=number]:focus, select:focus {
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
    <form action="/add_employee" method="post">
        @csrf
        <label for="first_name"><b>first name</b></label>
        <input type="text" placeholder="please enter first name" name="first_name" required pattern="[A-Za-z]+" title="First name should only contain letters.">

        <label for="last_name"><b>last name</b></label>
        <input type="text" placeholder="please enter last name" name="last_name" required pattern="[A-Za-z]+" title="Last name should only contain letters.">

        <label for="email"><b>email</b></label>
        <input type="email" placeholder="please enter  email" name="email" required>

        <label for="password"><b>password</b></label>
        <input type="password" placeholder="please enter password" name="password" required pattern="[A-Za-z0-9]+" title="Password should contain only letters and numbers.">

        <label for="hiredate"><b>Hire Date</b></label>
        <br><br>
        <input type="date" name="hiredate" required>
        <br><br>
        
        <label for="salary"><b>Salary</b></label>
        <input type="number" placeholder="please enter salary" name="salary" required min="0">
        
        <label for="comissions"><b>Commissions</b></label>
        <input type="number" placeholder="please enter commissions" name="comissions" required min="0">


        <label for="job_id"><b>Job ID</b></label>
        <select name="job_id" required>
            <option value="">Please select a job</option>
            @foreach (App\Models\Job::all() as $job)
                <option value="{{ $job->id }}">{{ $job->job_name }}</option>
            @endforeach
        </select>
        

<label for="department_id"><b>Department ID</b></label>
<select name="department_id" required>
    <option value="">Please select a department</option>
    @foreach (App\Models\Department::all() as $department)
        <option value="{{ $department->id }}" {{ (old('department_id', request('department_id')) == $department->id) ? 'selected' : '' }}>{{ $department->department_name }}</option>
    @endforeach
</select>



        <label for="role_id"><b>Role ID</b></label>
        <select name="role_id" required>
        <option value="">Please select a role</option>
        @foreach (App\Models\Role::all() as $role)
        <option value="{{ $role->id }}">{{ $role->type }}</option>
    @endforeach
        
        </select>

        @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <span>{{ is_array($error) ? implode(', ', $error) : $error }}</span>
            @endforeach
        </div>
    @endif
    

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif
        <button type="submit" class="btn">Add Employee</button>
    </form>
</body>
</html>
