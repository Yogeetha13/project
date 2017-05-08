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
	<form action = "index.php" action = "post">
	<input type = "hidden" name = "item_id" value = "<?php echo $res['id'] ?>">
	<input type = "hidden" name = "action" value = "delete_item">
	<input type = "submit" value = "Delete"/>
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
