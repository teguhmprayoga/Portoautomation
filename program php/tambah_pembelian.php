<link rel='stylesheet' href='style.css'>

<table>
    <tr>
        <td><a href='home.php'> Home </a><td>
    </tr>
</table>

<h3> Tambah Data Pembelian </h3>

<form action='' method='post'>
<table>
    <tr>
        <td width='130'>ID Faktur</td>
        <td><input type='text' name='id_faktur'></td>
    </tr>
    <tr>
        <td>ID Barang</td>
        <td><input type='text' name='id_brg'></td>
    </tr>
    <tr>
        <td>ID Pegawai</td>
        <td><input type='text' name='id_peg'></td>
    </tr>
    <tr>
        <td>Tanggal Masuk</td>
        <td><input type='date' name='tgl_dtg'></td>
    </tr>
    <tr>
        <td>Jumlah Supply</td>
        <td><input type='number' name='jml_sup'></td>
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
        <td><a href='data_pembelian.php'> Kembali </a></td>
    </tr>
</table>

<br>

<?php
include 'koneksi.php';

if(isset($_POST['proses'])){
    mysqli_query($koneksi,"insert into tabel_pembelian set
    id_faktur = '$_POST[id_faktur]',
    id_brg = '$_POST[id_brg]',
    id_peg = '$_POST[id_peg]',
    tgl_dtg = '$_POST[tgl_dtg]',
    jml_sup = '$_POST[jml_sup]'");

    echo "Data pembelian baru telah tersimpan";
}
?>
