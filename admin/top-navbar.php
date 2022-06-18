
<nav class="navbar fixed-top navbar-expand-md navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="home.php">
            <img id="nav-logo" src="images/logo.svg" alt="SV logo">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link mx-1
                <?php
                  if($page=='home'){echo 'active';}
                ?>
                " aria-current="page" href="home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-1
                <?php
                  if($page=='ResidentAcc'){echo 'active';}
                ?>
                " href="viewsignup.php">Residents Account</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-1
                <?php
                  if($page=='Covid19'){echo 'active';}
                ?>
                " href="manage-Covid19.php">Covid-19 Reporting</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-1
                <?php
                  if($page=='Messages'){echo 'active';}
                ?>
                " href="message.php">Messages</a>
              </li>
            </ul>
          </div>
        </div>
</nav>