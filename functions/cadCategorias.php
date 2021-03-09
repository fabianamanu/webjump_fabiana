<?php 
require('functions.php');

$nome 		   = $_POST['nome'];
$cod 		   = $_POST['cod'];


$queryCod = "SELECT * FROM categoria WHERE cod = '".$cod."'";
$queryCodExe = mysqli_query($conexao, $queryCod);
if(mysqli_num_rows($queryCodExe) < 1 ){
	$sql = "INSERT INTO categoria (nome , cod) 
	       VALUES ('".$nome."', '".$cod."')";
    
  
	$ins = mysqli_query($conexao, $sql);
	if($ins){
		$_SESSION['logado']   = 1;
		$_SESSION['codUsu'] = $_POST['cod'];
		$_SESSION['nomeUsu']  = $_POST['nome'];
		$sql = "SELECT id FROM categoria WHERE cod = '".$_POST['cod']."'";
		$resultado = mysqli_query($conexao, $sql);
		$linha = mysqli_fetch_assoc($resultado);
		$x = $linha['id'];
		$_SESSION['id'] = $x;
		

	}
	header("Location: ../categories.php");
	?>
	

<?php
}else{

	$_SESSION['logado']   = 1;
	$_SESSION['codUsu'] = $_POST['cod'];
	$_SESSION['nomeUsu']  = $_POST['nome'];
	$sql = "SELECT id FROM categoria WHERE cod = '".$_POST['cod']."'";
	$resultado = mysqli_query($conexao, $sql);
	$linha = mysqli_fetch_assoc($resultado);
	$x = $linha['id'];
	$_SESSION['id'] = $x;
    header("Location: ../categories.php");
	?>

?>
<script>
    window.location.href = '<?php echo $url; ?>../categories.php';

</script>
<?php } ?>
