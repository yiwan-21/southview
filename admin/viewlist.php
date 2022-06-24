<?php
include '../connect.php';
include '../checkLogin.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/logo.svg">
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
  <link rel="stylesheet" href="index.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container-fluid">
    <!-- <div class="bungkus"> -->
    <!-- top navigation bar -->
    <?php
    $page = 'ResidentAcc';
    include 'top-navbar.php';
    ?>

    <!-- logout button -->
    <?php
    include 'logout.php';
    ?>

    <!-- Side-Nav -->
    <?php
    $side_page = 'viewlist';
    include 'side-navbar.php';
    ?>

    <!-- Main Content -->
    <div class="p-1 my-container active-cont">
      <!-- Top Nav -->
      <nav class="navbar top-navbar navbar-light px-5">
        <a class="btn border-0" id="menu-btn">
          <img class="icon" src="images/menu.svg" alt="Menu Icon">
          <span class="mx-2 table-title">Resident List</span>
        </a>
      </nav>

      <!-- <div class="dropdown">
        <button class="btn btn-danger btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          Delete Options
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1"> -->
          <!-- select all-->
          <!-- <button type="button" class="btn btn-sm btn-select" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <a class="dropdown-item" href="#"><input type="button" onclick='selects()' value="Select All" /></a>
          </button type>
          <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <a class="dropdown-item" href="#"><input type="button" value="Selected Checkbox" /></a>
          </button>
        </ul>
        <br><br>
      </div> -->

      <div class="table-responsive">
        <table id="example-viewlist" class="table table-font table-borderless table-dark table-hover vertical-align: middle">
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
            $sql = "select Resident_svID,Name,Unit from `resident`";
            $result = mysqli_query($conn, $sql);

            if ($result) {

              while ($row = mysqli_fetch_assoc($result)) {
                $SV_ID = $row['Resident_svID'];
                $name = $row['Name'];
                $unit = $row['Unit'];
                // echo "<script> console.log($SV_ID);</script>";
                echo ' <tr>
                        <th scope="row"></th>
                          <td>' . $SV_ID . '</td> 
                          <td>' . $name . '</td> 
                          <td>' . $unit . '</td>              
                          <td>
                            <a href="update-profile.php?updateResidentid=' . $SV_ID . '">
                              <img class="icon" src="images/update.svg" alt="Update Icon">
                            </a>   
                            
                            <!-- Button trigger modal -->
                            <button type="button" data-id="'.$SV_ID.'" class="btn btn-sm delete-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                              <img class="icon" src="images/delete.svg" alt="Delete Icon" style="margin: auto;">
                            </button> 
                                   
                    </td>        
                        </tr>';
              }
            }
            // mysqli_close($conn);
            ?>
          </tbody>
        </table>
      </div>

    </div>

     <!-- Delete Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header border-0">
                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <form action="deleteResident.php" method="POST"> 
                                  <div class="modal-body border-0">
                                    <input type="hidden" name="userid" id='delete_id'>
                                    <p class="modal-font">Are you sure you want to delete the selected Resident?</p> 
                                  </div>
                                  <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <!-- <a href="delete-Covid19.php?deleteCovid19id='.$Patient_ID.'"> -->
                                    <button class="btn btn-danger" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal" name="delete">Delete</button>
                                    <!-- </a> -->
                  </form>
                                  </div>
                                </div>
                              </div>
                            </div> 

    <!-- footer -->
    <?php
    include 'footer.php';
    ?>

    <script type='text/javascript'>
       $(document).ready(function(){
                $('.delete-btn').click(function(e){
                    e.preventDefault();
                    var userid = $(this).data('id');
                    $('#delete_id').val(userid);
                    $('#exampleModal').modal('show'); 
                  });

                });
    </script>


    </div> 
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <!-- custom js -->
    <script src="index.js"></script>
    


</body>

</html>
