<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Parafia Rzymskokatolicka Nawiedzenia NMP w Nawojowej - Kalendarium</title>
    
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/kalendarium.css">
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
            <?php
                require_once "connect.php";
                
                $conn = new mysqli($host, $db_user, $db_password, $db_name_counter);
                $conn->query("SET CHARSET utf8");
                $conn->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 

                $sql = "SELECT content FROM kalendarium WHERE id=1;";
                $result = $conn->query($sql);
                
                while($row = $result->fetch_assoc()){
                    echo "<h2>".$row['content']."</h2>";
                }

                echo "<table>";

                $sql = "SELECT * FROM kalendarium WHERE category='event';";
                $result = $conn->query($sql);
                
                while($row = $result->fetch_assoc()){
                    echo "<tr><td class='date'>".$row['day']."</td>";
                    echo "<td class='event'>".$row['content']."</td></tr>";
                }

                echo "</table>";
                echo "<h3>NABOŻEŃSTWA OKRESOWE</h3>";
                echo "<ul>";

                $sql = "SELECT content FROM kalendarium WHERE category='time_event';";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()){
                    echo "<li>".$row['content']."</li>";
                }

                echo "</ul>";

                $conn->close();
            ?>
        </div>
    </div>
    <?php
        include("footer/footer.php");
    ?>
</body>
</html>