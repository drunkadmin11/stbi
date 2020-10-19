 <link rel="stylesheet" type="text/css" href="styles.css">
<body>

<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="upload.php">Upload File</a></li>
  <li><a href="query.php">Query</a></li>
  <li><a href="hasil_tokenisasi.php">Hasil Tokenisasi</a></li>
  <li><a href="hitungbobot.php">Hitung Bobot</a></li>
</ul>

<br><br>

<center> 
<h3>HASIL QUERY</h3>
<br>
<br>


<table  border='1' Width='800'>  
<tr>
    <th> Nama File </th>
    <th> Tokenisasi </th>
    <th> Stemming Porter</th>

</tr>

 <?php
 //https://dev.mysql.com/doc/refman/5.5/en/fulltext-boolean.html
 //ALTER TABLE dokumen
//ADD FULLTEXT INDEX `FullText` 
//(`token` ASC, 
 //`tokenstem` ASC);
 
$host = "sql308.epizy.com";
$username = "epiz_26965314";
$password = "amd5a0LxQHYN";
$dbname = "epiz_26965314_db";
$katakunci="";
// Create connection
$conn = new mysqli($host, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$hasil=$_POST['katakunci'];
$sql = "SELECT distinct nama_file,token,tokenstem FROM `dokumen` where token like '%$hasil%'";
// $sql = "SELECT distinct nama_file,token,tokenstem FROM `dokumen` WHERE MATCH (token,tokenstem) AGAINST ('$hasil' IN BOOLEAN MODE)";


// echo $sql;
$result = $conn->query($sql);

if ($result) {
    // output data of each row
    while ($data = mysqli_fetch_array ($result)){
$id = $data['token'];
 echo "    
        <tr>
        <td>".$data['nama_file']."</td>
        <td>".$data['token']."</td>
        <td>".$data['tokenstem']."</td>
        </tr> 
        ";
        
}
} else {
    echo "0 results";
}
$conn->close();

///

?>

</table>