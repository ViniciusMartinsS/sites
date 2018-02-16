<!DOCTYPE html>
<html>
<head>
	<title>ConexaoFacebook</title>
</head>
<body background="http://www.casadopapeldeparede.com.br/wp-content/uploads/2013/04/989-26959.jpg" bgproperties = "fixed">
<?php include("Header.php"); ?>
<?php 

$nome_fcbk = $_GET['nome'];
$sobrenome_fcbk = $_GET['sobrenome'];
$email_fcbk = $_GET['email'];

$dbname = "findyourcar";
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $dbname);

//Insert no Banco 

$sql = "INSERT INTO tb_usuario (nm_usuario, nm_sm_usuario, email_usuario, cel_usuario, tel_usuario, psw_usuario, gold)
VALUES ('$nome_fcbk', '$sobrenome_fcbk', '$email_fcbk', 11999999999, 1199999999, 'userfacebook2018', 0)";

if (mysqli_query($conn, $sql)) {
    echo "<center>"."Cadastro Salvo Com Sucesso <br> Seu usuario é: <br>".$email_fcbk."<br> sua senha é: <br>userfacebook2018 <br> Por favor, complete seu cadastro após 1º Login! </center>";
} else {
    echo "Erro ao cadastrar: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
  
 ?>

<center><input type="button" name="finalizar" value="Finalizar" class="btn btn-outline-dark my-2 my-sm-0" onclick="javascript:window.close()"></center>
</body>
</html>