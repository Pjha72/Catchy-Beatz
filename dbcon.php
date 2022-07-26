<?php

$server = "localhost";
// $server = "https://databases.000webhost.com/";
$user = "id19325882_anand";
$password = "FwGnCyXLC/x+&R39";
$db = "id19325882_signup";


$con = mysqli_connect($server, $user, $password, $db);

if (!$con) {
    echo "Not Connected ";
}
else{
    echo "Connection Succesfull ";
    }
?>