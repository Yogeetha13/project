 <?php
  function addTodoItems($user_id,$todo_item, $date, $time)
  {
  global $db;
  $query = 'insert into todos(user_id,todo_item, date, time)
  values(:user_id,:todo_item, :date, :time)';
  $statement = $db->prepare($query);
  $statement->bindValue(':user_id',$user_id);
  $statement->bindValue(':todo_item',$todo_item);
  $statement->bindValue(':date',$date);
  $statement->bindValue(':time',$time);
  $statement->execute();
  $statement->closeCursor();
 }
 function getTodoItems($user_id)
 {
 	global $db;
	$query = 'select * from todos where user_id= :user_id and isdone=0';
	$statement = $db->prepare($query);
	$statement->bindValue(':user_id',$user_id);
	$statement->execute();
	$result= $statement->fetchAll();
	$statement->closeCursor();
	return $result;
}

function getTodoItems2($user_id) {
       global $db;
       $query = 'select * from todos where user_id=:user_id and isdone=1';
       $statement = $db->prepare($query);
       $statement->bindValue(':user_id',$user_id);
       $statement->execute();
       $result2 = $statement->fetchAll();
       $statement->closeCursor();
       return $result2;
}

function deleteItem($user_id,$item_id) {
        global $db;
	$query = 'delete from todos where id=:item_id and user_id=:user_id';
	$statement = $db->prepare($query);
	$statement->bindValue(':user_id',$user_id);
	$statement->bindValue(':item_id',$item_id);
	$statement->execute();
	$statement->closeCursor();
}

function editTodoItem($item_id,$new_todo_item,$new_date,$new_time) {
        global $db;
	$query = 'update todos set todo_item =:new_todo_item, date= :new_date, time=:new_time where id=:user_id';
	$statement = $db->prepare($query);
	$statement->bindValue(':new_todo_item',$new_todo_item);
	$statement->bindValue(':new_date',$new_date);
	$statement->bindValue(':new_time',$new_time);
	$statement->bindValue(':user_id',$item_id);
	$statement->execute();
	$statement->closeCursor();
}

function updateTask($user_id,$item_id) {
        global $db;
	$query = 'update todos set isdone=1 where id=:item_id and user_id=:user_id';
	$statement = $db->prepare($query);
	$statement->bindValue(':item_id',$item_id);
	$statement->bindValue(':user_id',$user_id);
	$statement->execute();
	$statement->closeCursor();
}

function createUser($fname,$lname, $email,$password,$ph_number, $bday, $gender)

{
	global $db;
	$query = 'select * from users where email =:email ';
	$statement = $db->prepare($query);
	$statement->bindValue(':email',$email);
	$statement->execute();
	$result= $statement->fetchAll();
	$statement->closeCursor();
	$count = $statement->rowCount();
	if($count == 0 )
	{
	echo "Account already exists";
	}
	if($count>0)
	{
		return true;
	}
	else
	{
		$query = 'insert into users(fname, lname,email, password, ph_number,bday, gender)
		values (:fname,:lname, :email, :password,:ph_number, :bday, :gender)';
		$statement = $db->prepare($query);
		$statement->bindValue(':fname',$fname);
		$statement->bindValue(':lname',$lname);
		$statement->bindValue(':email',$email);
		$statement->bindValue(':password',$password);
		$statement->bindValue(':ph_number',$ph_number);
		$statement->bindValue(':bday',$bday);
		$statement->bindValue(':gender',$gender);
		$statement->execute();
	        $statement->closeCursor();
		return false;
	}	
}
function isUserValid($email,$password)
{      
	global $db;
	$query = 'select * from users where email = :email and password = :password';
	$statement =  $db->prepare($query);
	$statement->bindValue(':email',$email);
	$statement->bindValue(':password',$password);
	$statement->execute();
	$result= $statement->fetchAll();
	$statement->closeCursor();
	$count = $statement->rowCount();
	if($count == 1)
	{
		setcookie('login',$email);
	 	setcookie('user_id',$result[0]['id']);
		setcookie('islogged',true);
		return true;
	}
	else	
	{
		unset($_COOKIE['login']);
		setcookie('login',false);
		setcookie('islogged',false);
		setcookie('user_id',false);
		return false;
	}
}
?>
