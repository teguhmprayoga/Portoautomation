<link rel='stylesheet' href='style.css'>

<table>
    <tr>
        <td><a href='home.php'> Home </a><td>
    </tr>
</table>

<h3> Data Pegawai </h3>

<table border='1'>
    <tr>
        <td><a href='tambah_pegawai.php'> Tambahkan Data Pegawai </a><td>    
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
        <th width='100'>ID Pegawai</th>
        <th width='200'>Nama Pegawai</th>
        <th width='150'>Telepon Pegawai</th>
        <th width='100'>Password</th>
        <th colspan='2'>Aksi</th>
    </tr>

    <?php
        include 'koneksi.php';
        if(isset($_POST['cari'])){
            $no=1;
            $ambildata = mysqli_query($koneksi, "select * from tabel_pegawai
                where
                    id_peg like '%$_POST[keyword]%' or
                    nama_peg like '%$_POST[keyword]%' or
                    telp_peg like '%$_POST[keyword]%'");
            while ($tampil = mysqli_fetch_array($ambildata)){
                echo "
                    <tr>
                        <td>$no</td>
                        <td>$tampil[id_peg]</td>
                        <td>$tampil[nama_peg]</td>
                        <td>$tampil[telp_peg]</td>
                        <td>******</td>
                        <td><a href='?kode=$tampil[id_peg]'> <input type='button' class='btn-delete'> </a></td>
                        <td><a href='ubah_pegawai.php?kode=$tampil[id_peg]'> <input type='button' class='btn-update'> </a></td>
                    </tr>";
                    $no++;
            }
        }else{
            $no=1;
            $ambildata = mysqli_query($koneksi, 'select * from tabel_pegawai');
            while ($tampil = mysqli_fetch_array($ambildata)){
                echo "
                    <tr>
                        <td>$no</td>
                        <td>$tampil[id_peg]</td>
                        <td>$tampil[nama_peg]</td>
                        <td>$tampil[telp_peg]</td>
                        <td>******</td>
                        <td><a href='?kode=$tampil[id_peg]'> <input type='button' class='btn-delete'> </a></td>
                        <td><a href='ubah_pegawai.php?kode=$tampil[id_peg]'> <input type='button' class='btn-update'> </a></td>
                    </tr>";
                    $no++;
            }
        }

    ?>
</table>

<br>

<?php
if(isset($_GET['kode'])){

mysqli_query($koneksi,"delete from tabel_pegawai where id_peg='$_GET[kode]'");

echo 'Data telah terhapus';
echo "<meta http-equiv=refresh content=2;URL='data_pegawai.php'>";
}

?>