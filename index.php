<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Task Management System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="form-container">
        <h1 style="text-align: center; color: black;">Login</h1>
        <form action="mainPage.php" method="post">

            <hr style="width:50%">
            <input type="text" id="username" name="username" placeholder="username" required>

            <input type="password" id="password" name="password" placeholder="password" required>
            
            <div>
            <a href="register.php">register here</a>
            </div>

            <button type="submit">login</button>
        </form>

    </div>
</body>

</html>
