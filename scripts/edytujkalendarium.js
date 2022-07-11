ClassicEditor.
create( document.querySelector( '#kalendarium1' ) )
.catch( error => {
    console.error( error );
} );

let lengthevent = document.getElementsByClassName('day').length + 1;
document.getElementById('kalendariumcounter').value = lengthevent;

for(let i=2; i<=lengthevent; i++){
    ClassicEditor.
        create( document.querySelector( '#day'+i ) )
        .catch( error => {
            console.error( error );
        } );
    
    ClassicEditor.
        create( document.querySelector( '#kalendarium'+i ) )
        .catch( error => {
            console.error( error );
        } );
}

let lengthtimeevent = document.getElementsByClassName('timeevent').length;
document.getElementById('kalendariumtimeeventcounter').value = lengthtimeevent;

for(let i=1; i<=lengthtimeevent; i++){
    ClassicEditor.
        create( document.querySelector( '#nabozenstwo'+i ) )
        .catch( error => {
            console.error( error );
        } );
}

function checkCorrect(){
    let empty = false;
    if(document.querySelector("#editor .ck-placeholder")){
        empty = true;
    }
        
    if(empty == true ){
        window.alert("Uwaga!\nJedno z pól pozostało puste. Upewnij się czy wszystko zostało dobrze zaaktualizowane!");
        empty = false;
    }
}

function insertKalendarium(){
    lengthevent++;
    document.getElementById('kalendariumcounter').value = lengthevent;
    let container = document.getElementById('kalendariumeditor');

    let day = document.createElement("textarea");
    day.setAttribute("name", "day" + lengthevent);
    day.setAttribute("id", "day" + lengthevent);
    day.setAttribute("class", "day");
    day.setAttribute("placeholder", "Data...");
    
    let daycontainer = document.createElement("div");
    daycontainer.setAttribute("class", "daycontainer");
    daycontainer.append(day);

    let content = document.createElement("textarea");
    content.setAttribute("name", "kalendarium" + lengthevent);
    content.setAttribute("id", "kalendarium" + lengthevent);
    content.setAttribute("class", "kalendarium");
    content.setAttribute("placeholder", "Kalendarium...");

    let kalendariumcontainer = document.createElement("div");
    kalendariumcontainer.setAttribute("class", "kalendariumcontainer");
    kalendariumcontainer.append(content);
    
    let wrapper = document.createElement("div");
    wrapper.setAttribute("id", "kalendariumWrapper" + lengthevent);
    wrapper.setAttribute("class", "kalendariumWrapper");

    wrapper.append(daycontainer, kalendariumcontainer);
    container.append(wrapper);

    ClassicEditor.
        create( document.querySelector( '#day'+lengthevent ) )
        .catch( error => {
            console.error( error );
        } );

    ClassicEditor.
        create( document.querySelector( '#kalendarium'+lengthevent ) )
        .catch( error => {
            console.error( error );
        } ); 
}

function removeKalendarium(){
if(lengthevent>1){
    document.getElementById("kalendariumWrapper" + lengthevent).remove();
    lengthevent--;
    document.getElementById('kalendariumcounter').value = lengthevent;
}
}

function insertTimeEvent(){
    lengthtimeevent++;
    document.getElementById('kalendariumtimeeventcounter').value = lengthtimeevent;
    let container = document.getElementById('editor');

    let input = document.createElement("textarea");
    input.setAttribute("name", "nabozenstwo" + lengthtimeevent);
    input.setAttribute("id", "nabozenstwo" + lengthtimeevent);
    input.setAttribute("class", "timeevent");
    input.setAttribute("placeholder", "Nabożeństwo...");

    let wrapper = document.createElement("div");
    wrapper.setAttribute("id", "kalendariumWrapperTimeEvent" + lengthtimeevent);
    wrapper.setAttribute("class", "kalendariumWrapper");

    wrapper.append(input);
    container.append(wrapper);

    ClassicEditor.
        create( document.querySelector( '#nabozenstwo'+lengthtimeevent ) )
        .catch( error => {
            console.error( error );
        } ); 
}

function removeTimeEvent(){
    if(lengthtimeevent>1){
        document.getElementById("kalendariumWrapperTimeEvent" + lengthtimeevent).remove();
        lengthtimeevent--;
        document.getElementById('kalendariumtimeeventcounter').value = lengthtimeevent;
    }
}