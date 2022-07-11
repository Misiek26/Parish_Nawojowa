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

    <title>Edycja Mszy Świętych</title>
    
    <script src="https://kit.fontawesome.com/e5a12dc02e.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="styles/fonts.css">
    <link rel="stylesheet" href="styles/edytujmsze.css">
    <link rel="icon" href="images/icon.png">

</head>
<body>
    <h1>EDYTUJ MSZE ŚWIĘTE</h1>
    <form action='zatwierdzmsze.php' method='get'>

        <h2>Wybierz część roku</h2>
        <div class="title">
            <span>
                <input type="radio" name="1" id="usual" value="MSZE ŚWIĘTE" checked>
                <label for="usual">Okres zwykły</label>
            </span>
            <span>
                <input type="radio" name="1" id="holiday" value="MSZE ŚWIĘTE<br>(OKRES WAKACYJNY)">
                <label for="holiday">Okres wakacyjny</label>
            </span>
        </div><br>

        <h2>Godziny Mszy Świętych</h2>
        

        <div class="hours">
            <?php
                require_once "connect.php";
                        
                $conn = new mysqli($host, $db_user, $db_password, $db_name_counter);
                $conn->query("SET CHARSET utf8");
                $conn->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 

                $sql = "SELECT * FROM msze;";
                $result = $conn->query($sql);
                
                while($row = $result->fetch_assoc()){
                    if($row['id']==1){
                        echo "<h4>Niedziele i święta</h4>";
                        continue;
                    }

                    if($row['id']=="7"){
                        echo "<h4>Dni powszednie</h4>";
                    }
                    
                    echo "<div>";
                    echo "<label for='".$row['id']."'>".$row['naglowek']."</label>";
                    echo "<input id='".$row['id']."' name='".$row['id']."' value='".$row['zawartosc']."'>";
                    echo "</div>";
                }

                $conn->close();
            ?>
        </div>

        <input type='button' value='Zatwierdź' id="save">
    </form>

    <?php include("footer/footer.php");?>
    
    <!--Communicat will display when user confirm operation-->

    <script>
        let confirm = document.getElementById('save');

        confirm.addEventListener('click', ()=>{
            if(window.confirm("Czy na pewno chcesz zmienić rozpiskę Mszy Świętych?")){
                document.querySelector('form').submit();
            }
        })
    </script>

</body>
</html>