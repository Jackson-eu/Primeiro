<?php
/**
 * Created by PhpStorm.
 * User: Jackson
 * Date: 21/03/2016
 * Time: 14:16
 */

// Criando conexão
$con=mysqli_connect("localhost", "root", "");

/*selecionando Banco de Dados, ultilizando a variavel de
conexão no lugar do endereço */
mysqli_select_db($con,"cdzestagiodb");


?>

