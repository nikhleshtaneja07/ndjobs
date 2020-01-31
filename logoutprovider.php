<?php
@session_start();
echo "LOGGING OUT... PLEASE WAIT...";
@session_unset();
header("refresh:1; url=index.php");
?>