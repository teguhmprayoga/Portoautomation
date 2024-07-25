<link rel='stylesheet' href='style.css'>

<table>
    <tr>
        <td><a href='home.php'> Home </a><td>
    </tr>
</table>

<h3> Tambah Data Pegawai </h3>

<form action='' method='post'>
<table>
    <tr>
        <td width='130'>ID Pegawai</td>
        <td><input type='text' name='id_peg'></td>
    </tr>
    <tr>
        <td>Nama Pegawai</td>
        <td><input type='text' name='nama_peg'></td>
    </tr>
    <tr>
        <td>Telepon Pegawai</td>
        <td><input type='number' name='telp_peg'></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type='text' name='pass'></td>
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
        <td><a href='data_pegawai.php'> Kembali </a></td>
    </tr>
</table>

<br>

<?php
include 'koneksi.php';

if(isset($_POST['proses'])){
    mysqli_query($koneksi,"insert into tabel_pegawai set
    id_peg = '$_POST[id_peg]',
    nama_peg = '$_POST[nama_peg]',
    telp_peg = '$_POST[telp_peg]',
    pass = '$_POST[pass]'");

    echo "Data pegawai baru telah tersimpan";
}
?>