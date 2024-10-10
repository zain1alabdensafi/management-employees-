<!DOCTYPE html>
<html>
<head>
    <title>Home</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: url('/s.jpg') no-repeat center center fixed; 
            background-size: cover;
        }
        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }
        .sidebar a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }
        .sidebar a:hover {
            color: #f1f1f1;
        }
        .sidebar .btn {
            text-align: center;
            margin-top: 50px;
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 80%;
            opacity: 0.9;
        }
        .sidebar .btn:hover {
            opacity: 1;
        }
        .main {
            transition: margin-left .5s;
            padding: 16px;
        }
        .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            margin: 10px 2px;
            opacity: 0.8;
            position: absolute;
            top: 20px;
            left: 20px;
            transition: 0.3s;
        }
        .openbtn:hover {
            background-color: #444;
            color: white;
        }
        .logout-btn {
            position: fixed;
            right: 20px;
            bottom: 20px;
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            opacity: 0.8;
            transition: 0.3s;
        }
        .logout-btn:hover {
            background-color: #444;
            color: white;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            padding: 12px 16px;
            z-index: 1;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        
        <div class="dropdown">
            <button class="btn">Employees</button>
            <div class="dropdown-content">
                <a href="/add_employee">Add </a>
                <a href="/all_employees">All </a>
                <a href="/edit_employee">Edit </a>
                <a href="/delete_employee">Delete </a>
                <a href="/search_employees">Search </a>
                <a href="/employees_hiredate">Hire Date </a>
                <a href="/range_salary"> Range Salary </a>
                <a href="/employees_most_order">Most Order </a>
                <a href="{{ route('exportPDF') }}" class="btn">Export as PDF</a>

            </div>
        </div>

        <div class="dropdown">
            <button class="btn">Departments</button>
            <div class="dropdown-content">
                <a href="/add_department">Add</a>
                <a href="/edit_department">Edit </a>
                <a href="/all_departments">All </a>
                <a href="/delete_department">Delete </a>
            </div>
        </div>
        <div class="dropdown">
            <button class="btn">Products</button>
            <div class="dropdown-content">
                 <a href="/add_product">Add</a>
                <a href="/edit_product">Edit </a>
                <a href="/all_product">All </a>
                <a href="/products_most_sells">Most Sells</a>
                <a href="/delete_product">Delete </a>
            </div>
        </div>

    </div>
    
    <div id="main">
        <button class="openbtn" onclick="openNav()">☰ Menu</button>  
    </div>
    <button class="logout-btn" onclick="logout()">Logout</button>
    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }
        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft= "0";
        }
      
        function logout() {
            // Redirect the user to /logout
            window.location.href = '/logout';
        }
    </script>
</body>
</html>