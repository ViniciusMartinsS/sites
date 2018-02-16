<!DOCTYPE html>
<html>
<head>
	<title>Find Your Car - Gerenciar Veículos</title>
</head>
<body background="http://www.casadopapeldeparede.com.br/wp-content/uploads/2013/04/989-26959.jpg" bgproperties = "fixed">
<center>
<?php include("HeaderLogado.php");
$veiculo_escolhido = $_GET['escolha'];

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

$sql = "SELECT modelo, marca, cor, ano, km, opcionais, descricao, preco, imagem FROM tb_veiculos WHERE  id_veiculo = $veiculo_escolhido";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       $modelo = $row["modelo"];
       $marca = $row["marca"];
       $cor = $row["cor"];
       $ano = $row["ano"];
       $km = $row["km"];
       $opcionais = $row["opcionais"];
       $descricao = $row["descricao"];
       $preco = $row["preco"];
       $img = $row["imagem"];
    }
} else {
    echo "0 results";
}

?>

<h2>Gerencie seu Veículo </h2>
<form method="POST" enctype="multipart/form-data">
<div class="col-sm-3 my-1">
<select class="form-control" name="Marca" id="Marca">
  <option value="<?php echo $marca;?>" selected ><?php echo $marca;?></option>
  <option value="Chevrolet">Chevrolet</option>
  <option value="Citroen">Citroen</option>
  <option value="Fiat">Fiat</option>
  <option value="Ford">Ford</option>
  <option value="Honda">Honda</option>
  <option value="Hyundai">Hyundai</option>
  <option value="Mitsubishi">Mitsubishi</option>
  <option value="Nissan">Nissan</option>
  <option value="Peugeot">Peugeot</option>
  <option value="Renault">Renault</option>
  <option value="Toyota">Toyota</option>
  <option value="Volkswagen">Volkswagen</option>
</select> 
</div>
<div class="col-sm-3 my-1">
<input class="form-control" type="text" name="Modelo" placeholder="Modelo do Veículo" value="<?php echo $modelo; ?>">
</div>
<div class="col-sm-3 my-1"> 
<input class="form-control"  type="text" name="Cor" placeholder="Cor do Veículo" value="<?php echo $cor; ?>">
</div>
<input class="col-sm-1 my-1" type="number" name="Ano" placeholder="Ano" value="<?php echo $ano; ?>"> &emsp; &emsp; &emsp; &nbsp; &nbsp;
<input  class="col-sm-1 my-1" type="number" name="Km" placeholder="Km" value="<?php echo $km; ?>" >
<div class="col-sm-3 my-1">
<textarea class="form-control" rows="4" cols="43" placeholder="Insira os Opcionais de Seu Veículo" name="Opcionais"><?php echo $opcionais; ?></textarea>
</div>
<div class="col-sm-3 my-1">
<textarea class="form-control" rows="4" cols="43" placeholder="Insira a Descrição de Seu Veículo" name="Descricao"><?php echo $descricao;?></textarea>
</div>
<div class="col-sm-3 my-1"> 
<input class="form-control"  type="number" name="Valor" placeholder="Preço do Veículo" value="<?php echo $preco; ?>">
</div>
<div class="col-sm-3 my-1"> 
<img src="<?php echo $img; ?>" width='300' height='200'>
</div>
<div class="col-sm-3 my-1"> 
<input type="file" name="new_img" class="form-control" value="<?php echo $img; ?>">
</div>
<input class="btn btn-outline-dark my-2 my-sm-0" type="submit" name="btn_alterar" value="Alterar">
<input class="btn btn-outline-dark my-2 my-sm-0" type="submit" name="btn_deletar" value="Deletar Anuncio">
<input class="btn btn-outline-dark my-2 my-sm-0" type="reset" name="btn_limpar" value="Limpar">
</form>
</center>
<?php 

if(isset($_POST['btn_alterar'])){
	$new_modelo = $_POST['Modelo'];
	$new_marca = $_POST['Marca'];
	$new_cor = $_POST['Cor'];
	$new_ano = $_POST['Ano'];
	$new_km = $_POST['Km'];
	$new_opcionais = $_POST['Opcionais'];
	$new_descricao = $_POST['Descricao'];
	$new_preco = $_POST['Valor'];

	//Recebendo imagem colocada pelo usuario
	if(isset($_FILES['new_img'])){
	$extensao = strtolower(substr($_FILES['new_img']['name'], -4));
	$new_name = md5(time()).$extensao;
	move_uploaded_file($_FILES['new_img']['tmp_name'], $new_name);
	}
	
	$sql = "UPDATE tb_veiculos SET modelo ='$new_modelo', marca = '$new_marca', cor = '$new_cor', ano = $new_ano, km = $new_km, opcionais = '$new_opcionais', descricao = '$new_descricao', preco = '$new_preco', imagem = '$new_name' WHERE id_veiculo = $veiculo_escolhido";

	if ($conn->query($sql) === TRUE) {
	echo "<script language= 'JavaScript'>location.href='Gerenciador.php';</script>";
    echo "Alterado Com Sucesso!";
	} else {
    echo "Erro ao alterar: " . $conn->error;
	}

	$conn->close();
	
	}

if(isset($_POST['btn_deletar'])){

	$sql = "DELETE FROM tb_veiculos WHERE id_veiculo=$veiculo_escolhido";

	if ($conn->query($sql) === TRUE) {
    echo "Veículo Deletado Com Sucesso!";
    echo "<script language= 'JavaScript'>location.href='Gerenciador.php';</script>";
	} else {
    echo "Erro ao deletar: " . $conn->error;
	}
	$conn->close();
}

 ?>
</body>
</html>