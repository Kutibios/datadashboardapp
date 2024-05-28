<?php
session_start();


if (!isset($_SESSION['admin'])) 
{
    header("Location:login.php");
    exit();
}


include 'config.php';


$sqlcekme = "SELECT * FROM urunbilgi";
$result = mysqli_query($mysqli, $sqlcekme);
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ürün Listesi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Ürün Listesi</h2>
        <table class="table">
            <thead>
                <tr>

                    <th>#</th>
                    <th>Tür</th>
                    <th>Model</th>
                    <th>Yıl</th>
                    <th>Pil Ömrü</th>
                    <th>Değişen Parça</th>
                    <th>Durum</th>
                    <th>Renk</th>
                    <th>Fiyat</th>
                    <th>Alınma Tarihi</th>
                    <th>Notlar</th>

                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) 
                { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['tür']; ?></td>
                        <td><?php echo $row['model']; ?></td>
                        <td><?php echo $row['yıl']; ?></td>
                        <td><?php echo $row['fiyat']; ?></td>
                        <td><?php echo $row['pil_ömrü']; ?></td>
                        <td><?php echo $row['değişen_parça']; ?></td>
                        <td><?php echo $row['durum']; ?></td>
                        <td><?php echo $row['renk']; ?></td>
                        <td><?php echo $row['alınma_tarihi']; ?></td>
                        <td><?php echo $row['notlar']; ?></td>
                    </tr>
                <?php 
            } ?>
            </tbody>
        </table>
        <a href="admin_dashboard.php" class="btn btn-secondary">çık</a> 
    </div>
</body>
</html>
