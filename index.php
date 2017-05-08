<?php
require('db.php');
require('db1.php');


$action = filter_input(INPUT_POST,"action");
if($action == NULL) 
{
	$action = "login";
}
if($action == "login") 
{
	include('login.php');
}


if($action == "register") 
{       
	$fname = filter_input(INPUT_POST,'fname');
        $lname = filter_input(INPUT_POST,'lname');
        $email = filter_input(INPUT_POST,'email');
        $password = filter_input(INPUT_POST,'password');
	$ph_number = filter_input(INPUT_POST,'ph_number');
	$bday = filter_input(INPUT_POST, 'bday');
	$gender = filter_input(INPUT_POST, 'gender');
        $exit =	createUser($fname,$lname,$email,$password,$ph_number,$bday,$gender);
	if($exit == true) 
	{
		include('error.php');
        } 
	else 
	{
		header("Location: index.php");
	}
}
if($action == "test_user") 
{       
       	$email = filter_input(INPUT_POST,'email');
	$password = filter_input(INPUT_POST,'password');
	$success = isUserValid($email,$password);
	if($success == true) 
	{
		$result = getTodoItems($_COOKIE['user_id']);
		include('list.php');
	} 
	else 
	{
	        include('error.php');
	}
}
if($action == "add_item") 
{ 
       addTodoItems($_COOKIE['user_id'],$_POST['todo_item'],$_POST['date'],$_POST['time']);	
	$result = getTodoItems($_COOKIE['user_id']);
	$result2 = getTodoItems2($_COOKIE['user_id']);
	include('list.php');
}


if($action =="delete_item")
{
	$selected =$_POST['item_id'];
        deleteItem($_COOKIE['user_id'],$selected);
	$result	=getTodoItems($_COOKIE['user_id']);
	$result2 = getTodoItems2($_COOKIE['user_id']);
	include('list.php');
}

if($action == "edit") {
    $item_id = $_POST['item_id'];
    $new_todo_item = $_POST['new_todo_item'];
    $new_date = $_POST['new_date'];
    $new_time = $_POST['new_time'];
    editTodoItem($item_id,$new_todo_item,$new_date,$new_time);
    $result = getTodoItems($_COOKIE['user_id']);
    $result2 = getTodoItems2($_COOKIE['user_id']);
    include('list.php');
}

if($action == "complete") {

    $item_id = $_POST['item_id'];
    updateTask($_COOKIE['user_id'],$item_id);
    $result = getTodoItems($_COOKIE['user_id']);
    $result2 = getTodoItems2($_COOKIE['user_id']);
    include('list.php');
  
}
 
?>
