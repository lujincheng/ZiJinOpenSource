<?php
require_once '../core/Controller.php';
require_once '../config/config.php';
require_once '../app/functions.php';
require_once '../app/models/WeeklyReportModel.php';

class WeeklyReportController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new WeeklyReportModel();
    }

    public function index()
    {
        error_log('WeeklyReportController::index');
        // Call Model layer to get the weekly report list data
        $weekly_reports = $this->model->getWeeklyReports();

        $data = array(
            'weekly_reports' => $weekly_reports
        );
        // Pass the weekly report list data to View layer for display
        $this->render('weekly_report_list', $data);
    }

    public function create_weekly_report()
    {
        error_log('WeeklyReportController::create');
        session_start();
        $current_user = $_SESSION['username'];
        $startDate = date('Y-m-d', strtotime('last Monday'));
        if (!$this->model->isWeeklyReportCreated($current_user, $startDate)) {
            $endDate = date('Y-m-d', strtotime('next Sunday'));
            $submitDateTime = date('Y-m-d H:i:s');
            $result = $this->model->createWeeklyReport($startDate, $endDate, $submitDateTime, $current_user);
            if ($result) {
                $_SESSION['alert'] = 'Create weekly-report successfully';
                header('Location: ' . Domain_Name . '/WeeklyReportList');
                exit();
            } else {
                $_SESSION['alert'] = 'Fail to create weekly-report';
                header('Location: ' . Domain_Name . '/WeeklyReportList');
                exit();
            }
        } else {
            $_SESSION['alert'] = "This week's weekly-report has been created";
            header('Location: ' . Domain_Name . '/WeeklyReportList');
            exit();
        }
    }
}
