<?php
    session_start();
        
    if(!$_SESSION['loginadmin']==true){
        header('Location: admin/index.php');
    }
    
    for($i=0; $i<8; $i++){
        $_SESSION['counter'.(string)($i+1)] = $_POST['counter'.(string)($i+1)];
        echo $_SESSION['counter'.(string)($i+1)];
    }
    
    $_SESSION['headingText'] = $_POST['headingText'];

    for($i=0; $i<8; $i++){

        $_SESSION['intencjeheading'.(string)($i+1)] = $_POST['intencjeheading'.(string)($i+1)];
        
        $_SESSION['selectheadingcolor'.(string)($i+1)] = $_POST['selectheadingcolor'.(string)($i+1)];

        for($j=0; $j<(int)$_SESSION['counter'.(string)($i+1)]; $j++){

            $_SESSION['intencjecontent'.(string)($i+1).'hour'.(string)($j+1)] = $_POST['intencjecontent'.(string)($i+1).'hour'.(string)($j+1)];
            
            $_SESSION['intencjecontent'.(string)($i+1).'intencja'.(string)($j+1)] = $_POST['intencjecontent'.(string)($i+1).'intencja'.(string)($j+1)];
            
        }
    }
    header('Location: zatwierdzintencje.php');
?>