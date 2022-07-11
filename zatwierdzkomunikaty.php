<?php
    session_start();
    
    if(!$_SESSION['loginadmin']==true){
        header('Location: admin/index.php');
    } 

    // The code that will be executed when the user confirms the operation

    if(isset($_GET['confirm'])){
        if($_GET['confirm']=="create"){
            require_once "connect.php";
            
            $conn = new mysqli($host, $db_user, $db_password, $db_name_counter);
            $conn->query("SET CHARSET utf8");
            $conn->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
            
            $sql = 'INSERT INTO komunikaty VALUES("", "'.$_SESSION['headingText'].'", "'.$_SESSION['komunikat'].'");';
            
            $conn->query($sql);
            
            $conn->close();
        }
        else if($_GET['confirm']=="edit"){
            require_once "connect.php";
            
            $conn = new mysqli($host, $db_user, $db_password, $db_name_counter);
            $conn->query("SET CHARSET utf8");
            $conn->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
            $sql = "UPDATE komunikaty SET title='".$_SESSION['headingText']."', content='".$_SESSION['komunikat']."' WHERE id=".$_SESSION['id'].";";
            
            $conn->query($sql);
            
            $conn->close();
        }

        else if($_GET['confirm']=="delete"){
            require_once "connect.php";
            
            $conn = new mysqli($host, $db_user, $db_password, $db_name_counter);
            $conn->query("SET CHARSET utf8");
            $conn->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 

            $sql = "DELETE FROM komunikaty WHERE id=".$_SESSION['id'].";";

            $conn->query($sql);
            
            $conn->close();
        }
        header('Location: edytor.php?komunikat='.$_GET['confirm']);
    }

    //------------------------------------------------------------------
    
    $GLOBALS['action'] = $_GET['action']; 
    $_SESSION['headingText'] = $_GET['headingText'];
    $_SESSION['komunikat'] = $_GET['komunikat'];

    if($GLOBALS['action']=='edit' || $GLOBALS['action']=='delete'){
        $_SESSION['id'] = $_GET['id'];
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Parafia pw. Nawiedzenia NMP w Nawojowej. Sprawdź bieżące ogłoszenia parafialne i intencje mszalne na najbliższy tydzień.">
    <meta name="keywords" content="Parafia Nawojowa, Nawojowa, Parafia pw. Nawiedzenia NMP w Nawojowej, Parafia w Nawojowej">
    <meta name="google-site-verification" content="__P0e5zBGlvlveRZ56fhWi5NxBvglrPhLqXaZU2-eHU" />

    <title>Edycja komunikatu</title>
    
    <link rel="stylesheet" href="styles/fonts.css">
    <link rel="stylesheet" href="styles/zatwierdzkomunikaty.css">
    <link rel="icon" href="images/icon.png">

    <script src="https://kit.fontawesome.com/e5a12dc02e.js" crossorigin="anonymous"></script>
</head>
<body id="body">
    <div id="container">
        <div id="confirm">
            Czy chcesz zapisać zmiany? 
            <form method="get" action="">
                <?php
                    switch($GLOBALS['action']){
                        case "create":
                            echo '<input type="hidden" name="confirm" value="create">';
                            break;
                        case "edit":
                            echo '<input type="hidden" name="confirm" value="edit">';
                            break;
                        case "delete":
                            echo '<input type="hidden" name="confirm" value="delete">';
                            break;
                    }
                ?>
                <input type="submit" value = "TAK" style="margin-left:3vw;">
                <input type="button" value = "NIE" style="margin-left:0.5vw;" onclick="history.go(-1)">
            </form>
        </div>

        <div class="komunikat">
            <?php

                echo "<h1>".$_SESSION['headingText']."</h1>";
                echo $_SESSION['komunikat'];;

            ?>
        </div>

    </div>

    <?php include("footer/footer.php");?>

</body>
</html>

