<?php

class TbJogo extends DataBase
{
	private $tablename = 'megasena';

	public function save($numero)
	{
		try {

			$query = ("INSERT INTO $this->tablename
						(numero) VALUES(?)");

			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1,$numero,\PDO::PARAM_STR);
			
			$stmt->execute();
			
			return $stmt;
			
		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}

		
	}
		
}
