<?php
    include('../connect.php');
    session_start();
    $svID = $_SESSION["svid"];
    // chat things
    $_SESSION['role'] = "Resident";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>South View</title>
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="/navigation/navigation.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <div id="navbar-template">
        <nav class="navbar">
            <div class="logo">
                <img id="logo" src="/images/Logo SV.png" alt="logo" onclick="window.location.href='/Homepage/indexHomepage.php'">
            </div>
            <div class="max-width">
                <ul class="menu" id="menunav">
                    <li><a href="/Homepage/indexHomepage.php" class="menu-btn">HOME</a></li>
                    <li><a href="/Facilities/facilities.php" class="menu-btn">FACILITIES</a></li>
                    <li><a href="/visitor-pass/visitorpass.html" class="menu-btn">VISITOR PASS</a></li>
                    <li><a href="/covidStatus/healthyCovidStatus.php" class="menu-btn">COVID-19 STATUS</a></li>
                    <li><a href="/AboutUs/AboutUs.php" class="menu-btn">ABOUT US</a></li>
                </ul>    
                <div class="menu-btn">
                    <i id="icon" onclick="toggleMenu()">
                        <svg class="svg-icon" viewBox="0 0 20 20">
                            <path fill="currentColor" d="M3.314,4.8h13.372c0.41,0,0.743-0.333,0.743-0.743c0-0.41-0.333-0.743-0.743-0.743H3.314
                                c-0.41,0-0.743,0.333-0.743,0.743C2.571,4.467,2.904,4.8,3.314,4.8z M16.686,15.2H3.314c-0.41,0-0.743,0.333-0.743,0.743
                                s0.333,0.743,0.743,0.743h13.372c0.41,0,0.743-0.333,0.743-0.743S17.096,15.2,16.686,15.2z M16.686,9.257H3.314
                                c-0.41,0-0.743,0.333-0.743,0.743s0.333,0.743,0.743,0.743h13.372c0.41,0,0.743-0.333,0.743-0.743S17.096,9.257,16.686,9.257z"></path>
                        </svg>
                    </i>
                </div>
                <i id="person" onclick="openProfile()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg>
                </i>
                <div class="profile">
                    <div class="profile-detail">
                        <a href="/southview_profile/profile1.php">User Profile</a>
                        <a href="/southview_payment/payment.php">Payment</a>
                        <a href="/navigation/logout.php"><span class="logout">Log Out</span></a>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <div id="chat-template">
        <div onclick="openForm()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="chat" viewBox="0 0 16 16">
                <path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9.586a1 1 0 0 1 .707.293l2.853 2.853a.5.5 0 0 0 .854-.353V2zM5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </svg>
        </div>

        <!-- <div class="chat-popup" id="myForm"> -->
            <!-- <form action="navigation.php" method="POST" class="form-container">
                <h1>Chat</h1>

                <label for="msg"><b>Message</b></label>
                <textarea placeholder="Type message.." name="msg" required></textarea>

                <button type="submit" class="btn">Send</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form> -->
            <!------------- NEW CHAT TEMPLATE ------------->
            <div class="chat-window" id="myForm">
                <div class="wrapper">
                <div class="chat-area">
                    <header>
                    <?php
                        // $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                        $user_id = mysqli_real_escape_string($conn, 1);
                        $sql = mysqli_query($conn, "SELECT * FROM administrator WHERE Administrator_svID = {$user_id}");
                        if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql);
                        }else{
                        // header("location: users.php");
                        echo "Error";
                        }
                    ?>
                    <!-- <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a> -->
                    <!-- <img src="php/images/<?php /*echo $row['img'];*/ ?>" alt=""> -->
                    <div class="back-icon"><i class="fas fa-times" onclick="closeForm()"></i></div>
                    <img src="/navigation/php/images/czh.jpg" alt="">
                    <div class="details">
                        <span><?php echo "SV Management" ?></span>
                        <p><i><?php echo "Your Caring Apartment Advisor"; ?></i></p>
                    </div>
                    </header>
                    <div class="chat-box">

                    </div>
                    <form action="#" class="typing-area">
                    <input type="text" class="resident_id" name="resident_id" value="<?php echo $user_id; ?>" hidden>
                    <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
                    <button><i class="fab fa-telegram-plane"></i></button>
                    </form>
                </div>
                </div>
            <!-- </div> -->
            <!-- END OF NEW CHAT TEMPLATE -->

        </div>
    </div>

    <div id="footer-template">
        <footer>
            <div class="footer">
                <div class="sv-icons">
                    <a href="https://www.facebook.com/" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" class="my-icon" viewBox="0 0 16 16">
                            <defs>
                                <linearGradient id="gradient">
                                    <stop offset="5%" stop-color="#236cff" />
                                    <stop offset="95%" stop-color="#be25ff" />
                                </linearGradient>
                            </defs>
                            <path fill="url(#gradient)" d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                        </svg></a>
                    <a href="https://www.instagram.com/?hl=en" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" class="my-icon" viewBox="0 0 16 16">
                            <path fill="url(#gradient)" d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                        </svg></a>
                    <a href="https://chat.whatsapp.com/I7Xhc1zvUyMI7jLTiTUUeM" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" class="my-icon" viewBox="0 0 16 16">
                            <path fill="url(#gradient)" d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                        </svg></a>
                </div>
                <div class="sv-copyright">
                    <p class="copyright"><i>Copyright &copy; 2022 SV Community</i></p>
                </div>
                <div class="emptysv"></div>
            </div>
        </footer>
    </div>
    <script src="/navigation/navigation.js"></script>
    <script>
        $(document).ready(function() {
            $('.menu-btn').click(function() {
                $('.navbar .menu').toggleClass("active");
                $('.menu-btn i').toggleClass("active");
            });
        })

    </script>
</body>

</html>