<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN | LELANGKU</title>
    <style>
            /* Styling untuk pesan error */
    .alert-danger {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    /* Styling untuk pesan sukses */
    .alert-success {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 10px;
    }
    </style>
</head>
<body>
    @yield('loginAdmin')
    @yield('loginMasyarakat')
</body>
</html>