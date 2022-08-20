<header class="position-relative">


  <!-- Header For Home Paga -->
  <?php
  if ($_SERVER['PHP_SELF'] == "/kriova/index.php") { ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#"><?= SITE_TITLE ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="mr-auto"></div>
          <ul class="navbar-nav ">
            <li class="nav-item">
              <a class="nav-link" style="color:#cccccc;" href="resetpassword">Change Password</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color:#cccccc;" href="" onclick="logout();">Logout</a>
            </li>

          </ul>

        </div>
      </div>
    </nav>

    <!-- Header for Login/Signup Page -->

  <?php } else { ?>
    <div class="container position-absolute header-title">
      <h1 class="m-0 p-0"><?= SITE_TITLE ?></h1>
      <p>We Promise Quality</p>
    </div>
  <?php }   ?>

</header>