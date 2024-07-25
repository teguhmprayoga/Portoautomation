<link rel='stylesheet' href='style.css'>

<table>
    <tr>
        <td><a href='home.php'> Home </a><td>
    </tr>
</table>

<h3> Tambah Data Penjualan </h3>

<form action='' method='post'>
<table>
    <tr>
        <td width='130'>ID Nota</td>
        <td><input type='text' name='id_nota'></td>
    </tr>
    <tr>
        <td width='130'>ID Pembeli</td>
        <td><input type='text' name='id_pem'></td>
    </tr>
    <tr>
        <td width='130'>ID Pegawai</td>
        <td><input type='text' name='id_peg'></td>
    </tr>
    <tr>
        <td>ID Barang</td>
        <td><input type='text' name='id_brg'></td>
    </tr>
    <tr>
        <td>Tanggal Jual</td>
        <td><input type='date' name='tgl_beli'></td>
    </tr>
    <tr>
        <td>Jumlah Jual</td>
        <td><input type='number' name='jml_beli'></td>
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
        <td><a href='data_penjualan.php'> Kembali </a></td>
    </tr>
</table>

<br>

<?php
include 'koneksi.php';

if(isset($_POST['proses'])){
    mysqli_query($koneksi,"insert into tabel_penjualan set
    id_nota = '$_POST[id_nota]',
    id_pem = '$_POST[id_pem]',
    id_peg = '$_POST[id_peg]',
    id_brg = '$_POST[id_brg]',
    tgl_beli = '$_POST[tgl_beli]',
    jml_beli = '$_POST[jml_beli]'");

    echo "Data penjualan baru telah tersimpan";
}
?>