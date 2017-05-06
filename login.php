<html>
<body>
<h1> To-Do application </h1>
<h2> Login </h1>
<form method = "post" action="list.php">
<strong> Username: </strong> <input type="text" name="name"/><br><br>
<strong> Password: </strong> <input type="password" name="password"/><br><br>
<input type ="hidden" name="action" value="user">
<input type="submit" value="Login"/>
</form>
<form method = "post" action = "register.php">
<input type = "submit" value = "Register" />
</form>
</body>	
</html>
