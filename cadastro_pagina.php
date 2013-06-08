<?php
session_start();

if(!isset($_SESSION['logado'])){
    header('location:login.php');die;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Cadastro</title>
 <link href="bootstrap/css/bootstrap.css" rel="stylesheet">  
 <script src="inc/ckeditor/ckeditor.js"></script>

    </head>
    <body>
<?php require "inc/menuAdm.php"; ?>  
    
<form action="" method="post">
    
<fieldset>
<legend>Cadastro de Página</legend>
<label>Título</label>
<input name="titulo" type="text" placeholder="Digite algo...">

<label>Link</label>
<input name="link" type="text" placeholder="Digite algo...">

<label>Description</label>
<input name="description" type="text" placeholder="Digite algo...">

<label>keys</label>
<input name="keys" type="text" placeholder="Digite algo...">

<label>Conteúdo</label>
<textarea class="ckeditor" cols="300" rows="10" name="conteudo" placeholder="Digite algo...">
</textarea>
<br />
<button type="submit" class="btn btn-success btn-large">Enviar</button>
</fieldset>
</form>
        <hr>
        
<?php        
//var_dump($_POST);
if(count($_POST) == 5){
//echo $query;die();
require_once "./inc/config.php";
require_once "./inc/funcoes.php";
$con = conecta(HOST, USER, PASS, DBNAME);

$titulo = mysql_real_escape_string($_POST['titulo']);
$link = mysql_real_escape_string($_POST['link']);
$coteudo = mysql_real_escape_string($_POST['conteudo']);
$description = mysql_real_escape_string($_POST['description']);
$keys = mysql_real_escape_string($_POST['keys']);

$query = "INSERT INTO pagina 
(titulo, conteudo, link , description, `keys`) 

VALUES (
    '$titulo',
    '$coteudo', 
    '$link', 
    '$description', 
    '$keys')";   


// roda comando sql 
if(mysql_query($query,$con)){
?>
        <span class="label-success">Só sucesso</span>
<?php

} else {
    echo mysql_error($con);
}

// fecha a conexão
mysql_close($con);





}
?>
        
    </body>
</html>
