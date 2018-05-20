<?php 

include '../connect.php';

$id_dosen = $_GET['id_dosen'];

$query = "SELECT * FROM dosen WHERE id_dosen = $id_dosen";

$result = mysqli_query($connect, $query);

$row = mysqli_fetch_assoc($result);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
   <link rel="stylesheet" href="css/form-update.css">
</head>
<body>
<div class="form" >
    <form action="update.php" method="post" class="form-container">
    <h2 class="form-header">Update Data Dosen</h2>
    <table>
      <br>
    <p>
         <input type="text" name="nama_dosen" id="nama" value="<?php echo $row['nama_dosen']; ?> ">
      <br>
     
         <input type="text" name="telp" id="no_telp" value="<?php echo $row['telp']; ?>">
         
      <br>
      
         <input type="hidden" name="id_dosen" value="<?php echo $row['id_dosen']; ?>">
         <input type="submit" name="btnSimpan" value="Simpan" >
         </p>
     
    </table>
    </form>
</body>
</html>