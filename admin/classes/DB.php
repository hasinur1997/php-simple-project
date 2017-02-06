<?php
	class DB{
		private $host = 'localhost';
		private $dbname = 'college';
		private $user = 'root';
		private $password = '';
		
		private static $instance = null;
		private $query;
		private $count = 0;
		private $error = false;
		private $result;
		private $pdo;
		
		private function __construct(){
			try{
				$this->pdo = new PDO("mysql:host={$this->host}; dbname={$this->dbname}", $this->user, $this->password);
				
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		
		public static function getInstance(){
			if(!isset(self::$instance)){
				self::$instance = new DB;
			}
			return self::$instance;
		}
		
		public function query($sql, $params = array()){
			
			$this->error = false;
			
			if($this->query = $this->pdo->prepare($sql)){
				
				$x = 1;
				
				if(count($params)){
					foreach($params as $param){
						$this->query->bindValue($x, $param);
						$x++;
					}
				}
			}
			
			if($this->query->execute()){
				$this->result = $this->query->fetchAll(PDO::FETCH_OBJ);
				$this->count = $this->query->rowCount();
			}else{
				$this->error = true;
			}
			
			
		}

		
		public function insert($table, $fields = array()){
		if(count($fields)){
			$keys = array_keys($fields);
			$values = '';
			$x = 1;

			foreach($fields as $field){
				$values .= '?';
				if($x < count($fields)){
					$values .= ', ';
				}
				$x++;
				}

				$sql = "INSERT INTO {$table}(`".implode('`, `', $keys)."`) VALUES({$values})";
				if(!$this->query($sql, $fields)->error()){
					return true;
				}
			}

			return false;
		}
		
		
		public function update($table, $id, $fields){
			$set = '';
			$x = 1;

			foreach($fields as $name => $value){
				$set .= "{$name} = ?";
				if($x < count($fields)){
					$set .= ',';
				}
				$x++;
			}

			$sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";
			if(!$this->query($sql, $fields)->error()){
				return true;
			}
			return false;
		}



		
		
		public function action($action, $table, $where = array()){
			if(count($where) === 3){
				$operators = array('=', '<', '>', '>=', '<=');
				$field = $where[0];
				$operator = $where[1];
				$value = $where[2];
				
				if(in_array($operator, $operators)){
					$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
					if(!$this->query($sql, array($value))->error()){
						return $this;
					}
				}
			}
			return false;
		}
		
		public function get($table, $where = []){
			return $this->action("SELECT * ",$table, $where);
		}
		
		public function delete($table, $where){
			return $this->action("DELETE", $table, $where);
		}
		
		
		public function error(){
			return $this->error;
		}
		
		
		public function result(){
			return $this->result;
		}
		
		public function count(){
			return $this->count;
		}
		
		public function first()
		{
			return $this->result[0];
		}


		public function fetchAll($table){
			 $this->query("SELECT * FROM {$table} ORDER BY id DESC");
			 return $this;
		}

		public function getStudent($department, $shift){

			return $this->query("SELECT * FROM student WHERE department = ? AND shift = ?", [$department, $shift])->result();
		}

		public function totalRow($table){
			return $this->fetchAll($table)->count();
		}

		public function getLimit($table, $start, $end){

			return $this->query("SELECT * FROM {$table} ORDER BY id DESC LIMIT {$start}, {$end}")->result();
		}
		
}