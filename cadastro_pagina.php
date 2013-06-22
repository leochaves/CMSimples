<?php
session_start();

/*
 * 1 - se tiver o cookie e o usuario nao estiver logado:
 * gravar na sessao que ele esta logado
 * 2 - se ele não possuir o cookie e nem session logado:
 * redireciona para login. 
 */
if(isset($_COOKIE['logado']) 
        and !isset($_SESSION['logado'])){
    /*
     * Pegar o valor do usuario e senha no cookie
     * e validar no banco se estão corretos. 
     * 
     */
    $valida = json_decode($_COOKIE['logado'],true);
    $usuario = $valida['login'];
    $senha = $valida['senha'];
    var_dump($usuario,$senha);
    // ir no banco ... validar 
    if(true /*se validar*/){
        $_SESSION['logado'] = true;
    }
    
} elseif(!isset($_SESSION['logado'])){
    header('location:login.php');die;    
} 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Cadastro</title>
 <link href="bootstrap/css/bootstrap.css" rel="stylesheet">  
 <script src="inc/ckeditor/config.js"></script>
 <script src="inc/ckeditor/ckeditor.js"></script>
 <style>
     #conteudo{
         padding-left:20px;
         padding-right:20px;         
     }
     h1 {
        font-size: 30.5px;
     }
     .ckeditor{
         width: 500px;
     }
     
     
 </style>
    </head>
    <body>
<?php require "inc/menuAdm.php"; ?>  
<div id="conteudo">
<form action="" method="post">
    
<fieldset>
<legend>Cadastro de Página</legend>
<label class="meuLabel">Título</label>
<input name="titulo" type="text" placeholder="Digite algo...">

<label>Link</label>
<input name="link" type="text" placeholder="Digite algo...">

<label>Description</label>
<input name="description" type="text" placeholder="Digite algo...">

<label>keys</label>
<input name="keys" type="text" placeholder="Digite algo...">

<label>Conteúdo</label>
<textarea class="ckeditor"  cols="300" rows="10" name="conteudo" placeholder="Digite algo...">
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
</div>            
    </body>
</html>
