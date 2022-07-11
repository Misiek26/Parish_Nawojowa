<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Nie znaleziono strony</title>
    
    <link rel="stylesheet" href="styles/fonts.css">
    <link rel="icon" href="images/icon.png">

    <style>
        *{
            font-family:'Roboto';
            text-align:center;
        }
        body{
            margin-top:10vw;
        }
        #error{
            font-size:5vw;
            font-family:'Roboto Bold';
            border:1px solid black;
            width:30%;
            margin:auto;
            padding:3vw;
            color:#ef4444;
        }
        @media screen and (max-width:800px){
            body{
                margin-top:30vw;
            }
            #error{
                font-size:12vw;
                width:90%;
            }
            h1{
                font-size:7vw;
            }
            h2{
                font-size:6.5vw;
            }
        }
    </style>
</head>
<body>
    <div id="error">Error 404</div>
    <h1>Nie znaleziono strony o podanym adresie</h1>
    <h2>Przejdź do strony głównej -> <a href="https://parafianawojowa.com.pl/">Strona Główna</a></h2>
    <div id="date"></div>
    <script>
        function displayDate(){
            let date = new Date();
            
            weekday=["Niedziela", "Poniedziałek", "Wtorek", "Środa", "Czwartek", "Piątek", "Sobota"];
            months=["styczeń", "luty", "marzec", "kwiecień", "maj", "czerwiec", "lipiec", "sierpień", "wrzesień", "październik", "listopad", "grudzień"];

            let seconds = date.getSeconds().toString();
            let minutes = date.getMinutes().toString();
            let hours = date.getHours().toString();
            if(seconds<10)
                seconds = "0" + seconds;
            if(minutes<10)
                minutes = "0" + minutes;
            if(hours<10)
                hours = "0" + hours;

            document.getElementById("date").innerHTML = weekday[date.getDay()] + ", " + date.getDate() + " " + months[date.getMonth()] + " " + date.getFullYear() + " " + hours + ":" + minutes + ":" + seconds;
        }

        displayDate();

        setInterval(displayDate, 1000)
    </script>
</body>
</html>