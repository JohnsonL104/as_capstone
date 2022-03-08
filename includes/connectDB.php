<?php 

class connectDB
{
	private $connection;
	public function connect()
	{
		$config = parse_ini_file('dbconfig.ini', true);
		defined("DB_HOST") ? null : define("DB_HOST", $config['servername']);
		defined("DB_USER") ? null : define("DB_USER", $config['username']);
		defined("DB_PASS") ? null : define("DB_PASS", $config['password']);
		defined("DB_NAME") ? null : define("DB_NAME", $config['dbname']);

		$this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		if(!$this->connection)
		{
			die("Error connection.");
		}
	}
	public function check_connection()
	{
		return $this->connection;
	}
	public function disconnect()
	{
		return mysqli_close($this->connection);
	}
	public function query($sql)
	{
		return mysqli_query($this->connection, $sql);
	}
	public function last_id()
	{
		mysqli_insert_id($this->connection);
	}
	public function prepare_last_id()
	{
		mysqli_stmt_insert_id($this->connection);
	}
	public function confirm($result)
	{
		if(!$result) 
		{
			die("Query Failed. Please contact the admin. Error: " . mysqli_error($this->connection));
		}
	}
	public function escape($string)
	{
		return mysqli_real_escape_string($this->connection, $string);
	}
	public function db_error()
	{
		mysqli_error($this->connection);
	}
	public function prepare($sql)
	{
		return mysqli_prepare($this->connection, $sql);
	}
	public function affected_rows()
	{
		return mysqli_affected_rows($this->connection);
	}
}
?>
<?php

$ini = parse_ini_file( __DIR__ . '/dbconfig.ini');
$db = new PDO (  "mysql:host=" . $ini['servername'] . 
                ";port=" . $ini['port'] . 
                ";dbname=" . $ini['dbname'], 
                $ini['username'], 
                $ini['password']
            );


$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>