<link rel='stylesheet' href='style.css'>

<?php
session_start();
include 'koneksi.php';
?>

<table align='center'>
    <tr>
        <td><p align='center'> Silakan login untuk memasuki aplikasi </p>
    </tr>
</table>

<br>

<form action='' method='POST'>
<table align='center'>
    <tr>
        <th colspan='2' height='40'>LAMAN LOGIN</th>
    </tr>
    <tr>
        <td width='100'>ID</td>
        <td><input type='text' name='id_peg'></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type='password' name='pass'></td>
    </tr>
    <tr>
        <td></td>
        <td><input type='submit' value='Login' name='proseslog'></td>
    </tr>
</table>
</form>

<?php
if(isset($_POST['proseslog'])){
    $sql = mysqli_query($koneksi, "select * from tabel_pegawai where id_peg = '$_POST[id_peg]'
    and pass = '$_POST[pass]'");

    $cek = mysqli_num_rows($sql);
    if($cek > 0){
        $_SESSION['id_peg'] = $_POST['id_peg'];

        echo "<meta http-equiv=refresh content=0;URL='home.php'>";
    }else{
        echo "<p align=center><b> Id dan Password salah! </b></p>";
        echo "<meta http-equiv=refresh content=2;URL='login.php'>";
    }
}
?>