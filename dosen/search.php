<?php

session_start();

if(!(isset($_SESSION['user'])))
{
    header("location: ../login/form-login.php");
}

include '../connect.php';

$cari = $_GET['cari'];
$query = "SELECT * FROM dosen WHERE nama_dosen LIKE '%$cari%'";
$result = mysqli_query($connect,$query);
$num = mysqli_num_rows($result);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="css/read.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  

<body>
<div id="sideNavigation" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times; </a>
  <a href="form-create.php">Tambah Data</a>
  <a href="../matakuliah/read.php">Mata Kuliah</a>
  <a href="../login/logout.php">Log out</a>
</div>
 
<nav class="topnav">
  <a href="#" onclick="openNav()">
    <svg width="30" height="30" id="icoOpen">
        <path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
        <path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
        <path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
    </svg>
  </a>
</nav>
    
    <h2>Data Dosen</h2>
  
    <table class="table">
    <tr>
          <th>No.</th>
          <th>Nama Dosen</th>
          <th>Telepon</th>   
          <th colspan='2'>Aksi</th> 
    </tr>
    
    <script>
function openNav() {
    document.getElementById("sideNavigation").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}
 
function closeNav() {
    document.getElementById("sideNavigation").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}
</script>
    <?php
    if($num > 0)
    {
        $no = 1;
        while($data = mysqli_fetch_assoc($result))
        {
        echo "<tr>";
        echo "<td>". $no . "</td>";
        echo "<td>" . $data ['nama_dosen']. "</td>";
        echo "<td>" .  $data ['telp'] . "</td>";
        echo "<td><a id='edit' href ='form-update.php?id_dosen=".$data['id_dosen']."'>  Edit</a>  ";
        echo "<td><a id='hapus' href ='delete.php?id_dosen=".$data['id_dosen']."'onclick='return confirm(\"Apakah anda yakin akan menhapus data\")'>Hapus</a>  ";
        echo "</tr>";

        $no++;
        }
    }
    else
    {
        echo "<td colspan = '4'>Tidak ada data </td>";

    }
    ?>
   
    </table>
    <br>
    <a href="../dosen/read.php"><input type="submit" value="Kembali" id="back"></a> 
   
</body>
</html>