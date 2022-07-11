<?php

$_SESSION['login'] = false;
session_unset();
session_destroy();
// echo "<script>
// document.location.replace('http://localhost/BoirotAvocat/');
// </script>";

redirectJS('home');
