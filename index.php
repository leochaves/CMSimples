<?php
// nome: index.php
// http://...index.php?pagina=minha_pagina

// pega o valor de pagina via método
// index.php?pagina=contato
if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
} else {
    $pagina = 'inicial';
}
switch ($pagina){
    case 'contato':
        $conteudo = array(
            'description' => 'Pagina contatos',
            'keys' => '',
            'conteudo' => 'contato.php',
            'titulo' => 'Contato',
            'file' => true
        );        
        break;
    case 'outraPagina':
        //require 'outraPagina.php';
        break;
    default :        
        require_once "./inc/config.php";
        require_once "./inc/funcoes.php";

        $con = conecta(HOST, USER, PASS, DBNAME);


        $query = "SELECT * FROM pagina
        WHERE link = '$pagina'";

        //echo $query;die;
        //record set
        $rs = mysql_query($query, $con);

        $conteudo = mysql_fetch_array($rs);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" 
              content="<?php echo $conteudo['description'] ?>">
        <title><?php echo $conteudo['titulo'] ?></title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span2">
                    <?php
                    require_once './inc/menu.php';
                    ?>
                </div>
                <div class="span10">
                    <h1><?php echo $conteudo['titulo'] ?></h1>       
                    <?php
                    
                    if(isset($conteudo['file'])){
                        require $conteudo['conteudo'];
                    } else {
                        echo $conteudo['conteudo'];
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
