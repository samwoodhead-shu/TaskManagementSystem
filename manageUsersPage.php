<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users - Task Management System</title>
    <link rel="stylesheet" href="manageUsers.css">
</head>
<body>

    <div class="header">
        <h1>Manage Users</h1>
        <button class="home-button" onclick="window.location.href='mainPage.php'">Home</button>
    </div>

    <div class="container">
        <div class="search-bar">
            <input type="text" placeholder="Search users...">
        </div>

        <table>
            <thead>
                <tr>
                    <th>User</th>
                    <th>Tasks</th>
                    <th>Due Date</th>
                    <th>Progress</th>
                    <th>Feedback</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="3">
                        <select on-select>
                            <option >
                                User 1
                            </option>
                            <option>
                                User 2
                            </option>
                            <option >
                                User 3
                            </option>
                        </select>
                        <button class="add-task">+ Add Task</button>
                    </td>
                    <td>Task 1</td>
                    <td>dd/mm/yyyy</td>
                    <td>
                        <div class="progress-bar">
                            <div class="progress" style="width: 60%;"></div>
                        </div>
                    </td>
                    <td>Feedback</a></td>
                </tr>
                <tr>
                    <td>Task 2</td>
                    <td>dd/mm/yyyy</td>
                    <td>
                        <div class="progress-bar">
                            <div class="progress" style="width: 80%;"></div>
                        </div>
                    </td>
                    <td>Feedback</a></td>
                </tr>
                <tr>
                    <td>Task 3</td>
                    <td>dd/mm/yyyy</td>
                    <td>
                        <div class="progress-bar">
                            <div class="progress" style="width: 40%;"></div>
                        </div>
                    </td>
                    <td>Feedback</a></td>
                </tr>
            </tbody>
        </table>

        <button class="update-button">Update</button>
    </div>

</body>
</html>
