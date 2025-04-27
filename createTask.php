<?php
session_start();
if ($_SESSION['groupAdmin'] == 1)

 {
// - pick up the user from the screen (taskUserID)
    $userID = $_POST['taskUserID'];

 }
 else {
//    use userID from the session
$userID = $_SESSION['userID'];

 } 
// 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $taskName = $_POST['taskName'];
    $description = $_POST['description'];
    $dueDate = $_POST['dueDate'];
 
    $db = new SQLite3('TaskManagementDB.db');

    $stmt = $db->prepare("INSERT INTO Task (userID, taskName, `description`, dueDate) 
    VALUES ('$userID','$taskName', '$description' ,'$dueDate')");

    if ($stmt->execute()) {
        echo "A new task  created successfully!";
    } else {
        echo "Failed to create task.";
    }
$db->close();
}
?>
