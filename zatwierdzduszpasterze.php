<?php
    require_once "connect.php";

    session_start();
        
    if(!$_SESSION['loginadmin']==true){
        header('Location: admin/index.php');
    }
                                
    $conn = new mysqli($host, $db_user, $db_password, $db_name_counter);
    $conn->query("SET CHARSET utf8");
    $conn->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
    $conn->query("TRUNCATE duszpasterze;"); 

    $length = count($_GET);

    for($i=1; $i<=$length; $i++){
        if($i==1){
            $sql = "INSERT INTO duszpasterze VALUES('','".$_GET["duszpasterz$i"]."', 'pastor');";
        }
        else if($i==2){
            $sql = "INSERT INTO duszpasterze VALUES('','".$_GET["duszpasterz$i"]."', 'senior');";
        }
        else{
            $sql = "INSERT INTO duszpasterze VALUES('','".$_GET["duszpasterz$i"]."', 'curate');";            
        }
        $conn->query($sql);
    }

    $conn->close();

    header('Location:duszpasterze.php');
?>