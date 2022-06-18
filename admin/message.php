<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../../southview_payment/images/Logo SV.png">
  <title>Messages</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;700&family=Inter:wght@400;700&display=swap"
    rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- custom css -->
  <link rel="stylesheet" href="./index.css">
  <link rel="stylesheet" href="message.css">
  <link rel="stylesheet" href="/scrollbar.css">
</head>

<body>
  <div class="container-fluid">
    <nav class="navbar fixed-top navbar-expand-md navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="home.html">
          <img id="nav-logo" src="images/logo.svg" alt="SV logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link mx-1" aria-current="page" href="home.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-1" href="./manage-register-account/viewsignup.html">Residents Account</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-1" href="./manage-Covid19.html">Covid-19 Reporting</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-1 active" href="./message.html">Messages</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- logout button -->
    <section id="logout">
      <br><br><br><br>
      <div class="container-fluid-lg-12">
        <div class="row justify-content-center">
          <div class="col-lg-9"></div>
          <div class="col-lg-2 justify-content-end d-flex align-items-end">
            <div class="col-lg-1"></div>
            <!-- <a href="../login/login.html" class="logoutbtn">LOGOUT</a> -->
            <a href="javascript:Alert();" class="logoutbtn">LOGOUT</a>
          </div>
        </div>
      </div>
    </section>

    <section id="button">

      <br><br>
      <button type="button" class="btn mx-3 btn-warning position-relative btn-message">
        Help Request
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
          10
          <span class="visually-hidden">unread messages</span>
        </span>
      </button>

      <button type="button" class="btn btn-warning position-relative btn-message">
        Others
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
          3
          <span class="visually-hidden">unread messages</span>
        </span>
      </button>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

  <script>
    const userList = document.querySelector('.user-list').firstElementChild;
    const message = document.querySelector('.message').firstElementChild;

    const users = [
      {
        name: 'Jacob Jones',
        avatar: 'https://images.unsplash.com/photo-1558624232-75ee22af7e67?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8Y2hhcmFjdGVyfGVufDB8MnwwfHw%3D&auto=format&fit=crop&w=500&q=60',
        message: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti!',
        time: '04/24/2022 18:56:07 GMT+0800',
        new: true,
      },
      {
        name: 'Leslie Alexander',
        avatar: 'https://images.unsplash.com/photo-1593085512500-5d55148d6f0d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8Y2hhcmFjdGVyfGVufDB8MnwwfHw%3D&auto=format&fit=crop&w=500&q=60',
        message: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio obcaecati qui nostrum?',
        time: '04/23/2022 13:24:47 GMT+0800',
        new: false,
      },
      {
        name: 'Eleanor Pena',
        avatar: 'https://images.unsplash.com/photo-1586374579358-9d19d632b6df?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fGljb258ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60',
        message: 'Lorem ipsum dolor sit amet.',
        time: '04/22/2022 12:56:07 GMT+0800',
        new: false,
      },
      {
        name: 'Kathryn Murphy',
        avatar: 'https://images.unsplash.com/photo-1453738773917-9c3eff1db985?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8ODh8fGljb258ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60',
        message: 'Lorem ipsum dolor sit amet consectetur.',
        time: '04/24/2022 09:30:00 GMT+0800',
        new: true,
      },
      {
        name: 'Wade Warren',
        avatar: 'https://images.unsplash.com/photo-1576490467522-680bc4892baf?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjB8fGNhcnRvb258ZW58MHwyfDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60',
        message: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio obcaecati qui nostrum?',
        time: '04/23/2022 13:24:47 GMT+0800',
        new: false,
      },
      {
        name: 'Marvin McKinney',
        avatar: 'https://images.unsplash.com/photo-1541534401786-2077eed87a74?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cHJvZmlsZSUyMHBpY3R1cmV8ZW58MHwyfDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60',
        message: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti!',
        time: '04/24/2022 18:56:07 GMT+0800',
        new: true,
      },
    ];

    users.forEach(user => {
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
        if (window.innerWidth <= 768) {
          document.querySelector('.message').classList.add('open');
          document.querySelector('.user-list').classList.add('close');
        }
        message.innerHTML = '';
        message.appendChild(createMessagePage(user));
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
                      <span class="time">${new Date(user.time).toLocaleDateString()}</span>
                      <div>
                          ${user.message}
                      </div>
                  </div>
              </div>
          `;
      return userElement;
    }

    function createMessagePage(user) {
      const messagePage = document.createElement('div');
      messagePage.style.height = '100%';
      messagePage.innerHTML = `    
        <div class="chat-name">
          <button class="return" onclick="returnToUser()">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-chevron-left"
              viewBox="0 0 16 16">
              <path fill-rule="evenodd"
                d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
            </svg>
          </button>
          <img src=${user.avatar} alt="avatar">
          <h2>${user.name}</h2>
        </div>
        <fieldset class="date">
          <legend>
            ${new Date(user.time).toLocaleDateString()}
          </legend>
        </fieldset>
        
        <div class="textarea">
          <div class="opposite">
            <img src=${user.avatar} alt="avatar">
            <div class="opposite-text">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Asperiores provident fuga quos.
            </div>
          </div>
          <div class="self">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perferendis debitis quaerat, cum eum
              quam possimus omnis quae culpa voluptates iusto?
          </div>
          <div class="opposite">
              <img src=${user.avatar} alt="avatar">
              <div class="opposite-text">
                  Lorem ipsum dolor sit amet.
              </div>
          </div>
          <div class="self">
              Lorem, ipsum.
          </div>
          <div class="opposite">
              <img src=${user.avatar} alt="avatar">
              <div class="opposite-text">
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas vitae ad deserunt eveniet
                  accusamus facere laboriosam quaerat omnis, vero nulla?
              </div>
          </div>
        </div>

        <div class="reply-wrapper">
          <form class="reply" onsubmit="sendMessage(event)">
              <input type="text" placeholder="Write a message...">
              <button type="submit">
                  <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M21.944 2.36621L11.0137 13.2966" stroke="#001329" stroke-linecap="round"
                          stroke-linejoin="round" />
                      <path d="M21.9437 2.36621L14.988 22.2396L11.0133 13.2965L2.07031 9.32188L21.9437 2.36621Z"
                          stroke="#001329" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
              </button>
          </form>
        </div>
        `;
      return messagePage;
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