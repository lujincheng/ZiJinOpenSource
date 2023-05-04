<?php
// First, load all necessary classes and libraries
require_once '../core/Router.php';

// Instantiate the router
$router = new Router();

// Add routing rules
$router->addRoute('/', 'HomeController', 'index');
$router->addRoute('/ToLogin', 'LoginController', 'index');
$router->addRoute('/ToRegister', 'RegisterController', 'index');
$router->addRoute('/Login', 'LoginController', 'login_in');
$router->addRoute('/LoginOut', 'LoginController', 'login_out');
$router->addRoute('/Register', 'RegisterController', 'register');
$router->addRoute('/WeeklyReportList', 'WeeklyReportController', 'index');
$router->addRoute('/CreateWeeklyReport', 'WeeklyReportController', 'create_weekly_report');
$router->addRoute('/WeeklyReportDetail', 'DailyReportController', 'index');
$router->addRoute('/AddWeeklyReportDetail', 'DailyReportController', 'redirect_to_create_page');
$router->addRoute('/ModifyWeeklyReportDetail', 'DailyReportController', 'redirect_to_modify_page');
$router->addRoute('/CreateDailyReportDetail', 'DailyReportController', 'create_daily_report');
$router->addRoute('/ModifyDailyReportDetail', 'DailyReportController', 'modify_daily_report');
$router->addRoute('/DeleteDailyReportDetail', 'DailyReportController', 'delete_daily_report');

// Parse the current URL and dispatch the request
$router->dispatch($_SERVER['REQUEST_URI']);

?>
