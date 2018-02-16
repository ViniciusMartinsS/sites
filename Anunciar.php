<!DOCTYPE html>
<html>
<head>
	<title>Find Your Car - Anunciar Veículo</title>
</head>
<body background="http://www.casadopapeldeparede.com.br/wp-content/uploads/2013/04/989-26959.jpg" bgproperties = "fixed">
<?php include("HeaderLogado.php");?>
<center>
<h2>Anuncie Seu Veículo!</h2>
<form method="POST" enctype="multipart/form-data" action="anunciar.php">
<div class="col-sm-3 my-1">
<select class="form-control" name="Marca" id="Marca">
  <option value="" disabled selected>Selecione a Marca</option>
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
<input class="form-control" type="text" name="Modelo" placeholder="Modelo do Veículo">
</div>
<div class="col-sm-3 my-1"> 
<input class="form-control"  type="text" name="Cor" placeholder="Cor do Veículo">
</div>
<input class="col-sm-1 my-1" type="number" name="Ano" placeholder="Ano"> &emsp; &emsp; &emsp; &nbsp; &nbsp;
<input  class="col-sm-1 my-1" type="number" name="Km" placeholder="Km">
<div class="col-sm-3 my-1">
<textarea class="form-control" rows="4" cols="43" placeholder="Insira os Opcionais de Seu Veículo" name="Opcionais" ></textarea>
</div>
<div class="col-sm-3 my-1">
<textarea class="form-control" rows="4" cols="43" placeholder="Insira a Descrição de Seu Veículo" name="Descricao" ></textarea>
</div>
<div class="col-sm-3 my-1"> 
<input class="form-control"  type="number" name="Valor" placeholder="Preço do Veículo">
</div>
<div class="col-sm-3 my-1"> 
<input type="file" name="img" class="form-control" >
</div>
<input class="btn btn-outline-dark my-2 my-sm-0" type="submit" name="btn_anunciar" value="Anunciar">
	&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &nbsp; &nbsp;
<input class="btn btn-outline-dark my-2 my-sm-0" type="reset" name="btn_limpar" value="Limpar">
</form>

<?php 
$vendedor = $_SESSION['id'];
$gold = $_SESSION['gold'];

if (isset($_POST['btn_anunciar'])) {
$Marca = $_POST['Marca'];
$Modelo = $_POST['Modelo'];
$Cor = $_POST['Cor'];
$Ano = $_POST['Ano'];
$Km = $_POST['Km'];
$Opcionais = $_POST['Opcionais'];
$Descricao = $_POST['Descricao'];
$Valor = $_POST['Valor'];
//Recebendo imagem colocada pelo usuario
if(isset($_FILES['img'])){
$extensao = strtolower(substr($_FILES['img']['name'], -4));
$novo_nome = md5(time()).$extensao;
move_uploaded_file($_FILES['img']['tmp_name'], $novo_nome);
}

//Conexao com o BD + insert

$dbname = "findyourcar";
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $dbname);

//Insert no Banco 

$sql = "INSERT INTO tb_veiculos (modelo, marca, cor, ano, km, opcionais, descricao, preco, vendedor, imagem, goldv)
VALUES ('$Modelo', '$Marca', '$Cor', $Ano, $Km, '$Opcionais', '$Descricao', $Valor, '$vendedor', '$novo_nome', $gold)";

if (mysqli_query($conn, $sql)) {
    echo "<center>"."Veículo Anunciado Com Sucesso"."</center>";
} else {
    echo "Erro ao Anunciar: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
	
	}

 ?>

</body>
</html>