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

    <title>Edycja duszpasterzy</title>
    
    <script src="https://kit.fontawesome.com/e5a12dc02e.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="styles/fonts.css">
    <link rel="stylesheet" href="styles/edytujduszpasterze.css">
    <link rel="icon" href="images/icon.png">
</head>
<body>
    <h1>EDYTUJ DUSZPASTERZY</h1>
    <form action='zatwierdzduszpasterze.php' method='get' id="form">

        <h2>Treść strony do edycji</h2>
        
        <div id="contentOgloszenia">
            <div id="editor">
                <?php
                    require_once "connect.php";
                                    
                    $conn = new mysqli($host, $db_user, $db_password, $db_name_counter);
                    $conn->query("SET CHARSET utf8");
                    $conn->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 

                    $sql = "SELECT * FROM duszpasterze;";
                    $result = $conn->query($sql);
                    
                    while($row = $result->fetch_assoc()){
                        echo "<div id='duszpasterzeWrapper".$row['id']."' class=duszpasterzeWrapper>";
                        echo "<div class='duszpasterzeHeader'>";
                        if($row['id']=='1'){
                            echo "Ksiądz proboszcz";
                        }
                        else if($row['id']=='2'){
                            echo "Senior księży wikariuszy";
                        }
                        else if($row['id']=='3'){
                            echo "Księża wikariusze";
                        }
                        else;

                        echo "</div>";
                        echo "<textarea name='duszpasterz".$row['id']."' id='duszpasterz".$row['id']."' placeholder='Duszpasterz...'>".$row['content']."</textarea>";
                        echo "</div>";
                    }

                    $conn->close();
                ?>

            </div>
            <button type="button" onclick="insertInput()" id="insert"><i class="fas fa-plus"></i>Dodaj</button>
            <button type="button" onclick="removeInput()" id="remove"><i class="fas fa-minus"></i>Usuń</button><br>
        </div>
        <input type='submit' value='Zatwierdź' id="save" onclick="checkCorrect()">

    </form>

    <?php include("footer/footer.php");?>
    
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <script src="scripts/edytujduszpasterze.js"></script>
</body>
</html>