<link rel='stylesheet' href='style.css'>

<table>
    <tr>
        <td><a href='home.php'> Home </a><td>
    </tr>
</table>

<h3> Data Supplier </h3>

<table border='1'>
    <tr>
        <td><a href='tambah_supplier.php'> Tambahkan Data Supplier </a><td>    
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
        <th width='100'>ID Supplier</th>
        <th width='200'>Nama Supplier</th>
        <th width='150'>Alamat Supplier</th>
        <th width='150'>Telepon Supplier</th>
        <th colspan='2'>Aksi</th>
    </tr>

    <?php
        include 'koneksi.php';
        if(isset($_POST['cari'])){
            $no=1;
            $ambildata = mysqli_query($koneksi, "select * from tabel_supplier
                where
                        id_sup like '%$_POST[keyword]%' or
                        nama_sup like '%$_POST[keyword]%' or
                        alamat_sup like '%$_POST[keyword]%'");
            while ($tampil = mysqli_fetch_array($ambildata)){
                echo "
                    <tr>
                        <td>$no</td>
                        <td>$tampil[id_sup]</td>
                        <td>$tampil[nama_sup]</td>
                        <td>$tampil[alamat_sup]</td>
                        <td>$tampil[telp_sup]</td>
                        <td><a href='?kode=$tampil[id_sup]'> <input type='button' class='btn-delete'> </a></td>
                        <td><a href='ubah_supplier.php?kode=$tampil[id_sup]'> <input type='button' class='btn-update'> </a></td>
                    </tr>";
                    $no++;
            }
        }else{
            $no=1;
            $ambildata = mysqli_query($koneksi, 'select * from tabel_supplier');
            while ($tampil = mysqli_fetch_array($ambildata)){
                echo "
                    <tr>
                        <td>$no</td>
                        <td>$tampil[id_sup]</td>
                        <td>$tampil[nama_sup]</td>
                        <td>$tampil[alamat_sup]</td>
                        <td>$tampil[telp_sup]</td>
                        <td><a href='?kode=$tampil[id_sup]'> <input type='button' class='btn-delete'> </a></td>
                        <td><a href='ubah_supplier.php?kode=$tampil[id_sup]'> <input type='button' class='btn-update'> </a></td>
                    </tr>";
                    $no++;
            }
        }

    ?>
</table>

<br>

<?php
if(isset($_GET['kode'])){

mysqli_query($koneksi,"delete from tabel_supplier where id_sup='$_GET[kode]'");

echo 'Data telah terhapus';
echo "<meta http-equiv=refresh content=2;URL='data_supplier.php'>";
}

?>