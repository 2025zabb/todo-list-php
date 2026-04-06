<?php
$pdo = new PDO('sqlite:db.sqlite');

$sql = "select * from tasks where id = ?";

$stmt = $pdo->prepare($sql);
$stmt->execute([$_GET['task']]);

$data = $stmt->fetch(PDO::FETCH_ASSOC);






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
   body {
    display: flex;
    flex-direction: column;      /* Positionne les éléments en colonne */
    justify-content: center;     /* Centre verticalement la colonne dans le body */
    align-items: center;         /* Centre horizontalement chaque enfant */
    height: 100vh;
}

    </style>

</head>
<body>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?=$data['id']?>">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="<?=htmlspecialchars($data["title"]??'')?>">

        <label for="priority">Priority</label>
        <select name="priority" id="priority">
            <option value="<?=htmlspecialchars($data["priority"]??'')?>" selected><?=  ucfirst(htmlspecialchars($data['priority']??''))?></option>
            <option value="<?=htmlspecialchars('haute')?>" selected><?=  ucfirst(htmlspecialchars('haute'))?></option>
            <option value="<?=htmlspecialchars('moyenne')?>" selected><?=  ucfirst(htmlspecialchars('moyenne'))?></option>
            <option value="<?=htmlspecialchars('basse')?>" selected><?=  ucfirst(htmlspecialchars('basse'))?></option>
        </select>

        <label for="description">Description</label>
        <input type="text" name="description" id="description"value="<?=htmlspecialchars($data["description"]??'')?>">

        <label for="date">Due Date</label>
        <input type="date" name="due_date" id="due_date" value="<?=htmlspecialchars($data["due_date"]??'')?>">

        <label for="category">Category</label>
        <input type="text" name="category" id="category"value="<?=htmlspecialchars($data["category"]??'')?>">

        <button type="button" href='formule.php'>Retour</button>
        <button type="submit">edit la tache</button>


    </form>
</body>
</html>

