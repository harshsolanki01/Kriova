<?php
$db = new db($dbUser, $dbPassword, $dbName, $host);

function db()
{
    global $db;
    return $db;
}

//============================ load all required css when called in head section ==================================
function get_css()
{
    global $style, $bootstrap_version;

    $html = '';

    foreach ($style as $k => $v) {
        if ($k == 'bootstrap' || $k == 'bootstrap_v4') {
            if ($k == 'bootstrap' && $bootstrap_version == 5) $html .= '<link rel="stylesheet" href="' . $v . '" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">';
            elseif ($k == 'bootstrap_v4' && $bootstrap_version == 4) $html .= '<link rel="stylesheet" href="' . $v . '">';
        } else $html .= '<link rel="stylesheet" href="' . $v . '">';
    }

    return $html;
}

//======================================== load all required javascript when called ================================================
function get_js()
{
    global $js, $bootstrap_version;

    $html = '';

    foreach ($js as $k => $v) {
        if ($k == 'bootstrap_bundle' || $k == 'bootstrap_bundle_V4' || $k == 'bootstrap_min') {
            if ($k == 'bootstrap_bundle' && $bootstrap_version == 5) $html .= '<script src="' . $v . '" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>';
            elseif ($k == 'bootstrap_bundle_V4' && $bootstrap_version == 4) $html .= '<script src="' . $v . '" ></script>';
            elseif ($k == 'bootstrap_min' && $bootstrap_version == 5) $html .= '<script src="' . $v . '" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>';
        } elseif ($k == 'popper') $html .= '<script src="' . $v . '" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>';
        else $html .= '<script src="' . $v . '"></script>';
    }

    return $html;
}

//============================================ load header when called in any page ================================================
function get_header()
{
    require "components/header.php";
}

//============================================ load footer when called in any page ===================================================
function get_footer()
{
    require "components/footer.php";
}


//============================================= Login With Name And Password =====================================================

function signUp($name, $pass, $email_phone, $select_email_phone, $login)
{
    $email = "";
    $phone = "";
    $field = "";

    if ($select_email_phone == "email") {
        $email = $email_phone;
        $phone = "";
        $field = "email";
    } elseif ($select_email_phone == "phone") {
        $email = "";
        $phone = $email_phone;
        $field = "phone";
    }

    $data = array(
        ':name'        =>    $email_phone,
    );

    $total = db()->PDO_query("SELECT * FROM user WHERE " . $field . " = :name", "FETCH_NUM", $data);

    if (!$total) {

        $data = array(
            ':name'        =>    $name,
            ':email'        =>    $email,
            ':phone'        =>    $phone,
            ':pass'        =>    $pass,
        );


        $result = db()->PDO_query("INSERT INTO user VALUES(null,:name, :email, :phone, :pass)", "INSERT", $data);

        if ($login && $result) {
            login_as_user($email_phone, $select_email_phone);
        }
    } else return "Already Exist";
    return "Not Done";
}

//============================================= Login With Name And Password =====================================================
function login($pass, $email_phone, $select_email_phone, $login)
{

    $data = array(
        ':email_phone'        =>    $email_phone,
    );

    if ($select_email_phone == "email") $field = "email";
    else $field = "phone";

    $total = db()->PDO_query("SELECT * FROM user WHERE " . $field . " = :email_phone", "FETCH_NUM", $data);

    if ($total != 0) {

        while ($result = db()->PDO_query("SELECT * FROM user WHERE " . $field . " = :email_phone", "FETCH_ASSOC", $data)) {

            $password = $result['pass'];

            if ($pass == $password) {

                if ($login) {
                    login_as_user($email_phone, $select_email_phone);
                }
            } else {
                return "Password Not Matched";
            }
        }
    } else return "Not Exist";
    return "Not Done";
}


// ============================================= Logg in as user ============================================
function login_as_user($name, $select_email_phone)
{
    $_SESSION['name'] = $name;
    $_SESSION['CREATED'] = time();
    $_SESSION['type'] = $select_email_phone;
    header("location: " . SITE_URL);
    die();
}



//====================================== goto the login page =========================================
function goto_login()
{

    header("location: login");
    die();
}



// ====================================== Check if the user is logged in ==========================================
function is_logged_in()
{
    return isset($_SESSION['name']) ? TRUE : FALSE;
}

