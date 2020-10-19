<?php
$host='sql308.epizy.com';
$user='epiz_26965314';
$pass='amd5a0LxQHYN';
$database='epiz_26965314_db';
    
  $konek_db = mysqli_connect($host, $user, $password,$database);    
  $find_db = mysqli_select_db($database) ;

$query = "DELETE FROM `dokumen` WHERE 1";
 
$hasil = mysqli_query ($query);
 
echo "Data telah dihapus.";
?>
<br>
<a> Kembali ke tabel ? </a> <a href="hasil_tokenisasi.php"> YA </a>