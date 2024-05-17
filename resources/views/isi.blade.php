<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isi Halaman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        h1 {
            color: #333333;
        }
        p {
            color: #666666;
        }
    </style>
</head>
@vite(['resources/css/app.css', 'resources/js/app.js'])
@include('layouts.navigation')
<body>
    <div class="container">
        <h1>Halaman Isi</h1>
        <p>Ini adalah halaman isi yang sederhana.</p>
    </div>
</body>
</html>