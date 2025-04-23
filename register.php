<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Task Management System</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="form-container">
        <h1 style="text-align: center; color: black;">Register</h1>
        <form action="index.php" method="post">
            <hr style="width:50%">

            <div class="form-group">
                <input type="text" id="username" name="username" placeholder="username" required>
            </div>

            <div class="form-group">
                <input type="email" id="email" name="email" placeholder="email" required>
            </div>

            <div class="form-group">
                <input type="tel" id="telNo" name="telNo" placeholder="telephone number" required>
            </div>

            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="password" required>
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="GroupAdmin" name="GroupAdmin" value="GroupAdmin">
                <label for="GroupAdmin">Group Admin</label>
            </div>

            <div class="form-group">
                <input type="text" id="adminID" name="adminID" placeholder="admin ID">
            </div>

            <div class="form-links">
                <a href="index.php">login here</a>
            </div>

            <div class="form-group">
                <button type="submit">register</button>
            </div>
        </form>
    </div>
</body>
</html>
