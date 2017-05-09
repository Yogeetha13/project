<html>
<head>
<link rel="stylesheet" type="text/css" href="sample.css">
</head>
<h2>Edit Item</h2>
<form action = "index.php" method = "post">
    <input type = "hidden" name = "item_id" value = "<?php echo $_POST['item_id'] ?>">
    <input type = "text" name = "new_todo_item" value = "<?php echo $_POST['todo_item'] ?>">
    <input type = "date" name = "new_date" value = "<?php echo $_POST['date'] ?>">
    <input type = "time" name = "new_time" value = "<?php echo $_POST['time'] ?>">
    <input type = "hidden" name = "action" value = "edit">
    <input type = "submit" value = "Edit">
</form>
</html>
