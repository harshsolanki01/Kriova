<?php
session_start();

//============== include all required files =============
require_once "load.php";

//========== create or update session variables or logout time ============
checkLogin();

// ==================== check if form submitted and do action ==================
if (isset($_POST['submit'])) {
  set_user_details($_POST);
}

// =============== define if a user login with email or not =======================
if ($_SESSION['type'] == "email") $isEmailAuth = true;
else $isEmailAuth = false;

// =================== fetch all user details from sql database =====================
$user = get_user();
$user_details = get_user_details();

// ============== Set profile variable for use in page ======================
$id = $user['id'];
$name = $user['name'];

$name_full = explode(" ", $name);
$first_name = $name_full[0]; //first name
$last_name = $name_full[1]; // last name

$email = ($user['email'] != "") ? $user['email'] : "Not Set Yet";
$phone = ($user['phone'] != "") ? $user['phone'] : "Not Set Yet";

$dob = $street = $city = $state = $country = $pin = $address = "Not Set Yet";

// ================= set javascript global variable ======================
?> <script>
  var profile_set = false;
</script> <?php

          if ($user_details != "Not Exist") {
          ?> <script>
    var profile_set = true;
  </script> <?php

            // ============== Set profile variable for use in page ======================
            $email = ($email == "Not Set Yet") ? $user_details['Email'] : $email;
            $phone = ($phone == "Not Set Yet") ? $user_details['PhoneNumber'] : $phone;
            $dob = ($user_details['DateOfBirth'] != "") ? $user_details['DateOfBirth'] : "Not Set Yet";
            $street = ($user_details['Street'] != "") ? $user_details['Street'] : "Not Set Yet";
            $city = ($user_details['City'] != "") ? $user_details['City'] : "Not Set Yet";
            $state = ($user_details['State'] != "") ? $user_details['State'] : "Not Set Yet";
            $country = ($user_details['Country'] != "") ? $user_details['Country'] : "Not Set Yet";
            $pin = ($user_details['Pincode'] != "") ? $user_details['Pincode'] : "Not Set Yet";
            $address = ($street != "Not Set Yet") ? $street . ", " . $city . ", " . $state . ", " . $country : $street;
          }

          // ============= defining bootstrap version for style ==================
          $bootstrap_version = 4;
            ?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= SITE_TITLE ?> - Profile</title>

  <!-- Loading all css -->
  <?= get_css(); ?>

  <style>
    img {
      width: 100%;
      height: 100%;
    }

    body {
      background-color: #eeeeee;
    }
  </style>
</head>

