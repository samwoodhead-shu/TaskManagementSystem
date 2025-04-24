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
        </div>
    </div>

    <div class="logout-button">
            <a href="index.php" class="button-class">Logout</a>
    </div>
    
    <div class="container">
        <div class="manage-users">
                <a href="manageUsers.php" class="admin-link">Manage Users</a>
                <span class="admin-text">(Admin Only)</span>
            </div>
        <h3>My tasks</h3>

       
        <div class="search-bar">
            <input type="text" placeholder="Search by name">
            <button class="add-task" onclick="window.location.href='createTaskPage.php'">+</button>
            </div>



<?php
    $db = new SQLite3('TaskManagementDB.db');
    $select_query = "SELECT * FROM Task";
    $result = $db->query($select_query);

    echo "<table>";
    echo "<tr>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Due Date</th>
            <th>% Complete</th>
        </tr>";

    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $taskName= $row['taskName'];
        $description= $row['description'];
        $currentStatus= $row['currentStatus'];
        $dueDate= $row['dueDate'];
        $completion= $row['progress'];
    
        echo "<tr> 
                <td>📋$taskName</td> 
                <td>$description</td>
                <td><span class=\"status in-progress\">In Progress $currentStatus</span></td>
                <td>$dueDate</td>
                <td>
                    <div class=\"progress-bar\">
                        <div class=\"progress\" style=\"width: $completion%;\"></div> $completion%
                    </div>    
                </td>
            

            </tr>";
    }
    echo "</table>";
    $db->close();
?>

</body>
</html>
