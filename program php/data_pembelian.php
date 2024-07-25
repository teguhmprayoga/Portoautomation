<link rel='stylesheet' href='style.css'>

<table>
    <tr>
        <td><a href='home.php'> Home </a><td>
    </tr>
</table>

<h3> Data Pembelian </h3>

<table border='1'>
    <tr>
        <td><a href='tambah_pembelian.php'> Tambahkan Data Pembelian </a><td>    
        <td><a href='home.php'> Kembali </a><td>
    </tr>
</table>

<br>

<form action='' method='post'>

    <input type='text' name='keyword' size='40' autofocus 
    placeholder='Masukkan keyword pencarian...'>
    <button type='submit' name='cari'> Cari! </button>

</form>

<table border='1'>
    <tr>
        <th width='50'>No</th>
        <th width='100'>ID Faktur</th>
        <th width='100'>ID Barang</th>
        <th width='100'>ID Pegawai</th>
        <th width='100'>Tanggal Beli</th>
        <th width='100'>Jumlah Beli</th>
        <th width='50'>Aksi</th>
    </tr>

    <?php
        include 'koneksi.php';
        if(isset($_POST['cari'])){
            $no=1;
            $ambildata = mysqli_query($koneksi, "select * from tabel_pembelian
                where
                    id_faktur like '%$_POST[keyword]%' or
                    id_brg like '%$_POST[keyword]%' or
                    id_peg like '%$_POST[keyword]%' or
                    tgl_dtg like '%$_POST[keyword]%'");
            while ($tampil = mysqli_fetch_array($ambildata)){
                echo "
                    <tr>
                        <td>$no</td>
                        <td>$tampil[id_faktur]</td>
                        <td>$tampil[id_brg]</td>
                        <td>$tampil[id_peg]</td>
                        <td>$tampil[tgl_dtg]</td>
                        <td>$tampil[jml_sup]</td>
                        <td align='center'><a href='ubah_pembelian.php?kode=$tampil[id_faktur]'> <input type='button' class='btn-update'> </a></td>
                    </tr>";
                    $no++;
            }
        }else{
            $no=1;
            $ambildata = mysqli_query($koneksi, 'select * from tabel_pembelian');
            while ($tampil = mysqli_fetch_array($ambildata)){
                echo "
                    <tr>
                        <td>$no</td>
                        <td>$tampil[id_faktur]</td>
                        <td>$tampil[id_brg]</td>
                        <td>$tampil[id_peg]</td>
                        <td>$tampil[tgl_dtg]</td>
                        <td>$tampil[jml_sup]</td>
                        <td align='center'><a href='ubah_pembelian.php?kode=$tampil[id_faktur]'> <input type='button' class='btn-update'> </a></td>
                    </tr>";
                    $no++;
            }
        }
    ?>
</table>

<br>

<?php
if(isset($_GET['kode'])){

mysqli_query($koneksi,"delete from tabel_pembelian where id_faktur='$_GET[kode]'");

echo 'Data telah terhapus';
echo "<meta http-equiv=refresh content=2;URL='data_pembelian.php'>";
}

?>