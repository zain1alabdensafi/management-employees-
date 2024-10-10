<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
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
        input[type=text], input[type=number], select {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #E0E0E0;
        }
        input[type=text]:focus, input[type=number]:focus, select:focus {
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
    <form class="container" action="/add_product" method="post">
        @csrf
        <label for="product_name"><b>Product name</b></label>
        <input type="text" placeholder="please enter Product name" name="product_name" required pattern="[A-Za-z0-9]+" title="Product name should only contain letters.">

        <label for="quantity"><b>Quantity</b></label>
        <input type="number" placeholder="please enter Product Quantity" name="quantity" required min="0">
        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <span>{{ $error }}</span>
                @endforeach
            </div>
        @endif

        
        @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
        @endif
        <button type="submit" class="btn">Add Product</button>
    </form>
</body>
</html>
