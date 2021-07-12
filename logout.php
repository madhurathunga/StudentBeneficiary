<?php
 session_start();
 unset($_SESSION["username"]);
?>
<script type="text/javascript">
    alert("Logged out successfully");
    window.location="home.php";
</script>