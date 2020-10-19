<?php
//membuat koneksi ke database
$host='sql308.epizy.com';
$user='epiz_26965314';
$pass='amd5a0LxQHYN';
$database='epiz_26965314_db';

$conn=new mysqli($host,$user,$pass,$database) or die('MySql Tidak Connect');
?>

<head>
	<title>STEMMING</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<nav  class="navbar navbar-expand-lg navbar-light" style="background-color: ##6C0000;" >
  <!-- Navbar content -->
<br><br>
  <div class ="container-fluid "class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="upload.php">Upload</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="hasil_tokenisasi.php">Hasil Tokenisasi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="query.php">Query</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="hitungbobot.php">Hitung Bobot</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post" action="">
	<input  class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"type="text" name="kata" id="kata" size="20" value="<?php if(isset($_POST['kata'])){ echo $_POST['kata']; }else{ echo '';}?>">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>	
<img src="gambar2.jpg"width="320" height="280" class="card-img-top" alt="...">

<br><br>

<center> 
HASIL TOKENISASI DAN STEMMING
<br>
<br>

<!-- ///////////////////////////// Script untuk membuat tabel///////////////////////////////// -->



<table  border='1' Width='800'>  
<tr>
    <th> Nama File </th>
    <th> Tokenisasi </th>
    <th> Stemming Porter</th>
    <th> Stemming Nazief Adriel
</tr>

<?php  
// Perintah untuk menampilkan data
$queri="Select * From dokumen" ;  //menampikan SEMUA


$hasil=mysqli_query ($conn, $queri);    //fungsi untuk SQL

// perintah untuk membaca dan mengambil data dalam bentuk array
while ($data = mysqli_fetch_array ($hasil)){
$id = $data['dokid'];
 echo "    
        <tr>
        <td>".$data['nama_file']."</td>
        <td>".$data['token']."</td>
        <td>".$data['tokenstem']."</td>
        <td>".$data['tokenstem2']."</td>
        </tr> 
        ";
        
}

?>

</table>