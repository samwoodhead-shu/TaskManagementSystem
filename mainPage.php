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
            <h2>Hello <?php session_start(); echo $_SESSION['firstName']; ?></h2>
        </div>
    </div>

    <div class="logout-button">
            <a href="index.php" class="button-class">Logout</a>
    </div>
    
    <div class="container">

<?php
if($_SESSION['groupAdmin']==1)
{
?>
        <div class="manage-users">
                <a href="manageUsers.php" class="admin-link">Manage Users</a>
                <span class="admin-text">(Admin Only)</span>
        </div>
<?php } ?>
        <h3>My tasks</h3>

       
        <div class="search-bar">
            <input type="text" placeholder="Search by name">
            <button class="add-task" onclick="window.location.href='createTaskPage.php'">+</button>
            </div>
<?php

    $db = new SQLite3('TaskManagementDB.db');
    $userID=$_SESSION['userID'];
    $select_query = "SELECT * FROM Task WHERE userID='$userID'";
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
        $dueDate= $row['dueDate'];
        $completion= $row['progress'];
   
        if($completion==0) {
            $currentStatus = "not-started";
        }
        elseif ($completion == 100) {
            $currentStatus = "completed";
        }
        else {
            $currentStatus = "in-progress";
        }
    
        echo "<tr> 
                <td>📋$taskName</td> 
                <td>$description</td>
                <td><span class=\"status $currentStatus\">$currentStatus</span></td>
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
