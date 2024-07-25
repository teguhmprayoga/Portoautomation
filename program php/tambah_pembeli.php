<link rel='stylesheet' href='style.css'>

<table>
    <tr>
        <td><a href='home.php'> Home </a><td>
    </tr>
</table>

<h3> Tambah Data Pembeli </h3>

<form action='' method='post'>
<table>
    <tr>
        <td width='100'>ID Pembeli</td>
        <td><input type='text' name='id_pem'></td>
    </tr>
    <tr>
        <td>Nama Pembeli</td>
        <td><input type='text' name='nama_pem'></td>
    </tr>
    <tr>
        <td>Alamat Pembeli</td>
        <td><input type='text' name='alamat_pem'></td>
    </tr>
    <tr>
        <td>Telepon Pembeli</td>
        <td><input type='number' name='telp_pem'></td>
    </tr>
    <tr>
        <td></td>
        <td><input type='submit' value='Simpan' name='proses'></td>
    </tr>
</table>
<form>

<br>

<table>
    <tr>
        <td><a href='data_pembeli.php'> Kembali </a></td>
    </tr>
</table>

<br>

<?php
include 'koneksi.php';

if(isset($_POST['proses'])){
    mysqli_query($koneksi,"insert into tabel_pembeli set
    id_pem = '$_POST[id_pem]',
    nama_pem = '$_POST[nama_pem]',
    alamat_pem = '$_POST[alamat_pem]',
    telp_pem = '$_POST[telp_pem]'");

    echo "Data pembeli baru telah tersimpan";
}
?>