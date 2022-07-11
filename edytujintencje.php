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

    <title>Edycja intencji</title>
    
    <script src="https://kit.fontawesome.com/e5a12dc02e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

    <link rel="stylesheet" href="styles/fonts.css">
    <link rel="stylesheet" href="styles/edytujintencje.css?7">
    <link rel="icon" href="images/icon.png">

</head>
<body>
    <h1>EDYTUJ INTENCJE</h1>
    <form action='przypisz.php' method='post' id="form">
        <h2>Tytuł intencji</h2>
        <p style="color:#ff0000">Uwaga! Należy wpisać datę intencji zaczynając od poprzedniej niedzieli!</p>
        <input type='text' name="headingText" id="headingText" placeholder='Np. 29.08 – 05.09.2021 r.'><br>
        
        <div id="contentIntencje"></div>

        <input type='submit' value='Zatwierdź' id="save">

    </form>
</body>
<script src="scripts/edytujintencje.js"></script>
</html>