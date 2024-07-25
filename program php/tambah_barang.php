<link rel='stylesheet' href='style.css'>

<table>
    <tr>
        <td><a href='home.php'> Home </a><td>
    </tr>
</table>

<h3> Tambah Data Barang </h3>

<form action='' method='post'>
<table>
    <tr>
        <td width='130'>ID Barang</td>
        <td><input type='text' name='id_brg'></td>
    </tr>
    <tr>
        <td>ID Supplier</td>
        <td><input type='text' name='id_sup'></td>
    </tr>
    <tr>
        <td>Nama Barang</td>
        <td><input type='text' name='nama_brg'></td>
    </tr>
    <tr>
        <td>Harga Beli (Rp)</td>
        <td><input type='number' name='hrg_beli'></td>
    </tr>
    <tr>
        <td>Harga Jual (Rp)</td>
        <td><input type='number' name='hrg_jual'></td>
    </tr>
    <tr>
        <td>Jumlah Stok</td>
        <td><input type='number' name='stok'></td>
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
        <td><a href='data_barang.php'> Kembali </a></td>
    </tr>
</table>

<br>

<?php
include 'koneksi.php';

if(isset($_POST['proses'])){
    mysqli_query($koneksi,"insert into tabel_barang set
    id_brg = '$_POST[id_brg]',
    id_sup = '$_POST[id_sup]',
    nama_brg = '$_POST[nama_brg]',
    hrg_beli = '$_POST[hrg_beli]',
    hrg_jual = '$_POST[hrg_jual]',
    stok = '$_POST[stok]'");

    echo "Data barang baru telah tersimpan";
}
?>