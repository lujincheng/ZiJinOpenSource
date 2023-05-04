<?php
require_once '../core/Controller.php';
require_once '../config/config.php';
require_once '../app/functions.php';
require_once '../app/models/UserModel.php';

class RegisterController extends Controller {
	
	// Avoid inheriting the parent class's constructor
	public function __construct()
    {
		
    }

	// Renders the login view
	public function index() {
		error_log("LoginController:index");
		require_once '../app/views/includes/common.php';
		$this->render('register');
	}
	
	// Handles user register request
	public function register() {
		error_log("RegisterController:register");
        $userModel = new UserModel();

        $username = $_POST['username'];
        $password = $_POST['password'];
		$confirm_password = $_POST['confirm_password'];
		
        $userExist = $userModel->identifyUserIsExist($username);
		
		session_start();
        if (!$userExist) {
            if ($password == $confirm_password) {
				$userInsert = $userModel->registerNewUser($username, hash_password($password));
				
				if ($userInsert) {
					$_SESSION['alert'] = 'Register success';
					header('Location: '. Domain_Name .'ToLogin');
					exit();
				} else {
					$_SESSION['alert'] = 'Register failed';
					header('Location: '. Domain_Name .'ToRegister');
					exit();
				}
            } else {
				$_SESSION['alert'] = 'Password does not match';
                header('Location: '. Domain_Name .'ToRegister');
                exit();
            }
        } else {
			$_SESSION['alert'] = 'User already exists';
            header('Location: '. Domain_Name .'ToRegister');
            exit();
        }
    }
	
}
?>
