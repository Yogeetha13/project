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
</tr>  
	
<?php endforeach;?>
</table>

<form method = 'post' action = 'add_item.php'>
<input type = "hidden" name = "action" value="add_item">
<input type="submit" value="Add"/>


</form>
</body>
</html>
