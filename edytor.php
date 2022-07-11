<?php
    session_start();

    if(!$_SESSION['loginadmin']==true){
        header('Location: admin/index.php');
    }

    //Code executed after created, updated or deleted komunikat
    if(isset($_GET['komunikat'])){
        switch($_GET['komunikat']){
            case "create":
                echo "<div class='success'>Komunikat został utworzony poprawnie!</div>";
                break;
            case "edit":
                echo "<div class='success'>Komunikat został edytowany poprawnie!</div>";
                break;
            case "delete":
                echo "<div class='success'>Komunikat został usunięty poprawnie!</div>";
                break;              
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Edycja strony</title>
    
    <link rel="stylesheet" href="styles/fonts.css">
    <link rel="stylesheet" href="styles/edytor.css?2">
    <link rel="icon" href="images/icon.png">

    <script src="https://kit.fontawesome.com/e5a12dc02e.js" crossorigin="anonymous"></script>
</head>
<body id="body">
    <div class="logout">
        <a href="admin/logout.php">Wyloguj się</a>
    </div>
    <article>
        <div id="menu">
            <h1>EDYTOR STRONY PARAFII NAWOJOWA</h1>
            <div class="option">
                <h2>Wybierz co chesz zmienić:</h2>
                <a href="edytujogloszenia.php">Ogłoszenia</a><br>
                <a href="edytujintencje.php">Intencje</a><br>
                <a href="edytujmsze.php">Msze Święte </a><br>
                <a id="komunikaty">Komunikaty</a><br>
                <a href="edytujkancelaria.php">Kancelaria</a><br>
                <a href="edytujduszpasterze.php">Duszpasterze</a><br>
                <a href="edytujkalendarium.php">Kalendarium</a>
            </div>
        </div>
        
    </article>
    <div id="posteditor">
        <div class="option">
            <span id="editorclose"><i class="fa fa-times"></i></span>
            <h2>Komunikaty:</h2>
            <a href="edytujkomunikaty.php?create">Dodaj nowy komunikat</a><br>
            <a href="edytujkomunikaty.php?edit">Edytuj komunikat</a><br>
            <a href="edytujkomunikaty.php?delete">Usuń komunikat</a><br>
        </div>
    </div>
    
    <?php include("footer/footer.php");?>
    
    <script src="scripts/edytor.js"></script>
</body>
</html>