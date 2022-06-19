<?php 
    session_start();
    $_SESSION['role'] = "Resident";
    if($_SESSION['role'] == "Resident"){
        include_once "../../connect.php";
        // $admin_id = $_SESSION['unique_id'];
        // $resident_id = mysqli_real_escape_string($conn, $_POST['resident_id']);
        // $admin_id = 1;
        $resident_id = 220001;

        $output = "";
        $sql = "SELECT * FROM message LEFT JOIN resident ON resident.Resident_svID = message.Resident_svID
                WHERE (message.Resident_svID = {$resident_id})
                ORDER BY Message_ID";

        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['Resident_svID'] == $resident_id && is_null($row['Administrator_svID'])){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['Message_Content'] .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <img src="../navigation/image.jpg" alt="">
                                <div class="details">
                                    <p>'. $row['Message_Content'] .'</p>
                                </div>
                                
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        // header("location: ../login.php");
        echo "Error for get chat!";
    }
?>