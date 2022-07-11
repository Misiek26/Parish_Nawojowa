let counter = 1;

function insertInput(){
    counter++;
    let input = document.createElement("textarea");
    input.setAttribute("name", "ogloszenie" + counter);
    input.setAttribute("id", "ogloszenie" + counter);
    input.setAttribute("placeholder", "Ogłoszenie " + counter);
    
    let wrapper = document.createElement("div");
    wrapper.setAttribute("class", "ogloszenieWrapper");
    wrapper.setAttribute("id", "ogloszenieWrapper" + counter);

    let header = document.createElement("div");
    header.setAttribute("class", "ogloszenieHeader");
    header.textContent = "Ogłoszenie " + counter;

    wrapper.append(header, input);
    editor.append(wrapper);
    document.getElementById('Count').value = counter;

    createEditorElement(input.id);
}
function removeInput(){
    if(counter>1){
        document.getElementById("ogloszenieWrapper" + counter).remove();
        counter--;
        document.getElementById('Count').value = counter;
    }
}
function clearInputs(){
    for (let i = 2; i <= counter; i++)
        document.getElementById("ogloszenieWrapper" + i).remove();

    counter = 1;
    document.getElementById('Count').value = counter;
    document.getElementById('ogloszenie1').value="";
}
function checkCorrect(){
    let empty = false;
    if(document.querySelector("#editor .ck-placeholder")){
        empty = true;
    }
        
    if(empty == true || document.getElementById("headingText").value == ""){
        window.alert("Uwaga!\nJedno z pól pozostało puste. Upewnij się czy wszystko zostało dobrze zaaktualizowane!");
        empty = false;
    }
}

/*Create text editor for chosen element*/

function createEditorElement(textareaId){
    ClassicEditor.
        create( document.querySelector( "#"+textareaId) )
        .catch( error => {
            console.error( error );
        } );
}