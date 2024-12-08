<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff5e6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            position: relative;
        }
        .error-code {
            font-size: 150px;
            font-weight: bold;
            color: #4CAF50;
            margin: 0;
            line-height: 1;
        }
        .error-message {
            font-size: 24px;
            color: #333;
            margin-top: 20px;
        }
        .oops {
            position: absolute;
            top: -30px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #4CAF50;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
        }
        .person {
            position: absolute;
            left: -40px;
            bottom: 20px;
            width: 50px;
            height: 100px;
            background-color: #4CAF50;
        }
        .ladder {
            position: absolute;
            left: -60px;
            bottom: 0;
            width: 20px;
            height: 120px;
            background-color: #2E7D32;
        }
        .gears {
            position: absolute;
            top: -40px;
            right: -40px;
        }
        .gear {
            width: 30px;
            height: 30px;
            border: 5px solid #FFA000;
            border-radius: 50%;
            position: absolute;
        }
        .gear:nth-child(1) {
            top: 0;
            right: 0;
        }
        .gear:nth-child(2) {
            top: 20px;
            right: 30px;
        }
        .plant {
            position: absolute;
            bottom: 0;
            right: -60px;
            width: 40px;
            height: 60px;
            background-color: #4CAF50;
            border-radius: 0 20px 0 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="oops">OOPSS...</div>
        <h1 class="error-code">404</h1>
        <p class="error-message">Page Not Found</p>
        <div class="person"></div>
        <div class="ladder"></div>
        <div class="gears">
            <div class="gear"></div>
            <div class="gear"></div>
        </div>
        <div class="plant"></div>
    </div>
</body>
</html>