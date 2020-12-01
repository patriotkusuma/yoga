<?php include 'config.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #fff;
	background: #3598dc;
}
.form-control {
	min-height: 41px;
	background: #f2f2f2;
	box-shadow: none !important;
	border: transparent;
}
.form-control:focus {
	background: #e2e2e2;
}
.form-control, .btn {        
	border-radius: 2px;
}
.login-form {
	width: 350px;
	margin: 30px auto;
	text-align: center;
}
.login-form h2 {
	margin: 10px 0 25px;
}
.login-form form {
	color: #7a7a7a;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #fff;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.login-form .btn {        
	font-size: 16px;
	font-weight: bold;
	background: #3598dc;
	border: none;
	outline: none !important;
}
.login-form .btn:hover, .login-form .btn:focus {
	background: #2389cd;
}
.login-form a {
	color: #fff;
	text-decoration: underline;
}
.login-form a:hover {
	text-decoration: none;
}
.login-form form a {
	color: #7a7a7a;
	text-decoration: none;
}
.login-form form a:hover {
	text-decoration: underline;
}
</style>
</head>
<body>
	<?php
    session_start();
    if (isset($_COOKIE['cookielogin'])) {
        $username = $_COOKIE['cookielogin']['user'];
        $password = $_COOKIE['cookielogin']['pass'];
        $sql = "SELECT * FROM `login` WHERE username = '$username'";
        $query = mysqli_query($db, $sql);
        $login = mysqli_fetch_object($query);


        if ($username == $login->username && $password == $login->password) {
            $_SESSION['logged'] = 1;
            $_SESSION['username'] = $login->username;
            header('index.php');
        } else {
            header('Location: login.php');
        }
    } elseif (isset($_SESSION['logged'])) {
        header('index.php');
    }
    ?>
<div class="login-form">
    <form action="proses-login.php" method="POST">    	
        <h2 class="text-center">Login</h2>
        <a href="index.php" class="navbar-brand"></a>
        <?php if (isset($_GET['login'])) : ?>
            <p>
                <div class="alert alert-danger" role="alert">
                    Username atau Password yang anda masukkan salah
                </div>
            </p>
        <?php endif; ?> 
        <div class="form-group has-error">
        	<input type="text" class="form-control" name="username" placeholder="Username" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
        <div class="checkbox mb-3 text-left">
            <label>
                <input type="checkbox" value="remember-me" name="remember-me"> Remember me
            </label>
        </div>        
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
        </div>

</div>
</body>
</html>