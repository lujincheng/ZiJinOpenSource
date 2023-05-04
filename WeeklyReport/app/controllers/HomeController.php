<?php
require_once '../core/Controller.php';
require_once '../config/config.php';

class HomeController extends Controller{
	
  public function index() {
	error_log("HomeController"."index()");
	header('Location: /WeeklyReportList');
  }
  
}
?>