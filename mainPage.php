<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page - Task Management System</title>
    <link rel="stylesheet" href="mainPage.css">
</head>

<script>
    function filterTasks() {
        const input = document.getElementById("searchInput").value.toLowerCase();
        const table = document.getElementById("taskTable");
        const rows = table.getElementsByTagName("tr");

        for (let i = 1; i < rows.length; i++) {
            const nameCell = rows[i].getElementsByTagName("td")[0];
            if (nameCell) {
                const taskText = nameCell.textContent || nameCell.innerText;
                rows[i].style.display = taskText.toLowerCase().includes(input) ? "" : "none";
            }
        }
    }
</script>

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
                <a href="manageUsersPage.php" class="admin-link">Manage Users</a>
                <span class="admin-text">(Admin Only)</span>
        </div>
<?php } ?>
        <h3>My tasks</h3>

       
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Search by name" onkeyup="filterTasks()">
            <button class="add-task" onclick="window.location.href='createTaskPage.php'">+</button>
        </div>
<?php

    $db = new SQLite3('TaskManagementDB.db');
    $userID=$_SESSION['userID'];
    $select_query = "SELECT * FROM Task WHERE userID='$userID'";
    $result = $db->query($select_query);
    echo "<table id='taskTable'>";
    echo "<tr>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Due Date</th>
            <th>% Complete</th>
        </tr>";

    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $taskID= $row['taskID'];
        $taskName= $row['taskName'];
        $description= $row['description'];
        $dueDate= $row['dueDate'];
        $completion= $row['progress'];
        $date = new DateTime($dueDate);
        $formattedDate=$date->format("d/m/Y");

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
                <td><a id=\"taskLink\" href=\"manageTaskPage.php?taskID=$taskID\">📋$taskName</td> 
                <td>$description</td>
                <td><span class=\"status $currentStatus\">$currentStatus</span></td>
                <td>$formattedDate</td>
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
