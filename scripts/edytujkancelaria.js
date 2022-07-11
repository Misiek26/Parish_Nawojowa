for(let i=1; i<=6; i++){
    ClassicEditor.
        create( document.querySelector( '#kancelaria'+i ) )
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
