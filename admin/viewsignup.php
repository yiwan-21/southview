<?php
<<<<<<< HEAD
    include '../connect.php';
    include '../checkLogin.php';
=======
    include 'connect.php';

>>>>>>> 7010eaa6be05370d867a52fe3b4189e120a23d19
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.svg">
    <title>Sign Up Request</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;700&family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container-fluid">
    <!-- top navigation bar -->
    <?php
    $page='ResidentAcc';
    include 'top-navbar.php';
    ?>

      <!-- logout button -->
      <?php
      include 'logout.php';
      ?>     
        <!-- Side-Nav -->
        <?php
        $side_page='viewsignup';
        include 'side-navbar.php';
        ?>
        
        <!-- Main Content -->
        <div class="p-1 my-container active-cont">
          <!-- Top Nav -->
          <nav class="navbar top-navbar navbar-light px-5">
            <a class="btn border-0" id="menu-btn">
              <img class="icon" src="images/menu.svg" alt="Menu Icon">
              <span class="mx-2 table-title">Sign Up Request</span>
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
            <table id="example-signuprequest" class="table table-font table-borderless table-dark table-hover vertical-align: middle">
              <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">ID</th>                  
                    <th scope="col">Name</th>                  
                    <th scope="col">E-mail</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Action</th>                 
                  </tr>
                </thead>
                <tbody>
                <?php
                    $sql="select signup_ID,Name,Email,Unit from `resident_signup`";
                    $result=mysqli_query($conn,$sql);

                    if($result){
                      
                      while($row=mysqli_fetch_assoc($result)){                      
                        $id=$row['signup_ID'];
                        $name=$row['Name'];
                        $email=$row['Email'];
                        $unit=$row['Unit'];
                        echo ' <tr>
                        <th scope="row"><input type="checkbox" name="chk" value="1"></th>
                          <td>'.$id.'</td> 
                          <td>'.$name.'</td> 
                          <td>'.$email.'</td>  
                          <td>'.$unit.'</td>             
                          <td style="
                          display: flex;
                          align-items: center;">
                            <a href="validateSignUpRequest.php?validateSignUpRequestid='.$id.'&email='.$email.'">
                            
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                            width="22" height="22"
                            viewBox="0 0 172 172"
                            style=" fill:#undefined;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><path d="M157.66667,86c0,39.57792 -32.08875,71.66667 -71.66667,71.66667c-39.57792,0 -71.66667,-32.08875 -71.66667,-71.66667c0,-39.57792 32.08875,-71.66667 71.66667,-71.66667c39.57792,0 71.66667,32.08875 71.66667,71.66667z" fill="#4caf50"></path><path d="M123.9905,52.32383l-48.7405,48.72258l-20.07383,-20.0595l-10.02258,10.02258l30.09642,30.11075l58.7595,-58.77383z" fill="#ffffff"></path></g></g></svg>                           
                            </a>    

                            <!-- Button trigger modal -->
                              <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <img class="icon" src="images/delete.svg" alt="Delete Icon">
                              </button>
                              
                              <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header border-0">
                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body border-0">
                                    <p>Are you sure you want to delete the selected Covid-19 Report?</p> 
                                  </div>
                                  <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <a href="deleteSignUpRequest.php?deleteSignUpRequestid='.$id.'">
                                    <button class="btn btn-danger" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Delete</button>
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div> 
                                          
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
    <?php
      include 'footer.php';
    ?>
      
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <!-- custom js -->
    <script src="index.js"></script>
    
</body>
</html>