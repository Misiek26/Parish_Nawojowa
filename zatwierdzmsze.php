<?php 
    require_once "connect.php";
    
    session_start();

    if(!$_SESSION['loginadmin']==true){
        header('Location: admin/index.php');
    } 
                        
    $conn = new mysqli($host, $db_user, $db_password, $db_name_counter);
    $conn->query("SET CHARSET utf8");
    $conn->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 

    for($i=1; $i<=8; $i++){
        $sql = "UPDATE msze SET zawartosc='".$_GET["$i"]."' WHERE id='".$i."';";
        $conn->query($sql);
    }

    $conn->close();

    header('Location: index.php');
?>