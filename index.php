<?php
require_once './service/config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Toko Makanan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Database Toko Makanan</h1>
    <div class="container">
        
        <div class="card">

            <div class="card-header">
                h2>Tabel Produk</h2>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                    $sql_produk = "SELECT
                                        produk.id_produk,
                                        produk.nama_produk,
                                        kategori.nama_kategori,
                                        produk.harga,
                                        produk.stok
                                    FROM produk
                                    JOIN kategori
                                        ON produk.id_kategori = kategori.id_kategori";

                    $query_produk = mysqli_query($koneksi, $sql_produk);

                    while ($row = mysqli_fetch_assoc($query_produk)) {
                        echo "<tr>";
                        echo "<td>" . $row['id_produk'] . "</td>";
                        echo "<td>" . htmlspecialchars($row['nama_produk']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nama_kategori']) . "</td>";
                        echo "<td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>";
                        echo "<td>" . $row['stok'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>

            </table>
        </div>

         <div class="card">

            <div class="card-header">
                <h2>Tabel Kategori</h2>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Kategori</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $sql_kategori = "SELECT
                                            id_kategori,
                                            nama_kategori
                                        FROM kategori";

                    $query_kategori = mysqli_query($koneksi, $sql_kategori);

                    while ($row = mysqli_fetch_assoc($query_kategori)) {
                        echo "<tr>";
                        echo "<td>" . $row['id_kategori'] . "</td>";
                        echo "<td>" . htmlspecialchars($row['nama_kategori']) . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>

            </table>
        </div>

        <div class="card">

            <div class="card-header">
                <h2>Tabel Penjualan</h2>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pembeli</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $sql_penjualan = "SELECT
                                            penjualan.id_penjualan,
                                            penjualan.nama_pembeli,
                                            produk.nama_produk,
                                            penjualan.jumlah,
                                            penjualan.total_harga,
                                            penjualan.tanggal
                                        FROM penjualan
                                        JOIN produk
                                            ON penjualan.id_produk = produk.id_produk";

                    $query_penjualan = mysqli_query($koneksi, $sql_penjualan);

                    while ($row = mysqli_fetch_assoc($query_penjualan)) {
                        echo "<tr>";
                        echo "<td>" . $row['id_penjualan'] . "</td>";
                        echo "<td>" . htmlspecialchars($row['nama_pembeli']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nama_produk']) . "</td>";
                        echo "<td>" . $row['jumlah'] . "</td>";
                        echo "<td>Rp " . number_format($row['total_harga'], 0, ',', '.') . "</td>";
                        echo "<td>" . $row['tanggal'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>

            </table>
        </div>
    </div>
</body>
</html>