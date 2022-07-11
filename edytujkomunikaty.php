<?php
    session_start();
        
    if(!$_SESSION['loginadmin']==true){
        header('Location: admin/index.php');
    }
    
    $GLOBALS['action'] = $_SERVER['QUERY_STRING'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edycja komunikatów</title>
    
    <script src="https://kit.fontawesome.com/e5a12dc02e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

    <link rel="stylesheet" href="styles/fonts.css">
    <link rel="stylesheet" href="styles/edytujkomunikaty.css">
    <link rel="icon" href="images/icon.png">

</head>
<body>
    <?php
        switch($GLOBALS['action']){
            case "create":
                echo "<h1>TWORZENIE KOMUNIKATU</h1>";
                break;
            case "edit":
                echo "<h1>EDYTOWANIE KOMUNIKATU</h1>";
                break;
            case "delete":
                echo "<h1>USUWANIE KOMUNIKATU</h1>";
                break;
            default;
        }
    ?>

    <form action='zatwierdzkomunikaty.php' method='get' id="form">

        <?php
            if($GLOBALS['action']=='create'){
                echo '<input type="hidden" name="action" value="create">
                <h2>Tytuł komunikatu</h2>
    
                <input type="text" name="headingText" id="headingText" placeholder="Np. Komunikat Biskupa Tarnowskiego"><br>
            
                <h2>Treść komunikatu</h2>
                
                <div id="contentKomunikat">
                    <div id="editor">
                        <div id="komunikatWrapper" class="komunikatWrapper">
                            <textarea name="komunikat" id="komunikat" placeholder="Komunikat"></textarea>
                        </div>
                    </div>
                </div>
    
                <input type="submit" value="Zatwierdź" id="save" onclick="checkCorrect()">
    
                <script>
                    ClassicEditor.
                        create( document.querySelector( "#komunikat" ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>';
            }
            else if($GLOBALS['action']=='edit'){
                echo '<h2>Wybierz komunikat do edycji</h2>
                <ul>';

                require_once "connect.php";
            
                $conn = new mysqli($host, $db_user, $db_password, $db_name_counter);
                $conn->query("SET CHARSET utf8");
                $conn->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
                
                $result = $conn->query("SELECT id, title FROM komunikaty ORDER BY id DESC;");
                
                while($row = $result->fetch_assoc()){
                    echo "<li onclick='selectKomunikat(id)' id='".$row['id']."'>".$row['title']."</li>";
                }
                echo '</ul>';
                
                $conn->close();
            }
            else if($GLOBALS['action']=='delete'){
                echo '<h2>Wybierz komunikat do usunięcia</h2>
                <ul>';

                require_once "connect.php";
            
                $conn = new mysqli($host, $db_user, $db_password, $db_name_counter);
                $conn->query("SET CHARSET utf8");
                $conn->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
                
                $result = $conn->query("SELECT id, title, content FROM komunikaty ORDER BY id DESC;");
                
                while($row = $result->fetch_assoc()){
                    echo "<input type='hidden' id='content".$row['id']."' value='".$row['content']."'>";
                    echo "<li onclick='selectDeleteKomunikat(id)' id='".$row['id']."'>".$row['title']."</li>";
                }
                echo '</ul>';
                
                $conn->close();
            }

        ?>
    </form>

    <?php include("footer/footer.php");?>
        
    <script src="scripts/edytujkomunikaty.js"></script>
</body>
</html>