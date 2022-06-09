
<?php
// include("loginserv.php"); // Include loginserv for checking username and password
?>

<!DOCTYPE html>
<html lan="en" and dir="Itr">
    <head>   
        <meta charset="UTF-8">
        <meta  name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link rel="stylesheet" href="login.CSS">
          
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
                                <img id="image" class="img-fluid" src="/southview-fe/images/Logo SV.png">
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
                            <h3 class="text-center">Login to Your Account</h3>
                            <!-- onsubmit="handleFormSubmit(event)" -->
                            <form action="loginuser.php" method="post" >
                            <table class="table table-borderless"  >
                                <tr>
<<<<<<< Updated upstream:login/login.html
                                   <td><input type="text" name="" class="form-control" placeholder="Enter SV ID" required></td> 
=======
                                   <td><input type="text" name="svid" class="form-control" placeholder="Enter SV ID" id="svid" required></td> 
>>>>>>> Stashed changes:login/login.php
                                </tr>
                                <tr>
                                    <td><input type="password" name="password" class="form-control" placeholder="Enter Password" id="logpw" inputmode="numeric" minlength="8"
                                        maxlength="15" size="15" required></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class=" dropdown">   
                                            <h6>Choose your status:</h6>
                                            <label for="status"></label>
<<<<<<< Updated upstream:login/login.html
                                            <select id="status">
                                            <option value="Administrator">Administrator</option>
                                            <option value="Resident">Resident</option>
=======
                                            <select id="status" name='role'>
                                                <option id="admin" value="Administrator">Administrator</option>
                                                <option id="resident" value="Resident">Resident</option>
                                            </select>
>>>>>>> Stashed changes:login/login.php
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
<<<<<<< Updated upstream:login/login.html
                                        <!-- <a id=loginlink href="/southview-fe/ForgetpwPage/forgetpwnoti.html"> -->
                                        <input type="submit" name="" class="form-control text-center" value="login" onclick="validateLoginForm()" id="loginbtn">
=======
                                        <!-- <a id=loginlink href="/southview-fe/Homepage/indexHomepage.html"> -->
                                        <input type="submit" name="submit" class="form-control text-center" value="LOGIN" id="loginbtn">
                                        <!-- <button name='submit' id="submitbtn" type="submit" class="form-control text-center">Login</button> -->
>>>>>>> Stashed changes:login/login.php
                                        <!-- </a> -->
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <a id=pw href="/southview-fe/Forgetpw/forgetpass.html" >Forget password?</a> &nbsp;
                                        <h6>Need an account? <a id=signup href="/southview-fe/signup/sigup.html">Sign up</a> &nbsp;</h6> 
                                        
                                    </td>
                                </tr>
                            </form>
                            </table>
                        </div>    
                        <div class="col-lg-4 col-md-4 "></div>
                    </div>
                </div>
            </section>

            <script>
                function handleFormSubmit(event) {
                    event.preventDefault();
<<<<<<< Updated upstream:login/login.html
                    window.location.href="/southview-fe/ForgetpwPage/forgetpw.html" //linkxevenpage  
=======
                    const status = document.getElementById("status").value;
                    if (status === "Administrator") {
                        window.location.href = "/admin/home.html";
                    } else {
                        window.location.href = "/Homepage/indexHomepage.html";
                    }
>>>>>>> Stashed changes:login/login.php
                }
            </script>
        </body>
</html>