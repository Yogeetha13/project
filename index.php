<?php
require('db1.php');
require('db.php');
$action = filter_input(INPUT_POST, "action");
if($action == NULL)
	{
  		$action = "display_login_page";
  	}
  	if($action == "display_login_page")
  	{	
    		include('login.php');
    	}
    	else if($action == 'test_user')
    	{
      		$username = $_POST['reg_uname'];
        	$password = $_POST['reg_password'];
	  	$success = isUserValid($username,$password);
	    	if($success == true)
	      	{
	        	echo ' successful login!';    
		}
		else
		{
		        echo "incorrect username or password!";
	 	}
	}
?>
