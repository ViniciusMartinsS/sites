<!DOCTYPE html>
<html>
<head>
	<title>Find Ur Car - Home</title>
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript">
  function callBackMundancasStatus(response){
    if (response.status === 'connected') {
        $('#logar').hide();
        testAPI();
    }else if(response.status === 'not_authorized'){
      $('#logout').remove();
    }else{
      $('#logout').remove();
    }
  }
  window.fbAsyncInit = function(){
    FB.init({
      appId: '942513835902618',
      cookie: true,
      version: 'v2.1'
    });

    FB.getLoginStatus(function(response){
      callBackMundancasStatus(response);
    });
  };

  (function(d, s, id){
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) {return;}
       js = d.createElement(s); js.id = id;
       js.src = "https://connect.facebook.net/en_US/sdk.js";
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));

  function testAPI(){
     FB.api('/me?fields=id, email,first_name, last_name, name', function(response) {
      var nome = response.first_name;
      var sobrenome = response.last_name;
      var email = response.email; 
      $('#status').append('<center><p><a class="btn btn-outline-dark my-2 my-sm-0" href="teste.php?nome='+nome+'&sobrenome='+sobrenome+'&email='+email+'">Continuar Cadastro</a></p></center>');
      $('#status').append('<center><a class="btn btn-outline-dark my-2 my-sm-0" href="javascript:void(0);" id="logout" onclick="logOut();">Deslogar de '+nome+' </a></center> <br><br><br>');
      console.log(response);
    });
  }  

  function logOut(){
    FB.logout(function(response){
            callBackMundancasStatus(response);
            javascript:window.close();
    });
  }  

  function login(){
    FB.login(function(response){
      callBackMundancasStatus(response);
    });
  }

  </script>
</head>
<body background="http://www.casadopapeldeparede.com.br/wp-content/uploads/2013/04/989-26959.jpg" bgproperties = "fixed">
<?php include("Header.php"); ?>
<div id="status"></div>
<div>
<a  href="javascript:void(0)" onclick="login();"  onclick="javascript:window.close()" id="logar"><img src="face.png" style="margin-left: 0%; margin-top: -10%" width="320" height="150"></a>
<a onclick="javascript:window.close()" href="#"><img src="email.png" style="margin-left: 5%; margin-top: -30%"></a>
</div>

</body>
</html>
