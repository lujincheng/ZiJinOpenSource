<?php
require_once '../core/Model.php';
require_once '../core/Database.php';

class DailyReportModel extends Model {
    
    private $db;

    public function __construct() {
		$this->db = new Database();
	}
	
   /**
	* Get daily report list by weekly report ID.
	*
	* @param int $weekly_report_id The ID of the weekly report to get daily reports for.
	* @return array|null The daily report list if found, or null if not found.
	*/
	public function getDailyReportListById($weekly_report_id){
		$table = 'work_content';
		$target = '*';
		$data = array(
			'weekly_report_id' => $weekly_report_id
		);
		$order_by = 'date ASC';
		$result = $this->db->select($table, $target, $data);
		if (!empty($result)) {
			return $result;
		}
		return null;
	}
	
   /**
	* Get weekly report detail by ID.
	*
	* @param int $weekly_report_id The ID of the weekly report to get the detail of.
	* @return array|null The weekly report detail if found, or null if not found.
	*/
	public function getWeeklyReportDetailById($weekly_report_id){
		$table = 'weekly_report';
		$target = '*';
		$data = array(
			'id' => $weekly_report_id
		);
		$result = $this->db->select($table, $target, $data);
		if (!empty($result)) {
			return $result;
		}
		return null;
	}
	
   /**
	* Get daily report detail by ID.
	*
	* @param int $daily_report_id The ID of the daily report to get the detail of.
	* @return array|null The daily report detail if found, or null if not found.
	*/
	public function getDailyReportDetailById($daily_report_id){
		$table = 'work_content';
		$target = '*';
		$data = array(
			'id' => $daily_report_id
		);
		$result = $this->db->select($table, $target, $data);
		if (!empty($result)) {
			return $result;
		}
		return null;
	}
	
   /**
	* Create a new daily report.
	*
	* @param string $date The date of the daily report.
	* @param string $action_type The action type of the daily report.
	* @param string $content The content of the daily report.
	* @param int $weekly_report_id The ID of the weekly report this daily report belongs to.
	* @return bool Whether the creation was successful or not.
	*/
	public function createDailyReport($date, $action_type, $content, $weekly_report_id) {
		$table = 'work_content';
		$data = array(
			'date' => $date,
			'action_type' => $action_type,
			'content' => $content,
			'weekly_report_id' => $weekly_report_id,
		);
		$result = $this->db->insert($table, $data);
		return $result;
	}
	
   /**
	* Update an existing daily report.
	*
	* @param string $date The new date of the daily report.
	* @param string $action_type The new action type of the daily report.
	* @param string $content The new content of the daily report.
	* @param int $daily_report_id The ID of the daily report to update.
	* @return bool Whether the update was successful or not.
	*/
	public function updateDailyReport($date, $action_type, $content, $daily_report_id) {
		$table = 'work_content';
		$data = array(
			'date' => $date,
			'action_type' => $action_type,
			'content' => $content
		);
		$where = array(
			'id' => $daily_report_id,
		);
		$result = $this->db->update($table, $data, $where);
		return $result;
	}
	
   /**
	* Delete an existing daily report.
	*
	* @param int $daily_report_id The ID of the daily report to delete.
	* @return bool Whether the deletion was successful or not.
	*/
	public function deleteDailyReport($daily_report_id) {
		$table = 'work_content';
		$where = array(
			'id' => $daily_report_id,
		);
		$result = $this->db->delete($table, $where);
		return $result;
	}

}

