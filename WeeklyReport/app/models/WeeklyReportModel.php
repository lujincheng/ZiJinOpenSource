<?php
require_once '../core/Model.php';
require_once '../core/Database.php';

class WeeklyReportModel extends Model {
    
    private $db;

    public function __construct() {
        $this->db = new Database();
    }
	
   /**
	* Get a list of all weekly reports.
	*
	* @return array An array of weekly reports.
	*/
	public function getWeeklyReports()
	{
		$table = 'weekly_report';
		return $this->db->select($table);
	}

   /**
	* Check if a weekly report has already been created by the current user for the given start date.
	*
	* @param string $current_user The current user.
	*　@param string $startDate The start date of the weekly report.
	* @return bool True if a weekly report has already been created by the current user for the given start date, false otherwise.
	*/
	public function isWeeklyReportCreated($current_user, $startDate) {
		$table = 'weekly_report';
		$target = 'count(*) as count';
		$data = array(
			'start_date' => $startDate,
			'submitter' => $current_user,
		);
		$order_by = 'end_date DESC';
		$result = $this->db->select($table, $target, $data, $order_by);
		return $result[0]['count'] > 0;
	}

   /**
	* Create a new weekly report with the given start and end dates, submit date and current user.
	* 
	* @param string $startDate The start date of the weekly report.
	* @param string $endDate The end date of the weekly report.
	* @param string $submitDateTime The submit date and time of the weekly report.
	* @param string $current_user The current user.
	* @return bool True if the weekly report is created successfully, false otherwise.
	*/
	public function createWeeklyReport($startDate, $endDate, $submitDateTime, $current_user) {
		$table = 'weekly_report';
		$data = array(
			'start_date' => $startDate,
			'end_date' => $endDate,
			'submit_time' => $submitDateTime,
			'submitter' => $current_user,
		);
		$result = $this->db->insert($table, $data);
		return $result;
	}

}

