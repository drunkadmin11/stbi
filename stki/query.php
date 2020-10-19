<html>
<title>Query</title>
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

<form enctype="multipart/form-data" method="POST" action="hasilquery.php">
Kata : <br>
<input type="text" name="katakunci"><br>
<input type=submit>
</form>