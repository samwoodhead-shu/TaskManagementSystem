<?php
session_start();
$db = new SQLite3('TaskManagementDB.db');

$selectedGroupID = ($_SESSION['groupAdmin'] == 1 && isset($_POST['selectedGroup'])) 
    ? $_POST['selectedGroup'] 
    : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Group - Task Management System</title>
    <link rel="stylesheet" href="manageGroup.css">
</head>
<body>

<div class="header">
    <h1>Manage Group</h1>
    <button class="home-button" onclick="window.location.href='mainPage.php'">Home</button>
</div>

<div class="container">
    <form method="POST" action="manageGroupPage.php">
        <table>
            <thead>
                <tr>
                    <th>Group</th>
                    <th>Task</th>
                    <th>Due Date</th>
                    <th>Progress</th>
                    <th>Members</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="999">
                        <select name="selectedGroup" onchange="this.form.submit()">
                            <option value="">-- Select Group --</option>
                            <?php
                            $groups = $db->query("SELECT * FROM TaskGroup");
                            while ($group = $groups->fetchArray(SQLITE3_ASSOC)) {
                                $selected = ($selectedGroupID == $group['groupID']) ? "selected" : "";
                                echo "<option value='{$group['groupID']}' $selected>{$group['groupName']}</option>";
                            }
                            ?>
                        </select>
                        <br/><br/>
                        <button class="add-task" type="button" onclick="window.location.href='createTaskPage.php'">+ Add Task</button>
                    </td>

                    <?php
                    $stmt = $db->prepare("SELECT taskName, dueDate, progress FROM Task WHERE groupID = :groupID");
                    $stmt->bindValue(':groupID', $selectedGroupID, SQLITE3_INTEGER);
                    $tasks = $stmt->execute();

                    $first = true;
                    while ($task = $tasks->fetchArray(SQLITE3_ASSOC)) {
                        if (!$first) echo "<tr>"; // empty cell for group column
                        echo "<td>{$task['taskName']}</td>";
                        echo "<td>{$task['dueDate']}</td>";
                        echo "<td>
                                <div class='progress-bar'>
                                    <div class='progress' style='width: {$task['progress']}%;'></div>
                                </div>
                              </td>";
                        echo "<td rowspan='999'></td></tr>"; // placeholder for Members column
                        $first = false;
                    }

                    if ($first) {
                        echo "<td colspan='4'>No tasks found for this group.</td><td></td></tr>";
                    }

                    $db->close();
                    ?>
                </tr>
            </tbody>
        </table>
    </form>
</div>

</body>
</html>
