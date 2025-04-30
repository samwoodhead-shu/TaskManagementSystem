<?php
session_start();
$db = new SQLite3('TaskManagementDB.db');

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['groupID'])) {
    $userID = isset($_POST['selectedUser']) ? $_POST['selectedUser'] : $_SESSION['userID'];
    $groupID = $_POST['groupID'];

    if ($userID && $groupID) {
        // Check if user is already in this group
        $checkQuery = "SELECT 1 FROM GroupMembers WHERE userID = $userID AND groupID = $groupID";
        $checkResult = $db->querySingle($checkQuery);

        if (!$checkResult) {
            $insertQuery = "INSERT INTO GroupMembers (userID, groupID) VALUES ($userID, $groupID)";
            $db->exec($insertQuery);
        }

        header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
        exit();
    }
}

// Determine selected user
$selectedUserID = $_SESSION['groupAdmin'] == 1 && isset($_POST['selectedUser']) ? $_POST['selectedUser'] : $_SESSION['userID'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assign Group - Task Management System</title>
    <link rel="stylesheet" href="manageUsers.css">
</head>
<body>

<div class="header">
    <h1>Assign Group</h1>
    <button class="home-button" onclick="window.location.href='mainPage.php'">Home</button>
</div>

<div class="container">
    <form method="POST" action="">
        <table>
            <thead>
                <tr>
                    <th>User</th>
                    <th>Group</th>
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
                    </td>
                    <td>
                        <select name="groupID">
                            <option value="">-- Select Group --</option>
                            <?php
                            $groups = $db->query("SELECT groupID, groupName FROM TaskGroup");
                            while ($group = $groups->fetchArray(SQLITE3_ASSOC)) {
                                echo "<option value='{$group['groupID']}'>{$group['groupName']}</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
        <button class="submit" type="submit">Assign</button>
    </form>

    <?php if (isset($_GET['success'])): ?>
        <p style="color: green;">User assigned to group successfully.</p>
    <?php elseif (isset($_GET['error'])): ?>
        <p style="color: red;">Please select a group.</p>
    <?php endif; ?>
</div>
</body>
</html>
