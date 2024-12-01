<!doctype html>
<html lang="en">
<head>
    <title>Mans</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        input[type="date"] {
            padding: 8px;
            font-size: 14px;
            border-radius: 4px;
            border: 1px solid #ccc;
            width: 45%;
        }

        button[type="submit"], a {
            background-color: #007bff;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover, a:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f8f9fa;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #e9ecef;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .actions form {
            display: inline-block;
        }

        .actions a, .actions button {
            padding: 6px 12px;
            background-color: #28a745;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .actions a:hover, .actions button:hover {
            background-color: #218838;
        }

        .actions button {
            background-color: #dc3545;
        }

        .actions button:hover {
            background-color: #c82333;
        }
    </style>
    </style>
</head>
<body>
    <h1>Mans</h1>
    <a href="{{ route('man.create') }}">Create New Man</a>
    <form method="GET" action="{{ route('man.index') }}">
        <input type="date" name="start_date" placeholder="Start Date">
        <input type="date" name="end_date" placeholder="End Date">
        <button type="submit">Filter</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Birthday</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mans as $man)
                <tr>
                    <td>{{ $man->name }}</td>
                    <td>{{ $man->email }}</td>
                    <td>{{ $man->birthday }}</td>
                    <td>
                        <a href="{{ route('man.edit', $man->id) }}">Edit</a>
                        <form action="{{ route('man.destroy', $man->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


</body>
</html>
