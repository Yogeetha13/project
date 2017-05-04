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
<form method = 'post' action='index.php'>
<strong> Description: </strong> <input type='text' name='description'/><br>
<input type = 'hidden' name = 'action' value='add'><br>
<input type="submit" value="Add"/>

</form>
</body>
</html>
