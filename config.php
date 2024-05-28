<?php



$servername = "sql301.infinityfree.com";
$username = "if0_36630737";
$password = "jwK4cDiwR5LD6";
$database = "if0_36630737_webproje";



$conn = new mysqli($servername, $username, $password, $database);

//CONFIG KONTROL AMACLI OLUŞTURULMUŞTUR İŞLEVİ YOKTUR. geriye dön bak
if ($conn->connect_error) {
    die("Bağlantı Oluşturulamamıştır... " .
     $conn->connect_error);
}
?>
