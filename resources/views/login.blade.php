<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
        input[type=text], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #E0E0E0;
        }
        input[type=text]:focus, input[type=password]:focus {
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
    </style>
</head>
<body>
    <form class="container" action="/login" method="post">
        @csrf
        <label for="email"><b>email</b></label>
        <input type="text" placeholder="Please enter your email" name="email" required>

        <label for="psw"><b>password</b></label>
        <input type="password" placeholder="Please enter your password" name="password" required>

        @if ($errors->any())
    <div class="error">
        @foreach ($errors->all() as $error)
            <span>{{ $error }}</span>
        @endforeach
    </div>
@endif

        <button type="submit" class="btn">Login</button>
    </form>
</body>
</html>
