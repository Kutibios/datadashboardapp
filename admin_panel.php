<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

$sqlcekme = "SELECT * FROM urunbilgi";
$result = $conn->query($sqlcekme);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoş geldiniz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 style="text-align: center; color: purple;">Koşan İletişim Paneline Hoş geldin <?php echo $_SESSION['username']; ?>!</h2>
        <a href="logout.php" class="btn btn-danger">Çıkış Yap</a>

        <h3>Ürün Listesi:</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tür</th>
                    <th>Model</th>
                    <th>Durum</th>
                    <th>Renk</th>
                    <th>Fiyat</th>
                    <th>Yıl</th>
                    <th>Pil Ömrü</th>
                    <th>Değişen Parça</th>
                    <th>Alınma Tarihi</th>
                    <th>Notlar</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['tur']; ?></td>
                        <td><?php echo $row['model']; ?></td>
                        <td><?php echo $row['durum']; ?></td>
                        <td><?php echo $row['renk']; ?></td>
                        <td><?php echo $row['fiyat']; ?></td>
                        <td><?php echo $row['yil']; ?></td>
                        <td><?php echo $row['pil_omru']; ?></td>
                        <td><?php echo $row['degisen_parca']; ?></td>
                        <td><?php echo $row['alinma_tarihi']; ?></td>
                        <td><?php echo $row['notes']; ?></td>
                        <td>
                            <a href="urun_duzenle.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Düzenle</a>
                            <a href="urun_sil.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Sil</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="urun_ekle.php" class="btn btn-success">Ürün Ekle</a>
    </div>
</body>
</html>


