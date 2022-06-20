<?php
include '../connect.php';
include '../checkLogin.php';
if (isset($_POST['delete'])) {
  $id=$_POST['userid'];
  $sql = "delete from `resident_signup` where signup_ID=$id";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    echo '<script type="text/javascript">';
    echo 'alert("Deleted Successfully!");';
    echo 'window.location.href = "viewsignup.php";';
    echo '</script>';
  } else {
    die("Connection failed: " . $conn->connect_error);
  }
}
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
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
  <!-- Delete Successfully -->
  <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title" id="exampleModalToggleLabel2"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body border-0">
          Delete Successful!
        </div>
        <div class="modal-footer border-0">
          <button type="button" class="btn btn-success" data-bs-dismiss="modal">Done</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>