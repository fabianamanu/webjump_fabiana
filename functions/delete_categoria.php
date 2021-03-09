
<?php

session_start();
include_once("functions.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$resultado="DELETE FROM `categoria` WHERE id = $id LIMIT 1";
mysqli_query($conexao,$resultado);
header("Location: ../categories.php");
?>