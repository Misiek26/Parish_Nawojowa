<?php
    session_start();

    if(!$_SESSION['loginadmin']==true){
        header('Location: admin/index.php');
    }   
    
    require_once "connect.php";
                                
    $conn = new mysqli($host, $db_user, $db_password, $db_name_counter);
    $conn->query("SET CHARSET utf8");
    $conn->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
    
    for($i=1; $i<=6; $i++){
        $sql = "UPDATE kancelaria SET content = '".$_GET["kancelaria$i"]."' WHERE id=$i;"; 
        $conn->query($sql);
    }

    $conn->close();

    header('Location:kancelaria.php');
?>