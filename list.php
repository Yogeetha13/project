<?php
        echo "<h2> Todo list system</h1><br/>";
	echo "<h3>Welcome, ".$_COOKIE['login'].'</h3><br/>';
	echo "Your to-do items: ";
	echo "<br>";
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="button.css">
</head>
<body>
<table class="one">

<thead>
  <th>Task</th>
  <th>Date</th>
  <th>Time</th>
  <th>Delete</th>
  <th>Edit</th>
  <th>Status</th>
</thead>
	            
<?php foreach($result as $res):?>
<tr>
	<td> <?php echo $res['todo_item']; ?>  </td>
	<td> <?php echo $res['date']; ?> </td>
	<td> <?php echo $res['time']; ?> </td>
	<td>
	<form action = "index.php"  method= "post">
	<input type = "hidden" name = "item_id" value = "<?php echo $res['id'] ?>">
	<input type = "hidden" name = "action" value = "delete_item">
	<input type = "submit" value = "Delete" class="button"/>
	</form>
	</td>
	
	<td>
	<form action = "edit.php"  method= "post">
	<input type = "hidden" name = "item_id" value = "<?php echo $res['id'] ?>">
	<input type = "hidden" name = "todo_item" value = "<?php echo $res['todo_item'] ?>">
	<input type = "hidden" name = "date" value = "<?php echo $res['date'] ?>">
	<input type = "hidden" name = "time" value = "<?php echo $res['time'] ?>">
	<input type = "submit" value = "Edit" class="button"/>
	</form>
	</td>
	
	<td>
	<form action = "index.php"  method= "post">
	<input type = "hidden" name = "action" value = "complete"/>
	<input type = "hidden" name = "item_id" value = " <?php echo $res['id'];?>"/>
	<input class="button" type = "submit" value = "Complete"/> 
	</form>
	</td>
</tr>  
	
<?php endforeach;?>
</table>

<form method = 'post' action = 'add_item.php'>
<input class="button" type="submit" value="Add"/>
</form>


<div>
  <h4>Completed Tasks</h4>
  <table class="one">
      <thead>
        <th>Task</th>
	<th>Date</th>
	<th>Time</th>
	<th>Delete</th>
	<th>Edit</th>
	<th>Status</th>
      </thead>
      
      
      <?php foreach($result2 as $res):?>
      <tr>
        <td><?php echo $res['todo_item'] ?> </td>
	<td><?php echo $res['date'] ?> </td>
	<td><?php echo $res['time'] ?> </td>
	<td>
	    <form action="index.php" method="post">
	    <input type="hidden" name="item_id" value="<?php echo $res['id']?>">
	    <input type="hidden" name="action" value="delete_item">
	    <input class="button" type="submit" value="delete">
	    </form>
	</td>
	<td><form action="edit.php" method="post">
	    <input type="hidden" name="item_id" value="<?php echo $res['id']?>">
	    <input type="hidden" name="todo_item" value="<?php echo $res['todo_item']?>">
	    <input type="hidden" name="date" value="<?php echo $res['date']?>">
	    <input type="hidden" name="time" value="<?php echo $res['time']?>">
	    <input class="button" type="submit" value="edit">
	</form>
	</td>
	<td>Complete</td>
      </tr>
      <?php endforeach; ?>
  </table>
</div>


</body>
</html>
