<?php

//==================================  Dedfines Variable and Constants For Global Use ===========================

$bootstrap_version = 5;

//================================= MySQL Database configuraion details ===========================

$dbUser = "root";
$dbPassword = "";
$dbName = "kriova";
$host = "localhost";

define("SITE_TITLE", "Kriova");
define("SITE_URL", " http://" . $_SERVER['SERVER_NAME'] . "/kriova/"); // e.g. http://localhost/kriova/ 


//=========================== define css array for dynamic load =========================
$style = array(
    "bootstrap" => "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css",
    "bootstrap_v4" => "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css",
    "aos" => "https://unpkg.com/aos@2.3.1/dist/aos.css",
    "fontawsome" => "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "customeStyles" => "css/style.css"
);

// ========================= define javascript array for dynamic load ========================
$js = array(
    "jquery" => "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js",
    "bootstrap_bundle" => "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js",
    "bootstrap_bundle_V4" => "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js",
    "popper" => "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js",
    "bootstrap_min" => "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js",
    "aos" => "https://unpkg.com/aos@2.3.1/dist/aos.js",
    "custom_js" => "js/script.js"
);
