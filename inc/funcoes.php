<?php
require_once "config.php";
/*CMSimples/inc/funcoes.php
 * Arquivo com as funções úteis do projeto
 */
/**
 * Função que conecta e retorna o resource de conexão
 * @param String $host Endereço do banco
 * @param String $user Usuário do banco
 * @param String $pass Senha do banco
 * @param String $dbname Nome do banco
 * @return Resource Link de conexão 
 */
function conecta($host,$user,$pass,$dbname){
    $con = mysql_connect($host, $user, $pass) 
            OR die('Erro ao conectar'); // conecta
    mysql_select_db($dbname, $con) 
            OR die('Erro selecionar db'); // seleciona banco
    return $con;
}
/**
 * Função que executa uma query e retorna os registros
 * em forma de array
 * @param String Consulta a ser executada
 * @param Resource Link de conexão
 * @return Array Registros retornados
 */        
?>