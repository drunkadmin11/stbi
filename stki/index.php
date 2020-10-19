<?php
require_once('Enhanced_CS.php');
?>
<!DOCTYPE html>
<html>
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
<div class="container-fluid">
<div class="row text-center mt-3 ">
    <div class="card ml-0 mb-2" style="width: 100%;">
        <div class="card-body">
		<center><h3>Hasil Stemming</h3></center>
            <h5 class="card-title mb-1" ><?php if(isset($_POST['kata'])){
				$teksAsli = $_POST['kata'];
				echo "Teks asli : ".$teksAsli.'<br/>';
          }
          ?></h5>
            <span><?php if(isset($_POST['kata'])){
					$stemming = Enhanced_CS($teksAsli);
					echo "Kata dasar : ".$stemming.'<br/>';
				}?></span> <br>
        </div>
    </div>
</div>
</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<br><br>
</body>
</html>