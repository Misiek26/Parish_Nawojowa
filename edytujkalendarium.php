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

    <title>Edycja kalendarium</title>
    
    <script src="https://kit.fontawesome.com/e5a12dc02e.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="styles/fonts.css">
    <link rel="stylesheet" href="styles/edytujkalendarium.css">
    <link rel="icon" href="images/icon.png">
</head>
<body>
    <h1>EDYTUJ KALENDARIUM</h1>
    <form action='zatwierdzkalendarium.php' method='post' id="form">

        <h2>Treść strony do edycji</h2>
        
        <div id="contentOgloszenia">
            <div id="editor">
                <?php
                    require_once "connect.php";
                                    
                    $conn = new mysqli($host, $db_user, $db_password, $db_name_counter);
                    $conn->query("SET CHARSET utf8");
                    $conn->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 

                    $sql = "SELECT content FROM kalendarium WHERE id=1;";
                    $result = $conn->query($sql);
                    
                    while($row = $result->fetch_assoc()){
                        echo "<div id='kalendariumWrapper1' class=kalendariumWrapper>";
                        echo "<div class='kalendariumHeader'>";
                            echo "Rok kalendarzowy";
                        echo "</div>";
                        echo "<textarea name='kalendarium1' id='kalendarium1' placeholder='Bieżący rok...'>".$row['content']."</textarea>";
                        echo "</div>";
                    }

                    $sql = "SELECT * FROM kalendarium WHERE category='event';";
                    $result = $conn->query($sql);

                    echo "<div id='kalendariumeditor'>";

                    while($row = $result->fetch_assoc()){
                        echo "<div id='kalendariumWrapper".$row['id']."' class=kalendariumWrapper>";
                        if($row['id']=='2'){
                            echo "<div class='kalendariumHeader'>";
                                echo "Kalendarium";
                            echo "</div>";
                        }
                        echo "<div class='daycontainer'>";
                        echo "<textarea name='day".$row['id']."' id='day".$row['id']."' class='day' placeholder='Data...'>".$row['day']."</textarea>";
                        echo "</div>";
                        
                        echo "<div class='kalendariumcontainer'>";
                        echo "<textarea name='kalendarium".$row['id']."' id='kalendarium".$row['id']."' class='content' placeholder='Kalendarium...'>".$row['content']."</textarea>";
                        echo "</div>";
                        echo "</div>";
                    }

                    echo "</div>";
                    echo "<input type='hidden' name='kalendariumcounter' id='kalendariumcounter' value='0'>";

                    echo '<button type="button" onclick="insertKalendarium()" class="insert"><i class="fas fa-plus"></i>Dodaj</button>
                    <button type="button" onclick="removeKalendarium()" class="remove"><i class="fas fa-minus"></i>Usuń</button><br>';

                    $sql = "SELECT id, content FROM kalendarium WHERE category='time_event';";
                    $result = $conn->query($sql);

                    $check = 0;
                    $counter=0;

                    while($row = $result->fetch_assoc()){
                        $counter++;
                        
                        echo "<div id='kalendariumWrapperTimeEvent".$counter."' class=kalendariumWrapper>";
                        if($check == 0){
                            echo "<div class='kalendariumHeader'>";
                                echo "Nabożeństwa okresowe";
                            echo "</div>";
                            $check = 1;
                        }
                        echo "<textarea name='nabozenstwo".$counter."' id='nabozenstwo".$counter."' class='timeevent' placeholder='Nabożeństwo...'>".$row['content']."</textarea>";
                        echo "</div>";
                    }

                    echo "<input type='hidden' name='kalendariumtimeeventcounter' id='kalendariumtimeeventcounter' value='0'>";
                    $conn->close();
                ?>

            </div>
            <button type="button" onclick="insertTimeEvent()" class="insert"><i class="fas fa-plus"></i>Dodaj</button>
            <button type="button" onclick="removeTimeEvent()" class="remove"><i class="fas fa-minus"></i>Usuń</button><br>
        </div>
        <input type='submit' value='Zatwierdź' id="save" onclick="checkCorrect()">

    </form>

    <?php include("footer/footer.php");?>
    
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <script src="scripts/edytujkalendarium.js"></script>
</body>
</html>