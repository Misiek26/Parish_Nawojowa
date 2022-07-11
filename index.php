<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Parafia pw. Nawiedzenia NMP w Nawojowej. Sprawdź bieżące ogłoszenia parafialne i intencje mszalne na najbliższy tydzień.">
    <meta name="keywords" content="Parafia Nawojowa, Nawojowa, Parafia pw. Nawiedzenia NMP w Nawojowej, Parafia w Nawojowej">
    <meta name="google-site-verification" content="__P0e5zBGlvlveRZ56fhWi5NxBvglrPhLqXaZU2-eHU" />
    
    <title>Parafia Rzymskokatolicka Nawiedzenia NMP w Nawojowej - Strona Główna</title>
    
    <link rel="stylesheet" href="styles/style.css?14">
    <link rel="stylesheet" href="styles/fonts.css">
    <link rel="icon" href="images/icon.png">

    <script src="https://kit.fontawesome.com/e5a12dc02e.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="scripts/script.js"></script>
    <script src="scripts/kontakt.js"></script>
</head>
<body id="body">
    <div id="container">
        <?php
            include("menu/menu.php");
        ?>
        <header onmouseover=hiden() id="header"> 
            Parafia Nawiedzenia NMP w Nawojowej
        </header>
        <div id="content">
            <article>
                <div id="transmisja">
                    <h3>TRANSMISJA VIDEO</h3>
                    <a href="https://www.youtube.com/channel/UCG-qJmR7hkrjtOBZ4Ci4_mw"><img src="images/youtubeon.jpg" alt="youtube"></a>
                </div>

                <!--Msze Święte-->

                <div id="msze">
                    <?php
                        require_once "connect.php";
                        
                        $conn = new mysqli($host, $db_user, $db_password, $db_name_counter);
                        $conn->query("SET CHARSET utf8");
                        $conn->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 

                        $sql = "SELECT * FROM msze;";
                        $result = $conn->query($sql);
                        
                        while($row = $result->fetch_assoc()){
                            if($row['id']=="1"){
                                echo "<h3>".$row['zawartosc']."</h3>";
                                echo "<span>NIEDZIELE I ŚWIĘTA</span>";
                            }
                            else{
                                if($row['id']=="2"){
                                    echo "<h4>".$row['naglowek']."</h4><p>".$row['zawartosc']."</p>";
                                }
                                else{
                                    echo "<p><b>".$row['naglowek']."</b> ".$row['zawartosc']."</p>";
                                }

                                if($row['id']=="6"){
                                    echo "<span>DNI POWSZEDNIE</span>";
                                }
                            }
                        }

                        $conn->close();
                    ?>
                    
                    <p class="spowiedz">Spowiedź przed każdą Mszą Św.</p>
                </div>  

                <!--Ogłoszenia-->

                <div class="text-container" id="ogloszenia" onmouseover=hiden()>
                    <h2>OGŁOSZENIA PARAFIALNE</h2>
                    <?php include('ogloszenia.php'); ?>
                </div>
                
                <!--Intencje-->

                <div class="text-container" id="intencje" onmouseover=hiden()>
                    <h2>INTENCJE MSZY ŚWIĘTYCH</h2>
                    <?php
                        require_once "connect.php";
    
                        $days = array("poniedzialek", "wtorek", "sroda", "czwartek", "piatek", "sobota", "niedziela", "niedziela_kaplice");
                        
                        $conn = new mysqli($host, $db_user, $db_password, $db_name);
                        $conn->query("SET CHARSET utf8");
                        $conn->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
                        
                        //Set title
                        $titleQuery = $conn->query("SELECT title FROM title");
                        $title = "";
                        
                        while($result = mysqli_fetch_array($titleQuery)){
                            $title =  $result['title'];                            
                        }
                        
                        echo "<h3>".$title."</h3>";
                        
                        //Set intncje from previous sunday
                        $headingArray = array();
                        
                        $heading = $conn->query("SELECT * FROM heading_poprzednia WHERE id");
                        while($result = mysqli_fetch_array($heading)){
                            array_push($headingArray,$result); 
                        }
                        
                        echo "<table>";
                        if($headingArray[0]['color']=="#ff0000" || $headingArray[0]['color']=="#7030a0"){
                            echo "<tr><th colspan='2' style='color:#ffffff; background-color:".$headingArray[0]['color'].";'>".$headingArray[0]['content']."</th></tr>";
                            echo "<tr><th colspan='2' style='color:#ffffff; background-color:".$headingArray[0]['color'].";'>KOŚCIÓŁ PARAFIALNY</th></tr>";
                        }
                        else{
                            echo "<tr><th colspan='2' style='background-color:".$headingArray[0]['color'].";'>".$headingArray[0]['content']."</th></tr>";
                            echo "<tr><th colspan='2' style='background-color:".$headingArray[0]['color'].";'>KOŚCIÓŁ PARAFIALNY</th></tr>";
                        }
                        
                        $intencje = $conn->query("SELECT * FROM niedziela_poprzednia WHERE id");
                        while($result = mysqli_fetch_array($intencje)){
                            echo "<tr><td class='hour'>".$result['hour']."</td>";
                            echo "<td>".$result['content']."</td></tr>";                            
                        }

                        if($headingArray[0]['color']=="#ff0000" || $headingArray[0]['color']=="#7030a0"){
                            echo "<tr><th colspan='2' style='color:#ffffff; background-color:".$headingArray[0]['color'].";'>KAPLICE DOJAZDOWE</th></tr>";                            
                        }
                        else{
                            echo "<tr><th colspan='2' style='background-color:".$headingArray[0]['color'].";'>KAPLICE DOJAZDOWE</th></tr>";
                        }
                        
                        $intencje = $conn->query("SELECT * FROM niedziela_kaplice_poprzednia WHERE id");
                        while($result = mysqli_fetch_array($intencje)){
                            echo "<tr><td class='hour'>".$result['hour']."</td>";
                            echo "<td>".$result['content']."</td></tr>";                            
                        }
                        echo "</table>";
                        echo "<span id='showAllIntencje' onclick='showIntencje()'>Pokaż intencje</span>";
                        echo "<div id='intencjeAll'>";
                        
                        //Set intencje from week
                        $heading = $conn->query("SELECT * FROM heading WHERE id");
                        
                        $headingArray = array();
                        $headingColorArray = array();
                        
                        while($result = mysqli_fetch_array($heading)){
                            array_push($headingArray, $result['content']);
                            array_push($headingColorArray, $result['color']);
                        }
                        
                        //Write intencje 
                        for($i = 0; $i < 6; $i++){
                            //Set headings
                            echo "<table>";
                            if($headingColorArray[$i]=="#ff0000" || $headingColorArray[$i]=="#7030a0"){
                                echo "<tr><th colspan='2' style='color:#ffffff; background-color:".$headingColorArray[$i].";'>".$headingArray[$i]."</th></tr>";
                            }
                            else{
                                echo "<tr><th colspan='2' style='background-color:".$headingColorArray[$i].";'>".$headingArray[$i]."</th></tr>";
                            }
                            
                            //Download intencje
                            $intencjeArray = array();
                            $intencje = $conn->query("SELECT * FROM ".$days[$i]." WHERE id");
                            
                            while($result = mysqli_fetch_array($intencje)){
                                echo "<tr><td class='hour'>".$result['hour']."</td>";
                                echo "<td>".$result['content']."</td></tr>";                            
                            }
                            
                            echo "</table>";
                            
                        }
                        
                        //Set intncje from sunday
                        
                        echo "<table>";
                        if($headingColorArray[$i]=="#ff0000" || $headingColorArray[$i]=="#7030a0"){
                            echo "<tr><th colspan='2' style='color:#ffffff; background-color:".$headingColorArray[6].";'>".$headingArray[6]."</th></tr>";
                            echo "<tr><th colspan='2' style='color:#ffffff; background-color:".$headingColorArray[6].";'>KOŚCIÓŁ PARAFIALNY</th></tr>";
                        }
                        else{
                            echo "<tr><th colspan='2' style='background-color:".$headingColorArray[6].";'>".$headingArray[6]."</th></tr>";
                            echo "<tr><th colspan='2' style='background-color:".$headingColorArray[6].";'>KOŚCIÓŁ PARAFIALNY</th></tr>";
                        }
                        $intencje = $conn->query("SELECT * FROM niedziela WHERE id");
                        while($result = mysqli_fetch_array($intencje)){
                            echo "<tr><td class='hour'>".$result['hour']."</td>";
                            echo "<td>".$result['content']."</td></tr>";                            
                        }
                        
                        if($headingColorArray[$i]=="#ff0000" || $headingColorArray[$i]=="#7030a0"){
                            echo "<tr><th colspan='2' style='color:#ffffff; background-color:".$headingColorArray[6].";'>KAPLICE DOJAZDOWE</th></tr>";
                        }
                        else{
                            echo "<tr><th colspan='2' style='background-color:".$headingColorArray[6].";'>KAPLICE DOJAZDOWE</th></tr>";
                        }
                        $intencje = $conn->query("SELECT * FROM niedziela_kaplice WHERE id");
                        while($result = mysqli_fetch_array($intencje)){
                            echo "<tr><td class='hour'>".$result['hour']."</td>";
                            echo "<td>".$result['content']."</td></tr>";                            
                        }
                        echo "</table>";
                        
                        echo "<span id='showAllIntencje' onclick='hideIntencje()'>Ukryj intencje</span>";
                        echo "</div>";
                        
                        $conn->close();
                        ?>
                </div>

                <!--Komunikaty-->

                <div class="text-container" id="komunikaty" onmouseover=hiden()>
                    <h2>KOMUNIKATY</h2>
                    <h3><?php
                        require_once "connect.php";
    
                        $conn = new mysqli($host, $db_user, $db_password, $db_name_counter);
                        $conn->query("SET CHARSET utf8");
                        $conn->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 

                        $sql = "SELECT * FROM komunikaty ORDER BY id DESC LIMIT 1;";

                        $result = $conn->query($sql);
                
                        while($row = $result->fetch_assoc()){
                            echo "<h3>".$row['title']."</h3>";
                            echo $row['content'];
                        }

                        $conn->close();
                    ?>
                </div>
            </article>
            
            <section>

                <!--Msze Święte-->

                <div class="widget">
                    <?php
                        require_once "connect.php";
                        
                        $conn = new mysqli($host, $db_user, $db_password, $db_name_counter);
                        $conn->query("SET CHARSET utf8");
                        $conn->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 

                        $sql = "SELECT * FROM msze;";
                        $result = $conn->query($sql);
                        
                        while($row = $result->fetch_assoc()){
                            if($row['id']=="1"){
                                echo "<h3>".$row['zawartosc']."</h3>";
                                echo "<span>NIEDZIELE I ŚWIĘTA</span>";
                            }
                            else{
                                echo "<p><b>".$row['naglowek']."</b> ".$row['zawartosc']."</p>";
                                if($row['id']=="6"){
                                    echo "<span>DNI POWSZEDNIE</span>";
                                }
                            }
                        }

                        $conn->close();
                    ?>
                    <p>Spowiedź przed każdą Mszą Św.</p>
                </div>

                <div class="widget">
                    <h3>NUMER KONTA PARAFIALNEGO</h3>
                    <p>45 8811 0006 0022 0200 1166 0200</p>
                </div>
                <div class="widget">
                    <h3>TRANSMISJA VIDEO</h3>
                    <a href="https://www.youtube.com/channel/UCG-qJmR7hkrjtOBZ4Ci4_mw"><img src="images/youtubeon.jpg" alt="youtube"></a>
                </div>
                <div class="widget">
                    <h3>LITURGIA</h3>
                    <div class="liturgia">
                        <a href="https://diecezja.tarnow.pl/index.php/kalen-lit"><i class="far fa-calendar-alt" style="color:rgb(48, 48, 48);"></i> Kalendarz liturgiczny</a>
                        <a href="https://www.zyjewangelia.net/"><i class="fas fa-book-open" style="color:rgb(211, 190, 7);"></i> Słowo Boże na dziś</a>
                        <a href="http://biblia.deon.pl/"><i class="fas fa-bible" style="color:rgb(54, 110, 231);"></i> Biblia</a>
                        <a href="https://brewiarz.pl/index.php3"><i class="fab fa-bootstrap" style="color:rgb(0, 0, 0);"></i> Brewiarz</a>
                        <a href="https://brewiarz.pl/czytelnia/index.php3"><i class="fas fa-book-reader" style="color:rgb(92, 52, 0);"></i> Czytelnia</a>
                    </div>
                </div>
                <div class="widget">
                    <h3>LICZNIK GOŚCI</h3>
                    <?php
                        $db = mysqli_connect($host, $db_user, $db_password, $db_name_counter);
                        
                        if (!$db) {
                            die("Połączenie nie powiodło się!");
                        }
                        
                        $insertUser = mysqli_query($db, 'UPDATE counter SET countervisitor = (SELECT * FROM counter) + 1');
                        
                        $counter = mysqli_query($db, 'SELECT countervisitor FROM counter');
                        
                        while($row = mysqli_fetch_assoc($counter)) {
                            echo "<p>".$row["countervisitor"]."</p>";
                        }
                        
                        mysqli_close($db);
                        ?>
                </div>
                <a href="https://diecezja.tarnow.pl/"><img src="images/diecezja.jpg" alt="diecezja"></a>
                <a href="https://synodtarnow.pl/"><img src="images/synod.jpg" alt="synod"></a>
                <a href="http://www.rdn.pl/"><img src="images/rdn.png" alt="rdn"></a>
                <a href="https://tarnow.gosc.pl/"><img src="images/gosc.png" alt="gość"></a>
            </section>
        </div>
    </div>
    <?php
        include("footer/footer.php");
    ?>

    <div id="cookies">
        Ta strona używa COOKIES. Korzystając z niej wyrażasz zgodę na wykorzystywanie cookies, zgodnie z ustawieniami Twojej przeglądarki.
        <button onclick="acceptCookies()">Akceptuj</button>
        <script src="scripts/cookies.js"></script>
     </div>
</body>
</html>