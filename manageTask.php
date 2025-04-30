<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $submitbtn = $_POST['submitbtn'];
    $taskID = $_POST['taskID'];
    $taskName = $_POST['taskName'];

    if ($submitbtn == "delete") {
        $db = new SQLite3('TaskManagementDB.db');
        $sql = "DELETE FROM Task WHERE taskID = $taskID";

        if ($db->exec($sql)) {
            $db->close();
            echo "Task '$taskName' deleted successfully!";
            header("refresh:2;url=mainPage.php");
        } else {
            echo "Failed to delete task.";
        }

    } else if ($submitbtn == "update") {
        $description = $_POST['description'];
        $dueDate = $_POST['dueDate'];
        $progress = $_POST['progress'];
        $userID = $_SESSION['userID'];

        $sql = "UPDATE Task 
                SET userID = $userID,
                    taskName = '$taskName',
                    description = '$description',
                    dueDate = '$dueDate',
                    progress = '$progress'
                WHERE taskID = $taskID";

        $db = new SQLite3('TaskManagementDB.db');

        if ($db->exec($sql)) {
            $db->close();
            echo "Task updated successfully!";
            header("refresh:2;url=mainPage.php");
        } else {
            echo "Failed to update task.";
        }

    } else {
        echo "Invalid operation requested.";
    }

}
?>
