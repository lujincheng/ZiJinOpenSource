<?php
require_once '../app/views/includes/common.php';
require_once '../app/views/includes/nav.php';
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>Weekly Report System | <?php echo $weekly_report[0]['start_date'] . '~' . $weekly_report[0]['end_date'] . ' ' . $weekly_report[0]['submitter'] . "'s Weekly Report"; ?></title>
    <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/weekly-report-detail-page.css">
    <style></style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header">
            <?php echo $weekly_report[0]['start_date'] . '~' . $weekly_report[0]['end_date'] . ' ' . $weekly_report[0]['submitter'] . "'s Weekly Report"; ?>
            <div style="float:right">
                <a href="/WeeklyReportList" class="btn btn-sm btn-outline-back">Back</a>
				<a href="<?php echo('/AddWeeklyReportDetail/'.getLastNumberFromUrl($_SERVER['REQUEST_URI'])); ?>" 
					class="btn btn-sm btn-outline-success <?php echo isCurrentUser($weekly_report[0]['submitter']) ? "" : "disabled"; ?>">Add</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Action</th>
                    <th>Content</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($work_contents as $work_content): ?>
                    <tr>
                        <td><?php echo $work_content['date']; ?></td>
                        <td><?php echo $work_content['action_type']; ?></td>
                        <td style="word-wrap: break-word; max-width: 500px;white-space: pre-line;text-align:left"><?php echo $work_content['content']; ?></td>
                        <td>
                            <a href="<?php echo('/ModifyWeeklyReportDetail/'.$work_content['id'].'/'.$work_content['weekly_report_id']); ?>" class="btn btn-sm btn-outline-primary <?php echo isCurrentUser($weekly_report[0]['submitter']) ? "" : "disabled"; ?>">Edit</a>
                            <a href="<?php echo('/DeleteDailyReportDetail/'.$work_content['id'].'/'.$work_content['weekly_report_id']); ?>" class="btn btn-sm btn-outline-danger <?php echo isCurrentUser($weekly_report[0]['submitter']) ? "" : "disabled"; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
