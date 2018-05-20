<?php

include '../connect.php';
session_start();

if(!(isset($_SESSION['user'])))
{
    header("location: ../login/form-login.php");
}
$query ="SELECT kode, nama_matkul, sks, semester, nama_dosen
         FROM matakuliah LEFT JOIN dosen
         USING (id_dosen)
         ORDER BY kode";

$result = mysqli_query($connect, $query);
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
    <style>
      
    </style>
</head>
<body onload="myFunction()">
<div id="loader"></div>

<div style="display:none;" id="myDiv" class="animate-bottom">
<div id="sideNavigation" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times; </a>
  <a href="form-create.php">Tambah Data</a>
  <a href="../dosen/read.php">Dosen</a>
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
        <h2>Mata Kuliah</h2>

<form action="search.php" method="get" class="cari">
<input type="search" name="cari" placeholder="cari" id="src">

<select name="kategori" id="drop">

<option value="nama_matkul">Matakuliah</option>
<option value="nama_dosen">Dosen</option>
<option value="sks">SKS</option>
<option value="semester">Semester</option>

</select>
<input type="submit" value="Cari">

</form>
<br>
<a href="form-create.php" id="plus">[+] Tambah Data</a>
<br>
<br>
      <table>
          <tr>
              <th>No.</th>
              <th>Kode</th>
              <th>Matakuliah</th>
              <th>SKS</th>
              <th>Semester</th>
              <th>Dosen Pengajar</th>
              <th colspan="2">Aksi</th>
        

              <?php

              if($num > 0)
              {
                  $no = 1;
                  while($data = mysqli_fetch_assoc($result)){ ?>

                    <tr>
                    <td> <?php echo $no; ?></td>
                    <td> <?php echo $data ['kode']; ?></td>
                    <td> <?php echo $data ['nama_matkul']; ?></td>
                    <td> <?php echo $data ['sks']; ?></td>
                    <td> <?php echo $data ['semester']; ?></td>
                    <td> 
                        <?php 
                               if($data['nama_dosen'] != NULL)
                               { echo $data['nama_dosen'];}
                               else{ echo "-";}
                           ?>
                    </td>
                    <td> <a href="form-update.php?kode=<?php echo $data['kode']; ?>" id="edit" >Edit </a> </td>
                    <td><a id="hapus" href="delete.php?kode=<?php echo $data ['kode'];  ?>"onclick="return confirm('Anda Yakin ingin menghapus data?')">Hapus</a></td>
                    </tr>

                    <?php
                    $no++;

                  }

              }

              else
              {
                  echo "<tr> <td colspan='7'>Tidak ada data </td></tr>";
              }
              
              ?>
          </tr>
      </table>

    </form>
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

<script>
var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 500);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}


</script>

</div>
</body>
</html>