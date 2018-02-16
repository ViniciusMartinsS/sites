<!DOCTYPE html>
<html>
<head>
	<title>Find Your Car - Home</title>
</head>
<body background="http://www.casadopapeldeparede.com.br/wp-content/uploads/2013/04/989-26959.jpg" bgproperties = "fixed">
<?php include("Header.php"); ?>
<br>
<center>

<style>
    .mySlides {display:none;}
</style>

<div class="w3-content w3-section" style="max-width:500px">
	<img class="mySlides" src="Find.jpg" >
    <img class="mySlides" src="http://comprecomproprietario.com/img/contato.png" style="width:97% ">
    <img class="mySlides" src="https://alemdaautoescola.files.wordpress.com/2015/04/marcas_de_carros.png?w=850&h=450&crop=1" style="width:97% ">  
</div>

<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {
            myIndex = 1
        }
        x[myIndex - 1].style.display = "block";
        setTimeout(carousel, 3000); // Change image every 2 seconds
    }
</script>
</center>
</body>
</html>