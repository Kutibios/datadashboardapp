<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if (!isset($_SESSION['username'])) 
{
    header("Location: login.php");
    exit();
}

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $tür = $_POST['tür'];
    $model = $_POST['model'];
    $yıl = $_POST['yıl'];
    $pil_ömrü = $_POST['pil_ömrü'];
    $değişen_parça = $_POST['değişen_parça'];
    $durum = $_POST['durum'];
    $renk = $_POST['renk'];
    $fiyat = $_POST['fiyat'];
    $alınma_tarihi = $_POST['alınma_tarihi'];
    $notlar = $_POST['notlar'];




    $query = "INSERT INTO urunbilgi (tur, model, yil,pil_omru,degisen_parca,durum, renk, fiyat, alinma_tarihi, notes) VALUES ('$tür', '$model', '$yıl', '$pil_ömrü', '$değişen_parça', '$durum', '$renk', '$fiyat', '$alınma_tarihi', '$notlar')";
    if ($conn->query($query) === TRUE)
    {
        header("location: admin_panel.php");
        exit();
    } else 
    {
        echo "Hata: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ürün Ekleme Formu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Ürün Ekleme Formu</h2>
        <form action="urun_ekle.php" method="post">
            <div class="mb-3">
                <label for="tür" class="form-label">Tür:</label>
                <select name="tür" id="tür" class="form-select" required>
                    <option value="Telefon">Telefon</option>
                    <option value="Tablet">Tablet</option>
                    <option value="Akıllı Saat">Akıllı Saat</option>
                    <option value="Laptop">Laptop</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="model" class="form-label">Model:</label>
                <input type="text" id="model" name="model" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="yıl" class="form-label">Yıl:</label>
                <input type="number" id="yıl" name="yıl" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="pil_ömrü" class="form-label">Pil Ömrü:</label>
                <input type="text" id="pil_ömrü" name="pil_ömrü" class="form-control">
            </div>

            <div class="mb-3">
                <label for="değişen_parça" class="form-label">Değişen Parça:</label>
                <input type="text" id="değişen_parça" name="değişen_parça" class="form-control">
            </div>

            <div class="mb-3">
                <label for="durum" class="form-label">Durum:</label>
                <select name="durum" id="durum" class="form-select" required>
                    <option value="Sıfır">Sıfır</option>
                    <option value="İkinci El">İkinci El</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="renk" class="form-label">Renk:</label>
                <input type="text" id="renk" name="renk" class="form-control">
            </div>

            <div class="mb-3">
                <label for="fiyat" class="form-label">Fiyat:</label>
                <input type="number" id="fiyat" name="fiyat" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="alınma_tarihi" class="form-label">Alınma Tarihi:</label>
                <input type="date" id="alınma_tarihi" name="alınma_tarihi" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="notlar" class="form-label">Notlar:</label>
                <textarea id="notlar" name="notlar" class="form-control"></textarea>
            </div>
            
            <button type="submit" class="btn btn-success">Ekle</button>
        </form>
    </div>
</body>
</html>
