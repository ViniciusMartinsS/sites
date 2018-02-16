<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href='Logado.php'>
    <img src="http://www.freeiconspng.com/uploads/car-silhouet-png-10.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Find Your Car
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="AnuncioLog.php">Anúncios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="GoldLog.php" style="color: #d4af37">Anúncios Gold</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Anunciar.php">Anunciar Veículo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Gerenciador.php">Gerenciar Anúncios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="MeuCadastro.php">Meu Cadastro</a>
      </li>
    </ul>
    <?php 
      session_start();
     ?>
        <?php echo "<font color = 'white'>Bem-Vindo ".$_SESSION['nome']."</font>&emsp;"; ?>
    <form class="form-inline my-2 my-lg-0" action="Home.php" method="POST">
      <input class="btn btn-outline-light my-2 my-sm-0" type="submit" value="Sair" name="btn_sair">
    </form>
  </div>
</nav>
<?php 
if(isset($_POST['btn_sair'])){
  unset($_SESSION['nome']);
  unset($_SESSION['sobrenome']);
  unset($_SESSION['senha']);
  unset($_SESSION['id']);
  unset($_SESSION['email']);
  unset($_SESSION['gold']);
  session_destroy();
  }
 ?>
</body>
</html>