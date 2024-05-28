<?php
session_start();

if (!isset($_SESSION['username'])) 
{
    header("Location: login.php");
    exit();
}

include 'config.php';

$id = $_GET['id'];

$query = "DELETE FROM urunbilgi WHERE id='$id'";
if ($conn->query($query) === TRUE) 
{
    header("Location: admin_panel.php");
    exit();
} else {
    echo "Hata: " . $conn->error;
}
?>
