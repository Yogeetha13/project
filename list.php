<?php
        echo "<h2> Todo list system</h1><br/>";
	echo "Welcome, ".$_COOKIE['login'].'<br/>';
	echo "Your to-do items: ";
	echo "<br>";
?>

<html>
<body>
<table>
	            
<?php foreach($result as $res):?>
<tr>
	<td> <?php echo $res['todo_item']; ?>  </td>
	<td> <?php echo $res['date']; ?> </td>
	<td> <?php echo $res['time']; ?> </td>
	<td>
	<form action = "index.php"  method= "post">
	<input type = "hidden" name = "item_id" value = "<?php echo $res['id'] ?>">
	<input type = "hidden" name = "action" value = "delete_item">
	<input type = "submit" value = "Delete"/>
	</form>
	</td>
	<td>
	<form action = "edit.php"  method= "post">
	<input type = "hidden" name = "item_id" value = "<?php echo $res['id'] ?>">
	<input type = "hidden" name = "todo_item" value = "<?php echo $res['todo_item'] ?>">
	<input type = "hidden" name = "date" value = "<?php echo $res['date'] ?>">
	<input type = "hidden" name = "tme" value = "<?php echo $res['time'] ?>">
	<input type = "submit" value = "Edit"/>
	</form>
	</td>
</tr>  
	
<?php endforeach;?>
</table>

<form method = 'post' action = 'add_item.php'>
<input type="submit" value="Add"/>
</form>

</body>
</html>
