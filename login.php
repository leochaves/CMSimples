<?php 
if(isset($_POST['email'],$_POST['senha'])){
    
    // inclui arquivo de configuração
    require_once "./inc/config.php"; 
    // inclui arquivo com funções
    require_once "./inc/funcoes.php";
    $con = conecta(HOST, USER, PASS, DBNAME);
    
    // usa funcao que escapa as aspas e caracter especiais
    $email = mysql_real_escape_string($_POST['email']);
    $senha = md5($_POST['senha']);// hash (assinatura)
    
    $sql = "select * from usuario 
        where email = '$email' 
            AND senha = '$senha'"; 
    
    // executa o select e armazena o resultado 
    $rLista = mysql_query($sql, $con);
    // conta quantos registro tem no resultado
    $numRows = mysql_num_rows($rLista);
    if($numRows == 1){
        // echo "Só sucesso";
        session_start();
        $_SESSION['logado'] = true;
        
        if(isset($_POST['lembrar'])){
            date_default_timezone_set('America/Sao_Paulo');
            $arr = array('login'=>$email,'senha'=>$senha);
            $str= json_encode($arr); // string

            setcookie('logado', $str, strtotime('+1 year'));
        }
        // redirect
        header('location:cadastro_pagina.php');die;
    } else {
        $msg =  "email e/ou senha estão incorretos";
    }
}
    
?> 
<!DOCTYPE html>
<html>
    <head>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" 
              content="">
        <title>Login</title>
    </head>
    <body>
<form action="login.php" method="POST" class="form-horizontal">
<div class="control-group">
<label class="control-label" for="inputEmail">
    Email
</label>
<div class="controls">
<input name="email" type="email" id="inputEmail" 
       placeholder="Email" >
</div>
</div>
<div class="control-group">
<label class="control-label" for="inputPassword">
    Senha
</label>
<div class="controls">
<input name="senha" type="password" id="inputPassword" 
       placeholder="Senha">
</div>
</div>
<div class="control-group">
<div class="controls">
<label class="checkbox">
<input name="lembrar" value="sim" type="checkbox"> 
Lembre-se de mim
</label>
<button type="submit" class="btn">Entrar</button>
</div>
</div>
</form>       
    <?php
//    if(isset($msg)){
//        echo $msg;
//    } else {
//        echo '';
//    }    
    echo (isset($msg)) ? $msg:''; 
echo (isset($_GET['msg'])) ? $_GET['msg']:''; 
    ?>
    </body>
</html>
        
