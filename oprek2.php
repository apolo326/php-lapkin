<?php
session_start();
if(empty($_SESSION['auth'])){
    header("location: index.php");
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
    <a href = ""> Подать заявку</a>
    <a href ="peoblems_all.php">Все заявки</a>
    <a href = "logout.php">Выход</a>
</nav>
<main>
<h2>Подать заявку</h2>
<form class="form1" action="" method="POST">
<table>
    <tr>
        <td>Оборудование</td>
        <td><input type="text" name="oborud"></td>
    </tr>
    <tr>
        <td>Тип неисправности</td>
        <td><input type="text" name="neispravnost"></td>
</tr>
<tr> 
    <td>Описание проблемы</td>
    <td><textarea name="opisanie"></textarea></td>
</tr>
<tr>
    <td>ФИО клиента</td>
    <td><input type="text" name="fio"></td>
</tr>
<tr>
    <td></td>
   <td><button>Отправить</button></td>
</tr>
</table>
</form>
</main>
<?php
require_once("db.php");
if(!empty($_POST['oborud']) && !empty($_POST['neispravnost']) && !empty($_POST['opisanie']) && !empty($_POST['fio'])){

    $oborud = $_POST['oborud'];
    $neispravnost = $_POST['neispravnost'];
    $opisanie = $_POST['opisanie'];
    $fio = $_POST['fio'];
    $id = $_SESSION['id'];
    $result = mysqli_query($link,"INSERT INTO problems(oborud,neispravnost,opisanie,fio,id_user) VALUES ('$oborud','$neispravnost','$opisanie','$fio','$id')");
    if($result == 'true'){
        header("Location: problems_all.php");
    }else{
        echo "Инфорамция не добвлена";
    }
}
?>
</body>
</html>