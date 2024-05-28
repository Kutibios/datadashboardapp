<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

$id = $_GET['id'];


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $tur = $_POST['tur'];
    $pil_ömrü = $_POST['pil_omru'];
    $değişen_parça = $_POST['degisen_parca'];
    $fiyat = $_POST['fiyat'];
    $model = $_POST['model'];
    $durum = $_POST['durum'];
    $renk = $_POST['renk'];
    $yıl = $_POST['yil'];
    $alınma_tarihi = $_POST['alinma_tarihi'];
    $notlar = $_POST['notes'];

    $query = "UPDATE urunbilgi SET tur='$tur', model='$model', yil='$yıl', pil_omru='$pil_ömrü', degisen_parca='$değişen_parça', durum='$durum', renk='$renk', fiyat='$fiyat', alinma_tarihi='$alınma_tarihi', notes='$notlar' WHERE id='$id'";
    if ($conn->query($query ) === TRUE) 
    {
        header("Location: admin_panel.php");
        exit();
    } else {
        echo "Hata: " . $conn->error; //.=???
    }
} else {
    $query  = "SELECT * FROM urunbilgi WHERE id='$id'";

    $result = $conn->query($query );
    $urun = $result->fetch_assoc(); 
    //veritabanından bilgileri çekiyor gönderiyor geriye dön
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Ürün Düzenleme : </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Ürün Düzenleme</h2>
        <form action="urun_duzenle.php?id=<?php echo $id; ?>" method="post">

            <div class="mb-3">
                <label for="tur" class="form-label">Tür:</label>
                <select name="tur" id="tur" class="form-select" required>

                    <option value="Telefon" <?php if($urun['tur'] == 'Telefon') echo 'selected'; ?>>Telefon</option>
                    <option value="Tablet" <?php if($urun['tur'] == 'Tablet') echo 'selected'; ?>>Tablet</option>
                    <option value="Akıllı Saat" <?php if($urun['tur'] == 'Akıllı Saat') echo 'selected'; ?>>Akıllı Saat</option>
                    <option value="Laptop" <?php if($urun['tur'] == 'Laptop') echo 'selected'; ?>>Laptop</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="model" class="form-label">Model:</label>
                <input type="text" id="model" name="model" class="form-control" value="<?php echo $urun['model']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="yil" class="form-label">Yıl:</label>
                <input type="number" id="yil" name="yil" class="form-control" value="<?php echo $urun['yil']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="pil_omru" class="form-label">Pil Ömrü:</label>
                <input type="text" id="pil_omru" name="pil_omru" class="form-control" value="<?php echo $urun['pil_omru']; ?>">
            </div>

            <div class="mb-3">
                <label for="degisen_parca" class="form-label">Değişen Parça:</label>
                <input type="text" id="degisen_parca" name="degisen_parca" class="form-control" value="<?php echo $urun['degisen_parca']; ?>">
            </div>

            <div class="mb-3">
                <label for="durum" class="form-label">Durum:</label>
                <select name="durum" id="durum" class="form-select" required>
                    <option value="Sıfır" <?php if($urun['durum'] == 'Sıfır') echo 'selected'; ?>>Sıfır</option>
                    <option value="İkinci El" <?php if($urun['durum'] == 'İkinci El') echo 'selected'; ?>>İkinci El</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="renk" class="form-label">Renk:</label>
                <input type="text" id="renk" name="renk" class="form-control" value="<?php echo $urun['renk']; ?>">
            </div>

            <div class="mb-3">
                <label for="fiyat" class="form-label">Fiyat:</label>
                <input type="number" id="fiyat" name="fiyat" class="form-control" value="<?php echo $urun['fiyat']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="alinma_tarihi" class="form-label">Alınma Tarihi:</label>
                <input type="date" id="alinma_tarihi" name="alinma_tarihi" class="form-control" value="<?php echo $urun['alinma_tarihi']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="notes" class="form-label">Notlar:</label>
                <textarea id="notes" name="notes" class="form-control"><?php echo $urun['notes']; ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Güncelle</button>
        </form>
    </div>
</body>
</html>
