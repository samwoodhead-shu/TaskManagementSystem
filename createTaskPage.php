<?php
session_start();
?>

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
                    <?php
                    if (isset($_SESSION['groupAdmin']) && $_SESSION['groupAdmin'] == 1) {
                    ?>
                        <th>Select User</th>
                        <th>Select Group</th>
                    <?php
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" id="taskName" name="taskName" placeholder="Enter Task Name" required></td>
                    <td><input type="text" id="description" name="description" placeholder="Enter Task Description"></td>
                    <td><input type="date" id="dueDate" name="dueDate"></td>
                    
                    <?php
                    if (isset($_SESSION['groupAdmin']) && $_SESSION['groupAdmin'] == 1) {
                        $db = new SQLite3('TaskManagementDB.db');
                        $select_query = "SELECT * FROM User";
                        $result = $db->query($select_query);

                        echo "<td><select name=\"taskUserID\" id=\"taskUserID\">";
                        echo "<option value='0'>Select user for task</option>";
                        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                            echo "<option value='".$row['userID']."'>".$row['fName'].' '.$row['lName']."</option>";
                        }
                        echo "</select></td>";

                        $select_group_query = "SELECT * FROM TaskGroup";
                        $resultGroup = $db->query($select_group_query);

                        echo "<td><select name=\"taskGroupID\" id=\"taskGroupID\">";
                        echo "<option value='0'>Select group for task</option>";
                       while ($row = $resultGroup->fetchArray(SQLITE3_ASSOC)) {
                           echo "<option value='".$row['groupID']."'>".$row['groupName']."</option>";
                      }
                        echo "</select></td>";

                        $db->close();
                    }
                    ?>
                    <td><button type="submit" class="add-task">+</button></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

</body>
</html>
