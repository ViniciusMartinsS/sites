<!DOCTYPE html>
<html>
<head>
	<title>Find Your Car - Gerenciar Veículos</title>
</head>
<body background="http://www.casadopapeldeparede.com.br/wp-content/uploads/2013/04/989-26959.jpg" bgproperties = "fixed">
<?php include("HeaderLogado.php");?>
<center>
<h2>Veículos Anunciados: </h2>

<?php 

$index_user = $_SESSION['id']; 

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

$sql = "SELECT modelo, marca, id_veiculo FROM tb_veiculos WHERE  vendedor = $index_user";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	echo "<form method='GET'  class='col-sm-3 my-1' action='GerenciadorCad.php'>";
	echo "<select class='form-control' name='escolha' id='escolha'>
  	<option value='' disabled selected>Selecione o Veículo</option>";
    while($row = $result->fetch_assoc()) {
       echo "<option value=".$row["id_veiculo"].">".$row["marca"]."&nbsp;".$row["modelo"]."</option>";
    }
   echo "</select> ";

    echo "<br><input class='btn btn-outline-dark my-2 my-sm-0' type='submit' name='btn_gerenciar' value='Gerenciar'>
    	&emsp; 
	<input class='btn btn-outline-dark my-2 my-sm-0' type='reset' name='btn_limpar' value='Limpar'>";
   
    echo "</form>";
} else {
    echo "<br><br><br<br><br><br><h2 style='color:red;'>Você ainda não possui anúncios!</h2>";
}

 ?>

</center>
</body>
</html>