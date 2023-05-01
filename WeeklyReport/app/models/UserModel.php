<?php
require_once '../core/Model.php';
require_once '../core/Database.php';

class UserModel extends Model
{
    private $db;

    public function __construct() {
		$this->db = new Database();
	}
	
   /**
	* Get the password of a user by username.
	* 
	* @param string $username The username of the user to get the password for.
	* @return string|null The password of the user if found, or null if not found.
	*/
	public function getUserPassword($username)
	{
		$table = 'users';
		$target = 'password';
		$data = array(
			'username' => $username
		);
		$result = $this->db->select($table, $target, $data);
		if (!empty($result)) {
			return $result[0][$target];
		}
		return null;
	}

   /**
	* Get the role of a user by username.
	* 
	* @param string $username The username of the user to get the password for.
	* @return string|null The role of the user if found, or null if not found.
	*/
	public function getUserRole($username)
	{
		$table = 'users';
		$target = 'role';
		$data = array(
			'username' => $username
		);
		$result = $this->db->select($table, $target, $data);
		if (!empty($result)) {
			return $result[0][$target];
		}
		return null;
	}
	
   /**
	* Check if a user with the given username exists.
	* 
	* @param string $username The username to check for.
	* @return int|null 1 if the user exists, or null if not found.
	*/
	public function identifyUserIsExist($username)
	{
		$table = 'users';
		$target = 'id';
		$data = array(
			'username' => $username
		);
		$result = $this->db->select($table, $target, $data);
		if (!empty($result)) {
			return 1;
		}
		return null;
	}
	
   /**
	* Register a new user with the given username and password.
	* 
	* @param string $username The username of the new user.
	* @param string $password The password of the new user.
	* @return bool|null True if the registration was successful, or null if it failed.
	*/
	public function registerNewUser($username, $password)
	{
		$table = 'users';
		$data = array(
			'username' => $username,
			'password' => $password
		);
		$result = $this->db->insert($table, $data);
		return $result;
	}

}
