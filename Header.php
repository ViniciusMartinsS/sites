<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href='Home.php'>
    <img src="http://www.freeiconspng.com/uploads/car-silhouet-png-10.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Find Your Car
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="Anuncio.php">Anúncios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Gold.php" style="color: #d4af37">Anúncios Gold</a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="cadastro.php" onclick="window.open('option.php', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=150, LEFT=520, WIDTH=310, HEIGHT=481');">Cadastre-se</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="POST">
      <input class="form-control mr-sm-2" type="text" placeholder="Usuário" aria-label="Search" name="usuario">
      <input class="form-control mr-sm-2" type="password" placeholder="Senha" aria-label="Search" name="senha">
      <input class="btn btn-outline-light my-2 my-sm-0" type="submit" value="Entrar" name="btn_entrar">
    </form>
  </div>
</nav>
<?php 
$var = 0;
if(isset($_POST['btn_entrar'])){

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

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

$sql = "SELECT nm_usuario, psw_usuario, email_usuario, nm_sm_usuario, id_usuario, gold  FROM tb_usuario";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	if($usuario == $row["email_usuario"] and $senha == $row["psw_usuario"] ){
    	session_start();
    	$_SESSION['nome'] = $row["nm_usuario"];
    	$_SESSION['sobrenome'] = $row["nm_sm_usuario"];
    	$_SESSION['senha'] = $row["psw_usuario"];
    	$_SESSION['id'] = $row["id_usuario"];
    	$_SESSION['email'] = $row["email_usuario"];
      $_SESSION['gold'] = $row["gold"];

        header('Location: Logado.php');
    	}else{
        $var = 1;
      }
    }
} else {
    echo "error";
}
$conn->close();
}

if($var == 1){
  echo "<script>alert('Usuário ou Senha incorreto!')</script>";
}

 ?>
</body>
</html>