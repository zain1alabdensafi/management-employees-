<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
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
        input[type=int] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #E0E0E0;
        }
        input[type=int]:focus {
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
    <form class="container" action="/edit_product" method="post">
        @csrf
        <label for="product_name"><b>Current Product Name</b></label>
        <input type="text" placeholder="Please Enter The Current Product Name" name="product_name" required>
    
        <label for="new_product_name"><b>New Product Name</b></label>
        <input type="text" placeholder="Please Enter The New Product Name" name="new_product_name" required>
        
        <label for="current_quantity"><b>Current Product Quantity</b></label>
        <input type="int" placeholder="Please Enter The Current Product Quantity" name="current_quantity" required>
    
        <label for="new_quantity"><b>New Current Product Quantity</b></label>
        <input type="int" placeholder="Please Enter The New Current Product Quantity" name="new_quantity" required>
    
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

    <button type="submit" class="btn">Update Product</button>
</form>

</body>
</html>
