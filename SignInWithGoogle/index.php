<?php

//index.php

//Include Configuration File
include('config.php');
// session_start();
$login_button = '';


if (isset($_GET["code"])) {

    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


    if (!isset($token['error'])) {

        $google_client->setAccessToken($token['access_token']);


        $_SESSION['access_token'] = $token['access_token'];


        $google_service = new Google\Service\Oauth2($google_client);


        $data = $google_service->userinfo->get();


        if (!empty($data['given_name'])) {
            $_SESSION['user_first_name'] = $data['given_name'];
        }

        if (!empty($data['family_name'])) {
            $_SESSION['user_last_name'] = $data['family_name'];
        }

        if (!empty($data['email'])) {
            $_SESSION['user_email_address'] = $data['email'];
        }

        if (!empty($data['gender'])) {
            $_SESSION['user_gender'] = $data['gender'];
        }
        else
            $_SESSION['user_gender'] = "Rather not to say";

        if (!empty($data['picture'])) {
            $_SESSION['user_image'] = $data['picture'];
        }

        if (!empty($data['locale'])) {
            $_SESSION['user_locale'] = $data['locale'];
        }
        else
            $_SESSION['user_locale'] = "Rather not to say";
    }
}


if (!isset($_SESSION['access_token'])) {

    $login_button = '<a href="' . $google_client->createAuthUrl() . '">Login With Google</a>';
}

?>
<?php
if ($login_button != '') {
    header('location:' . $google_client->createAuthUrl() . '');
}

// Here if Login is Succesfull
else {
    $_SESSION['username'] = $_SESSION['user_first_name'] . " " . $_SESSION['user_last_name'];
    // echo $_SESSION['username'];

    include '../dbcon.php';
    $emailquery = " select * from users where email='$_SESSION[user_email_address]' ";
    $query = mysqli_query($con, $emailquery);
    $emailcount = mysqli_num_rows($query);
    
    if ($emailcount > 0) {
        echo "We Welcome You!!!";
    } 
    
    
    else {
        
        $insertquery = "insert into users(first_name, last_name, email, gender, locale,picture) values('$_SESSION[user_first_name]','$_SESSION[user_last_name]','$_SESSION[user_email_address]','$_SESSION[user_gender] ','$_SESSION[user_locale]','$_SESSION[user_image]')";

        $iquery = mysqli_query($con, $insertquery);

        if (!$iquery) {
            echo "Not Inserteddd";
        } else {
            echo "Inserted Succesfull";
        }
    }

    // $email_pass = mysqli_fetch_assoc($query);
    // $_SESSION['id'] = $email_pass['id'];
    // header('location:../Gaming Website/index.php');
    ?>
    <script>
        // location.replace("../Gaming Website/index.php");
        echo "LOGIN WAS SUCCESFULL";
    </script>
    <?php
}
?>
