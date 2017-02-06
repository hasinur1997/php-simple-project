<?php 

class User
{
	protected $db;
	protected $table = 'users';
	private $data;
	private $session_name = 'hjkkdklahsdklhshdgkg';
	

	public function __construct()
	{
		$this->db = DB::getInstance();

		
	}


	public function create($fields)
	{
		return $this->db->insert($this->table, $fields);
	}

	public function login($username, $password){
		
		$user = $this->find($username);

		if($user)
		{
			if($this->data()->password === md5($password))
			{
				Session::put($this->session_name, $this->data()->id);
				return true;
			}
		}else{
			$this->find($user);
		}
		return false;
	}

	public function find($name)
	{
		$field = (filter_var($name, FILTER_VALIDATE_EMAIL)) ? 'email' : 'username';
		
		$data = $this->db->get($this->table,[$field, '=', $name]);
		
		if($data->count())
		{	
			$this->data = $data->first() ;
			return true;
		}
		return false;
	}

	public function user()
	{
		return $this->db->get($this->table, ['id', '=', Session::get($this->session_name)])->first();
	}

	public function data()
	{
		return $this->data;
	}

	public function loggedin()
	{
		return Session::exists($this->session_name);
	}

	public function logout()
	{
		Session::delete($this->session_name);
	}


	public function upload($name){
		@$ext = explode('.', $_FILES[$name]['name']);
		$ext = strtolower(end($ext));
		$image_name = md5(uniqid()).'.'.$ext;
		if(@move_uploaded_file($_FILES[$name]['tmp_name'], 'uploads/'.$image_name)){
			return [
				'name' =>  $image_name, 
				'action' => true
				];
		}

		return ['action' => false];
	}


	
}


