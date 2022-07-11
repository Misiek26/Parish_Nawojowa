<?php
    session_start();

    if(!$_SESSION['loginadmin']==true){
        header('Location: admin/index.php');
    }

    require_once "connect.php";
    
    $days = array("poniedzialek", "wtorek", "sroda", "czwartek", "piatek", "sobota", "niedziela", "niedziela_kaplice");

    $conn = new mysqli($host, $db_user, $db_password, $db_name);

    //Change content table niedziela to niedziela_poprzednia
    
    $conn -> set_charset("utf8");

    $downloadNiedziela = "SELECT * FROM niedziela WHERE id";
    $niedziela = $conn->query($downloadNiedziela);

    if($niedziela == FALSE){
        echo "Nie udało się pobrać intencji z niedzieli.";
    }

    if($conn->query("TRUNCATE niedziela_poprzednia") == FALSE){
        echo "Nie można wyczyścić tabeli z poprzedniej niedzieli.";
    }
    
    while($result = mysqli_fetch_array($niedziela)){
        
        if($conn->query("INSERT INTO niedziela_poprzednia VALUES ('','".$result['hour']."','".$result['content']."');") == false){
            echo "Nie udało się zapisać intencji w tabeli niedziela_poprzednia";
            break;
        }
    }

    $downloadNiedzielaKaplice = "SELECT * FROM niedziela_kaplice WHERE id";
    $niedzielaKaplice = $conn->query($downloadNiedzielaKaplice);

    if($niedzielaKaplice == FALSE){
        echo "Nie udało się pobrać intencji z niedziela_kaplice.";
    }

    if($conn->query("TRUNCATE niedziela_kaplice_poprzednia") == FALSE){
        echo "Nie można wyczyścić tabeli z poprzedniej niedzieli_kaplice.";
    }
    
    while($result = mysqli_fetch_array($niedzielaKaplice)){
        
        if($conn->query("INSERT INTO niedziela_kaplice_poprzednia VALUES ('','".$result['hour']."','".$result['content']."');") == false){
            echo "Nie udało się zapisać intencji w tabeli niedziela_kaplice_poprzednia";
            break;
        }
    }

    $downloadHeading = "SELECT * FROM heading WHERE id>6";
    $heading = $conn->query($downloadHeading);

    if($heading == FALSE){
        echo "Nie udało się pobrać nagłówków z heading.";
    }

    if($conn->query("TRUNCATE heading_poprzednia") == FALSE){
        echo "Nie można wyczyścić tabeli z poprzednimi nagłówkami.";
    }
    
    while($result = mysqli_fetch_array($heading)){
        
        if($conn->query("INSERT INTO heading_poprzednia VALUES ('','".$result['color']."','".$result['content']."');") == false){
            echo "Nie udało się zapisać nagłówków w tabeli heading_poprzednia";
            break;
        }
    }
    
    //Truncate tables from database

    if($conn->query("TRUNCATE heading;") == FALSE){
        echo "Nie można wyczyścić tabeli z nagłówkami.";
    }

    if($conn->query("TRUNCATE title") == FALSE){
        echo "Nie można wyczyścić tabeli z tytułem.";
    }

    for($i = 0; $i < 8; $i++){
        if($conn->query("TRUNCATE ".$days[$i].";") == FALSE){ 
            echo "Nie można wyczyścić tabeli z intencjami-> ".$days[$i];
        }
    }

    //Save intencje to tables

    if($conn->query("INSERT INTO title VALUES('1','".$_SESSION['headingText']."');") == FALSE){
        echo "Nie udało się zapisać wartości do tabeli title.";
    }

    for($i = 1; $i <= 8; $i++){
        $heading = "INSERT INTO heading VALUES ('','".$_SESSION['selectheadingcolor'.(string)$i]."','".$_SESSION['intencjeheading'.(string)$i]."',".$i.");";
        if($conn->query($heading) == FALSE){
            echo "Nie udało się zapisać wartości do tabeli heading-> ".$days[$i-1];
        }

        for($j = 1; $j<=$_SESSION["counter".(string)$i]; $j++){
            $content = "INSERT INTO ".$days[$i-1]." VALUES ('','".$_SESSION['intencjecontent'.(string)$i.'hour'.(string)$j]."','".$_SESSION['intencjecontent'.(string)$i.'intencja'.(string)$j]."');";
            if($conn->query($content) == FALSE){
                echo "Nie udało się zapisać intencji do tabeli-> ".$days[$i-1];
                break;
            }
        }
    }
    $conn->close();
    header('Location:index.php');
?>