<?php
    $dsn = 'mysql:host=sql1.njit.edu;dbname=ys467';
    $username = 'ys467';
    $password = '87RTiWqEE';
    try {
    $db = new PDO($dsn, $username, $password);
    } catch(PDOException $e) {
    $error_message = $e->getMessage();
    echo $error_message;
    exit();
    }
?>
		
						   
