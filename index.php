<?php include("conecta/valida.php");	?>
<title>Login</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>function ocultar(){$("#box-login").hide()}</script>
<script>function ocultarsenha(){$("#box-senha").hide()}</script>
<script type="text/javascript">
function erro()
    {
    var div = document.getElementById("textDiv");
    div.textContent = "Usuário ou senha inválidos!";
    var text = div.textContent;
	}
</script>
<link rel="stylesheet" href="css/estilo.css">
<br><br><br><br>

<div id="box-login">
<form method="post" action="" enctype="multipart/form-data">
<br>
<center>
<img src="img/avatar.png"><br><br>
<div id="textDiv"></div><br>
<input type="text" name="usuario" placeholder="Login" required><br>
<input type="submit" name="login" value=" ">
</form>
</div>

<?php include("conecta/login.php"); ?>