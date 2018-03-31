<html>
	<head>
		<title>FBK</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css"> 
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
		<meta charset="utf-8">
		<meta name="Social network FBK">
		<style type="text/css">
  			header {
  			}
  			body {
  				background: url(img/fbk.jpg);
  				background-repeat: no-repeat;
  				background-size: 100%;
  				opacity: 1;
  				width: relative;
  				height: relative;
  			}
  			.input-group {
  				opacity: 1;
  			}
  			.container {
  				width: 30%;
  				margin-top: 15%;
  				margin-left: auto;
  				margin-right: auto;
  			}
  			.hello {
  				text-align: center;
  				color: #c6e5ff;
  			}
  			.box {
  				white-space: nowrap;
  			}
  			.box button {
  				width: 50%;
  				display: inline-block;
  			}
  		</style>
</head>

<!-- HEADER MUST BE HERE
В нем можно будет запилить новостной блог в миниатюре, например или оформить "горячие кнопки" или инфу о соцсети, новости соцсети и прочее-прочее -->

<header>
</header>

<body>
 <!-- LOGIN FORM -->
 <div class="background">
	<form accept-charset="utf-8" method="post" action="SOMETHING.PHP" style=""> <!--action php method from class User that must be connected here!-->
		<div class="container">
			<div class="hello">
				<h2> Welcome to FBK</h2>
				<h3>Please login or register</h3>
			</div>
			<div class="input-group">
      			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      			<input id="email" type="text" class="form-control" name="email" placeholder="Email">
    		</div>
    		<div class="input-group">
      			<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      			<input id="password" type="password" class="form-control" name="password" placeholder="Password">
    		</div>
    		<div class="box">
    			<button id="register" type="button" class="btn btn-primary" name="register">Register</button>
    			<button id="login" type="button" class="btn btn-primary" name="submit">Login</button>
    		</div>
    		</div>
		</div>
	</form>
</div>
</body>
</html>