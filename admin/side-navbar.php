
<div class="side-navbar active-nav d-flex justify-content-center align-items-center flex-wrap flex-column" id="sidebar" style="z-index:10;">
          <div>
            <a href="home.php">
            <!-- logo -->
            <img class="sidebar-logo" src="images/logo.svg" alt="SV logo">
            </a>
          </div>
          
          <ul class="nav flex-column text-white w-100">
            <br><br>
            <li>
              <a href="viewsignup.php">           
              <span class="nav-link sidenav-font
              <?php
              if($side_page=='viewsignup'){echo 'active-sidenav';}
              ?> 
              "><img class="icon" src="images/viewsignup.svg" alt="View Icon"> Sign Up Request</span>
              </a>
            </li>
            <br>
            <li>
              <a href="register.php">           
                <span class="nav-link sidenav-font
                <?php
                if($side_page=='register'){echo 'active-sidenav';}
                ?>
                "><img class="icon" src="images/register.svg" alt="Register Icon">   Register</span>
              </a>
            </li>
            <br>
            <li>
              <a href="viewlist.php">           
                <span class="nav-link sidenav-font
                <?php
                if($side_page=='viewlist'){echo 'active-sidenav';}
                ?>
                "><img class="icon" src="images/viewlist.svg" alt="View List Icon">   Resident List</span>
              </a>
            </li>
          </ul>
</div>