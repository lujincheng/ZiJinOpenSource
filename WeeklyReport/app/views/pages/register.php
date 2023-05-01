<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<title>Weekly Report System | Register</title>
<link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../../assets/css/login-register-page.css">
<style></style>
</head>
<body>
<div class="container">
  <form action="/Register" method="post">
	<div>User Register</div>
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
    <a class="register" href="/ToLogin">Back To Login</a>
    <button type="submit">Register</button>
  </form>
</div>

</body>
</html>

