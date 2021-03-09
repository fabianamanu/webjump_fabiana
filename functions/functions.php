<?php
//mudar PDO 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//header('Content-type: text/html; charset=UTF-8');

session_name("Login"); // verifica conceito
session_cache_expire(60);
session_start(); // verifica conceito





$SERVER = "127.0.0.1";
$USER   = "root";
$SENHA  = "";
$BANCO  = "loja";



$conexao = mysqli_connect($SERVER,$USER,$SENHA,$BANCO);
//$banco = mysqli_select_db($conexao,$BANCO);

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');


if (!$conexao) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
echo"erro";
}


$score = isset($_GET['score']) ? $_GET['score'] : 0 ;
$temp = isset($_GET['temp']) ? $_GET['temp'] : '' ;
