<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocer | Login Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <script src="http://localhost/myFolder/js/script.js"></script>
</head>
<body>
    <div class="loaderIndex" id="loader">
        <i class="fas fa-seedling"></i>
    </div>
    <div class="shadowBox">
        <div class="head">
            <i class="fas fa-seedling"></i>
            <h1 class="heading">Sign In</h1>
            <input id="username" type="text" placeholder="Username">
            <input id="password" type="password" placeholder="Password">
        </div>
        <div class="buttons">
            <button onclick = "login()" class="btn">Sign In</button>
        </div>
    </div>
</body>
</html>
