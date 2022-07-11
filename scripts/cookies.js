function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
function checkCookie(){
    let cookie = getCookie("cookies");

    if (cookie == "") {
        setCookie("cookies", "false", 100);
    } 

    if(cookie == "true"){
        hideCookies();
        setCookie("cookies", "true", 100);
    }
    else
        showCookies();
}

function acceptCookies(){
    setCookie("cookies", "true", 100);
    hideCookies();
}

function hideCookies(){
    document.getElementById('cookies').style.display='none';
}

function showCookies(){
    document.getElementById('cookies').style.display='block';
}

checkCookie();