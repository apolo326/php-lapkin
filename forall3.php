<?php
session_start();
if(empty($_SESSION['auth'])){
    header("locaton: index.php");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Техносервис</title>
    <link rel= "stylesheet" href="css/style.css">
</head>
<body>

<header>
     <h1>ООО Техносервис<h1>
</header>
<nav>
    <a href = "">Главная</a>
    <a href="insert_worker.php">Добавить исполнителя</a>
    <a href = ""> Все заявки</a>
    <a href = "logout.php">Выход</a>
</nav>
<main>
    <h2>Поиск заявки по ФИО</h2>
    <form method ="POST">
        <label for ="fio">Введите Фио клиента</label>
        <input type = "text" name="fio" id="fio" placeholder="Иванов.И.И">
        <button>Найти</button>
</form>
<h2>Все заявки</h2>
<table>
<tr> 
        <th>Номер заявки</th>
        <th>Дата добавления</th>
        <th>Оборудование</th>
        <th>Тип неисправности</th>
        <th>Описание проблемы</th>
        <th>Фио клиента</th>
        <th>Статус заявки</th>
    </tr>
    <?php
    require_once("db.php");
    if(!empty($_POST['fio'])){
        $search_fio = mysqli_query($link, "SELECT * FROM problems WHERE fio='$_POST[fio]'");
        while($res=mysqli_fetch_assoc($search_fio)){
            echo "<tr>
                <td>$res[id]</td>
                <td>$res[date_start]</td>
                <td>$res[oborud]</td>
                <td>$res[neispravnost]</td>
                <td>$res[opisanie]</td>
                <td>$res[fio]</td>
                <td>$res[status]</td>
            </tr>";
        }
    } else{
        $result = mysqli_query($link, "SELECT * FROM problems ORDER BY id DESC");
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr>
                <td>$row[id]</td>
                <td>$row[date_start]</td>
                <td>$row[oborud]</td>
                <td>$row[neispravnost]</td>
                <td>$row[opisanie]</td>
                <td>$row[fio]</td>
                <td>$row[status]</td>
            </tr>";
        }
    }
?>
</table>
</main>