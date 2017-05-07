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
  if($action == 'test_user')
  {
      $username = filter_input( INPUT_POST,'name');
      $password = filter_input (INPUT_POST,'password');
      $success = isUserValid($username,$password);
	    if($success == true)
	      {
	          $result = getTodoItems($_COOKIE['my_id']);
		  include('list.php');
	      }
	      else
	      {
	      	header("Location: badInfo.php");
	
	      }
  }
  if($action == "register") 
  {
    	$fname = filter_input(INPUT_POST,'fname');
  	$lname = filter_input(INPUT_POST,'lname');
	$email = filter_input(INPUT_POST,'email');
	$password = filter_input(INPUT_POST,'password');
 	$ph_number = filter_input(INPUT_POST,'ph_number');
  	$bday = filter_input(INPUT_POST,'bday');
  	$gender = filter_input(INPUT_POST,'gender')
  	$exit = createUser($fname,$lname,$email, $password, $ph_number, $bday, $gender);
  
 	 if($exit == true) 
  	{
  		include('error.php');
  	}	 
  	else 
  	{
  		header("Location: index.php");
  	}
  }	
  if ($action == 'add')
  {
  	if(isset($_POST['todo_item']))
	{
     		addItem($_COOKIE['my_id'], $_POST['todo_item'], $_POST['date'], $_POST['time']);
        } 	
        $result = displayItems($_COOKIE['my_id']);
	include('list.php');
  }
  
  if($action == 'delete_item') 
  {
  	if(isset($_POST['item_id'])) 
	{
  		$selected = $_POST['item_id'];
  		deleteItem($_COOKIE['my_id'],$selected);
  	}	
	$result = displayItems($_COOKIE['my_id']);
	include('list.php');
  }
?>
