<link rel='stylesheet' href='style.css'>

<table>
    <tr>
        <td><a href='home.php'> Home </a><td>
    </tr>
</table>

<?php

include 'koneksi.php';

$sql=mysqli_query($koneksi,"select * from tabel_penjualan where id_nota='$_GET[kode]'");
$data=mysqli_fetch_array($sql);

?>


<h3> Ubah Data Penjualan </h3>

<form action='' method='post'>
<table>
    <tr>
        <td width='130'>ID Nota</td>
        <td><input type='text' name='id_nota' value="<?php echo $data['id_nota']; ?>"></td>
    </tr>
    <tr>
        <td width='130'>ID Pembeli</td>
        <td><input type='text' name='id_pem' value="<?php echo $data['id_pem']; ?>"></td>
    </tr>
    <tr>
        <td width='130'>ID Pegawai</td>
        <td><input type='text' name='id_peg' value="<?php echo $data['id_peg']; ?>"></td>
    </tr>
    <tr>
        <td width='130'>ID Barang</td>
        <td><input type='text' name='id_brg' value="<?php echo $data['id_brg']; ?>"></td>
    </tr>
    <tr>
        <td>Tanggal Jual</td>
        <td><input type='date' name='tgl_beli' value="<?php echo $data['tgl_beli']; ?>"></td>
    </tr>
    <tr>
        <td>Jumlah Jual</td>
        <td><input type='number' name='jml_beli' value="<?php echo $data['jml_beli']; ?>"></td>
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
    mysqli_query($koneksi,"update tabel_penjualan set
    id_nota = '$_POST[id_nota]',
    id_pem = '$_POST[id_pem]',
    id_peg = '$_POST[id_peg]',
    id_brg = '$_POST[id_brg]',
    tgl_beli = '$_POST[tgl_beli]',
    jml_beli = '$_POST[jml_beli]'
    where id_nota = '$_GET[kode]'");

    echo "Data penjualan telah diubah";
    echo "<meta http-equiv=refresh content=1;URL='data_penjualan.php'>";
}
?>