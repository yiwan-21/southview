<?php 
    session_start();
    $_SESSION['role'] = "Resident";
    if($_SESSION['role'] == "Administrator"){
        include_once "../../connect.php";
        // $admin_id = $_SESSION['unique_id'];
        // $resident_id = mysqli_real_escape_string($conn, $_POST['resident_id']);
        $admin_id = 1;
        $resident_id = 220001;

        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO message (Resident_svID, Administrator_svID, Message_Content, Sentby)
                                        VALUES ({$resident_id}, {$admin_id}, '{$message}', 1)") or die();
        }
    }else{
        include_once "../../connect.php";
        $admin_id = $_SESSION['unique_id'];
        $resident_id = mysqli_real_escape_string($conn, $_POST['resident_id']);
        $admin_id = 1;
        $resident_id = 220001;

        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO message (Resident_svID, Message_Content)
                                        VALUES ({$resident_id}, '{$message}')") or die();
        }
    } 
?>