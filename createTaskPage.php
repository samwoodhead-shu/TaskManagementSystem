<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task Page- Task Management System</title>
    <link rel="stylesheet" href="createTask.css">
</head>
<body>

    <div class="header">
            <h1>Create Task</h1>
            <button class="home-button" onclick="window.location.href='mainPage.php'">Home</button>
    </div>

    <div class="container">
    <form action="createTask.php" method="post">

        <table>
            <thead>
                <tr>
                    <th>Task Name</th>
                    <th>Task Description</th>
                    <th>Due Date</th>
                    <th>(Group Admin Only)</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td><input type="text" id="taskName" name="taskName" placeholder="Enter Task Name" required></td>
                    <td><input type="text" placeholder="Enter Task Description"></td>
                    <td><input type="date"></td>
                    <td>
                        <select>
                            <option>Select user(s) for task</option>
                            <option>User 1</option>
                            <option>User 2</option>
                            <option>User 3</option>
                        </select>
                    </td>
                    <td><button type="submit" class="add-task">+</button></td>
                </tr>
            </tbody>
        </table>
    </form>
    </div>

</body>
</html>
