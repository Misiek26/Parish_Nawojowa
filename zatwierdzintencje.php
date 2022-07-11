<?php
    session_start();

    if(!$_SESSION['loginadmin']==true){
        header('Location: admin/index.php');
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

    <title>Edycja ogłoszeń</title>
    
    <link rel="stylesheet" href="styles/fonts.css">
    <link rel="stylesheet" href="styles/zatwierdzintencje.css">
    <link rel="icon" href="images/icon.png">

    <script src="https://kit.fontawesome.com/e5a12dc02e.js" crossorigin="anonymous"></script>
</head>
<body id="body">
    <div id="container">
        <div id="confirm">
            Czy chcesz zapisać zmiany? 
            <form method="get" action="decyzjaintencje.php">
                <input type="submit" value = "TAK" style="margin-left:3vw;">
                <input type="button" value = "NIE" style="margin-left:0.5vw;" onclick="history.go(-1)">
            </form>
        </div>
        <div class="text-container" id="intencje">
            <h2>INTENCJE MSZY ŚWIĘTYCH</h2>
            <?php
                echo "<h3>".$_SESSION['headingText']."</h3>";
                
                $intencjecounter = array(0,0,0,0,0,0,0,0);
                for($i=0; $i<8; $i++){
                    $intencjecounter[$i] = (int)$_SESSION['counter'.(string)($i+1)];
                }
                for($i=0; $i<6; $i++){
                    echo "<table>";
                    echo "<tr>";
                    echo "<th colspan='2' style='background-color:".$_SESSION['selectheadingcolor'.(string)($i+1)]."'>".$_SESSION['intencjeheading'.(string)($i+1)]."</th>";
                    echo "</tr>";
                    for($j=0; $j<$intencjecounter[$i]; $j++){
                        echo "<tr>";
                        echo "<td class='hour'>".$_SESSION['intencjecontent'.(string)($i+1).'hour'.(string)($j+1)]."</td>";
                        echo "<td>".$_SESSION['intencjecontent'.(string)($i+1).'intencja'.(string)($j+1)]."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }

                //Intencje - kosciol
                echo "<table>";
                echo "<tr>";
                echo "<th colspan='2' style='background-color:".$_SESSION['selectheadingcolor7']."'>".$_SESSION['intencjeheading7']."</th>";
                echo "</tr>";
                echo "<tr><th colspan='2' style='background-color:".$_SESSION['selectheadingcolor7']."'>KOŚCIÓŁ PARAFIALNY</th></tr>";
                for($j=0; $j<$intencjecounter[6]; $j++){
                    echo "<tr>";
                    echo "<td class='hour'>".$_SESSION['intencjecontent7'.'hour'.(string)($j+1)]."</td>";
                    echo "<td>".$_SESSION['intencjecontent7'.'intencja'.(string)($j+1)]."</td>";
                    echo "</tr>";
                }

                //Intencje - kaplice
                echo "<tr><th colspan='2' style='background-color:".$_SESSION['selectheadingcolor7']."'>KAPLICE DOJAZDOWE</th></tr>";

                for($j=0; $j<$intencjecounter[7]; $j++){
                    echo "<tr>";
                    echo "<td class='hour'>".$_SESSION['intencjecontent8'.'hour'.(string)($j+1)]."</td>";
                    echo "<td>".$_SESSION['intencjecontent8'.'intencja'.(string)($j+1)]."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            ?>
        </div>
    </div>
    <?php include("footer/footer.php");?>
</body>
</html>

