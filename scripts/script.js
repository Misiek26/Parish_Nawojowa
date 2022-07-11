var headerImg = 1;

function oltarz1(){
    document.getElementById('header').style.backgroundImage = "url('styles/images/oltarz1.jpg')";
}

function oltarz2(){
    document.getElementById('header').style.backgroundImage = "url('images/oltarz2.jpg')";
}

function changeHeaderImage(){
    if(headerImg == 0){
        oltarz1()
        headerImg = 1;
    }
    else{
        oltarz2();
        headerImg = 0;
    }
}

let time = setInterval(changeHeaderImage, 13000);

function showIntencje(){
    document.getElementById('intencjeAll').style.display='block';
    document.getElementById('showAllIntencje').style.display='none';
}

function hideIntencje(){
    document.getElementById('intencjeAll').style.display='none';
    document.getElementById('showAllIntencje').style.display='block';
}

/*Scroll Button*/

function scrollToUp(){
    window.scrollTo(0,0);
}

window.addEventListener('scroll', function(){
    if(window.scrollY<500){
        document.getElementById('moveUp').style.display="none";
    }
    else{
        document.getElementById('moveUp').style.display="block";
    }
})