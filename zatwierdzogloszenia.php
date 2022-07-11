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
    <link rel="stylesheet" href="styles/zatwierdzogloszenia.css">
    <link rel="icon" href="images/icon.png">

    <script src="https://kit.fontawesome.com/e5a12dc02e.js" crossorigin="anonymous"></script>
</head>
<body id="body">
    <div id="CheckOgloszenia">
        <?php
            //Write to file 
            
            $ogloszeniaContent = fopen("ogloszeniaCopy.php", "r+") or die("Nie udało się otworzyć pliku...");
            file_put_contents("ogloszeniaCopy.php", "");
            
            for($i = 1; $i <= $_GET['count']; $i++){
                fwrite($ogloszeniaContent, "<li>");
                fwrite($ogloszeniaContent, $_GET["ogloszenie$i"]);
                fwrite($ogloszeniaContent, "</li>");
                fwrite($ogloszeniaContent, "\n");
            }

            if($_GET['ogloszenieNadeslane']!=""){
                fwrite($ogloszeniaContent, "*nadeslane*\n");
                fwrite($ogloszeniaContent, $_GET['ogloszenieNadeslane']);
            }

            fclose($ogloszeniaContent);
            
            // //Read from file 
            
            $ogloszeniaContent = fopen("ogloszeniaCopy.php", "r+") or die("Nie udało się otworzyć pliku...");
            $arr = array();
            $arrlength = 0;
            while(!feof($ogloszeniaContent)) {
                $arr[$arrlength] = fgets($ogloszeniaContent);
                $arrlength++;
            }

            fclose($ogloszeniaContent);
            
            
            //Write to file correct text
            
            $ogloszeniaContent = fopen("ogloszeniaCopy.php", "r+") or die("Nie udało się otworzyć pliku...");
            
            file_put_contents("ogloszeniaCopy.php", "");
            
            fwrite($ogloszeniaContent, "<h3>".$_GET['headingText']."</h3>\n\n<p>\n<ol>\n");
            
            $j = 0;
            
            while($j < $arrlength) {

                if($arr[$j]=="*nadeslane*\n"){
                    $j++;
                    break;
                }

                fwrite($ogloszeniaContent, $arr[$j]);
                
                $j++;
            }
            fwrite($ogloszeniaContent, "</ol>\n</p>\n");

            // //Write to file ogłoszenia nadesłane
            
            if($j<$arrlength){
                fwrite($ogloszeniaContent, "\n<div id='ogloszenia-nadeslane'>");
                fwrite($ogloszeniaContent, "\n<h3 style='background-color:#ffc000;'>OGŁOSZENIA NADESŁANE</h3>");
                fwrite($ogloszeniaContent, "\n<div class='content-new-ogloszenia'>\n");
                while($j < $arrlength) {
    
                    fwrite($ogloszeniaContent, $arr[$j]);
                    fwrite($ogloszeniaContent, "<br>");
                    
                    $j++;
                }
                fwrite($ogloszeniaContent, "\n</div>\n</div>");
            }

            fclose($ogloszeniaContent);
            ?>
    </div>
    <div id="container">
       
        <div id="confirm">
            Czy chcesz zapisać zmiany? 
            <form method="get" action="decyzjaogloszenia.php">
                <input type="submit" value = "TAK" style="margin-left:3vw;">
                <input type="button" value = "NIE" style="margin-left:0.5vw;" onclick="history.go(-1)">
            </form>
        </div>

        <div class="ogloszenia">
            <h2>OGŁOSZENIA PARAFIALNE</h2>
            <?php include('ogloszeniaCopy.php'); ?>
        </div>            
    </div>

    <?php include("footer/footer.php");?>

</body>
</html>

