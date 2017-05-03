<?php
function addTodoItems($uid,$todo_text)
{
	global $db;
	$query = 'insert into todos(user_id,todo_item) values(:userid,:todo_text)';
	$statement = $db->prepare($query);
	$statement->bindValue(':userid',$uid);
	$statement->bindValue(':todo_text',$todo_text);
	$statement->execute();
	$statement->closeCursor();
}
function getTodoItems($uid)
{
	global $db;
	$query = 'select * from todos where user_id= :userid';
	$statement = $db->prepare($query);
	$statement->bindValue(':userid',$uid);
	$statement->execute();
	$result= $statement->fetchAll();
	$statement->closeCursor();
	return $result;
}
function createUser($username, $password)
{
	global $db;
	$query = 'select * from users where username = :name ';
	$statement = $db->prepare($query);
	$statement->bindValue(':name',$username);
	$statement->execute();
	$result= $statement->fetchAll();
	$statement->closeCursor();
	$count = $statement->rowCount();
	if($count > 0 )
	{
		return true;
	}
	else
	{
		$query = 'insert into users(username,passwordHash) values (:name, :pass)';
		$statement = $db->prepare($query);
		$statement->bindValue(':name',$username);
		$statement->bindValue(':pass',$password);
		$statement->execute();
		$statement->closeCursor();
		return false;
	}
}
   function isUserValid($username,$password)
   {
   	global $db;
  	$query = 'select * from users where username = :name and passwordHash = :pass';
   	$statement = $db->prepare($query);
   	$statement->bindValue(':name',$username);
   	$statement->bindValue(':pass',$password);
   	$statement->execute();
   	$result= $statement->fetchAll();
   	$statement->closeCursor();
   	$count = $statement->rowCount();
   	if($count == 1)
   	{
  		 return true;
   	}
	else	
	{
   		 return
   	 	 false;
  	}
   }
?>