//====================================== create or update session variables or logout time =========================================
function checkLogin()
{

    if (is_logged_in()) {

        define('USERNAME', $_SESSION['name']);

        if ((isset($_SESSION['discard_after']) && time() > $_SESSION['discard_after'])) {

            if (logout()) {
                goto_login();
            }
        }
    } else {
        goto_login();
    }
}


//====================================== get the current user details =========================================
function get_user()
{

    $select_email_phone = $_SESSION['type'];

    $data = array(
        ':email_phone'        =>    $_SESSION['name'],
    );

    if ($select_email_phone == "email") $field = "email";
    else $field = "phone";

    $total = db()->PDO_query("SELECT * FROM user WHERE " . $field . " = :email_phone", "FETCH_NUM", $data);

    if ($total != 0) {

        while ($result = db()->PDO_query("SELECT * FROM user WHERE " . $field . " = :email_phone", "FETCH_ASSOC", $data)) {

            return $result;
        }
    } else return "Not Exist";
    return "Not Done";
}


//====================================== get the current user details =========================================
function get_user_details()
{

    $select_email_phone = $_SESSION['type'];

    $data = array(
        ':email_phone'        =>    $_SESSION['name'],
    );

    if ($select_email_phone == "email") $field = "email";
    else $field = "phonenumber";

    $total = db()->PDO_query("SELECT * FROM employee WHERE " . $field . " = :email_phone", "FETCH_NUM", $data);

    if ($total != 0) {

        while ($result = db()->PDO_query("SELECT * FROM employee WHERE " . $field . " = :email_phone", "FETCH_ASSOC", $data)) {

            return $result;
        }
    } else return "Not Exist";
    return "Not Done";
}

//====================================== set the current user details =========================================
function set_user_details($details)
{

    $select_email_phone = $_SESSION['type'];

    $email = "";
    $phone = "";

    $data = array(
        ':email_phone'        =>    $_SESSION['name'],
    );

    if ($select_email_phone == "email") {
        $field = "email";
        $email = $_SESSION['name'];
        $phone = $details['mobile'];
    } else {
        $field = "phonenumber";
        $email = $details['email'];
        $phone = $_SESSION['name'];
    }

    $total = db()->PDO_query("SELECT * FROM employee WHERE " . $field . " = :email_phone", "FETCH_NUM", $data);

    $data = array(
        ':name'        =>    $details['first_name'] . " " . $details['last_name'],
        ':dob'        =>    $details['dob'],
        ':email'        =>    $email,
        ':phone'        =>    $phone,
        ':street'        =>    $details['street'],
        ':city'        =>    $details['city'],
        ':state'        =>    $details['state'],
        ':country'        =>    $details['country'],
        ':pin'        =>    $details['pin'],

    );

    if ($total == 0) {

        $result = db()->PDO_query("INSERT INTO employee VALUES(null, :name, :dob, :email, :phone, :street, :city, :state, :country, :pin)", "INSERT", $data);
        if ($result) return "Done";
        else return $result;
    } else {

        $data = array(
            ':name'        =>    $details['first_name'] . " " . $details['last_name'],
            ':dob'        =>    $details['dob'],
            ':email'        =>    $email,
            ':phone'        =>    $phone,
            ':street'        =>    $details['street'],
            ':city'        =>    $details['city'],
            ':state'        =>    $details['state'],
            ':country'        =>    $details['country'],
            ':pin'        =>    $details['pin'],
            ':email_phone'        =>    $_SESSION['name'],

        );

        $result = db()->PDO_query(
            "UPDATE employee SET employeename = :name, 
            dateofbirth = :dob, 
            email = :email, 
            phonenumber = :phone, 
            street = :street, 
            city = :city,
            state = :state,
            country = :country,
            pincode = :pin WHERE " . $field . " = :email_phone",
            "UPDATE",
            $data
        );
    }
    return "Not Done";
}



// =========================================== Get the current date for login formate ================================================
function getCurrentLoginDate()
{
    date_default_timezone_set('Asia/Kolkata');
    $day =  date("Y-m-d");
    $time =  date("H:i");
    $date = $day . "T" . $time;
    return $date;
}


// ======================================== Sanitize the user input ===============================================
function sanititize($input_query)
{
    $out_query = preg_replace('/[^A-Za-z0-9\/:\- ]/', '', $input_query);
    $out_query = trim($out_query);
    return $out_query;
}



// ======================================= Logout the current login user =================================================
function logout()
{
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();

    session_unset();
    session_destroy();
    return session_status() === PHP_SESSION_ACTIVE ? FALSE : TRUE;
}
