let length = document.getElementsByClassName('duszpasterzeWrapper').length;

for(let i=1; i<=length; i++){
    ClassicEditor.
        create( document.querySelector( '#duszpasterz'+i ) )
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

function insertInput(){
    length++;
    let container = document.getElementById('editor');

    let input = document.createElement("textarea");
    input.setAttribute("name", "duszpasterz" + length);
    input.setAttribute("id", "duszpasterz" + length);
    input.setAttribute("placeholder", "Duszpasterz...");
    
    let header = document.createElement("div");
    header.setAttribute("class", "duszpasterzeHeader");

    let wrapper = document.createElement("div");
    wrapper.setAttribute("id", "duszpasterzeWrapper" + length);
    wrapper.setAttribute("class", "duszpasterzeWrapper");

    wrapper.append(header, input);
    container.append(wrapper);

    ClassicEditor.
        create( document.querySelector( '#duszpasterz'+length ) )
        .catch( error => {
            console.error( error );
        } );
}

function removeInput(){
if(length>3){
    document.getElementById("duszpasterzeWrapper" + length).remove();
    length--;
}
}