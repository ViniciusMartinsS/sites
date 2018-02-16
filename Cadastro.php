<!DOCTYPE html>
<html>
<head>
	<title>Find Your Car - Cadastre-se</title>
</head>
<body background="http://www.casadopapeldeparede.com.br/wp-content/uploads/2013/04/989-26959.jpg" bgproperties = "fixed">
<?php include("Header.php"); ?>

<br>
<center>
<h2>Crie uma conta</h2>
<form class="col-sm-3 my-1" action="Cadastro.php" method="POST">
	<input type="text" name="Nome" placeholder="Nome" class="form-control" required> <br>
	<input type="text" name="Sobrenome" placeholder="Sobrenome" class="form-control" required > <br> 
	<input type="number" name="Celular" placeholder="Celular" class="form-control" required> <br>
	<input type="number" name="Telefone" placeholder="Telefone" class="form-control"> <br> 
	<input type="email" name="Email" placeholder="E-mail" class="form-control" required> <br>
	<input type="password" name="Senha" placeholder="Senha do Site" class="form-control" required ><br> 
	<select class="form-control" name="begold" id="begold" required>
  	<option value="" disabled selected>Anuncio Gold?</option>
  	<option value="0">For Free</option>
  	<option value="1">Gold R$ 19,90</option>
  	<option value="2">Master Gold R$ 29,90</option>
	</select> <br>
	<input class="btn btn-outline-dark my-2 my-sm-0" type="submit" name="btn_cadastrar" value="Cadastrar">
	&emsp; &emsp; &emsp;
	<input class="btn btn-outline-dark my-2 my-sm-0" type="reset" name="btn_limpar" value="Limpar">
</form>
</center>
<?php 

if(isset($_POST['btn_cadastrar'])){

$Nome = $_POST['Nome'];
$Sobrenome = $_POST['Sobrenome'];
$Senha = $_POST['Senha'];
$Celular = $_POST['Celular'];
$Telefone = $_POST['Telefone'];
$Email = $_POST['Email'];
$Gold = $_POST['begold'];
//Conexao com o BD + insert

$dbname = "findyourcar";
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $dbname);

//Insert no Banco 

$sql = "INSERT INTO tb_usuario (nm_usuario, nm_sm_usuario, email_usuario, cel_usuario, tel_usuario, psw_usuario, gold)
VALUES ('$Nome', '$Sobrenome', '$Email', $Celular, $Telefone, '$Senha', $Gold)";

if (mysqli_query($conn, $sql)) {
    echo "<center>"."Cadastro Salvo Com Sucesso"."</center>";
} else {
    echo "Erro ao cadastrar: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
	
	}
 
 ?>

</body>
</html>