<?php
session_start();
if ($_SESSION['groupAdmin'] == 1)

 {
// - pick up the user from the screen (taskUserID)
    $userID = $_POST['taskUserID'];
    $taskGroupID = $_POST['taskGroupID'];

    if($taskGroupID == '0' || !isset($taskGroupID)) {
        $taskGroupID = 'NULL';
    } else {
        $taskGroupID = "'$taskGroupID'";
    }
    
    if($userID == '0' || !isset($userID)) {
        $userID = 'NULL';
    } else {
        $userID = "'$userID'";
    }
    

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

    $stmt = $db->prepare("INSERT INTO Task (userID, groupID, taskName, `description`, dueDate) 
    VALUES ($userID,$taskGroupID,'$taskName', '$description' ,'$dueDate')");

    if ($stmt->execute()) {
        echo "A new task  created successfully!";
        header("refresh:2;url=mainPage.php");
    } else {
        echo "Failed to create task.";
    }
$db->close();
}
?>
