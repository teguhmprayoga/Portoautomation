<link rel='stylesheet' href='style.css'>

<table>
    <tr>
        <td><a href='home.php'> Home </a><td>
    </tr>
</table>

<h3> Data Barang </h3>

<table border='1'>
    <tr>
        <td><a href='tambah_barang.php'> Tambahkan Data Barang </a><td>    
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
        <th width='100'>ID Barang</th>
        <th width='100'>ID Supplier</th>
        <th width='200'>Nama Barang</th>
        <th width='150'>Harga Beli (Rp)</th>
        <th width='150'>Harga Jual (Rp)</th>
        <th width='100'>Jumlah Stok</th>
        <th colspan='2'>Aksi</th>
    </tr>
    
    <?php
        include 'koneksi.php';
        if(isset($_POST['cari'])){
            $no=1;
            $ambildata = mysqli_query($koneksi, "select * from tabel_barang 
                where 
                    id_brg like '%$_POST[keyword]%' or
                    nama_brg like '%$_POST[keyword]%'");
            while ($tampil = mysqli_fetch_array($ambildata)){
                echo "
                    <tr>
                        <td>$no</td>
                        <td>$tampil[id_brg]</td>
                        <td>$tampil[id_sup]</td>
                        <td>$tampil[nama_brg]</td>
                        <td>$tampil[hrg_beli]</td>
                        <td>$tampil[hrg_jual]</td>
                        <td>$tampil[stok]</td>
                        <td><a href='?kode=$tampil[id_brg]'> <input type='button' class='btn-delete'> </a></td>
                        <td><a href='ubah_barang.php?kode=$tampil[id_brg]'> <input type='button' class='btn-update'> </a></td>
                    </tr>";
                    $no++;
            }
        }else{      
            $no=1;
            $ambildata = mysqli_query($koneksi, 'select * from tabel_barang');
            while ($tampil = mysqli_fetch_array($ambildata)){
                echo "
                    <tr>
                        <td>$no</td>
                        <td>$tampil[id_brg]</td>
                        <td>$tampil[id_sup]</td>
                        <td>$tampil[nama_brg]</td>
                        <td>$tampil[hrg_beli]</td>
                        <td>$tampil[hrg_jual]</td>
                        <td>$tampil[stok]</td>
                        <td><a href='?kode=$tampil[id_brg]'> <input type='button' class='btn-delete'> </a></td>
                        <td><a href='ubah_barang.php?kode=$tampil[id_brg]'> <input type='button' class='btn-update'> </a></td>
                    </tr>";
                    $no++;
            }

        }
    ?>
</table>

<br>

<?php
if(isset($_GET['kode'])){

mysqli_query($koneksi,"delete from tabel_barang where id_brg='$_GET[kode]'");

echo 'Data telah terhapus';
echo "<meta http-equiv=refresh content=2;URL='data_barang.php'>";
}

?>
