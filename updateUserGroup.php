<?php
session_start();

if ($_SESSION['groupAdmin'] == 1) {
    $userID = $_POST['taskUserID'];
} else {
    $userID = $_SESSION['userID'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $taskName = $_POST['taskName'];
    $description = $_POST['description'];
    $dueDate = $_POST['dueDate'];
    $groupID = $_POST['groupID'];

    $db = new SQLite3('TaskManagementDB.db');

    $stmt = $db->prepare("INSERT INTO Task (userID, taskName, description, dueDate, taskGroupID) 
                          VALUES (:userID, :taskName, :description, :dueDate, :groupID)");

    if ($stmt->execute()) {
        echo "Task created successfully!";
    } else {
        echo "Failed to create task.";
    }

    $db->close();
}
?>
