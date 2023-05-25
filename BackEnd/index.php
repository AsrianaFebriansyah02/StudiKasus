<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <!-- awal navbar -->
    <nav class="navbar navbar-dark bg-primary navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                Admin Panel Dashboard

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Setting</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->


    <!-- awal tabel -->
    <div class="container card mt-5">
        <div class="card-body ">
            <a href="tambah.php" Class="btn btn-primary mt-3 mb-3">Tambah Data</a>
            <table class="table" id="example">
                <thead>
                    <tr class="text-center">
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">Gambar</th>
                        <th style="text-align: center;">Album</th>
                        <th style="text-align: center;">Kategori</th>
                        <th style="text-align: center;">Harga</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    include_once("connect.php");
                    $album = mysqli_query($conn, "SELECT produk.IDProduk , produk.NamaProduk, produk.Gambar , produk.Harga , kategori.NamaKategori, kategori.IDKategori as kategori FROM produk
                                        INNER JOIN kategori ON produk.IDKategori = kategori.IDKategori");
                    while ($bts = mysqli_fetch_array($album)) {
                    ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $no; ?></td>
                            <td style="text-align: center;"><img src="images/<?php echo $bts['Gambar']; ?>" width="150" height="150"></td>
                            <td style="text-align: center;"><?php echo $bts['NamaProduk'] ?></td>
                            <td style="text-align: center;"><?php echo $bts['NamaKategori'] ?></td>
                            <td style="text-align: center;"><?php echo $bts['Harga'] ?></td>
                            <td style="text-align: center;">
                                <a href="edit.php?IDProduk=<?php echo $bts['IDProduk']; ?>" class="btn btn-primary">Edit</a>
                                <a href="delete.php?IDProduk=<?php echo $bts['IDProduk']; ?>" class="btn btn-danger" onclick="confirm('Apakah Anda Yakin Mau Dihapus ?')">Delete</a>
                            </td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <!-- akhir tabel -->
</body>

</html>
