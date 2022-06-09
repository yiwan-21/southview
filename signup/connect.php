<?php

//Database connection
$conn = mysqli_connect('localhost','root',"",'south view',3325);
if($conn->connect_error){
    die(mysqli_connect_error() );
}else{
    // $stmt = $conn->prepare("insert into resident_signup(name,password,gender,identityno,phonenum,email,age,unit,vehicle)values(?,?,?,?,?,?,?,?,?)");
    // $stmt->blind_param("ssssssiss",$name,$password,$gender,$identityno,$phonenum,$email,$age,$unit,$vehicle);
    // $stmt->execute();
    // echo "registration successfully";
    // $stml->close();
    // $conn->close();

    if(isset($_POST['submit'])){
        if(!empty($_POST['name']) && !empty($_POST['password'])&& !empty($_POST['gender'])&& !empty($_POST['identityno']) && !empty($_POST['phonenum'])&& !empty($_POST['email'])&& !empty($_POST['age'])&& !empty($_POST['unit'])&& !empty($_POST['vehicle'])) {
            $name = $_POST['name'];
            $identityno = $_POST['identityno'];
            $age = $_POST['age'];
            $phonenum = $_POST['phonenum'];
            $unit = $_POST['unit'];
            $vehicle = $_POST['vehicle'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $gender = $_POST['gender'];
            
            $query = "INSERT into `resident_signup`(`Name`,`Password`,`Gender`,`IC_No/Passport_No`,`Phone_No`,`Email`,`Age`,`Unit`,`Vehicle_No`) VALUES('$name','$password','$gender','$identityno','$phonenum','$email','$age','$unit','$vehicle')";
            
            $run = mysqli_query($conn, $query) or die(mysqli_connect_error()) ;

            if ($run){
                echo "Form submitted";
            }else{
                echo "Form not submitted";
            }

        }else{
            echo "All fields required";
        }
    }
}
