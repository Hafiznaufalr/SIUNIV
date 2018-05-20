<?php
include '../connect.php';

$kode = $_GET['kode'];

$query=" SELECT kode, nama_matkul, sks, semester, matakuliah.id_dosen, nama_dosen
         FROM matakuliah LEFT JOIN dosen USING(id_dosen)
         WHERE kode='$kode'";

$result = mysqli_query($connect, $query);

$data_dosen = mysqli_fetch_assoc($result);


?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/form-create.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body >
<div class="form" >
    <form action="update.php" method="post" class="form-container">
    <h2 class="form-header">Update Data Matkul</h2>
    <table>
      <br>
    <p>
         <input type="text" name="kode" id="kode" readonly value="<?php echo $data_dosen['kode']; ?> ">
      <br>
     
         <input type="text" name="nama_matkul" id="nama_matkul" value="<?php echo $data_dosen['nama_matkul']; ?>">
         
      <br>
      <input type="number" name="sks" id="sks" value="<?php echo $data_dosen['sks']; ?>">
      <br>
      <input type="number" name="semester" id="semester" value="<?php echo $data_dosen['semester']; ?>">
    
      <br>
      Dosen Pengajar
      <select name="id_dosen" id="nama_dosen">
          <option value="NULL">Tidak ada pengajar</option>
          <?php
          $query2= "SELECT id_dosen, nama_dosen FROM dosen";
          $result2 = mysqli_query($connect,$query2);
          while($data= mysqli_fetch_assoc($result2)) { ?>


          <option value="<?php echo $data['id_dosen']; ?>" <?php if($data_dosen['id_dosen'] == $data['id_dosen']){echo "selected"; } ?>>
          <?php echo $data['nama_dosen']; ?> 
         

        </option>
          <?php }
          ?>
          
      </select>        
         <input type="submit" name="btnSimpan" value="Simpan" >
         </p>
     
    </table>
    </form>                                               
         </div>
</body>

</html>                                            