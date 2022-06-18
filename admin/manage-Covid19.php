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
    <title>Covid-19 Reporting</title>
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
        $page='Covid19';
        include 'top-navbar.php';
        ?>
        
        <!-- logout button -->
        <?php
        include 'logout.php';
        ?>

        <!-- Main Content -->
        <div class="my-container">
        
          <br>
          <div class="table-responsive">
            <table id="example-Covid19" class="table table-font table-borderless table-dark table-hover vertical-align: middle">
              <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">SV ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">Symptom</th>
                    <th scope="col">Action</th>                 
                  </tr>
                </thead>
                <tbody>
                <?php
                    $sql="select * from `covid-19 patient`";
                    $result=mysqli_query($conn,$sql);

                    if($result){
                      
                      while($row=mysqli_fetch_assoc($result)){                      
                        $SV_ID=$row['Resident_svID'];
                        $name=$row['Name'];
                        $unit=$row['Unit'];
                        $date_start=$row['Date_Start'];
                        $symptom=$row['Symptom'];
                        $Patient_ID=$row['Patient_ID'];
                        $validate_status=$row['Validate_Status'];
                        echo ' <tr>
                          <th scope="row"></th>
                          <td>'.$SV_ID.'</td> 
                          <td>'.$name.'</td> 
                          <td>'.$unit.'</td> 
                          <td>'.$date_start.'</td> 
                          <td>'.$symptom.'</td>               
                          <td>

                          <button data-id='.$Patient_ID.' class="userinfo btn btn-success">
                            <img class="icon" src="images/output-onlinepngtools.png" alt="Show Icon" style="width: 30px; height: auto;">
                          </button>

                            <a href="validate-Covid19.php?validateCovid19id='.$Patient_ID.'">
                              <img class="'. ($validate_status==1 ? "validatedicon" : "validateicon").'" src="images/validate.svg" alt="Validate Icon">
                            </a>
                            &nbsp;
                            <a href="update-Covid19.php?updateCovid19id='.$Patient_ID.'">
                              <img class="icon" src="images/update.svg" alt="Update Icon">
                            </a>    
                           
                            <!-- Button trigger modal -->
                            <a href="delete-Covid19.php?deleteCovid19id='.$Patient_ID.'">
                            <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                              <img class="icon" src="images/delete.svg" alt="Delete Icon">
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
    
    <!-- Show Testkit -->
    <div class="modal fade" id="mymodal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" id='mymodal-dialog'>
                                <div class="modal-content">
                                  <div class="modal-header border-0" id='show-header'>
                                    <h5 class="modal-title" id="exampleModalLabel">Test Kit Result</h5>
                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                  </div>
                                  <div class='modal-body' id='show-body'>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                $('.userinfo').click(function(){
                    var userid = $(this).data('id');
                    $.ajax({
                        url: 'view-Covid19.php',
                        type: 'post',
                        data: {userid: userid},
                        success: function(response){ 
                            $('.modal-body').html(response); 
                            $('#myModal').modal('show'); 
                        }
                    });
                });
            });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <!-- custom js -->
    <script src="index.js"></script>
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
    
</body>
</html>


