<?php 
    $GLOBALS['postid'] = $_SERVER['QUERY_STRING'];
    
    if($GLOBALS['postid']==""){
        header("Location:komunikaty.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Parafia Rzymskokatolicka Nawiedzenia NMP w Nawojowej - Strona Główna</title>
    
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/fonts.css">
    <link rel="stylesheet" href="styles/komunikaty.css">
    <link rel="icon" href="images/icon.png">
    
    <script src="https://kit.fontawesome.com/e5a12dc02e.js" crossorigin="anonymous"></script>
    <script src="scripts/script.js"></script>
    <script src="scripts/kontakt.js"></script>
    <script src="scripts/komunikaty.js"></script>
</head>
<body id="body">
    <div id="container">
        <?php
            include("menu/menu.php");
        ?>
        
        <header id="header" onmouseover=hiden()>
            Parafia Nawiedzenia NMP w Nawojowej
        </header>
        
        <div id="content" onmouseover=hiden()>
            <?php
                require_once "connect.php";
        
                $conn = new mysqli($host, $db_user, $db_password, $db_name_counter);
                $conn->query("SET CHARSET utf8");
                $conn->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
                
                $result = $conn->query("SELECT title, content FROM komunikaty WHERE id=".$GLOBALS['postid'].";");
                
                while($row = $result->fetch_assoc()){
                    echo "<h2>".$row['title']."</h2>";
                    echo $row['content'];
                }
                
                $conn->close();
            ?>

        </div>
    </div>
    <?php
        include("footer/footer.php");
    ?>
</body>
</html>