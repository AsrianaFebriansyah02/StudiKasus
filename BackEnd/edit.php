<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="
http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![e
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Edit Produk</title>
</head>
<body>
<?php
ob_start();
include_once("connect.php");

$array_kategori = mysqli_query($conn, "SELECT * FROM kategori");

$IDProduk        = $_GET['IDProduk'];
$daftarproduk     = mysqli_query($conn, "SELECT * FROM produk WHERE IDProduk='$IDProduk'");

while ($dataproduk = mysqli_fetch_array($daftarproduk)) {
    $NamaProduk  = $dataproduk['NamaProduk'];
    $Gambar     = $dataproduk['Gambar'];
    $IDKategori = $dataproduk['IDKategori'];
    $Harga      = $dataproduk['Harga'];
}
?>
    <div class="container-fluid">
        <br>
        <div class="row justify-content-center">
            <div class="col col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-header">Edit Data Album</div>

                    <div class="card-body">
                    <form action="edit.php?IDProduk=<?php echo $IDProduk; ?>" method="post" name="form1" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Album</label>
                                <input type="text" class="form-control" required="required" name="NamaProduk" value="<?php echo $NamaProduk; ?>">
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="IDKategori" class="form-control" value="<?php echo $IDKategori; ?>">
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
                                <input type="text" class="form-control" required="required" name="Harga" value="<?php echo $Harga; ?>">
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" class="form-control" required="required" name="Gambar" value="<?php echo $Gambar; ?>"><br>
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
    $IDProduk  = $_GET['IDProduk'];
    $NamaProduk  = $_POST['NamaProduk'];
    $IDKategori = $_POST['IDKategori'];
    $Harga    = $_POST['Harga'];
    $Gambar   = $_FILES['Gambar']['name'];

    $update = mysqli_query($conn, "UPDATE produk SET NamaProduk = '$NamaProduk' , IDKategori = '$IDKategori' , Harga = '$Harga' ,  Gambar = '$Gambar' WHERE IDProduk = '$IDProduk';");

    header("location:index.php");
}
?>