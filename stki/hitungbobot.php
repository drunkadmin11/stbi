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
HITUNG BOBOT
<br>
<br>

<?php

$host='sql308.epizy.com';
$user='epiz_26965314';
$pass='amd5a0LxQHYN';
$database='epiz_26965314_db';


$conn=new mysqli($host,$user,$pass,$database);
// mysql_select_db($database);
//hitung index
mysqli_query($conn, "TRUNCATE TABLE tbindex");
$resn = mysqli_query($conn, "INSERT INTO `tbindex`(`Term`, `DocId`, `Count`) SELECT `token`,`nama_file`,count(*) FROM `dokumen` group by `nama_file`,token");
	// $n = mysqli_num_rows($resn);
	

//berapa jumlah DocId total?, n
	$resn = mysqli_query($conn, "SELECT DISTINCT DocId FROM tbindex");
	$n = mysqli_num_rows($resn);
	
	//ambil setiap record dalam tabel tbindex
	//hitung bobot untuk setiap Term dalam setiap DocId
	$resBobot = mysqli_query($conn, "SELECT * FROM tbindex ORDER BY Id");
	$num_rows = mysqli_num_rows($resBobot);
	print("Terdapat " . $num_rows . " Term yang diberikan bobot. <br />");

	while($rowbobot = mysqli_fetch_array($resBobot)) {
		//$w = tf * log (n/N)
		$term = $rowbobot['Term'];		
		$tf = $rowbobot['Count'];
		$id = $rowbobot['Id'];
		
		//berapa jumlah dokumen yang mengandung term tersebut?, N
		$resNTerm = mysqli_query($conn,"SELECT Count(*) as N FROM tbindex WHERE Term = '$term'");
		$rowNTerm = mysqli_fetch_array($resNTerm);
		$NTerm = $rowNTerm['N'];
		
		$w = $tf * log($n/$NTerm);
		
		//update bobot dari term tersebut
		$resUpdateBobot = mysqli_query($conn, "UPDATE tbindex SET Bobot = $w WHERE Id = $id");		
  	} //end while $rowbobot


?>