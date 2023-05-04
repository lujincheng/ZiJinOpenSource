<?php
require_once '../core/Controller.php';
require_once '../config/config.php';
require_once '../app/functions.php';
require_once '../app/models/DailyReportModel.php';

class DailyReportController extends Controller
{
	private $model;

    public function __construct() {
        $this->model = new DailyReportModel();
    }
	
    /**
	 * Check User Permission to prevent overreach
	 *
	 * @param int $weekly_report_id ID of the weekly report
	 */
	private function check_user_permission($weekly_report_id){
		$weekly_report = $this->model->getWeeklyReportDetailById($weekly_report_id);
		if(isCurrentUser($weekly_report[0]['submitter'])){
			return true;
		}else {
			$_SESSION['alert'] = 'You don\'t have permission!';
			header('Location: '. Domain_Name . 'WeeklyReportDetail/' . $weekly_report_id);
			exit();
		}
	}
	
    /**
	 * Display weekly report detail page
	 *
	 * @param int $weekly_report_id ID of the weekly report
	 */
	public function index($weekly_report_id)
	{
		error_log('DailyReportController::index');
		$weekly_report = $this->model->getWeeklyReportDetailById($weekly_report_id);
		$work_contents = $this->model->getDailyReportListById($weekly_report_id);
		$data = array(
			'weekly_report' => $weekly_report,
			'work_contents' => $work_contents
		);
		$this->render('weekly_report_detail', $data);
	}

	/**
	 * Redirect to the daily report creation page
	 *
	 * @param int $weekly_report_id ID of the weekly report
	 */
	public function redirect_to_create_page($weekly_report_id)
	{
		error_log('WeeklyReportController::redirect_to_create_page');
		if($this->check_user_permission($weekly_report_id)){
			$data = array(
				'weekly_report_id' => $weekly_report_id
			);
			$this->render('daily_report_form', $data);
		}
	}

	/**
	 * Redirect to the daily report modification page
	 *
	 * @param int $daily_report_id ID of the daily report
	 * @param int $weekly_report_id ID of the weekly report
	 */
	public function redirect_to_modify_page($daily_report_id, $weekly_report_id)
	{
		error_log('WeeklyReportController::redirect_to_modify_page');
		if($this->check_user_permission($weekly_report_id)){
			$daily_report = $this->model->getDailyReportDetailById($daily_report_id);
			$data = array(
				'daily_report' => $daily_report,
				'weekly_report_id' => $weekly_report_id
			);
			$this->render('daily_report_form', $data);
		}
	}

	/**
	 * Create a new daily report
	 */
	public function create_daily_report()
	{
		error_log('WeeklyReportController::create_daily_report');
		session_start();
		$date = $_POST['date'];
		$action_type = $_POST['action_type'];
		$content = $_POST['content'];
		$weekly_report_id = $_POST['weekly_report_id'];
		if($this->check_user_permission($weekly_report_id)){
			$result = $this->model->createDailyReport($date, $action_type, $content, $weekly_report_id);
			if ($result) {
				$_SESSION['alert'] = 'Create detail successfully';
				header('Location: '. Domain_Name . 'WeeklyReportDetail/' . $weekly_report_id);
				exit();
			} else {
				$_SESSION['alert'] = 'Failed to create detail';
				header('Location: '. Domain_Name . 'WeeklyReportDetail/' . $weekly_report_id);
				exit();
			}
		}
	}

	/**
	 * Modify a new daily report
	 */
	public function modify_daily_report() {
		error_log('WeeklyReportController::modify_daily_report');
		session_start();
		$date = $_POST['date'];
		$action_type = $_POST['action_type'];
		$content = $_POST['content'];
		$daily_report_id = $_POST['daily_report_id'];
		$weekly_report_id = $_POST['weekly_report_id'];
		if($this->check_user_permission($weekly_report_id)){
			$result = $this->model->updateDailyReport($date, $action_type, $content, $daily_report_id);
			if ($result) {
				$_SESSION['alert'] = 'Modify detail successfully';
				header('Location: '. Domain_Name . 'WeeklyReportDetail/' . $weekly_report_id);
				exit();
			} else {
				$_SESSION['alert'] = 'Failed to modify detail';
				header('Location: '. Domain_Name . 'WeeklyReportDetail/' . $weekly_report_id);
				exit();
			}
		}
    }

	/**
	 * Delete a new daily report By ID
	 *
	 * @param int $daily_report_id ID of the daily report
	 * @param int $weekly_report_id ID of the weekly report
	 */
	public function delete_daily_report($daily_report_id, $weekly_report_id) {
		error_log('WeeklyReportController::delete_daily_report');
		if($this->check_user_permission($weekly_report_id)){
			$result = $this->model->deleteDailyReport($daily_report_id);
			if ($result) {
				$_SESSION['alert'] = 'Delete detail successfully';
				header('Location: '. Domain_Name . 'WeeklyReportDetail/' . $weekly_report_id);
				exit();
			} else {
				$_SESSION['alert'] = 'Failed to delete detail';
				header('Location: '. Domain_Name . 'WeeklyReportDetail/' . $weekly_report_id);
				exit();
			}
		}
    }
	
}
