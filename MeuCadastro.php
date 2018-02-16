<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body background="http://www.casadopapeldeparede.com.br/wp-content/uploads/2013/04/989-26959.jpg" bgproperties = "fixed">
<?php include("HeaderLogado.php"); ?>

<br>
<center>
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

$sql = "SELECT nm_usuario, nm_sm_usuario, email_usuario, cel_usuario, tel_usuario, psw_usuario, gold FROM tb_usuario WHERE  id_usuario = $index_user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       $nome_user = $row["nm_usuario"];
       $sobrenome_user = $row["nm_sm_usuario"];
       $cel_user = $row["cel_usuario"];
       $tel_user = $row["tel_usuario"];
       $email_user = $row["email_usuario"];
       $senha_user = $row["psw_usuario"];
       $Gold = $row['gold'];

    }
} else {
    echo "0 results";
}

if($Gold == 0){
	$status = "For Free";
}elseif($Gold == 1){
	$status = "Gold R$ 19,90";
}elseif($Gold == 2){
$status = "Gold R$ 19,90";
}
 ?>

<?php 
//Verificando se o usuário possui carros publicados ou não
$sql = "SELECT id_veiculo FROM tb_veiculos WHERE  vendedor = $index_user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       $temcarro = $row["id_veiculo"];
    }
} else {
    $temcarro = 0;
}
 ?>

<form class="col-sm-3 my-1"  method="POST">
	<input type="text" name="Nome" placeholder="Nome" class="form-control" value=<?php echo $nome_user;  ?> > <br>
	<input type="text" name="Sobrenome" placeholder="Sobrenome" class="form-control" value=<?php echo $sobrenome_user;  ?> > <br> 
	<input type="number" name="Celular" placeholder="Celular" class="form-control" value=<?php echo $cel_user;  ?> > <br>
	<input type="number" name="Telefone" placeholder="Telefone" class="form-control" value=<?php echo $tel_user;  ?> > <br> 
	<input type="email" name="Email" placeholder="E-mail" class="form-control" value=<?php echo $email_user;  ?>> <br>
	<input type="password" name="Senha" placeholder="Senha do Site" class="form-control" value=<?php echo $senha_user;  ?> ><br> 
	<select class="form-control" name="begold" id="begold" required>
  	<option value="0" disabled selected><?php echo $status; ?> </option>
  	<option value="0">For Free</option>
  	<option value="1">Gold R$ 19,90</option>
  	<option value="2">Master Gold R$ 29,90</option>
	</select> <br>
	<input class="btn btn-outline-dark my-2 my-sm-0" type="submit" name="btn_alterar" value="Alterar">
	&emsp; &emsp; &emsp;
	<input class="btn btn-outline-dark my-2 my-sm-0" type="reset" name="btn_limpar" value="Limpar"> <br><br>
	<input class="btn btn-outline-dark my-2 my-sm-0" type="submit" name="btn_deletar" value="Excluir Conta">
</form>
</center>
<?php 
if(isset($_POST['btn_alterar'])){
	$new_nome = $_POST['Nome'];
	$new_sobre = $_POST['Sobrenome'];
	$new_cel = $_POST['Celular'];
	$new_tel = $_POST['Telefone'];
	$new_email = $_POST['Email'];
	$new_senha = $_POST['Senha'];
	$new_gold =  $_POST['begold'];

	if($temcarro > 0){
	$sql = "UPDATE tb_usuario, tb_veiculos SET nm_usuario ='$new_nome', nm_sm_usuario = '$new_sobre', email_usuario = '$new_email', cel_usuario = $new_cel, tel_usuario = $new_tel, psw_usuario = '$new_senha', gold = $new_gold, goldv = $new_gold  WHERE id_usuario = $index_user AND vendedor = $index_user";
	}else{
		$sql = "UPDATE tb_usuario SET nm_usuario ='$new_nome', nm_sm_usuario = '$new_sobre', email_usuario = '$new_email', cel_usuario = $new_cel, tel_usuario = $new_tel, psw_usuario = '$new_senha', gold = $new_gold WHERE id_usuario = $index_user";
	}

	if ($conn->query($sql) === TRUE) {
	header('Refresh:3');
    echo "<center>Alterado Com Sucesso!</center>";
	} else {
    echo "Erro ao alterar: " . $conn->error;
	}

	$conn->close();
	}

if(isset($_POST['btn_deletar'])){
	if($temcarro > 0){
	$sql = "DELETE FROM tb_usuario, tb_veiculos USING tb_usuario, tb_veiculos WHERE id_usuario=$index_user AND vendedor=$index_user ";
	}else{
		$sql = "DELETE FROM tb_usuario WHERE id_usuario=$index_user";
	}
	
	if ($conn->query($sql) === TRUE) {
    echo "Conta Deletada Com Sucesso!";
    header('Location: Home.php');
	} else {
    echo "Erro ao deletar: " . $conn->error;
	}
	$conn->close();
}
 ?>
</body>
</html>