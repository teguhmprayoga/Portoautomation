<link rel='stylesheet' href='style.css'>

<table>
    <tr>
        <td><a href='home.php'> Home </a><td>
    </tr>
</table>

<h3> Data Pembeli </h3>

<table border='1'>
    <tr>
        <td><a href='tambah_pembeli.php'> Tambahkan Data Pembeli </a><td>    
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
        <th width='100'>ID Pembeli</th>
        <th width='200'>Nama Pembeli</th>
        <th width='200'>Alamat Pembeli</th>
        <th width='200'>Telepon Pembeli</th>
        <th colspan='2'>Aksi</th>
    </tr>

    <?php

        include 'koneksi.php';
        if(isset($_POST['cari'])){
            $no=1;
            $ambildata = mysqli_query($koneksi, "select * from tabel_pembeli
                where
                    id_pem like '%$_POST[keyword]%' or
                    nama_pem like '%$_POST[keyword]%' or
                    alamat_pem like '%$_POST[keyword]%'");
            while ($tampil = mysqli_fetch_array($ambildata)){
                echo "
                    <tr>
                        <td>$no</td>
                        <td>$tampil[id_pem]</td>
                        <td>$tampil[nama_pem]</td>
                        <td>$tampil[alamat_pem]</td>
                        <td>$tampil[telp_pem]</td>
                        <td><a href='?kode=$tampil[id_pem]'> <input type='button' class='btn-delete'> </a></td>
                        <td><a href='ubah_pembeli.php?kode=$tampil[id_pem]'> <input type='button' class='btn-update'> </a></td>
                    </tr>";
                    $no++;
            }
        }else{
            $no=1;
            $ambildata = mysqli_query($koneksi, 'select * from tabel_pembeli');
            while ($tampil = mysqli_fetch_array($ambildata)){
                echo "
                    <tr>
                        <td>$no</td>
                        <td>$tampil[id_pem]</td>
                        <td>$tampil[nama_pem]</td>
                        <td>$tampil[alamat_pem]</td>
                        <td>$tampil[telp_pem]</td>
                        <td><a href='?kode=$tampil[id_pem]'> <input type='button' class='btn-delete'> </a></td>
                        <td><a href='ubah_pembeli.php?kode=$tampil[id_pem]'> <input type='button' class='btn-update'> </a></td>
                    </tr>";
                    $no++;
            }
        }
    ?>
</table>


<?php
if(isset($_GET['kode'])){

mysqli_query($koneksi,"delete from tabel_pembeli where id_pem='$_GET[kode]'");

echo 'Data telah terhapus';
echo "<meta http-equiv=refresh content=2;URL='data_pembeli.php'>";
}

?>
