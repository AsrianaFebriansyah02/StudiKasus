<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Tambah Produk</title>
</head>

<body>
    <?php
    ob_start();
    include_once("connect.php");
    $array_produk = mysqli_query($conn, "SELECT*FROM produk");
    $array_kategori = mysqli_query($conn, "SELECT*FROM kategori");
    ?>
    <div class="container-fluid">
        <br>
        <div class="row justify-content-center">
            <div class="col col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-header">Tambah Daftar Album</div>

                    <div class="card-body">
                        <form action="tambah.php" method="post" name="form1" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Album</label>
                                <input type="text" class="form-control" required="required" name="NamaProduk">
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="IDKategori" class="form-control">
                                    <?php
                                    while ($kategori = mysqli_fetch_array($array_kategori)) {
                                        echo "
                                                <option value=" . $kategori['IDKategori'] . ">" . $kategori['NamaKategori'] . "</option>
                                            ";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" class="form-control" required="required" name="Harga">
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" class="form-control" required="required" name="Gambar"><br>
                            </div>
                            <input type="submit" class="form-control btn btn-primary float-right" name="Submit" value="TAMBAH"></input>
                            <button type="reset" class="form-control btn btn-warning  float-right mt-2">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['Submit'])) {
    $NamaProduk  = $_POST['NamaProduk'];
    $IDKategori = $_POST['IDKategori'];
    $Harga    = $_POST['Harga'];
    $Gambar   = $_FILES['Gambar']['name'];
    $tmp_file = $_FILES['Gambar']['tmp_name'];

    //menentukan lokasi file akan dipindahkan
    $upload     = "images/" . $Gambar;

    //pindahkan file
    //$terupload  = move_uploaded_file($tmp_file,$upload.$Gambar);

    if (move_uploaded_file($tmp_file, $upload)) {
        $insert = mysqli_query($conn, "INSERT INTO `produk` (`NamaProduk`,`IDKategori`,`Harga`,`Gambar`) 
                                VALUES ('$NamaProduk','$IDKategori','$Harga','$Gambar');");

        if ($insert) { //cek apakah berhasil simpan ke database
            //jika berhasil
            header("location:index.php");
        } else {
            echo "MAAF , TERJADI KESALAHAN SAAT MENYIMPAN KE DATABASE";
        }
    } else {
        //Jika gambar gagal upload
        echo "Maaf , Gambar Gagal di Upload";
    }
    //print_r($_POST);
}
?>