<body>

  <!-- Load header in the page -->
  <?php get_header(); ?>


  <!-------------------  Home Page Main Content -------------------->
  <section style="background-image: url('images/bg.jfif');background-size: cover;">
    <div class="background-radial-gradient2 overflow-hidden pb-5" style="background: #00000090;">

      <!---------------- First Profile Section ------------------->
      <div class="container mt-4">
        <div class="row no-gutters" data-aos="flip-left" data-aos-delay="00" data-aos-duration="1000" data-aos-easing="ease-in-out">
          <div class="col-md-4 col-lg-4">
            <img src="images/aCwpF7V.jpg">

          </div>
          <div class="col-md-8 col-lg-8">
            <div class="d-flex flex-column">
              <div class="d-flex flex-row justify-content-between align-items-center p-5 bg-dark text-white">
                <h3 class="display-5"><?= $name ?></h3><i class="fa fa-facebook"></i><i class="fa fa-google"></i><i class="fa fa-youtube-play"></i><i class="fa fa-dribbble"></i><i class="fa fa-linkedin"></i>
              </div>
              <div class="p-3 bg-black text-white">
                <h6>Web designer &amp; Developer</h6>
              </div>
              <div class="d-flex flex-row text-white">
                <div class="p-4 bg-primary text-center skill-block">
                  <h4>90%</h4>
                  <h6>Bootstrap</h6>
                </div>
                <div class="p-3 bg-success text-center skill-block">
                  <h4>70%</h4>
                  <h6>Jquery</h6>
                </div>
                <div class="p-3 bg-warning text-center skill-block">
                  <h4>80%</h4>
                  <h6>HTML</h6>
                </div>
                <div class="p-3 bg-danger text-center skill-block">
                  <h4>75%</h4>
                  <h6>PHP</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!------------------- Navigation Bar Below the First Profile Section ----------------------->
      <div class="container mt-3">
        <div class="btn-group w-100" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter">Edit Profile</button>
          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#profileModel">Settings</button>
          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#deleteAccount">Delete Account</button>
        </div>
      </div>

      <!------------------------ Second Detailed Profile section --------------------------->
      <div class="container">
        <div class="row">

          <!------------------------- Left Side Profile Section  ------------------------->
          <div class="col-md-8 mt-3">
            <div class="card" data-aos="zoom-out-right" data-aos-delay="00" data-aos-duration="1000" data-aos-easing="ease-in-out">

              <div class="card-body">

                <?php include "components/profile.php" ?>

              </div>
            </div>
          </div>

          <!------------------------- Right side profile section for work link and skill ----------------------------->
          <div class="col-md-4 mt-3">
            <div class="card" data-aos="zoom-out-left" data-aos-delay="00" data-aos-duration="1000" data-aos-easing="ease-in-out">
              <div class="mt-4">
                <div class="profile-work">
                  <p>WORK LINK <a href="" class="text-primary ml-2" data-toggle="modal" data-target="#profileJobModel">Edit</a></p>
                  <a href="">Website Link</a><br />
                  <a href="">Bootsnipp Profile</a><br />
                  <a href="">Bootply Profile</a>
                  <a href="">Linkedin Profile</a><br />
                  <a href="">Internshala Profile</a><br />
                  <a href="">Maven Pvt Ltd</a>
                  <a href="">Upwork Profile</a><br />
                  <a href="">Free Code Camp</a><br />
                  <a href="">Second Website</a>
                  <a href="">Portfolio</a><br />
                  <p>SKILLS <a href="" class="text-primary ml-2" data-toggle="modal" data-target="#profileSkillsModel">Edit</a></p>
                  <a href="">Web Designer</a><br />
                  <a href="">Web Developer</a><br />
                  <a href="">WordPress</a><br />
                  <a href="">WooCommerce</a><br />
                  <a href="">Angular</a><br />
                  <a href="">Node</a><br />
                  <a href="">React</a><br />
                  <a href="">Express</a><br />
                  <a href="">MongoDB</a><br />
                  <a href="">PHP, .Net</a><br />

                </div>

              </div>
            </div>
          </div>

        </div>

      </div>



    </div>
  </section>


  <!----------------------------- Profile Modal open with edit profile btn  -------------------------------->
  <div class="modal fade bd-example-modal-lg overflow-auto" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <?php include "components/profile-model.php" ?>
        </div>
      </div>
    </div>
  </div>


  <button type="button" id="pofileNotSetBtn" class="profile-edit-btn" data-toggle="modal" data-target="#pofileNotSet" hidden>
    Edit Profile
  </button>

  <!------------------------- Modal For Prompt User To Set Its Profile First ------------------------->
  <div class="modal fade overflow-auto" id="pofileNotSet" tabindex="-1" role="dialog" aria-labelledby="pofileNotSetTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="pofileNotSetLongTitle">Set Profle</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Profile not set yet. Would you like to set it first?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#exampleModalCenter">Ok</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <!-------------------- Complete Profile Modal open with setting or profile setting clicks ---------------------->
  <div class="modal fade bd-example-modal-xl overflow-auto" id="profileModel" tabindex="-1" role="dialog" aria-labelledby="profileModel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <?php include "components/complete-profile-model.php" ?>
        </div>
      </div>
    </div>
  </div>

  <!---------------------- Skills Profile Modal open with skil edit btn ------------------------>
  <div class="modal fade bd-example-modal-xl overflow-auto" id="profileSkillsModel" tabindex="-1" role="dialog" aria-labelledby="profileSkillsModel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <?php include "components/profile-skills-model.php" ?>
        </div>
      </div>
    </div>
  </div>


  <!-------------------------Work and Job Profile Modal open when Work link edit clicked ------------------->
  <div class="modal fade bd-example-modal-xl overflow-auto" id="profileJobModel" tabindex="-1" role="dialog" aria-labelledby="profileJobModel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <?php include "components/profile-jobs-model.php" ?>
        </div>
      </div>
    </div>
  </div>


  <!----------------------------- Modal For Delete The Profile ---------------------------->
  <div class="modal fade overflow-auto" id="deleteAccount" tabindex="-1" role="dialog" aria-labelledby="deleteAccountTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteAccountLongTitle">Delete Acccount (Dummy)</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Your Account Will Be Deleted Soon.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!------------------------- Load footer on the page -------------------->
  <?php get_footer(); ?>

  <!------------------ Load all required javascript files --------------------->
  <?= get_js(); ?>

  <script>
    //==================== auto open model to ask user to complete the profile ==========================
    if (!profile_set) {
      $('#pofileNotSetBtn').click();
    }
  </script>


</body>

</html>