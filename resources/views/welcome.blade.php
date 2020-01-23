<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .logo {
            width: 25%;
        }

        .mx-3 {
            margin-right: 0.75rem;
            margin-left: 0.75rem;
        }


    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="logo">
        <img src="{{asset('assets/images/logo.svg')}}" alt="Afaqi Logo">
    </div>
    <h1 class="mx-3">Vehicle App</h1>
    <a href="{{url('/api/vehicles/expenses')}}">View all vehicles expenses</a>
</div>
</body>
</html>
