<?php

session_start();
if (isset($_SESSION['access_token'])) {
    
    // Reset OAuth access token
    header('location:SignInWithGoogle\logout.php');
}
session_destroy();
// header('location:login.php');
?>
<script>
    location.replace("../index.html");
</script>
<?php

?>