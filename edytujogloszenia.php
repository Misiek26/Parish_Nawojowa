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

    <title>Edycja ogłoszeń</title>
    
    <script src="https://kit.fontawesome.com/e5a12dc02e.js" crossorigin="anonymous"></script>
    <script src="scripts/edytujogloszenia.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

    <link rel="stylesheet" href="styles/fonts.css">
    <link rel="stylesheet" href="styles/edytujogloszenia.css?3">
    <link rel="icon" href="images/icon.png">

</head>
<body>
    <h1>EDYTUJ OGŁOSZENIA</h1>
    <form action='zatwierdzogloszenia.php' method='get' id="form">
        
        <!--Ogłoszenia parafialne-->

        <h2>Tytuł ogłoszeń</h2>

        <input type='text' name="headingText" id="headingText" placeholder='Np. XXII NIEDZIELA ZWYKŁA - 29.08.2021R'><br>
      
        <h2>Treść ogłoszeń</h2>
        
        <div id="contentOgloszenia">
            <div id="editor">
                <div id="ogloszenieWrapper1" class="ogloszenieWrapper">
                    <div class="ogloszenieHeader">
                        Ogłoszenie 1
                    </div>
                    <textarea name="ogloszenie1" id="ogloszenie1" placeholder="Ogłoszenie 1"></textarea>
                </div>
            </div>
        </div>

        <input type="hidden" name="count" id="Count" value=1>
        <button type="button" onclick="insertInput()" id="insert"><i class="fas fa-plus"></i>Dodaj</button>
        <button type="button" onclick="removeInput()" id="remove"><i class="fas fa-minus"></i>Usuń</button>
        <button type="button" onclick="clearInputs()" id="clear"><i class="fas fa-times"></i>Wyczyść</button><br>

        <!--Ogłoszenia nadesłane-->

        <h2>Ogłoszenia nadesłane</h2>

        <div id="contentOgloszeniaNadeslane">
            <div id="nadeslane">
                <div class="ogloszenieWrapper">
                    <textarea name="ogloszenieNadeslane" id="ogloszenieNadeslane" placeholder="Treść ogłoszenia"></textarea>
                </div>
            </div>
        </div>
        <br>

        <input type='submit' value='Zatwierdź' id="save" onclick="checkCorrect()">

        <script>
            ClassicEditor.
                create( document.querySelector( '#ogloszenie1' ) )
                .catch( error => {
                    console.error( error );
                } );

            ClassicEditor.
                create( document.querySelector( '#ogloszenieNadeslane' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
    </form>

    <?php include("footer/footer.php");?>

</body>
</html>