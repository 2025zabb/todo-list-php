<?php

$pdo = new PDO('sqlite:db.sqlite');

$sql = "INSERT INTO tasks (title, description, due_date, priority, category, created_at)
        VALUES (?, ?, ?, ?, ?, datetime('now', 'localtime'))";



$stmt = $pdo->prepare($sql);


$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['title'],
    $_POST['description'],
    $_POST['due_date'],
    $_POST['priority'],
    $_POST['category']
]);


header("Location: index.php");
exit; 

?>
