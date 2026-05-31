<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Todo App</title>
    <style>
        body {
            font-family: sans-serif;
            max-width: 760px;
            margin: 2rem auto;
            padding: 0 1rem;
            line-height: 1.5;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
        }
        .error {
            color: #b00020;
            margin-top: 0.25rem;
            font-size: 0.9rem;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 0.5rem;
            box-sizing: border-box;
            margin-bottom: 0.5rem;
        }
        button {
            padding: 0.5rem 0.8rem;
            cursor: pointer;
        }
        .todo-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 0.5rem;
            padding: 0.5rem 0;
            border-bottom: 1px solid #eee;
        }
        .todo-row:last-child {
            border-bottom: 0;
        }
        .todo-title.done {
            text-decoration: line-through;
            color: #666;
        }
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>
