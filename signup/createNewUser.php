<?php
$conn = mysqli_connect('localhost', 'root', "", 'south view');
$hasError = false;
if ($conn->connect_error) {
    die(mysqli_connect_error());
} else {
    if (isset($_POST['submit'])) {
        if (!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['gender']) && !empty($_POST['identityno']) && !empty($_POST['phonenum']) && !empty($_POST['email']) && !empty($_POST['age']) && !empty($_POST['unit']) && !empty($_POST['vehicle'])) {
            $name = $_POST['name'];
            $identityno = $_POST['identityno'];
            $age = $_POST['age'];
            $phonenum = $_POST['phonenum'];
            $unit = $_POST['unit'];
            $vehicle = $_POST['vehicle'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmpw = $_POST['confirmpw'];
            $gender = $_POST['gender'];

            $result = preg_match("/([AB]-\d{2}-\d{2})/", $unit);

            // $sql = "SELECT * FROM resident WHERE Email='$email'";
            // $select = mysqli_query($conn, $sql);

            $select = mysqli_query($conn, "SELECT * FROM resident_signup WHERE Email = '" . $_POST['email'] . "'");
            $data = mysqli_query($conn, "SELECT * FROM resident_signup WHERE Unit = '" . $_POST['unit'] . "'");

            if ($_POST['password'] != $_POST['confirmpw']) {
                $pass_error = "Oops! Password did not match! Try again.";
                $hasError = true;
            }
            if (!$result) {
                $error = "Must consist '-', eg: X-xx-xx";
                $hasError = true;
            }
        }
        
        //check unit
        if (mysqli_num_rows($data)) {
            $error_unit = "This unit already exists";
            $hasError = true;
        }
        
        //check email
        if (mysqli_num_rows($select)) {
            $error_email = "This Email already exists";
            $hasError = true;
        } 
        
        if (!$hasError) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT into `resident_signup`(`Name`,`Password`,`Gender`,`IC_No/Passport_No`,`Phone_No`,`Email`,`Age`,`Unit`,`Vehicle_No`) VALUES('$name','$hash','$gender','$identityno','$phonenum','$email','$age','$unit','$vehicle')";

            $run = mysqli_query($conn, $query) or die(mysqli_connect_error());

            if ($run) {
                header("Location: ../signup/signupdone.html");
            } else {
                //echo "Form not submitted";
                $rmsg = "Passwords doesn't match";
            }
        }
    }
}
