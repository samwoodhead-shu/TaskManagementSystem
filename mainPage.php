<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page - Task Management System</title>
    <link rel="stylesheet" href="mainPage.css">
</head>

<body>


    <div class="header">
        <div class="header-left">
            <h1>Main Page</h1>
        </div>
        
        <div class="header-right">
            <h2>Hello (User)</h2>
            <div class="logout-button">
                <a href="index.php" class="button-class">Logout</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="manage-users">
                <a href="manageUsers.php" class="admin-link">Manage Users</a>
                <span class="admin-text">(Admin Only)</span>
            </div>
        <h3>My tasks</h3>

       
        <div class="search-bar">
            <input type="text" placeholder="Search by name">
            <button class="add-task" onclick="window.location.href='createTask.php'">+</button>
            </div>

        
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>% Complete</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><span class="task-icon">📋</span> Task name</td>
                    <td><span class="status off-track">Off track</span></td>
                    <td>dd/mm/yyyy</td>
                    <td>
                        <div class="progress-bar">
                            <div class="progress" style="width: 0%;"></div> 0%
                        </div>
                        <input type="checkbox">
                    </td>
                </tr>
                <tr>
                    <td><span class="task-icon">📋</span> Task name</td>
                    <td><span class="status off-track">Off track</span></td>
                    <td>dd/mm/yyyy</td>
                    <td>
                        <div class="progress-bar">
                            <div class="progress" style="width: 10%;"></div> 10%
                        </div>
                        <input type="checkbox">
                    </td>
                </tr>
                <tr>
                    <td><span class="task-icon">📋</span> Task name</td>
                    <td><span class="status on-track">On Track</span></td>
                    <td>dd/mm/yyyy</td>
                    <td>
                        <div class="progress-bar">
                            <div class="progress" style="width: 66%;"></div> 66%
                        </div>
                        <input type="checkbox">
                    </td>
                </tr>
                <tr>
                    <td><span class="task-icon">📋</span> Task name</td>
                    <td><span class="status completed">Completed</span></td>
                    <td>dd/mm/yyyy</td>
                    <td>
                        <div class="progress-bar">
                            <div class="progress" style="width: 100%;"></div> 100%
                        </div>
                        <input type="checkbox" checked>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
