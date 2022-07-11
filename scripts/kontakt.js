
/*Large Responsive*/

function showContact(){
    var contact = document.getElementById('footer');
    var h2 = document.getElementById('footerH2');
    var close = document.getElementById('close');
    var body = document.getElementById('body');

    window.scrollTo({top:0,left:0})
    
    contact.style.transition = "2s";
    contact.style.position = "absolute";
    contact.style.height = "100%";
    contact.style.backgroundColor = "rgba(10,10,10,0.9)";
    contact.style.paddingTop = "15vw";
    contact.style.fontSize = "2.3vw";
    h2.style.fontSize = '5vw';
    close.style.display = "block";
    close.style.position = "absolute";
    close.style.top = "3%";
    close.style.right = "6%";
    body.style.overflow = "hidden";
}

function closeContact(){
    var contact = document.getElementById('footer');
    var h2 = document.getElementById('footerH2');
    var close = document.getElementById('close');
    var body = document.getElementById('body');

    contact.style.position = "relative";
    contact.style.backgroundColor = "#262626";
    contact.style.padding = "4vw";
    contact.style.fontSize = "1.1vw";
    h2.style.fontSize = "2.6vw";
    close.style.display = "none";
    body.style.overflow = "scroll";
}

/*Small Responsive*/

function smallShowContact(){
    var contact = document.getElementById('footer');
    var h2 = document.getElementById('footerH2');
    var close = document.getElementById('close2');
    var body = document.getElementById('body');

    window.scrollTo({top:0,left:0})
    
    contact.style.transition = "2s";
    contact.style.position = "absolute";
    contact.style.height = "100%";
    contact.style.backgroundColor = "rgba(10,10,10,0.9)";
    contact.style.paddingTop = "45vw";
    contact.style.fontSize = "3.5vw";
    h2.style.fontSize = '5vw';
    close.style.display = "block";
    close.style.position = "absolute";
    close.style.top = "3%";
    close.style.right = "6%";
    body.style.overflow = "hidden";
}

function smallCloseContact(){
    var contact = document.getElementById('footer');
    var h2 = document.getElementById('footerH2');
    var close = document.getElementById('close2');
    var body = document.getElementById('body');

    contact.style.position = "relative";
    contact.style.backgroundColor = "#262626";
    contact.style.padding = "5vw";
    contact.style.fontSize = "3.4vw";
    h2.style.fontSize = "5.5vw";
    close.style.display = "none";
    body.style.overflow = "scroll";
}