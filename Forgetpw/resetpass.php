<?php

session_start();
$conn = mysqli_connect('localhost','root',"",'south view',3325);
    if($conn->connect_error){
        die(mysqli_connect_error() );
    }
    
if(isset($_POST['submit'])){
    if(!empty($_POST['password'])&&!empty($_POST['confirmpw'])){    

        $password = $_POST['password'];
        $confirmpw = $_POST['confirmpw'];
        $targetEmail = $_SESSION['targetEmail'];
        
        if ($_POST['password']!= $_POST['confirmpw'])
        {
            $pass_error="Oops! Password did not match! Try again.";
        }else{
        $query = mysqli_query($conn, "UPDATE resident SET Password='$password' WHERE Email='$targetEmail' LIMIT 1");
        header("Location: ../login/login.php");
            }

        }
    }
?>


<!DOCTYPE html>
<html lan="en" and dir="Itr">
    <head>   
        <meta charset="UTF-8">
        <meta  name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forget Password</title>
        <link rel="icon" href="../images/Logo SV transaparent.png">
        <link rel="stylesheet" href="resetpass.CSS">
        
        <!--Bootstrap CDN-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>
        
        <body class="bg-img">
            <section>
                  
                <div class="container-fluid pad-top">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 ">             
                        </div>
                            <div class="d-flex col-lg-4 col-md-4 justify-content-center">
                                <img id="image" class="img-fluid" src="../images/Logo SV.png">
                            </div>
                                <div class="col-lg-4 col-md-4">
                                    
                                </div>
                    </div>
                </div>
               
                <div class="container-fluid pad-top">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 ">
                            
                        </div>
                        
                        <div class="col-lg-4 col-md-4  bg">
                            <h3 class="text-center">Forget Password?</h3>
                            <form method="post" action="resetpass.php">
                            <table class="table table-borderless"  >
                                <tr>
                                    <td><input type="password" name="password" class="form-control" placeholder="Enter Password" id="logpw" inputmode="numeric" minlength="8"
                                        maxlength="15" size="15" required onkeyup='check();'></td>
                                </tr>

                                <tr class="checkpass">
                                    <td><input type="checkbox" onclick="myFunction()"><strong> Show Password </strong></td>
                                </tr>
                                
                                    <td><input type="password" name="confirmpw" class="form-control" placeholder="Enter Confirm Password" id="confirmpw" inputmode="numeric" minlength="8"
                                        maxlength="15" size="15" required  onkeyup='check();'></td>
                                        
                                </tr>
                                <tr class="checkpass">
                                    <td><input type="checkbox" onclick="myFunction1()"><strong> Show Password </strong><div id="message">&nbsp;</div></td>
                                </tr>

                                <tr>
                                    <td style='color:red;'><?php if(isset($pass_error)&!empty($pass_error)){echo $pass_error;} ?></td>
                                </tr>

                                <tr class="text-center">
                                    <td>
                                        <button type="submit" name="submit" class="changepw">Change Password</button>                                    
                                 </td>
                                </tr>
                            </table>
                            </form>

                        </div>    
                        <div class="col-lg-4 col-md-4 "></div>
                    </div>
                </div>
            </section>

            <script>
                function handleFormSubmit(event) {
                    event.preventDefault();
                    window.location.href="../login/login.php"
                }

                function myFunction() {
                var x = document.getElementById("logpw");
                if (x.type === "password") {
                     x.type = "text";
                } else {
                    x.type = "password";
                }
            }

            function myFunction1() {
                var x = document.getElementById("confirmpw");
                if (x.type === "password") {
                     x.type = "text";
                } else {
                    x.type = "password";
                }
            }
            
                var check = function() {
                    if (document.getElementById('logpw').value ==
                        document.getElementById('confirmpw').value) {
                        document.getElementById('message').style.color = 'green';
                        document.getElementById('message').innerHTML = 'Passwords matched';
                    } else {
                        document.getElementById('message').style.color = 'red';
                        document.getElementById('message').innerHTML = 'Please make sure the passwords are the same';
              }
            }
            
                </script>
        </body>
</html>