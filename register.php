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
        <form action="registerCheck.php" method="post">
            <hr style="width:50%">

            <div class="form-group">
                <input type="text" id="username" name="username" placeholder="username*" required value="joey">
            </div>

            <div class="form-group">
                <input type="text" id="fName" name="fName" placeholder="first name*" required value="Joe">
            </div>

            <div class="form-group">
                <input type="text" id="lName" name="lName" placeholder="last name*" required value="Bloggs">
            </div>

            <div class="form-group">
                <input type="email" id="email" name="email" placeholder="email*" required value="joe@gmail.com">
            </div>

            <div class="form-group">
                <input type="tel" id="telNo" name="telNo" placeholder="telephone number*" required value="07123456789">
            </div>

            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="password*" required value="j0e">
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="groupAdmin" name="groupAdmin" value="groupAdmin">
                <label for="groupAdmin">Group Admin</label>
            </div>

            <div class="form-group">
                <button type="submit">register</button>
            </div>
        </form>
        
        <div class="form-links">
                <a href="index.php">login here</a>
        </div>
    </div>
</body>
</html>
