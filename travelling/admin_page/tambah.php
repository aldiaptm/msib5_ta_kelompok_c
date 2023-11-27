<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kue</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
            background-color: lightcyan;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <a class="btn btn-success" style="margin-bottom:5px; margin-top:20px;" href="admin-fix.php"> HOME </a>
                <h1 style="margin-bottom:5px">Tambah Data Destinasi</h1>
                <?php
                include 'koneksi.php';
                ?>
                <form style="margin-top: 20px" action="proses_tambah.php" method="post" enctype="multipart/form-data"
                    onsubmit="return validateForm();">
                    <div class="form-group">
                        <label for="varian_kue">Nama:</label>
                        <input type="text" class="form-control" id="nama_varian" name="nama_varian">
                    </div>
                    <div class="form-group">
                        <label for="gambar_kue">Gambar:</label>
                        <input type="file" name="gambar_kue">
                    </div>
                    <div class="form-group">
                        <label for="harga">Lokasi:</label>
                        <input type="text" class="form-control" id="harga" name="harga">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">HTM:</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                    </div>
                    <div class="form-group">
                        <label for="stok">Deskripsi:</label>
                        <input type="text" class="form-control" id="stok" name="stok">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kue_id">Jenis Kue:</label>
                        <select name="jenis_kue_id" id="jenis_kue_id">
                            <?php   
                            // Fetch data from the "items" table
                            $query = mysqli_query($conn, "SELECT * FROM jenis_kue");
                            if (mysqli_num_rows($query) > 0) {
                                while ($data = mysqli_fetch_array($query)) {
                                    echo "<option value='" . $data["jenis_kue_id"] . "'>" . $data["nama_jenis"] . "</option>";
                                }
                            } else {
                                echo "<option value=''>No items available</option>";
                            }
                            ?>
                        </select><br>
                    </div>
                    <div class="form-group">
                        <label for="supplier_id">Supplier:</label>
                        <select name="supplier_id" id="supplier_id">
                            <?php
                            // Fetch data from the "items" table
                            $query = mysqli_query($conn, "SELECT * FROM supplier");
                            if (mysqli_num_rows($query) > 0) {
                                while ($data = mysqli_fetch_array($query)) {
                                    echo "<option value='" . $data["supplier_id"] . "'>" . $data["nama_supplier"] . "</option>";
                                }
                            } else {
                                echo "<option value=''>No items available</option>";
                            }
                            ?>
                        </select><br>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>