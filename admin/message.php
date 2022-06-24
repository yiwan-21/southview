<?php
session_start();
include "../checkLogin.php";
include "../connect.php";
$_SESSION['svid'] = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../../southview_payment/images/Logo SV.png">
  <title>Messages</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;700&family=Inter:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- custom css -->
  <link rel="stylesheet" href="./index.css">
  <link rel="stylesheet" href="message.css">
  <link rel="stylesheet" href="/scrollbar.css">
</head>

<body>
  <div class="container-fluid">
    <?php
  $page='Messages';
  include 'top-navbar.php';
?>
    <!-- logout button -->
    <section id="logout">
      <br><br><br><br>
      <div class="container-fluid-lg-12">
        <div class="row justify-content-center">
          <div class="col-lg-9"></div>
          <div class="col-lg-2 justify-content-end d-flex align-items-end">
            <div class="col-lg-1"></div>
            <!-- <a href="../login/login.php" class="logoutbtn">LOGOUT</a> -->
            <a href="javascript:Alert();" class="logoutbtn">LOGOUT</a>
          </div>
        </div>
      </div>
    </section>

    <section id="button">

      <br><br>
      <form method="post">
        <button type="submit" class="btn mx-3 btn-warning position-relative btn-message" name="type" value="help">
          Help Request
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="unread_help">
            
            <span class="visually-hidden">unread messages</span>
          </span>
        </button>
        
        <button type="submit" class="btn btn-warning position-relative btn-message" name="type" value="other">
          Others
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="unread_other">
            
            <span class="visually-hidden">unread messages</span>
          </span>
        </button>
      </form>
      </section>
    <br>
    <div class="container-lg-12">
      <div class="row justify-content-start">
        <div class="wrap">
          <form class="search" onsubmit="searchUser(event)">
            <input type="text" class="searchTerm" placeholder="Search">
            <button type="submit" class="searchButton">
              <img src="images/search.svg" alt="Search Icon">
            </button>
          </form>
        </div>
        <br>
      </div>
    </div>
  </div>

  <div class="main-wrapper">
    <div class="user-list scroll-bar-left-wrapper">
      <div class="scroll-bar-left"></div>
    </div>

    <div class="message scroll-bar-wrapper">
      <div class="scroll-bar"></div>
    </div>
  </div>


  <br><br>
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

  <script>
    const userList = document.querySelector('.user-list').firstElementChild;
    const message = document.querySelector('.message').firstElementChild;
    <?php 
      if (isset($_POST['type'])) {
        $_SESSION['serviceType'] = $_POST['type'];
      }
    ?>

    // const users = [
    //   {
    //     name: 'Jacob Jones',
    //     avatar: 'https://images.unsplash.com/photo-1558624232-75ee22af7e67?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8Y2hhcmFjdGVyfGVufDB8MnwwfHw%3D&auto=format&fit=crop&w=500&q=60',
    //     message: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti!',
    //     time: '04/24/2022 18:56:07 GMT+0800',
    //     new: true,
    //   },
    //   {
    //     name: 'Leslie Alexander',
    //     avatar: 'https://images.unsplash.com/photo-1593085512500-5d55148d6f0d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8Y2hhcmFjdGVyfGVufDB8MnwwfHw%3D&auto=format&fit=crop&w=500&q=60',
    //     message: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio obcaecati qui nostrum?',
    //     time: '04/23/2022 13:24:47 GMT+0800',
    //     new: false,
    //   },
    //   {
    //     name: 'Eleanor Pena',
    //     avatar: 'https://images.unsplash.com/photo-1586374579358-9d19d632b6df?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fGljb258ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60',
    //     message: 'Lorem ipsum dolor sit amet.',
    //     time: '04/22/2022 12:56:07 GMT+0800',
    //     new: false,
    //   },
    //   {
    //     name: 'Kathryn Murphy',
    //     avatar: 'https://images.unsplash.com/photo-1453738773917-9c3eff1db985?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8ODh8fGljb258ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60',
    //     message: 'Lorem ipsum dolor sit amet consectetur.',
    //     time: '04/24/2022 09:30:00 GMT+0800',
    //     new: true,
    //   },
    //   {
    //     name: 'Wade Warren',
    //     avatar: 'https://images.unsplash.com/photo-1576490467522-680bc4892baf?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjB8fGNhcnRvb258ZW58MHwyfDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60',
    //     message: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio obcaecati qui nostrum?',
    //     time: '04/23/2022 13:24:47 GMT+0800',
    //     new: false,
    //   },
    //   {
    //     name: 'Marvin McKinney',
    //     avatar: 'https://images.unsplash.com/photo-1541534401786-2077eed87a74?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cHJvZmlsZSUyMHBpY3R1cmV8ZW58MHwyfDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60',
    //     message: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti!',
    //     time: '04/24/2022 18:56:07 GMT+0800',
    //     new: true,
    //   },
    // ];
    const usersMessage = [];
    const users = [];
    // $query = "SELECT * FROM message GROUP BY Resident_svID DESC";
    <?php
    $query = "SELECT m.*, r.* FROM message m 
              INNER JOIN resident r 
              ON m.Resident_svID = r.Resident_svID";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
      $admin = $row['Administrator_svID'];
      // $svid = $row['Resident_svID'];
      // $query2 = "SELECT Profile_Picture, mime FROM resident WHERE Resident_svID = '$svid'";
      // $result2 = mysqli_query($conn, $query2);
      // $row2 = mysqli_fetch_assoc($result2);
      $avatar = $row['Profile_Picture'];
      $mime = $row['mime'];
      if (is_null($avatar)) {
        $avatar = "../southview_profile/image.jpg";
      } else {
        $avatar = "data:$mime;base64," . base64_encode($avatar);
      }
      if (is_null($admin)) {
        $side = "opposite"; // the chat bubble on the left (resident)
      } else {
        $side = "self"; // the chat bubble on the right (admin)
      }
      echo "usersMessage.push({
          side: '$side',
          svid: '" . $row['Resident_svID'] . "',
          avatar: '" . $avatar . "',
          message: '" . $row['Message_Content'] . "',
          new: '" . ($row['Seen'] == '0') . "',
        });";
    }

    $query = "SELECT m1.* FROM message m1 
              LEFT JOIN message m2
              ON (m1.Resident_svID = m2.Resident_svID AND m1.Message_ID < m2.Message_ID) 
              WHERE m2.Message_ID IS NULL 
              GROUP BY m1.Resident_svID";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
      $svid = $row['Resident_svID'];
      $query2 = "SELECT `Name`, Profile_Picture, mime  FROM resident WHERE Resident_svID = '$svid'";
      $result2 = mysqli_query($conn, $query2);
      $row2 = mysqli_fetch_assoc($result2);
      $name = $row2['Name'];
      $avatar = $row2['Profile_Picture'];
      $mime = $row2['mime'];
      if (is_null($avatar)) {
        $avatar = "../southview_profile/image.jpg";
      } else {
        $avatar = "data:$mime;base64," . base64_encode($avatar);
      }
      if (is_null($row['Administrator_svID'])) {
        $side = "opposite"; // the chat bubble on the left (resident)
      } else {
        $side = "self"; // the chat bubble on the right (admin)
      }
      echo "users.push({
          type: '" . $row['Service_Type'] . "',
          svid: '$svid',
          name: '" . $name . "',
          avatar: '" . $avatar . "',
          side: '$side',
          message: '" . $row['Message_Content'] . "',
          new: '" . ($row['Seen'] == '0') . "',
        });";
    }
    ?>

    document.getElementById('unread_help').textContent = users.filter(user => !!user.type && user.new).length;
    document.getElementById('unread_other').textContent = users.filter(user => !user.type && user.new).length;

    users.filter(user => {
      // alert(!user.type);
      if ('<?php echo $_SESSION['serviceType']?>' === 'other') {
        return !user.type;
      } else {
        return !!user.type;
      }
    })
    .forEach(user => {
      const newUser = createUser(user);
      newUser.addEventListener('click', () => {
        userList.querySelectorAll('.user').forEach(user => user.classList.remove('user-active'));
        newUser.classList.add('user-active');
        const notification = newUser.querySelector('.notification-active');
        if (notification) {
          notification.classList.remove('notification-active');
          notification.classList.add('notification');
        }
        // if (user.new) {
        //   user.new = false;
        // }
        if (window.innerWidth <= 768) {
          document.querySelector('.message').classList.add('open');
          document.querySelector('.user-list').classList.add('close');
        }
        message.innerHTML = '';
        message.appendChild(createMessagePage(user));
        usersMessage.filter(e => e.svid === user.svid).forEach(e => appendMessage(e));
        if (message) {
          message.scrollTop = message.scrollHeight - message.clientHeight
        }
      });
      userList.appendChild(newUser);
    })

    function createUser(user) {
      const userElement = document.createElement('div');
      userElement.classList.add('user');
      userElement.innerHTML = `
              <div class="user-info">
                  <span class=${user.new ? 'notification-active' : 'notification'}>
                      &#9679;
                  </span>
                  <img src="${user.avatar}" alt="avatar">
                  <div class="text">
                  <span class="name">${user.name}</span>
                      <div>
                          ${(user.side === 'self' ? `
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" width="20" height="20" fill="#FFF">
                              <path d="M137.4 406.6l-128-127.1C3.125 272.4 0 264.2 0 255.1s3.125-16.38 9.375-22.63l128-127.1c9.156-9.156 22.91-11.9 34.88-6.943S192 115.1 192 128v255.1c0 12.94-7.781 24.62-19.75 29.58S146.5 415.8 137.4 406.6z"/>
                            </svg>` 
                            : 
                            `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" width="20" height="20" fill="#FFF">
                              <path d="M118.6 105.4l128 127.1C252.9 239.6 256 247.8 256 255.1s-3.125 16.38-9.375 22.63l-128 127.1c-9.156 9.156-22.91 11.9-34.88 6.943S64 396.9 64 383.1V128c0-12.94 7.781-24.62 19.75-29.58S109.5 96.23 118.6 105.4z"/>
                            </svg>`)}
                          ${user.message}
                      </div>
                  </div>
              </div>`;
      return userElement;
    }

    function createMessagePage(user) {
      const messagePage = document.createElement('div');
      messagePage.style.height = '100%';
      messagePage.innerHTML =
      `${'<?php echo $_SESSION['serviceType'];?>' === 'other' ? '' : `<div class="chat-name">${user.type}</div>`}
        <div class="textarea"></div>
        <div class="reply-wrapper">
          <form class="reply" method="post">
              <input type="hidden" name="svid" value='${user.svid}'>
              <input type="hidden" name="serviceType" value='${user.type}'>
              <input type="text" name="message" placeholder="Write a message...">
              <button type="submit" name="submitMessage">
                  <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M21.944 2.36621L11.0137 13.2966" stroke="#001329" stroke-linecap="round"
                          stroke-linejoin="round" />
                      <path d="M21.9437 2.36621L14.988 22.2396L11.0133 13.2965L2.07031 9.32188L21.9437 2.36621Z"
                          stroke="#001329" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
              </button>
          </form>
        </div>`;
      return messagePage;
    }

    <?php 
      if (isset($_POST['submitMessage'])) {
        $svid = $_POST['svid'];
        $message = $_POST['message'];
        $serviceType = $_POST['serviceType'];
        $query = "INSERT INTO message (Resident_svID, Administrator_svID, Message_Content, Seen, Service_Type) VALUES ('$svid', '".$_SESSION['svid']."', '$message', '1', '".(($_SESSION['serviceType']) == 'other' ? null : $serviceType)."')";
        $result = mysqli_query($conn, $query);
        echo "usersMessage.push({
          side: 'self',
          svid: '$svid',
          message: '$message',
          new: 0,
        });";
        echo "users.filter(e => e.svid === '$svid')[0].message = '$message';";
      }
    ?>
     
    function appendMessage(user) {
      const textarea = document.querySelector('.textarea');
      const newNode = document.createElement('div');
      newNode.classList.add(user.side);
      if (user.side == 'opposite') {
        newNode.insertAdjacentHTML('afterbegin', `<img src=${user.avatar} alt="avatar">`);
        textElement = document.createElement('div');
        textElement.classList.add('opposite-text');
        textElement.textContent = user.message;
        newNode.appendChild(textElement);
      } else {
        newNode.textContent = user.message;
      }
      textarea.appendChild(newNode);
      // if (message) {
      //   message.scrollTop = textarea.scrollHeight - newNode.clientHeight;
      // }
      // if (user.side == 'self') {
      //   messagePage.innerHTML += `<div class="textarea">
      //   <div class="self">
      //     ${user.message}
      //   </div>
      //   </div>`
      // } else {
      //   messagePage.innerHTML += `<div class="textarea">
      //   <div class="opposite">
      //     <img src=${user.avatar} alt="avatar">
      //     <div class="opposite-text">
      //         ${user.message}
      //     </div>
      //   </div>
      //   </div>`
      // }
    }

    function sendMessage(event) {
      event.preventDefault();
      const textarea = document.querySelector('.textarea');
      const input = event.target.firstElementChild;
      const text = input.value;
      if (!text) return;
      input.value = '';
      const newNode = document.createElement('div');
      newNode.classList.add('self');
      newNode.textContent = text;
      textarea.appendChild(newNode);
      if (message) {
        message.scrollTop = textarea.scrollHeight - newNode.clientHeight;
      }
    }

    function searchUser(event) {
      event.preventDefault();
      const text = event.target.firstElementChild.value;
      userList.innerHTML = '';
      users.filter(user => user.name.toLowerCase().includes(text.toLowerCase()))
        .forEach(user => {
          const newUser = createUser(user);
          newUser.addEventListener('click', () => {
            userList.querySelectorAll('.user').forEach(user => user.classList.remove('user-active'));
            newUser.classList.add('user-active');
            const notification = newUser.querySelector('.notification-active');
            if (notification) {
              notification.classList.remove('notification-active');
              notification.classList.add('notification');
            }
            user.new = false;
            message.innerHTML = '';
            message.appendChild(createMessagePage(user));
            if (message) {
              message.scrollTop = message.scrollHeight - message.clientHeight
            }
          });
          userList.appendChild(newUser);
        })
    }

    function returnToUser() {
      document.querySelector('.message').classList.remove('open');
      document.querySelector('.user-list').classList.remove('close');
      userList.querySelectorAll('.user').forEach(user => user.classList.remove('user-active'));
    }
  </script>

  <!-- custom js -->
  <script src="./index.js"></script>

</body>

</html>