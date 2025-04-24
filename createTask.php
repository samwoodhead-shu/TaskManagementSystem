<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $taskName = $_POST['taskName'];

    $db = new SQLite3('TaskManagementDB.db');

    $stmt = $db->prepare("INSERT INTO Task (userID, taskName, dueDate, progress) 
    VALUES ('u1',:taskName,'24/05/2006',21)");
    $stmt->bindValue(':taskName', $taskName, SQLITE3_TEXT);

    if ($stmt->execute()) {
        echo "A new task  created successfully!";
    } else {
        echo "Failed to create task.";
    }
$db->close();
}
?>
