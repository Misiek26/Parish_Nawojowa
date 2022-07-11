<?php
	session_start();
    
    if(!$_SESSION['loginadmin']==true){
        header('Location: admin/index.php');
    }

    // Save text from file ogloszeniaCopy.php in memory

    $ogloszeniaContent = fopen("ogloszeniaCopy.php", "r+") or die("Nie udało się otworzyć pliku...");
    $arr = array();
    $arrlength = 0;
    while(!feof($ogloszeniaContent)) {
        
        $arr[$arrlength] = fgets($ogloszeniaContent);

        $arrlength++;
    }
    fclose($ogloszeniaContent);

    // Write text from memory to file ogloszenia.php
    $ogloszeniaContent = fopen("ogloszenia.php", "r+") or die("Nie udało się otworzyć pliku...");
    file_put_contents("ogloszenia.php", "");
    $i = 0;
        
    while($i < $arrlength) {
        fwrite($ogloszeniaContent, $arr[$i]);
        $i++;
    }

    fclose($ogloszeniaContent);

    header('Location:index.php');
?>