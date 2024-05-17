<x-app-layout>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged In</title>
    <style>
        .alert {
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
        }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged In Alert</title>
    <style>
        .alert {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            max-width: 200px; 
            margin: 0 auto;
            border-radius: 5px; 
        }

        .alert strong {
            display: block; 
        }
    </style>
</head>
<body>
    <div id="alertBox" class="alert" style="display: none;">
        <strong>You have logged in!</strong>
    </div>

    <script>
        window.onload = function() {
            var alertBox = document.getElementById("alertBox");
            alertBox.style.display = "block";
            setTimeout(function(){
                alertBox.style.display = "none";
            }, 2000);
        };
    </script>
</body>       

@include('card')

</x-app-layout>