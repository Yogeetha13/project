<html>
<body>
<h1> To-Do application </h1>
<h2> Login </h1>
<form method = "post" action="index.php">
<strong> Email: </strong> <input type="text" name="email" placeholder = "Enter your email">
<strong> Password: </strong> <input type="password" name="password" placeholder="Enter your password"> <br> <br>
<input type ="hidden" name="action" value="test_user">
<input type="submit" value="Login"/>
</form>
<form method = "post" action = "register.php">
<input type = "submit" value = "Register" />
</form>
</body>	
</html>
