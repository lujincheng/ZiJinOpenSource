<?php  
	require_once '../app/views/includes/common.php';
	require_once '../app/views/includes/nav.php'; 
 ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>Weekly Report System - Home Page</title>
    <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/weekly-report-list-page.css">
    <style></style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header">
            <form action="/CreateWeeklyReport" method="post">
                <!-- Weekly Report List -->
                Weekly Report List
                <button style="float:right" type="submit" class="btn btn-sm btn-outline-success">
                    <!-- Create My Weekly-Report -->
                    Create My Weekly-Report
                </button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Weekly Report</th>
                    <th>Submit Datetime</th>
                    <th>Submitter</th>
                    <th>Operation Role</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($weekly_reports as $weekly_report): ?>
                    <tr>
                        <td>
                            <a href="<?php echo('/WeeklyReportDetail/'.$weekly_report['id']); ?>">
                                <?php echo $weekly_report['start_date'] . ' ~ ' . $weekly_report['end_date'] . ' Weekly Report'; ?></a>
                        </td>
                        <td><?php echo $weekly_report['submit_time']; ?></td>
                        <td><?php echo $weekly_report['submitter']; ?></td>
                        <td>ALL</td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
