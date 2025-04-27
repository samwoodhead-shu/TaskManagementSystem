<?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = $_POST['username'];
            $fName = $_POST['fName'];
            $lName = $_POST['lName'];
            $email = $_POST['email'];
            $telNo = $_POST['telNo'];
            $passkey = $_POST['password'];

            $db = new SQLite3('TaskManagementDB.db');
            // TODO Check if username already exists and fail gracefully
            
            $stmt = $db->prepare("INSERT INTO User (username, fName, lName, email, telNo, passkey) 
            VALUES ('$username', '$fName', '$lName', '$email', '$telNo', '$passkey')");
            $stmt->bindValue(':username', $username, SQLITE3_TEXT);

        
        
            if ($stmt->execute()) {
                echo "A new user  created successfully!";
                header("refresh:2;url=index.php");
                exit;
            } else {
                echo "Failed to user.";
            }
        $db->close();
        }
 ?>
