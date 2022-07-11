<?php
    session_start();

    if(!$_SESSION['loginadmin']==true){
        header('Location: admin/index.php');
    }

    require_once "connect.php";
                                
    $conn = new mysqli($host, $db_user, $db_password, $db_name_counter);
    $conn->query("SET CHARSET utf8");
    $conn->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
    $conn->query("TRUNCATE kalendarium;"); 

    $lengthkalendarium = (int)$_POST['kalendariumcounter'];
    $lengthkalendariumtimeevent = (int)$_POST['kalendariumtimeeventcounter'];
    var_dump($lengthkalendariumtimeevent);

    for($i=1; $i<=$lengthkalendarium; $i++){
        if($i==1){
            $sql = "INSERT INTO kalendarium VALUES('','-', '".$_POST["kalendarium1"]."', 'title');";
        }
        else{
            $sql = "INSERT INTO kalendarium VALUES('','".$_POST["day$i"]."', '".$_POST["kalendarium$i"]."', 'event');";            
        }
        $conn->query($sql);
    }

    for($i=1; $i<=$lengthkalendariumtimeevent; $i++){
        $sql = "INSERT INTO kalendarium VALUES('', '-', '".$_POST["nabozenstwo$i"]."', 'time_event');";            
        
        $conn->query($sql);
    }

    $conn->close();

    header('Location:kalendarium.php');
?>