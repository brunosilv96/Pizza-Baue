<?php
class BancoDeDados {

	/**
	 * Guarda a conexão com o banco de dados
	 * @var PDO
	 */
	private $conexao;

	/**
	 * Guarda os resultados que vem do
	 * banco de dados
	 * @var PDOStatement
	 */
	private $resultado;

	/**
	 * Retorna um array com os dados pedidos
	 * @return array
	 */
	public function lerResultados(): array {
		return $this->resultado->fetchAll ();
	}

	/**
	 * Executa uma ou mais instruções SQL
	 * @param string $sql
	 * @return bool
	 */
	public function executarSQL(string $sql): bool {
		try {
			$this->conexao->beginTransaction ();
			$this->resultado = $this->conexao->prepare ( $sql );
			$this->resultado->execute ();
			$this->conexao->commit ();
			return true;
		} catch ( Exception $e ) {
			return false;
		}
	}

	/**
	 * Fecha a conexa
	 * @return bool
	 */
	public function fecharConexao(): bool {
		$this->conexao = null;
		return true;
	}

	/**
	 * Abre a conexão
	 * @return bool
	 */
	public function abrirConexao(): bool {
		try {
			$end = "mysql:host=127.0.0.1;dbname=quitanda";

			$conf = array (
					PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
			);

			$this->conexao = new PDO ( $end, "teste", "1234", $conf );
			return true;
		} catch ( Exception $e ) {
			echo "Falha ao conectar com o banco de dados";
			exit ( 0 );
		}
	}
}
?>