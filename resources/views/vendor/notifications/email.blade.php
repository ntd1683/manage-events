<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #000;
            font-family: "Courier New", Courier, monospace;
            font-size: 16px;
            line-height: 1.5;
            color: #0f0;
            padding: 0;
            margin: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
            animation-name: slidein;
            animation-duration: 0.5s;
        }

        @keyframes slidein {
            from {
                transform: translateY(-50%);
                opacity: 0;
            }
            to {
                transform: translateY(0%);
                opacity: 1;
            }
        }

        .logo {
            display: block;
            margin: 0 auto;
            max-width: 200px;
            height: auto;
        }

        .title {
            font-size: 48px;
            margin-bottom: 30px;
            color: #f00;
            text-transform: uppercase;
        }

        .text {
            margin-bottom: 20px;
            color: #0f0;
            text-align: justify;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #f00;
            color: #000;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 30px;
            border: none;
            box-shadow: 0 2px 5px rgba(255, 0, 0, 0.3);
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            background-color: #000;
            box-shadow: 0 4px 8px rgba(255, 0, 0, 0.3);
            transform: translateY(-2px);
            color: #fff;
        }

    </style>
</head>
<body>
<div class="container">
    <img class="logo" src="{{ config('app.logo') }}" alt="Logo">
    <h1 class="title">Congratulations on Successful Registration!</h1>
    <p class="text">Hello {{ $user->name }}, your account has been successfully hacked.</p>
    <p class="text">We have obtained all your private information and will use it to our advantage.</p>
    <a href="{{ config('app.url') }}" class="btn">Visit Our Website</a>
</div>
</body>
</html>
