<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Task Page- Task Management System</title>
    <link rel="stylesheet" href="manageTask.css">
</head>
<body>
<?php session_start();?>

    <div class="header">
            <h1>Manage Task</h1>
            <button class="home-button" onclick="window.location.href='mainPage.php'">Home</button>
    </div>

    <div class="container">
    <form action="manageTask.php" method="post">
        <table>
            <thead>
                <tr>
                    <th>Task Name</th>
                    <th>Task Description</th>
                    <th>Due Date</th>
                    <th>% Complete</th>
                </tr>
            </thead>
            <tbody>
                <tr>                    
                    <?php
                            $db = new SQLite3('TaskManagementDB.db');
                            
                            $taskID=$_REQUEST['taskID'];

                            $select_query = "SELECT * FROM Task WHERE taskID=$taskID";
                            $result = $db->query($select_query);

                            $row = $result->fetchArray(SQLITE3_ASSOC);
                
                            $taskName = $row['taskName'];
                            $description = $row['description'];
                            $dueDate = $row['dueDate'];
                            $progress = $row['progress'];
                            $db->close();

                    ?>

                    <input name = "taskID" id = "taskID" value= "<?php echo $taskID ?>" hidden>
                    <td><input type="text" id="taskName" name="taskName" placeholder="Enter Task Name" value= "<?php echo $taskName ?>" required></td>
                    <td><input type="text" id="description" name="description" placeholder="Enter Task Description" value= "<?php echo $description ?>"></td>
                    <td><input type="date" id="dueDate" name="dueDate" value= "<?php echo $dueDate ?>"></td>
                    <td><input type="number" id="progress" name="progress" min="0" max="100" placeholder="Enter progress" value= "<?php echo $progress ?>" required></td>
                </tr>
            </tbody>
        </table>
        <button name = "submitbtn" id = "submitbtn" type="submit" class="update" value="update">update</button>
        <button name = "submitbtn" id = "submitbtn" type="submit" class="delete" value="delete">delete</button>

    </form>
    </div>
</body>
</html>
