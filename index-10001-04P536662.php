<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Task Management System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1 style="text-align: center; text-decoration: underline; color: black;">Login</h1>
        <form action="mainPage.php" method="post">
            <label for="username">username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">password:</label>
            <input type="password" id="password" name="password" required>

            <a href="register.php">register here</a>

            <button type="submit">login</button>
        </form>
    </div>
</body>

</html>