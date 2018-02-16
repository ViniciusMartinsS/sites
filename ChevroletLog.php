<!DOCTYPE html>
<html>
<head>
	<title>Find Your Car - Chevrolet</title>
</head>
<body background="http://www.casadopapeldeparede.com.br/wp-content/uploads/2013/04/989-26959.jpg" bgproperties = "fixed">
<?php include("HeaderLogado.php"); ?>
<style>
    .mesmo-tamanho {
    width: 33%;
    white-space: normal;
    }
</style>
<div align="left">
<div class="col-sm-3 my-1">
<b>Montadoras: </b>
</div>
<div class="col-sm-3 my-1">
<a href="ChevroletLog.php" class="btn btn-outline-dark my-2 my-sm-0 mesmo-tamanho">Chevrolet</a>
</div>
<div class="col-sm-3 my-1">
<a href="#" class="btn btn-outline-dark my-2 my-sm-0 mesmo-tamanho	">Citroen</a>
</div>
<div class="col-sm-3 my-1">
<a href="FiatLog.php" class="btn btn-outline-dark my-2 my-sm-0 mesmo-tamanho	">Fiat</a>
</div>
<div class="col-sm-3 my-1">
<a href="#" class="btn btn-outline-dark my-2 my-sm-0 mesmo-tamanho	">Ford</a>
</div>
<div class="col-sm-3 my-1">
<a href="#" class="btn btn-outline-dark my-2 my-sm-0 mesmo-tamanho	">Honda</a>
</div>
<div class="col-sm-3 my-1">
<a href="#" class="btn btn-outline-dark my-2 my-sm-0 mesmo-tamanho	">Hyundai</a>
</div>
<div class="col-sm-3 my-1">
<a href="#" class="btn btn-outline-dark my-2 my-sm-0 mesmo-tamanho	">Mitsubishi</a>
</div>
<div class="col-sm-3 my-1">
<a href="#" class="btn btn-outline-dark my-2 my-sm-0 mesmo-tamanho	">Nissan</a>
</div>
<div class="col-sm-3 my-1">
<a href="#" class="btn btn-outline-dark my-2 my-sm-0 mesmo-tamanho	">Peugeot</a>
</div>
<div class="col-sm-3 my-1">
<a href="#" class="btn btn-outline-dark my-2 my-sm-0 mesmo-tamanho	">Renault</a>
</div>
<div class="col-sm-3 my-1">
<a href="#" class="btn btn-outline-dark my-2 my-sm-0 mesmo-tamanho	">Toyota</a>
</div>
<div class="col-sm-3 my-1">
<a href="VolkswagenLog.php" class="btn btn-outline-dark my-2 my-sm-0 mesmo-tamanho	">Volkswagen</a>
</div>
</div>
<style>
    .opcao {
    top: 50%;
    position: relative;
    margin-top: -170%;
    right:-365%;
    }
</style>
<div class="col-sm-3 my-1">
<form class="opcao">
  <input class="btn btn-outline-dark my-2 my-sm-0 mesmo-tamanho" type="submit" name="btn" value="ano">
  <input class="btn btn-outline-dark my-2 my-sm-0 mesmo-tamanho"  type="submit" name="btn" value="preco">
</form>
</div>
<style>
   .centro {
    position: relative;
    top: 50%;
    left: 50%;
    margin-top: 0%;
    margin-left: -560px;
    }
</style>

<?php 

if(isset($_GET['btn'])){
$ordenar = $_GET['btn']; 
} else{
  $ordenar="ano";
}

$montadora = "Chevrolet"; 
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

$sql = "SELECT modelo, cor, ano, km, opcionais, descricao, preco, imagem, id_veiculo FROM tb_veiculos WHERE  marca = '$montadora' ORDER BY $ordenar";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       $modelo = $row["modelo"];
       $cor = $row["cor"];
       $ano = $row["ano"];
       $km = $row["km"];
       $opcionais = $row["opcionais"];
       $descricao = $row["descricao"];
       $preco = $row["preco"];
       echo "<a href='DetalhesAnuncio.php?id=". $row["id_veiculo"] ."' ><img class='centro' src='".$row["imagem"]."' width='300' height='200' ></a> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;";
       $img = $row["imagem"];
    }
} else {
    echo "Não Há Veiculos";
}

?>
</body>
</html>