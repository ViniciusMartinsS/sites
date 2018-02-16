<!DOCTYPE html>
<html>
<head>
	<title>Find Your Car - Detalhes Anúncio</title>
</head>
<body background="http://www.casadopapeldeparede.com.br/wp-content/uploads/2013/04/989-26959.jpg" bgproperties = "fixed">
<style>
    .opcao {
    top: 50%;
    position: relative;
    margin-top: -23%;
    left: 1%;
    }
    .opcao2 {
    top: 50%;
    position: relative;
    margin-top: -15%;
    right: -75%;
    }
</style>
<?php include("HeaderLogado.php");

$veiculo_detalhado = $_GET['id'];

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

$sql = "SELECT modelo, marca, cor, ano, km, opcionais, descricao, preco, imagem, vendedor FROM tb_veiculos WHERE  id_veiculo = $veiculo_detalhado";
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
       $vendedor = $row['vendedor'];
    }
} else {
    echo "0 results";
}

//Select do Anunciante

$sql = "SELECT nm_usuario, nm_sm_usuario, email_usuario, cel_usuario, tel_usuario, psw_usuario FROM tb_usuario WHERE  id_usuario = $vendedor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       $nome_user = $row["nm_usuario"];
       $sobrenome_user = $row["nm_sm_usuario"];
       $cel_user = $row["cel_usuario"];
       $tel_user = $row["tel_usuario"];
       $email_user = $row["email_usuario"];
       $senha_user = $row["psw_usuario"];
    }
} else {
    echo "0 results";
}

echo "<br><center><img src=' $img' width='500' height='300'></center>";
echo "<div class='opcao'>";
echo "<h3>Montadora</h3> ";
echo $marca;
echo "<h3>Modelo</h3>";
echo $modelo;
echo "<h3>Cor</h3> ";
echo $cor;
echo "<h3>Ano</h3> ";
echo $ano;
echo "<h3>Km Rodados</h3> ";
echo $km;
echo "<h3>Opcionais </h3> ";
echo $opcionais;
echo "<h3>Descrição</h3> ";
echo $descricao;
echo "&emsp;<h2>Preço</h2>";
echo "R$ ".$preco.",00";
echo "</div>";

echo "<div class='opcao2'>";
echo "<H3>Anunciante</H3> ".$nome_user." ".$sobrenome_user."<br>";
echo "<h3>Contato</h3> ". $cel_user." / ". $tel_user."<br>";
echo "<h3>E-mail</h3> ".$email_user."<br>";
echo "</div>";
?>

</center>
</body>
</html>