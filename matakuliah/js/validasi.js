function validasiMatkul(){
    var kode = document.getElementById('kode');
    var nama_matkul = document.getElementById('nama_matkul');
    var sks = document.getElementById('sks');
    var semester = document.getElementById('semester');
    var id_dosen = document.getElementById('id_dosen');

    if(kode.value == ""){
        alert("Anda belum mengisi kode matakuliah");
        kode.focus();
        return false;
    }
  else if(nama_matkul.value == ""){
    alert("Anda belum mengisi nama matakuliah");
    nama_matkul.focus();
    return false;
  }
  else if(sks.value == ""){
    alert("Anda belum mengisi sks");
    sks.focus();
    return false;
  }

  else if(semester.value == ""){
    alert("Anda belum mengisi semester");
    semester.focus();
    return false;
  }

  else if(id_dosen.value == "-"){
    alert("Anda belum memilih dosen");
    id_dosen.focus();
    return false;
  }
    else{
        return true;
    }

}

