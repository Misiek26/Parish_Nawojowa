function parafia()
{
    document.getElementById('parafia').style.display='block';
    document.getElementById('menu').style.display='none';
    document.getElementById('duszpasterstwo').style.display='none';
}

function grupy(){
    document.getElementById('duszpasterstwo').style.display='block';
    document.getElementById('parafia').style.display='none';
    document.getElementById('menu').style.display='none';
}

function sakramenty(){
    document.getElementById('menu').style.display='block';
    document.getElementById('parafia').style.display='none';
    document.getElementById('duszpasterstwo').style.display='none';
}

function hiden(){
    document.getElementById('menu').style.display='none';
    document.getElementById('parafia').style.display='none';
    document.getElementById('duszpasterstwo').style.display='none';
}

/*Mobile Menu*/

function mobileMenuShow(){
    document.getElementById('mobile-nav-content').style.display='block';
}
function mobileMenuHiden(){
    document.getElementById('mobile-nav').style.display='block';
    document.getElementById('mobile-nav-content').style.display='none';
}

/*Parafia Menu Mobile*/

function parafiaMobile(){
    var toggle = document.getElementById("parafia-mobile");

    if (toggle.style.display != "block") {
        toggle.style.display = "block";
    } else {
        toggle.style.display = "none";
    }
}

/*Sakramenty Menu Mobile*/

function sakramentyMobile(){
    var toggle = document.getElementById("sakramenty-mobile");
    
    if (toggle.style.display != "block") {
        toggle.style.display = "block";
    } else {
        toggle.style.display = "none";
    }
}

/*Duszpasterstwo Menu Mobile*/

function duszpasterstwoMobile(){
    var toggle = document.getElementById("duszpasterstwo-mobile");
    
    if (toggle.style.display != "block") {
        toggle.style.display = "block";
    } else {
        toggle.style.display = "none";
    }
}
