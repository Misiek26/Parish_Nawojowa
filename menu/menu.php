<link rel="stylesheet" href="menu/style.css">
<script src="menu/script.js?1"></script>

<nav>
    <ul>
        <a href="index.php"><li onmouseover=hiden()>Strona Główna</li></a>
        <li onclick= parafia() onmouseover=parafia()>Parafia <i class="fas fa-caret-down" style="font-size:1.4vw;"></i>
            <ul id="parafia">
                <a href="kancelaria.php"><li>Kancelaria</li></a>
                <a href="duszpasterze.php"><li>Duszpasterze</li></a>
                <a href="kalendarium.php"><li>Kalendarium</li></a>
                <a href="stronarobocza.php"><li>Kościół parafialny</li></a>
                <a href="stronarobocza.php"><li>Kaplica w Bączej</li></a>
                <a href="stronarobocza.php"><li>Kaplica w Czaczowie</li></a>
                <a href="stronarobocza.php"><li>Kaplica we Frycowej</li></a>
                <a href="stronarobocza.php"><li>Kaplica w Złotnym</li></a>
            </ul>
        </li>
        <li onclick= sakramenty() onmouseover= sakramenty()> Sakramenty <i class="fas fa-caret-down" style="font-size:1.4vw;"></i>
            <ul id="menu">
                <a href="stronarobocza.php"> <li>Chrzest Święty</li></a>
                <a href="stronarobocza.php"><li>Bierzmowanie</li></a>
                <a href="stronarobocza.php"><li>Eucharystia</li></a>
                <a href="stronarobocza.php"><li>Pokuta</li></a>
                <a href="stronarobocza.php"><li>Namaszczenie Chorych</li></a>
                <a href="stronarobocza.php"><li>Kapłaństwo</li></a>
                <a href="https://drtarnow.pl/"><li>Małżeństwo</li></a>
            </ul>
        </li>
        <a href="komunikaty.php"><li onmouseover=hiden()>Komunikaty</li></a>
        <li onclick= grupy() onmouseover= grupy()> Duszpasterstwo <i class="fas fa-caret-down" style="font-size:1.4vw;"></i>
            <ul id="duszpasterstwo">
                <a href="stronarobocza.php"> <li>Grupa Młodzieżowa</li></a>
                <a href="lso/"><li>Liturgiczna Służba Ołtarza</li></a>
                <a href="stronarobocza.php"><li>Dziewczęca Służba Maryjna</li></a>
                <a href="stronarobocza.php"><li>Papieskie Dzieło Misyjne Dzieci</li></a>
                <a href="stronarobocza.php"><li>Grupa Biblijna</li></a>
                <a href="stronarobocza.php"><li>Odnowa w Duchu Świętym</li></a>
                <a href="stronarobocza.php"><li>Parafialny Zespół Synodalny</li></a>
                <a href="stronarobocza.php"><li>Akcja Katolicka</li></a>
                <a href="stronarobocza.php"><li>Róże Różańcowe</li></a>
                <a href="stronarobocza.php"><li>Chorągiew Św. Jana Pawła II</li></a>
                <a href="stronarobocza.php"><li>Schola Dziecięca</li></a>
            </ul>
        </li>
        <a onclick="showContact()"><li onmouseover=hiden()>Kontakt</li></a>
    </ul>
    <div id="mobile-nav" onclick="mobileMenuShow()">
        <i class="fas fa-bars"></i> MENU
    </div>

    <div id="mobile-nav-content">
        <div class="exit" onclick=mobileMenuHiden()><i class="fa fa-times"></i></div>
        <a href="index.php"><span>STRONA GŁÓWNA</span></a>
        <a onclick="parafiaMobile()"><span>PARAFIA <i class="fa fa-chevron-right"></i></span></a>
        <div id="parafia-mobile" class="mobile-sub-menu">
            <a href="/kancelaria.php"><span>KANCELARIA</span></a>
            <a href="/duszpasterze.php"><span>DUSZPASTERZE</span></a>
            <a href="/kalendarium.php"><span>KALENDARIUM</span></a>
            <a href="/stronarobocza.php"><span>KOŚCIÓŁ PARAFIALNY</span></a>
            <a href="stronarobocza.php"><span>KAPLICA W BĄCZEJ</span></a>
            <a href="stronarobocza.php"><span>KAPLICA W CZACZOWIE</span></a>
            <a href="stronarobocza.php"><span>KAPLICA WE FRYCOWEJ</span></a>
            <a href="stronarobocza.php"><span>KAPLICA W ZŁOTNYM</span></a>
        </div>
        <a onclick="sakramentyMobile()"><span>SAKRAMENTY <i class="fa fa-chevron-right"></i></span></a>
        <div id="sakramenty-mobile" class="mobile-sub-menu">
            <a href="stronarobocza.php"><span>CHRZEST ŚWIĘTY</span></a>
            <a href="stronarobocza.php"><span>BIERZMOWANIE</span></a>
            <a href="stronarobocza.php"><span>EUCHARYSTIA</span></a>
            <a href="stronarobocza.php"><span>POKUTA</span></a>
            <a href="stronarobocza.php"><span>NAMASZCZENIE CHORYCH</span></a>
            <a href="stronarobocza.php"><span>KAPŁAŃSTWO</span></a>
            <a href="https://drtarnow.pl/"><span>MAŁŻEŃSTWO</span></a>
        </div>
        <a href="komunikaty.php"><span>KOMUNIKATY</span></a>
        <a onclick="duszpasterstwoMobile()"><span>DUSZPASTERSTWO <i class="fa fa-chevron-right"></i></span></a>
        <div id="duszpasterstwo-mobile" class="mobile-sub-menu">
            <a href="stronarobocza.php"><span>GRUPA MŁODZIEŻOWA</span></a>
            <a href="lso/"><span>LITURGICZNA SŁUŻBA OŁTARZA</span></a>
            <a href="stronarobocza.php"><span>DZIEWCZĘCA SŁUŻBA MARYJNA</span></a>
            <a href="stronarobocza.php"><span>PAPIESKIE DZIEŁO MISYJNE DZIECI</span></a>
            <a href="stronarobocza.php"><span>GRUPA BIBLIJNA</span></a>
            <a href="stronarobocza.php"><span>ODNOWA W DUCHU ŚWIĘTYM</span></a>
            <a href="stronarobocza.php"><span>PARAFIALNY ZESPÓŁ SYNODALNY</span></a>
            <a href="stronarobocza.php"><span>AKCJA KATOLICKA</span></a>
            <a href="stronarobocza.php"><span>RÓŻE RÓŻAŃCOWE</span></a>
            <a href="stronarobocza.php"><span>CHORĄGIEW ŚW. JANA PAWŁA II</span></a>
            <a href="stronarobocza.php"><span>SCHOLA DZIECIĘCA</span></a>
        </div>
        <a onclick="smallShowContact(), mobileMenuHiden()"><span>KONTAKT</span></a>
    </div>
</nav>