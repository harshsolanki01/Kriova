<?php
session_start();

//============ load all required files ======================
require_once "load.php";
if (is_logged_in()) {
    header("location: http://" . $_SERVER['SERVER_NAME'] . "/kriova");
    die();
}

?><script>
    var error = false;
</script><?php

            $fields_empty = false;
            $fields_ok = false;
            $status_title = "";
            $status = "";

            //=============== when form submitted ========================
            if (isset($_POST['submit'])) {

                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $email_phone = $_POST['email'];
                $select_email_phone = $_POST['select_email_phone'];
                $pass = $_POST['password'];
                $confirm_pass = $_POST['confirm_password'];
                $sub = $_POST['submit'];

                if ($sub) {
                    if ($first_name != "" && $last_name != "" && $email_phone != "" && $pass != "" && $confirm_pass != "") {

                        $fields_ok = true;
                        $name = $first_name . " " . $last_name;

                        if ($pass == $confirm_pass) {
                            $login = signUp($name, $pass, $email_phone, $select_email_phone, true);

                            if ($login == "Already Exist") {
            ?><script>
                        var error = true;
                    </script><?php
                                $status_title = "Unable To Login";
                                $status = "User With This Email Or Phone Already Exist.";
                            } else {
                                ?><script>
                        var error = true;
                    </script><?php
                                $status_title = "Unable To Sign Up";
                                $status = $login;
                            }
                        } else {
                                ?><script>
                    var error = true;
                </script><?php
                            $status_title = "Unable To SignUp";
                            $status = "Passwors Not Matched.";
                        }
                    } else {

                        $fields_empty = true;
                            ?><script>
                var error = true;
            </script><?php
                        $status_title = "Unable To SignUp";
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
    <title><?= SITE_TITLE ?> - Sign Up</title>
    <!-- Load all css -->
    <?= get_css(); ?>
</head>

<body>

    <!-- Load page header -->
    <?php get_header(); ?>

    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden">

        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10" data-aos="fade-right" data-aos-delay="0" data-aos-duration="1000" data-aos-easing="ease-in-out">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        Welcome To <br />
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
                                <div class="row">
                                    <div class="col-md-6 mb-3">

                                        <div class="form-outline">
                                            <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name" required="true" />
                                            <label class="form-label" for="first_name">First name<span class="field-required">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-outline">
                                            <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name" required="true" />
                                            <label class="form-label" for="last_name">Last name<span class="field-required">*</span></label>
                                        </div>
                                    </div>
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
                                            <label class="form-check-label" for="inlineRadio1">Email</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="select_email_phone" id="select_phone" value="phone">
                                            <label class="form-check-label" for="inlineRadio2">Phone</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-3">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="true" />
                                    <label class="form-label" for="password">Password<span class="field-required">*</span></label>
                                </div>

                                <!-- Confirm Password input -->
                                <div class="form-outline mb-3">
                                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password" required="true" />
                                    <label class="form-label" for="confirm_password">Confirm Password<span class="field-required">*</span></label>
                                </div>

                                <!-- Submit button -->
                                <div class="text-center">
                                    <button type="submit" name="submit" value="submit" class="w-100 btn btn-primary btn-block ps-5 pe-5 mb-4">
                                        Sign Up
                                    </button>
                                </div>

                                <!-- Register buttons -->
                                <div class="text-center">
                                    <p>Already a member? <a href="login">Login</a></p>
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

    <!-- Load all javascript -->
    <?= get_js(); ?>

</body>

</html>