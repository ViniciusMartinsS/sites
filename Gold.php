<!DOCTYPE html>
<html>
<head>
	<title>Find Your Car - Gold</title>
</head>
<body background="http://www.casadopapeldeparede.com.br/wp-content/uploads/2013/04/989-26959.jpg" bgproperties = "fixed">
<?php include("Header.php"); ?>
<style type="text/css">
.centro {
    position: relative;
    top: 50%;
    left: 50%;
    margin-top: -3%;
    margin-left: -710px;
    }
 </style> 

<?php  
echo "<br>";
$dbname = "findyourcar";
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT modelo, imagem, id_veiculo FROM tb_veiculos WHERE  goldv != 0 ORDER BY goldv DESC";
$result = $conn->query($sql);
echo "<img src='gold2.png' width='300' height='300' class='centro'> &emsp; &emsp; &emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; ";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       echo "<a href='DetalhesAnuncioDeslog.php?id=". $row["id_veiculo"] ."' ><img class='centro' src='".$row["imagem"]."' width='300' height='200' ></a> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; ";
    }
} else {
    echo "0 results";
}

?>

</body>
</html>