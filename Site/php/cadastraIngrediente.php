<?php 
require_once 'lib/bancoDeDados.php';

session_start();

$categoria = 0;

$usuario = $_SESSION['id_usuario'];

$oCon = new BancoDeDados();

if(!$oCon->abrirConexao()){
	echo "Erro ao abrir conexão com Banco de Dados<br><br>";
}

try{
/*Faz a triagem de categoria de acordo com a seleção do usuário*/
switch ($_POST['boxCategoria']) {
	case 'Massas':
		$categoria = 1;
		break;
	
	case 'Molhos':
		$categoria = 2;
		break;

	case 'Queijos':
		$categoria = 3;
		break;

	case 'Carnes':
		$categoria = 4;
		break;
	
	case 'Complementos':
		$categoria = 5;
		break;

	case 'Finalizações':
		$categoria = 6;
		break;

	default:
		$categoria = "NULL";
		break;
}

/* Nomeia a imagem de acordo com as informáções do arquivo */
$nomeDoArquivo = $_FILES["imgIngrediente"]["name"];

/* Indica o caminho da imagem de acordo com as informaçãoes do arquivo */
$caminhoDoArquivo = $_FILES["imgIngrediente"]["tmp_name"];

/* Detalha o caminho correto onde a imagem irá ser armagenada */
$destino = "../images/ingredientes/$nomeDoArquivo";

/* Faz a ação de mover o arquivo de arcordo com as configurações passadas */
$resultado = move_uploaded_file($caminhoDoArquivo, $destino);

$sql = "INSERT INTO ingrediente(igdnome, igdvalor, igdimagem, igdcategoria) VALUES ('$_POST[txtNome]', '$_POST[txtValor]', '$nomeDoArquivo', '$categoria')";

$oCon->executarSQL($sql);

$oCon->fecharConexao();

header('Location: ../admin_ingrediente.php?Sucesso');

}catch(Exception $e){
	header('Location: ../admin_ingrediente.php?Erro');
}

?>