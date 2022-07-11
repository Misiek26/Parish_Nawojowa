<?php
    session_start();
    
    if(!$_SESSION['loginadmin']==true){
        header('Location: admin/index.php');
    }

    $id = $_GET['id'];
    $action = $_GET['action'];

    require_once "connect.php";
            
    $conn = new mysqli($host, $db_user, $db_password, $db_name_counter);
    $conn->query("SET CHARSET utf8");
    $conn->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
    
    $result = $conn->query("SELECT title, content FROM komunikaty WHERE id='".$id."';");
    $row = $result->fetch_assoc();

    if($action=="title"){
        $_SESSION['title'] = $row['title'];
    }
    else{
        echo "<input type='hidden' name='action' value='edit'>";
        echo "<input type='hidden' name='id' value='".$id."'>";
        echo "<div class='editcontent'>";
        echo "<h2>Tytuł komunikatu</h2>";
        echo "<input id='title' name='headingText' placeholder='Np. Komunikat Biskupa Tarnowskiego' value='".$_SESSION['title']."'>";
        echo "<h2>Treść komunikatu</h2>";
        echo "<textarea id='content' name='komunikat'>".$row['content']."</textarea>";
        echo "</div>";
        echo "<input type='submit' value='Zatwierdź' id='save'>";
    }

    $conn->close();
?>