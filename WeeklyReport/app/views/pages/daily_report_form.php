<?php  
	require_once '../app/views/includes/common.php';
	require_once '../app/views/includes/nav.php'; 
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Modify Daily Content - Weekly Report System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4"><?php echo $daily_report[0]['id'] ? 'Modify' : 'Add' ?> Job Content</h2>
    <form method="post" action="<?php echo $daily_report[0]['id'] ? '/ModifyDailyReportDetail' : '/CreateDailyReportDetail' ?>">
        <input type="hidden" name="weekly_report_id" value="<?php echo $weekly_report_id; ?>">
        <input type="hidden" name="daily_report_id" value="<?php echo $daily_report[0]['id']; ?>">
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control" id="date" name="date" value="<?php echo $daily_report[0]['date']; ?>" required>
        </div>
        <div class="form-group">
            <label for="category">Action Type:</label>
			<select class="form-control" id="action_type" name="action_type" required>
				<option value="学习" <?php echo $daily_report[0]['action_type'] == '学习' ? 'selected' : ''; ?>>学习</option>
				<option value="工作" <?php echo $daily_report[0]['action_type'] == '工作' ? 'selected' : ''; ?>>工作</option>
				<option value="会议" <?php echo $daily_report[0]['action_type'] == '会议' ? 'selected' : ''; ?>>会议</option>
				<option value="培训" <?php echo $daily_report[0]['action_type'] == '培训' ? 'selected' : ''; ?>>培训</option>
				<option value="休息" <?php echo $daily_report[0]['action_type'] == '休息' ? 'selected' : ''; ?>>休息</option>
			</select>

        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" id="content" name="content" rows="10" required><?php echo $daily_report[0]['content']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="javascript:history.go(-1);" class="btn btn-secondary">Back</a>
    </form>
</div>

</body>
</html>

