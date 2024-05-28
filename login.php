<?php
session_start();
include 'config.php';
error_reporting(E_ALL);
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $loginpostu = $_POST;
    $username = $loginpostu['username'];   //gönderilen form verilerini almak için kullanılıyor
    $password = $loginpostu['password'];

    
    $sqlcekme = "SELECT * FROM adminler WHERE username='$username' AND password='$password'"; //checkliyor
    
    $result = $conn->query($sqlcekme);

    if ($result->num_rows == 1) {  //sql için satır sayısı belirler.
        $_SESSION['username'] = $username; //global değişkendir phpnin

        header("Location:admin_panel.php");
        exit();
    } else {
        $error = "Kullanıcı Adı veya Şifrenizi Yanlış Girdiniz";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Girişi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('kosaniletisim.png'); 
            background-size: cover;
            height: 100vh; 
            display: flex;
            justify-content: center;
            align-items: center;
            background-position: center;
            background-repeat: no-repeat;
        }
        .login-kullanicigiris {
            max-width: 450px;
            padding: 20px;
            background-color: rgba(250, 250, 250,1); 
            border: 0.1px solid red;
            
            
        }
        .login-title 
        {

            margin-bottom: 20px;
        }
        .form-control:focus 
        {
            box-shadow: none;
            border-color: #007bff;
        }
        .btn-primary 
        {
            background-color: #007bff;   
            border-color: #007bff;
        }
    </style>
</head>
<body>
    <div class="login-kullanicigiris">

        <h2 class="text-center login-title">Koşan İletişim Admin Girişi</h2>
        <?php if (isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>

        <form method="POST">
            <div class="mb-3">   

                <label for="username" class="form-label">Kullanıcı Adı:</label>
                <input type="text" id="username" name="username" class="form-control" required>

            </div>

            <div class="mb-3">

                <label for="password" class="form-label">Şifre:</label>
                <input type="password" id="password" name="password" class="form-control" required>

            </div>

            <button type="submit" class="btn btn-primary w-100">Giriş Yap</button>
        </form>
    </div>
</body>
</html>



