<html>
<head>
<link rel="stylesheet" type="text/css" href="sample.css">
</head>
  <body>
  <h2> Add to-do item </h2> 
  <form action='index.php' method='post'>
  <input type="text" name="todo_item" placeholder="Description">
  <input type="date" name="date">
  <input type="time" name="time">
  <input type="hidden" name="action" value="add_item">
  <input type="submit" value="Add" class="button">
  </form>
  </body>
</html>
