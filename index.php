<html>
<head>
	<title>Kahyangan Multimedia</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Login Page - Laporan Finance Kahyangan</title>
	<link rel="shortcut icon" href="favicon.ico" />
	<meta name="description" content="User login page" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="./css/login.css" />
	<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="assets/font-awesome/4.1.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="assets/css/select2.css" />
	<!-- text fonts -->
	<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />
	<!-- ace styles -->
	<link rel="stylesheet" href="./css/ace.min.css" />
	<link rel="stylesheet" href="./css/ace-rtl.min.css" />
</head>
<body>

<div class="container">
	<div class="login-container">
            <div id="output"></div>
            <img class="avatar" src="gambar/avatar.png" alt="">
            <div class="form-box">
                <form action="login2.php" method="post">
                    <input type="text" name="username" placeholder="username" required />
                    <input type="password" name="pass" placeholder="Password" required />
                    <button class="btn btn-info btn-block login" type="submit" name="login" value="Login">Login</button>
                </form>
            </div>
            &copy;Kahyangan Multimedia Finance <b><?php echo date('Y'); ?></b>
     </div>
        
</div>
 
	
 
</body>
<script src="js/login.js"></script>
</html>


