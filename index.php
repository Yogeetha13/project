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
	      }
	      else
	      {
	      	include("error.php");
	      }
  }
  else if ($action == 'registrar')
  {
  $name = filter_input(INPUT_POST, 'reg_uname');
  if(isset($name))
  {
  	$password = filter_input(INPUT_POST, 'reg_password');
	$exit = createUser($name,$password);
	if($exit == true)
	{
		include ('user_exit.php');
	}
	else 
	{
		header("Location: login.php");
	}									   
  }
  }
  else if ($action == 'add')
  {
  	if(isset($_POST['item_name']))
	{
     		addItem($_COOKIE['userid'], $_POST['item_name'], $_POST['item_date'], $_POST['item_time']);
        } 	
        $result = displayItems($_COOKIE['userid']);
	include('list.php');
  }
  
  else if($action == 'delete_item') 
  {
  	if(isset($_POST['item_id'])) 
	{
  		$selected = $_POST['item_id'];
  		deleteItem($_COOKIE['userid'],$selected);
  	}	
	$result = displayItems($_COOKIE['userid']);
	include('list.php');
  }
?>
