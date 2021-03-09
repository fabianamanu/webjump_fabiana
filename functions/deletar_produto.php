
<?php

session_start();
include_once("functions.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$resultado="DELETE FROM `produtos` WHERE id = $id LIMIT 1";
mysqli_query($conexao,$resultado);
header("Location: ../products.php");
?>