<?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = $_POST['username'];
            $passkey = $_POST['passkey'];

            $db = new SQLite3('TaskManagementDB.db');
            $select_query = "SELECT passkey, fName, groupAdmin, userID FROM User WHERE username = '$username'";
            $result = $db->query($select_query);
            session_start();
            
            $row = $result->fetchArray(SQLITE3_ASSOC);
            $actualPasskey = $row['passkey'];
            $firstName = $row['fName'] ;
            $groupAdmin = $row['groupAdmin'];
            $userID = $row['userID'];

            $_SESSION['firstName'] = $firstName;
            $_SESSION['userID'] = $userID;
            $_SESSION['groupAdmin'] = $groupAdmin;

            if ($passkey === $actualPasskey) {
                echo "<p style='color: green; text-align: center;'>Login successful! Redirecting...</p>";
                header("refresh:2;url=mainPage.php");
                exit;
            } else {
                echo "<p style='color: red; text-align: center;'>Invalid username or password.</p>";
            }
        }
        ?>
