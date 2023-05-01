<?php
require_once '../core/Controller.php';
require_once '../config/config.php';
require_once '../app/functions.php';
require_once '../app/models/UserModel.php';

class LoginController extends Controller {
	
	// Avoid inheriting the parent class's constructor
	public function __construct()
    {
		
    }

	// Renders the login view
	public function index() {
		require_once '../app/views/includes/common.php';
		$this->render('login');
    }
	
	// Handles user login request
	public function login_in() {
		$userModel = new UserModel();

        $username = $_POST['username'];
        $password = $_POST['password'];
		
        $db_pwd = $userModel->getUserPassword($username);
		$role = $userModel->getUserRole($username);

		session_start();
        if ($db_pwd) {
            if (check_password($password, $db_pwd)) {
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;
                header('Location: '. Domain_Name );
                exit();
            } else {
				$_SESSION['alert'] = 'Incorrect password';
                header('Location: '. Domain_Name .'ToLogin');
                exit();
            }
        } else {
			$_SESSION['alert'] = 'User does not exist';
            header('Location: '. Domain_Name .'ToLogin');
            exit();
        }
    }
	
	// Handles user logout request
	public function login_out() {
		session_start(); 
		session_destroy();
		header('Location: '. Domain_Name .'ToLogin');
        exit();
	}
	
}
?>
