<?php
require_once('../config/config.php');
require_once ('../app/auth.php');

/**
 * The base Controller class.
 */
class Controller
{
    /**
     * Constructor that checks user permission.
     */
    public function __construct()
    {
        $this->checkPermission();
    }

    /**
     * Check user permission method.
     *
     * @return void
     */
    protected function checkPermission()
    {
        require_once '../app/auth.php';

        // If the user is not logged in, redirect to the login page
        if(!identify_user_login()){
            header('Location: '. Domain_Name .'ToLogin');
            exit();
        }
    }
    
    /**
     * Render view method.
     *
     * @param string $view The view file name.
     * @param array $data The data needed by the view.
     * @return void
     * @throws Exception if the view file doesn't exist.
     */
    protected function render($view, $data = [])
    {
        // Build view file path
        $viewFile = '../app/views/pages/' . $view . '.php';

        // Throw an exception if the view file doesn't exist
        if (!file_exists($viewFile)) {
            throw new Exception("View file '{$view}.php' not found.");
        }

        // Extract data as variables
        extract($data);

        // Start output buffering
        ob_start();

        // Include view file
        require $viewFile;

        // Get and clean output buffer
        $content = ob_get_clean();

        // Output content
        echo $content;
    }
}