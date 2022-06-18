<?php
    include 'connect.php';
?>    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resident List</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;700&family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="../index.css">
</head>
<body>
    <div class="container-fluid">
      <nav class="navbar fixed-top navbar-expand-md navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="../home.html">
            <img id="nav-logo" src="../images/logo.svg" alt="SV logo">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link mx-1" aria-current="page" href="../home.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-1 active" href="./viewsignup.html">Residents Account</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-1" href="../manage-Covid19.html">Covid-19 Reporting</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-1" href="../message.html">Messages</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

        <!-- logout button -->
        <section id="logout">
            <br><br><br><br>
            <div class="container-fluid-lg-12" >
            <div class="row justify-content-center" >
                <div class="col-lg-9"></div>
                <div class="col-lg-2 justify-content-end d-flex align-items-end">
                <div class="col-lg-1"></div>
                <!-- <a href="../../login/login.html" class="logoutbtn">LOGOUT</a> -->
                <a href="javascript:Alert1();" class="logoutbtn">LOGOUT</a>
            </div>          
                </div>
            </div>
            <br>
        </section>

        <!-- Side-Nav -->
        <div class="side-navbar active-nav d-flex justify-content-center align-items-center flex-wrap flex-column" id="sidebar">
          <div>
            <a href="../home.html">
            <!-- logo -->
            <img class="sidebar-logo" src="../images/logo.svg" alt="SV logo">
            </a>
          </div>
          
          <ul class="nav flex-column text-white w-100">
            <br><br>
            <li>
              <a href="./viewsignup.html">           
              <span class="nav-link sidenav-font"><img class="icon" src="../images/viewsignup.svg" alt="View Icon"> Sign Up Request</span>
              </a>
            </li>
            <br>
            <li>
              <a href="./register.html">           
                <span class="nav-link sidenav-font"><img class="icon" src="../images/register.svg" alt="Register Icon">   Register</span>
              </a>
            </li>
            <br>
            <li>
              <a href="./viewlist.html">           
                <span class="active-sidenav nav-link sidenav-font"><img class="icon" src="../images/viewlist.svg" alt="View List Icon">   Resident List</span>
              </a>
            </li>
          </ul>
        </div>

        <!-- Main Content -->
        <div class="p-1 my-container active-cont">
          <!-- Top Nav -->
          <nav class="navbar top-navbar navbar-light px-5">
            <a class="btn border-0" id="menu-btn">
              <img class="icon" src="../images/menu.svg" alt="Menu Icon">
              <span class="mx-2 table-title">Resident List</span>
            </a>
          </nav>

          <div class="dropdown">           
            <button class="btn btn-danger btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Delete Options
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <!-- select all--> 
              <button type="button" class="btn btn-sm btn-select" data-bs-toggle="modal" data-bs-target="#exampleModal">             
                <a class="dropdown-item" href="#"><input type="button" onclick='selects()' value="Select All"/></a>
              </button type>  
              <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <a class="dropdown-item" href="#"><input type="button" value="Selected Checkbox"/></a>
              </button>
            </ul>
          <br><br>
        </div>
          
          <div class="table-responsive">
            <table id="example" class="table table-font table-borderless table-dark table-hover vertical-align: middle">
              <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">SV ID</th>                  
                    <th scope="col">Name</th>           
                    <th scope="col">Unit</th>
                    <th scope="col">Action</th>                 
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql="select Resident_svID,Name,Unit from `resident`";
                    $result=mysqli_query($conn,$sql);

                    if($result){
                      
                      while($row=mysqli_fetch_assoc($result)){                      
                        $SV_ID=$row['Resident_svID'];
                        $name=$row['Name'];
                        $unit=$row['Unit'];
                        echo ' <tr>
                        <th scope="row"><input type="checkbox" name="chk" value="1"></th>
                          <td>'.$SV_ID.'</td> 
                          <td>'.$name.'</td> 
                          <td>'.$unit.'</td>              
                          <td>
                            <a href="../update-profile.php?updateResidentid='.$SV_ID.'">
                              <img class="icon" src="../images/update.svg" alt="Update Icon">
                            </a>    
                            <!-- Button trigger modal -->
                            <a href="deleteResident.php?deleteResidentid='.$SV_ID.'">
                            <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                              <img class="icon" src="../images/delete.svg" alt="Delete Icon">
                            </button> 
                            </a>                
                    </td>        
                        </tr>';
                      }

                    }

                  ?>
                </tbody>
          </table>
          </div>

    </div>

      
    <!-- footer -->  
    <footer class="container-footer text-center text-lg-center">
      <div class="footer row d-flex align-items-center">
  
      <!-- copyright text -->
      <div class="col-lg-12 my-3 text-center text-lg-center">
        <i>Copyright © 2022 SV Community</i>
      </div>
      </div>
  </footer> 
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <!-- custom js -->
    <script src="../index.js"></script>
    
</body>
</html>