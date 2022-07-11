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

    <title>Edycja kancelarii</title>
    
    <script src="https://kit.fontawesome.com/e5a12dc02e.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="styles/fonts.css">
    <link rel="stylesheet" href="styles/edytujkancelaria.css">
    <link rel="icon" href="images/icon.png">
</head>
<body>
    <h1>EDYTUJ KANCELARIA</h1>
    <form action='zatwierdzkancelaria.php' method='get' id="form">

        <h2>Treść strony do edycji</h2>
        
        <div id="contentOgloszenia">
            <div id="editor">
            <?php
                require_once "connect.php";
                                
                $conn = new mysqli($host, $db_user, $db_password, $db_name_counter);
                $conn->query("SET CHARSET utf8");
                $conn->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 

                $sql = "SELECT * FROM kancelaria;";
                $result = $conn->query($sql);
                
                while($row = $result->fetch_assoc()){
                    echo "<div id='kancelariaWrapper".$row['id']."' class='kancelariaWrapper'>";
                    echo "<div class='kancelariaHeader'>";
                    echo $row['title'];
                    echo "</div>";
                    echo "<textarea name='kancelaria".$row['id']."' id='kancelaria".$row['id']."' placeholder='".$row['title']."'>".$row['content']."</textarea>";
                    echo "</div>";
                }

                $conn->close();
            ?>
            </div>
        </div>
        <input type='submit' value='Zatwierdź' id="save" onclick="checkCorrect()">

    </form>

    <?php include("footer/footer.php");?>
    
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <script src="scripts/edytujkancelaria.js"></script>
</body>
</html>