<link rel='stylesheet' href='style.css'>

<table>
    <tr>
        <td><a href='home.php'> Home </a><td>
    </tr>
</table>

<h3> Tambah Data Supplier </h3>

<form action='' method='post'>
<table>
    <tr>
        <td width='130'>ID Supplier</td>
        <td><input type='text' name='id_sup'></td>
    </tr>
    <tr>
        <td>Nama Supplier</td>
        <td><input type='text' name='nama_sup'></td>
    </tr>
    <tr>
        <td>Alamat Supplier</td>
        <td><input type='text' name='alamat_sup'></td>
    </tr>
    <tr>
        <td>Telepon Supplier</td>
        <td><input type='number' name='telp_sup'></td>
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
        <td><a href='data_supplier.php'> Kembali </a></td>
    </tr>
</table>

<br>

<?php
include 'koneksi.php';

if(isset($_POST['proses'])){
    mysqli_query($koneksi,"insert into tabel_supplier set
    id_sup = '$_POST[id_sup]',
    nama_sup = '$_POST[nama_sup]',
    alamat_sup = '$_POST[alamat_sup]',
    telp_sup = '$_POST[telp_sup]'");

    echo "Data supplier baru telah tersimpan";
}
?>