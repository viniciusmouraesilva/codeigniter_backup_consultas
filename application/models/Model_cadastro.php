<?php
defined('BASEPATH') OR exit('Não foi possível carregar o script base.');

class Model_cadastro extends CI_Model {

	function Save($dados) 
	{
		$this->db->insert('usuario',$dados);

		$registro = $this->db->last_query();

		if($this->db->count_all_results() == 1) {
			$this->backupUsuarios($registro);
			return true;
		}else {
			return false;
		}

	}

	private function backupUsuarios($consulta) 
	{
		$arquivo = fopen("consultas/registro.txt","a+");
		fwrite($arquivo,PHP_EOL. "{$consulta}");
		fclose($arquivo);
	}

}