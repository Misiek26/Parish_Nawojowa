<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Parafia Rzymskokatolicka Nawiedzenia NMP w Nawojowej - Duszpasterze</title>
    
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/duszpasterze.css">
    <link rel="stylesheet" href="styles/fonts.css">
    <link rel="icon" href="images/icon.png">
    
    <script src="https://kit.fontawesome.com/e5a12dc02e.js" crossorigin="anonymous"></script>
    <script src="scripts/script.js"></script>
    <script src="scripts/kontakt.js"></script>
</head>
<body id="body">
    <div id="container">
        <?php
            include("menu/menu.php");
        ?>
        <header id="header" onmouseover=hiden()>
            Parafia Nawiedzenia NMP w Nawojowej
        </header>
        <div id="content">
            <h1>DUSZPASTERZE POSŁUGUJĄCY W PARAFII NAWOJOWA</h1>
            <?php
                require_once "connect.php";
                
                $conn = new mysqli($host, $db_user, $db_password, $db_name_counter);
                $conn->query("SET CHARSET utf8");
                $conn->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 

                //Pastor
                $sql = "SELECT * FROM duszpasterze WHERE `role`='pastor';";
                $result = $conn->query($sql);

                echo "<div class='duszpasterze-container'>
                <h3>KSIĄDZ PROBOSZCZ</h3>";
                while($row = $result->fetch_assoc()){
                    echo $row['content'];
                }
                echo "</div>";
                
                //Senior
                $sql = "SELECT * FROM duszpasterze WHERE `role`='senior';";
                $result = $conn->query($sql);

                echo "<div class='duszpasterze-container'>
                <h3>SENIOR KSIĘŻY WIKARIUSZY</h3>";
                while($row = $result->fetch_assoc()){
                    echo $row['content'];
                }
                echo "</div>";

                //Curates
                $sql = "SELECT * FROM duszpasterze WHERE `role`='curate';";
                $result = $conn->query($sql);

                echo "<div class='duszpasterze-container'>
                <h3>KSIĘŻA WIKARIUSZE</h3>";
                while($row = $result->fetch_assoc()){
                    echo $row['content'];
                }
                echo "</div>";

                $conn->close();
            ?>
        </div>
    </div>
    <?php
        include("footer/footer.php");
    ?>
</body>
</html>