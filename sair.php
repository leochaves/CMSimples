<?php
// sair.php
session_start();
session_destroy();
header('location:login.php?msg=Deslogado com sucesso.');
?>