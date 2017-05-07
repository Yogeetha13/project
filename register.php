<html>
<body>
  <h1> Sign Up</h1>
  <form method = 'post' action = 'index.php'>
       <strong> First Name: </strong> <input type = "text" name = 'fname'
       placeholder="firstname"/> <br> </br>
       <strong> Last Name: </strong> <input type= "text" name = 'lname'
       placeholder="lastname" /> <br> </br>
       	<strong> Email Address: </strong> <input type = "text" name='email'
	placeholder = "email address"/> <br> </br>
	<strong> Password: </strong> <input type="password"
	name='password'value="" placeholder = "password" /> <br> </br>
	<strong> Phone number: </strong> <input type="int"
	name='ph_number'value="" placeholder = "phone number" /> <br> </br>
	<strong> Birthday: </strong> <input type="date" name='bday'/> <br> </br>
	<strong> Gender: </strong> <input type="text" name='gender'/> <br> </br>
	<input type="hidden" name= "action" value="register">
	<br>
	<input type="submit" value="Register"/>
  </form>
  </body>
  </html>
