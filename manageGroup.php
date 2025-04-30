<!-- TODO manage group PHP -->

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
    
    $db = new SQLite3('TaskManagementDB.db');

    $stmt = $db->prepare("INSERT INTO Task (userID, taskName, description, dueDate) 
                          VALUES (:userID, :taskName, :description, :dueDate)");

    if ($stmt->execute()) {
        echo "Task created successfully!";
    } else {
        echo "Failed to create task.";
    }

    $db->close();
}
?>
