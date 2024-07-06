<?php

namespace app\Models;

require_once 'config\database.php';

class Database // si klase atbild par pieslegumu datu bazei
{
	private \mysqli $connection;

	public function __construct()
	{
		// kad klases objekt ir izveidots, tad piesledzamies datubazei ar parametremiem no config/database.php
		$this->connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
	}

	protected function connection(): \mysqli
	{
		return $this->connection;
	}

}