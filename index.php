<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Task Management System</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="form-container">
        <h1 style="text-align: center; color: black;">Login</h1>
        <form action="loginCheck.php" method="post">

            <hr style="width:50%">
        <div class="input-container">
            <img type="image" src="userIcon.jpg" alt="user icon">
            <!-- TODO remove username + password defaults -->
            <input type="text" id="username" name="username" placeholder="username" required value="sam_woodhead">

        <div class="input-container">
            <img src="lockIcon.jpg" alt="lock icon">
            <input type="password" id="passkey" name="passkey" placeholder="password" required value="s4m!">
            


            <button type="submit">login</button>
        </form>

        <div>
            <a href="register.php">register here</a>
        </div>

    </div>
</body>

</html>
