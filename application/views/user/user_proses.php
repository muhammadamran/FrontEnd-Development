<?php
include '../../db/db.php';
$aksi = $_GET['aksi'];
// PROSES INPUT DATA USER
if ($aksi == 'insert') {
    $username = $_POST['NIDN'];
    $password = md5($_POST['NIDN']);
    $NIK = $_POST['NIK'];
    $NIDN = $_POST['NIDN'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir  = $_POST['tgl_lahir'];
    // $usia = $_POST['usia'];
    $agama = $_POST['agama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $status_pernikahan = $_POST['status_pernikahan'];
    $status_pegawai = $_POST['status_pegawai'];
    $jabatan = $_POST['jabatan'];
    $unit = $_POST['unit'];
    $golongan = $_POST['golongan'];
    $pangkat = $_POST['pangkat'];
    $gelar_s1 = $_POST['gelar_s1'];
    $gelar_s2 = $_POST['gelar_s2'];
    $gelar_s3 = $_POST['gelar_s3'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $role = $_POST['role'];
    
    $insert = $db->query('INSERT INTO tb_user 
                        (username,password,NIK,NIDN,nama_lengkap,tempat_lahir,tgl_lahir,agama,jenis_kelamin,status_pernikahan,status_pegawai,jabatan,unit,golongan,pangkat,gelar_s1,gelar_s2,gelar_s3,email,alamat,telepon,role) 
                        VALUES 
                        ("'.$username.'","'.$password.'","'.$NIK.'","'.$NIDN.'","'.$nama_lengkap.'","'.$tempat_lahir.'","'.$tgl_lahir.'","'.$agama.'","'.$jenis_kelamin.'","'.$status_pernikahan.'","'.$status_pegawai.'","'.$jabatan.'","'.$unit.'","'.$golongan.'","'.$pangkat.'","'.$gelar_s1.'","'.$gelar_s2.'","'.$gelar_s3.'","'.$email.'","'.$alamat.'","'.$telepon.'","'.$role.'")');
    // var_dump($NIK,$NIK,$NIDN,$nama_lengkap,$tempat_lahir,$tgl_lahir,$agama,$jenis_kelamin,$status_pernikahan,$status_pegawai,$jabatan,$unit,$golongan,$pangkat,$gelar_s1,$gelar_s2,$gelar_s3,$email,$alamat,$telepon,$role);exit();
    if ($insert) {
        echo '<script>alert("Data berhasil ditambahkan");location.href = "../../index.php?m=user&s=user"</script>';
    } else {
        echo '<script>alert("Data gagal ditambahkan");history.go(-1)</script>';
    }
// PROSES DATA UPDATE USER
} else if ($aksi == 'update') {
    $username = $_POST['NIDN'];
    $password = md5($_POST['NIDN']);
    $NIK = $_POST['NIK'];
    $NIDN = $_POST['NIDN'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir  = $_POST['tgl_lahir'];
    // $usia = $_POST['usia'];
    $agama = $_POST['agama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $status_pernikahan = $_POST['status_pernikahan'];
    $status_pegawai = $_POST['status_pegawai'];
    $jabatan = $_POST['jabatan'];
    $unit = $_POST['unit'];
    $golongan = $_POST['golongan'];
    $pangkat = $_POST['pangkat'];
    $gelar_s1 = $_POST['gelar_s1'];
    $gelar_s2 = $_POST['gelar_s2'];
    $gelar_s3 = $_POST['gelar_s3'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $role = $_POST['role'];
    
    $update = $db->query('UPDATE tb_user SET nama="'.$nama.'", 
                                          department="'.$department.'", 
                                          email="'.$email.'",
                                          role="'.$role.'", 
                                          grade="'.$grade.'", 
                                          usia="'.$usia.'", 
                                          status_pernikahan="'.$status_pernikahan.'", 
                                          indesk_predikat="'.$indesk_predikat.'", 
                                          kehadiran="'.$kehadiran.'", 
                                          rangking="'.$rangking.'", 
                                          role="'.$role.'" 
                                          WHERE id="'.$id.'"');

    if ($update) {
        echo '<script>alert("Data berhasil diedit");location.href = "../../index.php?m=user&s=user"</script>';
    } else {
        echo '<script>alert("Data gagal diedit");history.go(-1)</script>';
    }
// HAPUS DATA USER BERDASARKAN ID
} else if ($aksi == 'hapus') {
    $id = $_GET['id'];
    $hapus = $db->query('DELETE FROM user WHERE id="'.$id.'"');

    if ($hapus) {
        echo '<script>alert("Data berhasil dihapus");location.href = "../../index.php?m=user&s=user"</script>';
    } else {
        echo '<script>alert("Data gagal dihapus");history.go(-1)</script>';
    }
// PROSES CHANGE PASSWORD USER BERDASARKAN ID
} else if ($aksi == 'update_password') {
    $id = $_GET['id'];
    $password = md5($_POST['password']);
    
    $change = $db->query('UPDATE user SET password="'.$password.'" WHERE id="'.$id.'"');

    if ($change) {
        echo '<script>alert("Password berhasil diganti");location.href = "../../index.php?m=user&s=user"</script>';
    } else {
        echo '<script>alert("Password gagal diganti");history.go(-1)</script>';
    }
}