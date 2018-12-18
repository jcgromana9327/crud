<?php  

// class DatabaseConnection
// {
// 	public $m;
// 	public $col;

// 	public function Connect(){
// 		$this->m = new MongoClient();
// 		$this->db = $this->m->items;
// 		$this->col = $this->db->data;

// 		return $this->col;
// 	}
// }
// $class = new DatabaseConnection;
// $data = $class->Connect();
// echo $data;

$connection = new MongoClient();
$db = $connection->items;

?>