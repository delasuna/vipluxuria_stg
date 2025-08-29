<?php
/*
	Classe para conexão MySQL com MySQLi
*/

/*********************************************
 * Classes para acesso à camada de dados
 * Atualizado para MySQLi
 * Autor original: Marcelo Rezende
 **************************/

class db {
	var $connect_id;
	var $type;
	var $query_id = [];

	function __construct($database_type="mysql") {
		$this->type = "mysql";
	}

	// executa SQL
	function execute($strSQL) {
		if ($this->connect_id) {
			mysqli_query($this->connect_id, $strSQL);
			return mysqli_insert_id($this->connect_id);
		}
		return false;
	}

	function begin() {
		if ($this->connect_id) mysqli_begin_transaction($this->connect_id);
	}

	function commit() {
		if ($this->connect_id) mysqli_commit($this->connect_id);
	}

	function rollback() {
		if ($this->connect_id) mysqli_rollback($this->connect_id);
	}

	// abre conexão
	function open($database = DB_DATABASE, $host = DB_HOST, $user = DB_USER, $password = DB_PASSWORD) {
		$flags = DB_PERSISTENT ? MYSQLI_CLIENT_FOUND_ROWS : 0;
		$this->connect_id = @mysqli_connect($host, $user, $password, $database);
		if (!$this->connect_id) return false;
		return $this->connect_id;
	}

	// lock table
	function lock($table, $mode="WRITE") {
		$query = new query($this, "LOCK TABLES $table $mode");
		return $query->result;
	}

	// unlock tables
	function unlock() {
		$query = new query($this, "UNLOCK TABLES");
		return $query->result;
	}

	// retorna erro
	function error($string_erro = "") {
		if ($this->connect_id && mysqli_errno($this->connect_id) != 0) {
			if (defined('SIS_EMAIL_RESPONSAVEL')) {
				@mail(
					SIS_EMAIL_RESPONSAVEL,
					"Erro " . date("d-m-Y"),
					mysqli_errno($this->connect_id) . " - " . mysqli_error($this->connect_id) . " - " . $string_erro
				);
			}
		}
		return $this->connect_id ? mysqli_errno($this->connect_id) : 0;
	}

	// fecha conexão
	function close() {
		if (!empty($this->query_id)) {
			foreach ($this->query_id as $result) {
				mysqli_free_result($result);
			}
		}
		if (!$this->connect_id) return false;
		mysqli_close($this->connect_id);
	}

	// adiciona query ao pool
	function addquery($query_id) {
		$this->query_id[] = $query_id;
	}
}

class query {
	var $result;
	var $row;
	var $numrows;
	var $totalpages = 0;

	function __construct(&$db, $query="", $pagina_inicial=0, $tamanho_pagina=0) {
		if ($query && $db->connect_id) {
			$this->result = mysqli_query($db->connect_id, $query);
			$this->numrows = mysqli_num_rows($this->result);

			if ($tamanho_pagina > 0) {
				$this->totalpages = ceil($this->numrows / $tamanho_pagina);
				$offset = max($pagina_inicial - 1, 0) * $tamanho_pagina;
				$query .= " LIMIT $offset, $tamanho_pagina";
				$this->result = mysqli_query($db->connect_id, $query);
			}
			$db->addquery($this->result);
		}
	}

	function totalpages() {
		return $this->totalpages;
	}

	function getrow() {
		if ($this->result) {
			$this->row = mysqli_fetch_assoc($this->result);
		} else {
			$this->row = null;
		}
		return $this->row;
	}

	function field($field) {
		if (!$this->row) return null;
		return stripslashes($this->row[$field] ?? '');
	}


	function fieldname($fieldnum) {
		return mysqli_fetch_field_direct($this->result, $fieldnum)->name ?? null;
	}

	function firstrow() {
		if ($this->result) {
			mysqli_data_seek($this->result, 0);
			$this->getrow();
		}
		return $this->row;
	}

	function free() {
		if ($this->result) {
			return mysqli_free_result($this->result);
		}
		return false;
	}

	function numrows() {
		return $this->numrows ?? 0;
	}
}
?>
