<?php
session_start();
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Signin Template · Bootstrap v5.3</title>

    <link rel="stylesheet" href="sign-in.css">

    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="sign-in.css" rel="stylesheet">
  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">
   

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
      <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
              id="bd-theme"
              type="button"
              aria-expanded="false"
              data-bs-toggle="dropdown"
              aria-label="Toggle theme (auto)">
 
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#sun-fill"></use></svg>
            Light
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
            Dark
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">           
          </button>
        </li>
      </ul>
    </div>

    
<main class="form-signin w-100 m-auto">
  <form action="handle_registration_re.php">
    
    <h1 class="h3 mb-3 fw-normal">welcome to sign up</h1>
  <?php
  if(!empty($_GET["msg"])&& $_GET["msg"] =='ar'){?>
    <div
      class="alert alert-warning"
      role="alert"
    >
      <strong>Alert Heading</strong> you are already registred, please login!.<a href="index.php">login</a>
    </div>
  <?php }?>
    
    <div class="form-floating">
      <input type="email" class="form-control" name="Email" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
     <small style="color:red;"> <?php if(isset($_SESSION["Errors"]["Email"])) echo $_SESSION["Errors"]["Email"] ?></small>
    </div>
    <div class="form-floating">
      <input type="name" name="Name" class="form-control" id="floatingPassword" placeholder="name">
      <label for="floatingPassword">Name</label>
      <small style="color:red;"> <?php if(isset($_SESSION["Errors"]["Name"])) echo $_SESSION["Errors"]["Name"] ?></small>
    </div>
    <div class="form-floating">
      <input type="phone" name="phone" class="form-control" id="floatingPassword" placeholder="phone">
      <label for="floatingPassword">phone</label>
      <small style="color:red;"> <?php if(isset($_SESSION["Errors"]["phone"])) echo $_SESSION["Errors"]["phone"] ?></small>
      <small style="color:red;"> <?php if(isset($_SESSION["Errors"]["phonenum"])) echo $_SESSION["Errors"]["phonenum"] ?></small>
    </div>
    <div class="form-floating">
   
      <input type="password" name="PW" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
      <small style="color:red;"><?php if(isset($_SESSION["Errors"]["PW"])) echo $_SESSION["Errors"]["PW"] ?></small>
    </div>
    <div class="form-floating">
      <input type="password" name="PC" class="form-control" id="floatingPassword" placeholder="confirmation Password">
      <label for="floatingPassword">confirmation password</label>
      <small style="color:red;"><?php if(isset($_SESSION["Errors"]["PC"])) echo $_SESSION["Errors"]["PC"] ?></small>
      <small style="color:red;"><?php if(isset($_SESSION["Errors"]["password"])) echo $_SESSION["Errors"]["password"] ?></small>
    </div>
   
    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
    
 
</main>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
<?php 
        $_SESSION["Errors"] = null; 
?>