<?php require("connect.php") ?>
<!DOCTYPE html>
<html lan="en" and dir="Itr">
    <head>   
        <meta charset="UTF-8">
        <meta  name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up</title>
        <link rel="icon" href="../images/Logo SV.png">
        <link rel="stylesheet" href="signup.css">
          
        <!--Bootstrap CDN-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>
        <body class="bg-img">
            <section>
                  
                <div class="container-fluid pad-top">
                    <div class="row">
                        <div class="col-md-4">             
                        </div>
                            <div class="d-flex col-lg-4 md-12 justify-content-center">
                                <img id="image" class="im-fluid" src="../images/Logo SV.png">
                            </div>
                            <div class="col-md-4">         
                            </div>
                    </div>
                </div>
                                
                                <div class="container-fluid pad-top">
                                    <div class="row">
                                        <div class="col-lg-4 ">             
                                        </div>

                                        <div class="col-lg-4 bg">
                                            <h2 class="text-center">Sign Up</h2>
                                            <form action="" method="post">
                                                <hr>        
                                    <table class="table table-borderless">
                                                <tr>
                                                   <td><input type="text" placeholder="Enter Name" name="name" class="form-control" required></td> 
                                                </tr>
            
                                                <tr>
                                                    <td><input type="number" placeholder="Enter IC NO/Passport NO" name="identityno" class="form-control" required></td> 
                                                </tr>
                                                    <tr>
                                                        <td><input type="number" placeholder="Enter Age" name="age" class="form-control" required></td> 
                                                     </tr>
                                                     <tr>
                                                        <td><input type="number" placeholder="Enter Phone Number" name="phonenum" class="form-control" required></td> 
                                                     </tr>
                                                     <tr>
                                                       
                                                    <td><input type="radio" name="gender" class="male" value="male" required>
                                                        <strong>Male</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
                                                            type="radio" name="gender" class="female" value="female">
                                                        <strong>Female</strong></td> 
                                                 </tr>

                                                 
                                                 <tr>
                                                   <td><input type="email" placeholder="Enter Email" name="email" class="form-control" required></td> 
                                                </tr>

                                                <tr>
                                                <td style='color:red;'><?php if(isset($error_email)&!empty($error_email)){echo $error_email;} ?></td>
                                                </tr>
            
                                                <tr>
                                                    <td><input type="text" placeholder="Enter Unit" name="unit" class="form-control" required></td> 
                                                    
                                                </tr>

                                                <tr>
                                                <td style='color:red;'><?php if(isset($error)&!empty($error)){echo $error;}?>
                                                <?php if(isset($error_unit)&!empty($error_unit)){echo $error_unit;} ?></td>
                                                </tr>

                                                    <tr>
                                                        <td><input type="text" placeholder="Enter Vehicle NO" name="vehicle" class="form-control" required></td> 
                                                     </tr>
                                                     <tr>
                                                        <td><input type="password" class="form-control" placeholder="Enter Password" name="password" id="logpw" inputmode="numeric" minlength="8"
                                                            maxlength="15" size="15" required onkeyup='check();'></td>
                                                    </tr>

                                                    <tr class="checkpass">
                                                        <td><input type="checkbox" onclick="myFunction()"><strong> Show Password </strong></td>
                                                    </tr>
                                                    
                                                        <td><input type="password"  class="form-control" placeholder="Enter Confirm Password" name="confirmpw" id="confirmpw" inputmode="numeric" minlength="8"
                                                            maxlength="15" size="15" required  onkeyup='check();'></td>
                                                            
                                                    </tr>

                                                   
                                                    <tr class="checkpass">
                                                        <td><input type="checkbox" onclick="myFunction1()"><strong> Show Password </strong><div id="message">&nbsp;</div></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td style='color:red;'><?php if(isset($pass_error)&!empty($pass_error)){echo $pass_error;} ?></td>
                                                    </tr>
                                                    
                                                    
                                                   
                                                    <tr class="text-center clearfix">
                                                        <td>
                                                            <h6><strong>Already have an account? <a  href="/login/login.php">Login here</strong> </a> &nbsp;</h6> 
                                                        </td>
                                                    </tr>
    
                                                  
                                                        <tr class="text-center">
                                                            <td>
                                                                <a id="signuplink" href="/login/login.php">
                                                                <button id="backbtn" type="button" class="">Back</button>
                                                                </a>
                                                                <button name='submit' id="submitbtn" type="submit" class="">Submit</button>
                                                         </td>
                                                        </tr>
                                                      
                                            </table>
                                            </form>
                                        </div>
                                        <div class="col-lg-4 ">             
                                        </div>
                                    </div>
                                </div>
                               
            </section>

            <script>
if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
            <script>

                function handleFormSubmit(event) {
                    event.preventDefault();
                    //window.location.href="signup2.html"
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