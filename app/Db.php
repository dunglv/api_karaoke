<?php
// namespace admin\Db;

class Db
{
	protected $host; 
	protected $user; 
	protected $password; 
	protected $db;
	public $connect;
	function __construct($host, $user, $password, $db)
	{
		$this->host = $host;
		$this->user = $user;
		$this->password = $password;
		$this->db = $db;

		$sql = new mysqli($host, $user, $password);
		if (!$sql->connect_error) {
			return "Error: Not connect server.";
		}
		$this->connect = mysqli_connect($host, $user, $password, $db);
		var_dump($this->connect);
		// return $this->connect;
	}

	public static function save_song($value='')
	{
		# code...
	}

}