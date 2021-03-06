<?php include "../checkLogin.php"; ?>

<!DOCTYPE html>
<head>

    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/all.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

    <link rel='icon' href='/images/Logo SV.png'>
    <link rel='stylesheet' href='AboutUs.css'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title>About us</title>
</head>

<body>
    <section class="header">
        <div class="header-txt">
            <h1>SOUTH VIEW</h1>
            <p>A residential enclave <br> designed for urban professionals</p>
        </div>

        <div class="header-img">
            <img src="/images/background.jpg" alt="round image">
        </div>

        <div class="header-nav">
            <div class="header-indicator">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>

            <a class="nav_link scroll" href="#first-sec">VIEW MORE BELOW</a>
        </div>
    </section>

    <section class="first-sec" id="first-sec">
        <div class="first-heading">
            <h1>Exclusively Modern <br>& Conventional Central</h1>
        </div>
        <div class="first-para">
            <p>Located at a prestigious address, South View Serviced Apartments is a residential
                enclave designed for urban professionals. Well connected to major expressways and 
                public transport, it offers exceptionally convinient, city living, where shopping,
                dining, health care institution are literally just steps away.</p>
        </div>
    </section>

    <div class="second-box">
        <div class="flex-wrap">
            <div class="flex-r1">
                <h1>Facilities</h1>
                <p>Multi-Purpose Hall/Private Function Room, Restrooms/Changing Rooms, Children???s Playground, 
                    Gymnasium, Meeting Room, Wading Pool, Barbecue Area, Swimming Pool, Outdoor Cafe, Catering Preparation Area, 
                    Childcare Centre and Surau</p>
            </div>
            <div class="flex-r2"></div>
            <div class="flex-r3">
                <h1>Aminities</h1>
                <p>Proximity to Shopping Malls (e.g. Mid Valley Megamall/The Gardens, Bangsar Shopping Centre and Bangsar Village I & II) <br>
                    Proximity to Healthcare and Education (e.g. Pantai Medical Centre Kuala Lumpur, Life Care Diagnostic Medical Centre, University of Malaya)
                </p>
            </div>
        </div>
    </div>

    <section class="third-sec">
        <div class="third-heading">
            <h1>Gallery</h1>
        </div>
        <div class="third-gal">
            <div class="img-gallery">
                <div class="img-slide">
                    <input type="radio" name="radio-btn" id="btn1">
                    <input type="radio" name="radio-btn" id="btn2">
                    <input type="radio" name="radio-btn" id="btn3">
                    <input type="radio" name="radio-btn" id="btn4">
    
                    <div class="image first">
                        <img src="/images/Southview-Background.jpg" alt="">
                    </div>
                    <div class="image">
                        <img src="/Facilities/images/swimmingsv.jpg" alt="">
                    </div>
                    <div class="image">
                        <img src="/Facilities/images/gymsv.jpg" alt="">
                    </div>
                    <div class="image">
                        <img src="/Facilities/images/multipurposehall.jpg" alt="">
                    </div>
                </div>
    
                <div class="nav-auto">
                    <div class="auto-btn1"></div>
                    <div class="auto-btn2"></div>
                    <div class="auto-btn3"></div>
                    <div class="auto-btn4"></div>
                </div>

                <div class="nav-man">
                    <label for="btn1" class="manual-btn"></label>
                    <label for="btn2" class="manual-btn"></label>
                    <label for="btn3" class="manual-btn"></label>
                    <label for="btn4" class="manual-btn"></label>
                </div>
            </div>
        </div>
    </section>

    <section class="fourth-sec">
        <div class="fourth-wrap">
            <h1>Location</h1>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.9124183830563!2d101.65373616457609!3d3.117868347729676!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cdb47024217187%3A0x1e85ebc65d47d641!2sUniversity%20of%20Malaya!5e0!3m2!1sen!2smy!4v1650694405609!5m2!1sen!2smy" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>  
    </section>

    <div class="fifth-box">
        <p><a class="nav-faq" href="FAQ.php">Need Help?</a> View the link to know more.</p>
    </div>

    <script src="/navigation/navigation.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="AboutUs.js"></script>
</body>