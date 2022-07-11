<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Parafia Rzymskokatolicka Nawiedzenia NMP w Nawojowej - Kancelaria</title>
    
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/kancelaria.css?2">
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
        <div id="content" onmouseover=hiden()>
            <h1>KANCELARIA PARAFIALNA</h1>
            <div class="container">
                <?php
                    echo "<p><b>Czynna codziennie z wyjątkiem niedziel, świąt i uroczystości<br>oraz pierwszych piątków miesiąca:</p>";
                    echo "<br><span class='hour'>";

                    require_once "connect.php";
                    
                    $conn = new mysqli($host, $db_user, $db_password, $db_name_counter);
                    $conn->query("SET CHARSET utf8");
                    $conn->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 

                    $sql = "SELECT * FROM kancelaria;";
                    $result = $conn->query($sql);
                    
                    while($row = $result->fetch_assoc()){
                        switch($row['id']){
                            case '1':
                                echo $row['content'];
                                echo "<p></span><br><br>PROSIMY O USZANOWANIE DNIA ŚWIĘTEGO !!!</b></p>";
                                break;
                            case '2':
                                echo "<p><br><br>Do chorych – o ile to możliwe – o każdej porze (kontakt telefoniczny: </p>";
                                echo $row['content']."<p>)";
                                break;
                            case '3':
                                echo "<br><br><b>SPRAWY MAŁŻEŃSKIE<br><br></p>";
                                echo $row['content'];
                                break;
                            case '4':
                                echo "<span class='wedding'>";
                                echo $row['content']."</span></b>";
                                break;
                            case '5':
                                echo "<p><br><br><b>PORADNIA RODZINNA</b><br><br></p>";
                                echo $row['content'];
                                break;
                            case '6':
                                echo "<p><br><br><b>DNI SKUPIENIA DLA NARZECZONYCH</b><br><br></p>";
                                echo $row['content'];
                                break;
                            default:
                                echo "Błąd";
                                break;
                        }
                    }

                    $conn->close();
                ?>
            </div>
        </div>
    </div>
    <?php
        include("footer/footer.php");
    ?>
</body>
</html>