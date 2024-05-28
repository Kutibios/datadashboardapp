<?php
session_start();
session_unset();
session_destroy();  //phpnin kendi fonksiyonları
header("Location: login.php");
exit();
?>
