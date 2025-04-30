<?php
session_start();
$db = new SQLite3('TaskManagementDB.db');

$selectedUserID = $_SESSION['groupAdmin'] == 1 && isset($_POST['selectedUser']) ? $_POST['selectedUser'] : $_SESSION['userID'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Users - Task Management System</title>
    <link rel="stylesheet" href="manageUsers.css">
</head>
<body>

<div class="header">
    <h1>Manage Users</h1>
    <button class="home-button" onclick="window.location.href='mainPage.php'">Home</button>
</div>

<div class="container">
    <form method="POST" action="manageUsersPage.php">
        <table>
            <thead>
                <tr>
                    <th>User</th>
                    <th>Task</th>
                    <th>Due Date</th>
                    <th>Progress</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="999">
                        <?php if ($_SESSION['groupAdmin'] == 1): ?>
                            <select name="selectedUser" onchange="this.form.submit()">
                                <option value="">-- Select User --</option>
                                <?php
                                $users = $db->query("SELECT userID, fName, lName FROM User");
                                while ($user = $users->fetchArray(SQLITE3_ASSOC)) {
                                    $selected = ($selectedUserID == $user['userID']) ? "selected" : "";
                                    echo "<option value='{$user['userID']}' $selected>{$user['fName']} {$user['lName']}</option>";
                                }
                                ?>
                            </select>
                        <?php else: ?>
                            <p><?php echo $_SESSION['fName'] . " " . $_SESSION['lName']; ?></p>
                        <?php endif; ?>

                        <br><br>
                        <button class="add-task" type="button" onclick="window.location.href='createTaskPage.php'">+ Add Task</button>
                        <button class="assign-group" type="button" onclick="window.location.href='assignUserGroupPage.php'">Assign Group</button>

                    </td>

                    <?php
                    $stmt = $db->prepare("SELECT taskName, dueDate, progress FROM Task WHERE userID = :userID");
                    $stmt->bindValue(':userID', $selectedUserID, SQLITE3_INTEGER);
                    $tasks = $stmt->execute();

                    $first = true;
                    while ($task = $tasks->fetchArray(SQLITE3_ASSOC)) {
                        if (!$first) echo "<tr>";
                        echo "<td>" . $task['taskName'] . "</td>";
                        echo "<td>" . $task['dueDate'] . "</td>";
                        echo "<td>
                                <div class='progress-bar'>
                                    <div class='progress' style='width: {$task['progress']}%;'></div>
                                </div>
                              </td>";
                        echo "</tr>";
                        $first = false;
                    }

                    if ($first) {
                        echo "<td colspan='3'>No tasks found for this user.</td></tr>";
                    }

                    $db->close();
                    ?>
            </tbody>
        </table>
    </form>
</div>
</body>
</html>
