<?php

include '../connect.php';

$query = "SELECT id_dosen, nama_dosen FROM dosen";
$result = mysqli_query($connect, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/form-create.css">
    <script src="js/validasi.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="form" >
    <form action="create.php" method="post" class="form-container">
    <h2 class="form-header">Tambah Data Matkul</h2>
   <p>
       <br>
    <input type="text" class="form-input" name="kode" placeholder="kode" id="kode">
   <br>
    <input type="text" class="form-input" name="nama_matkul" placeholder="Mata Kuliah" id="nama_matkul">
    <br>
    <input type="text" class="form-input" name="sks" placeholder="sks" id="sks">
    <br>
    <input type="text" class="form-input" name="semester" placeholder="Semester" id="semester">
    <br>
    Dosen Pengajar
    <select name="id_dosen" id="nama_dosen">
            <option value="NULL">Tidak ada pengajar</option>
            <?php
            while ($data = mysqli_fetch_assoc($result)) {
                ?>
                <option value="<?php echo $data['id_dosen']; ?>">
            <?php echo $data['nama_dosen']; ?>
            </option>
            <?php
            }
            ?>
        </select>
    <br>
    <input type="submit" value"simpan" onclick="return validasiMatkul()">
</p>
    </form>
    </div>
</body>
</html>