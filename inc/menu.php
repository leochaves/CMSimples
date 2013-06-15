<ul class="nav nav-list">
<?php
require_once './inc/config.php';
require_once './inc/funcoes.php';

$con = conecta(HOST, USER, PASS, DBNAME);
$consulta = "SELECT * FROM pagina where 1";

$rs = mysql_query($consulta, $con);
// extrai o registro da variável rs(resource) em forma de array

$quantasLinhas = mysql_num_rows($rs);

for ($i = 0; $i < $quantasLinhas; $i++) {
    $registro = mysql_fetch_array($rs);
    
    if($pagina == $registro['link']){
        $class = ' class="active"';
    } else {
        $class = '';
    }
?>
    <li<?php echo $class ?>><a href="index.php?pagina=<?php echo $registro['link']; ?>">
    <?php echo $registro['titulo']; ?>
    </a>
</li>
<?php } ?>
    <li><a href="index.php?pagina=contato">
    Contato
    </a>
</ul>

  