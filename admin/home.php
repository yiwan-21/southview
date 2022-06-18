<?php include "../checkLogin.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.svg">
    <title>Management Home Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;700&family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="container-fluid">
    <!-- top navigation bar -->
    <?php
    $page='home';
    include 'top-navbar.php';
    ?>

      <!-- logout button -->
      <?php
      include 'logout.php';
      ?>

      <!-- intro text and main image -->
      <section id="intro">
        <br><br>
          <div class="container-lg-12" >
          <div class="row justify-content-center">
              <div class="col-lg-5 justify-content-center d-flex align-items-center text-center ">
                <div class= "left-management-wrapper">
                    <a href="home.php">
                    <!-- logo -->
                    <img class="img-fluid" src="images/logo.svg" alt="SV logo">
                    </a>
                    <h1>WELCOME TO <br>MANAGEMENT OFFICE</h1>
                    <p>Here we keep records of the various<br>members who make up the<br>community.</p>
                </div>
              </div>
              
              <div class="col-lg-7 justify-content-center d-flex align-items-end text-center">
                <div class= "right-management-wrapper">
                    <!-- management image -->
                    <div class="management-image">
                        <img src="images/homeimage.svg" alt="Home image">
                    </div>
                    <!-- text on the image -->
                    <div class="management-image-text">
                    <h2>The community is the string that can connect each other.</h2>
                    <p>The value is what brings us together!</p>
                    </div>
                </div>
            </div>
          </div>
         </div>
              
    </section>
    </div>
    <br><br>
    <!-- footer -->  
    <?php
      include 'footer.php';
    ?>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  
    <!-- custom js -->
    <script src="index.js"></script>

</body>
</html>