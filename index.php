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
	        	$result = getTodoItems($_COOKIE['my_id']);
			include('list.php');
			echo ' successful login!';    
		}
		else
		{
			header("Location: badInfo.php");
		        echo "incorrect username or password!";
	 	}
		else if ($action == 'registrar')
		{
			$name = filter_input(INPUT_POST, 'reg_uname');
			if(isset($name))
			{
				$pass = filter_input(INPUT_POST, 'reg_password');
				$exit = createUser($name,$pass);
				if($exit == true)
				{
					include('user_exit.php');
				}
				else 
				{
					header("Location:login.php");
				}
			}
		}
		else if ($action == 'add')
		{
		
		}
?>
