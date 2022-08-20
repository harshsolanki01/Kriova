<?php
session_start();

//======================== Load all files =====================
require_once "load.php";

//================= check if user is logged in =====================
if (is_logged_in()) {
    header("location: " . SITE_URL);
    die();
}

?><script>
    //==== define javascript global variable for form error ==========
    var error = false;
</script><?php

            //=============== variable for form current status =======================
            $fields_empty = false;
            $fields_ok = false;
            $status_title = "";
            $status = "";

            //================== when form submitted ======================
            if (isset($_POST['submit'])) {

                $email_phone = $_POST['email'];
                $select_email_phone = $_POST['select_email_phone'];
                $pass = $_POST['password'];
                $sub = $_POST['submit'];

                if ($sub) {
                    if ($email_phone != "" && $pass != "") {

                        $fields_ok = true;
                        $login = login($pass, $email_phone, $select_email_phone, true);

                        if ($login == "Not Exist") {
            ?><script>
                    var error = true;
                </script><?php
                            $status_title = "Unable To Login";
                            $status = "User With Credentials Not Exist. You can register as a new User.";
                        } else {
                            ?><script>
                    var error = true;
                </script><?php
                            $status_title = "Unable To Login";
                            $status = $login;
                        }
                    } else {
                        $fields_empty = true;
                            ?><script>
                var error = true;
            </script><?php
                        $status_title = "Unable To Login";
                        $status = "All Fields Are Mandetory.";
                    }
                }
            }


                        ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= SITE_TITLE ?> - Login</title>
    <!--------------------- Load All css ---------------->
    <?= get_css(); ?>
</head>

<body>

    <!------------------- Load page header --------------------->
    <?php get_header(); ?>

    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden">

        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10" data-aos="fade-right" data-aos-delay="0" data-aos-duration="1000" data-aos-easing="ease-in-out">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        Welcome Back To <br />
                        <span style="color: hsl(218, 81%, 75%)"><?= SITE_TITLE ?> Business</span>
                    </h1>
                    <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                        <?= SITE_TITLE ?>' company profile has it all — the company's mission,
                        background story, products, store atmosphere,
                        and even folklore regarding the name.
                        Best of all, they somehow manage to pull off sounding both genuine and grandiose.
                        I don't know many other coffee stores that could claim that their mission is
                        “to inspire and nurture the human spirit.”e’ve played with them all.

                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative" data-aos="zoom-in" data-aos-delay="600" data-aos-duration="1000" data-aos-easing="ease-in-out">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                    <div class="card bg-glass mt-5">
                        <div class="form-containers card-body px-4 py-5 pb-3 px-md-5">
                            <form class="form" method="post">
                                <!-- 2 column grid layout with text inputs for the first and last names -->

                                <div class="mb-5 text-center">
                                    <h1 class="m-0 p-0"><?= SITE_TITLE ?></h1>
                                </div>

                                <div class="row">
                                    <!-- Email/Phone input -->
                                    <div class="col-md-9 form-outline mb-3">
                                        <input type="email" id="email" name="email" class="form-control" placeholder="example@some.com" required="true" />
                                        <label class="form-label" for="email">Email address / Phone No.<span class="field-required">*</span></label>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="select_email_phone" id="select_email" value="email" checked>
                                            <label class="form-check-label" for="select_email">Email</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="select_email_phone" id="select_phone" value="phone">
                                            <label class="form-check-label" for="select_phone">Phone</label>
                                        </div>
                                    </div>
                                </div>


                                <!-- Password input -->
                                <div class="form-outline mb-3">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="true" />
                                    <label class="form-label" for="password">Password<span class="field-required">*</span></label>
                                </div>

                                <!-- Submit button -->
                                <div class="text-center">
                                    <button type="submit" name="submit" value="submit" class="w-100 btn btn-primary btn-block ps-5 pe-5 mb-4">
                                        Sign In
                                    </button>
                                </div>

                                <!-- Register buttons -->
                                <div class="text-center">
                                    <p>Not a member? <a href="signup">Register</a></p>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <!-- Forgot Password buttons -->
                                        <div class="mb-4">
                                            <a class="text-danger" href="resetpassword">Forgot Password</a>
                                        </div>
                                    </div>

                                    <div class="col-sm-8">
                                        <!-- Error  -->
                                        <div class="mb-4">
                                            <p class="text-danger"><?= $status; ?></p>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->


    <!-- Button trigger modal -->
    <button id="toggle" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" hidden>
        Launch static backdrop modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><?= $status_title; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= $status; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <!-------------------------- Load all required javascript --------------------->
    <?= get_js(); ?>
</body>

</html>