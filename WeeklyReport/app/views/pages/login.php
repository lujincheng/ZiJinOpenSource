<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<title>Weekly Report System | Login</title>
<link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../../assets/css/login-register-page.css">
<style>

</style>
</head>
<body>
<div class="container">
  <form action="/Login" method="post">
	<div>User Login</div>
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <a class="register" href="/ToRegister">Not Have Account</a>
    <button type="submit">Login</button>
  </form>
</div>

</body>
</html>

