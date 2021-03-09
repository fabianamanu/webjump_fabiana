<?php 
require('functions.php');

$sku		   = $_POST['sku'];
$nome		   = $_POST['nome'];
$preco         = $_POST['preco'];
$quantidade        = $_POST['quantidade'];
$categoria       = $_POST['categoria'];
$descricao        = $_POST['descricao'];


$queryEmail = "SELECT * FROM produtos WHERE sku = '".$sku."'";
$queryEmailExe = mysqli_query($conexao, $queryEmail);
if(mysqli_num_rows($queryEmailExe) < 1 ){
	$sql = "INSERT INTO produtos (sku, nome,preco,quantidade,categoria,descricao) 
	       VALUES ('".$sku."', '".$nome."','".$preco."','".$quantidade."','".$categoria."','".$descricao."')";
    
  
	$ins = mysqli_query($conexao, $sql);
	if($ins){
		$_SESSION['logado']   = 1;
		$_SESSION['codUsu'] = $_POST['sku'];
		$_SESSION['nomeUsu']  = $_POST['nome'];
		$sql = "SELECT id FROM produtos WHERE sku = '".$_POST['sku']."'";
		$resultado = mysqli_query($conexao, $sql);
		$linha = mysqli_fetch_assoc($resultado);
		$x = $linha['id'];
		$_SESSION['id'] = $x;

	}
	header("Location: ../products.php");
	?>

<?php
}else{

	$_SESSION['logado']   = 1;
	$_SESSION['codUsu'] = $_POST['sku'];
	$_SESSION['nomeUsu']  = $_POST['nome'];
	$sql = "SELECT id FROM categoria WHERE cod = '".$_POST['cod']."'";
	$resultado = mysqli_query($conexao, $sql);
	$linha = mysqli_fetch_assoc($resultado);
	$x = $linha['id'];
	$_SESSION['id'] = $x;

	?>
<script>
    header("Location: ../products.php");

</script>
?>
<?php } ?>
