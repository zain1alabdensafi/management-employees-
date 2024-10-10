<!DOCTYPE html>
<html>
<head>
    <title>Delete Department</title>
    <script>
        function selectAll() {
            var items = document.getElementsByName('ids[]');
            for(var i=0; i<items.length; i++){
                if(items[i].type=='checkbox')
                    items[i].checked=true;
            }
        }
    </script>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, #f2f2f2, #2196F3);
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
        /* تصميم الزر */
        button {
            
            background-color: #4CAF50; /* لون الخلفية */
            color: white; /* لون النص */
            padding: 14px 20px; /* الحشوة */
            margin: 8px 0; /* الهامش */
            border: none; /* لا حدود */
            cursor: pointer; /* تغيير المؤشر إلى يد عند التمرير فوقه */
            width: 12%; /* العرض الكامل */
            opacity: 0.9; /* شفافية جزئية */
        }
        button:hover {
            opacity: 1; /* تغيير الشفافية عند التمرير فوقه */
        }
        input[type=text] {
            
            width: 14%; /* العرض الكامل */
            padding: 12px; /* الحشوة */
            margin: 8px 0; /* الهامش */
            box-sizing: border-box; /* تضمين الحشوة والحدود في العرض والارتفاع الإجماليين */
            border: 2px solid #ccc; /* حدود رمادية */
            border-radius: 4px; /* حدود مستديرة */
        }
        input[type=text]:focus {
            border: 2px solid #4CAF50; /* تغيير لون الحدود عند التركيز */
        }
    </style>
</head>
<body>
    <form action="/delete_department" method="post">
        @csrf
        <input type="text" id="search" name="search">
        <button type="submit">Search</button>
    </form>
    
    <form action="/delete_department" method="post">
        @csrf
        @if(isset($department))
        <table>
            <tr>
                <th>Select</th>
                <th>Department Name</th>
            </tr>
            
                @foreach ($department as $departments)
                    <tr>
                        <td>
                            <input type="checkbox" id="employee{{ $departments->id }}" name="ids[]" value="{{ $departments->id }}">
                        </td>
                        <td>{{ $departments->department_name }}</td>
                    </tr>
                @endforeach
        </table>
        @endif
        <button type="button" onclick="selectAll()">Select All</button>
        <button type="submit" style="float:right;">Delete </button>
    </form>
    
    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif
</body>
</html>
