//Edit komunikat scripts

function selectKomunikat(id){
    let request = new XMLHttpRequest();
    request.open('GET', 'wybierzkomunikat.php?id=' + id + '&action=title', false);
    request.send();
    document.querySelector('form').innerHTML = request.responseText;

    request = new XMLHttpRequest();
    request.open('GET', 'wybierzkomunikat.php?id=' + id + '&action=content', false);
    request.send();
    document.querySelector('form').innerHTML += request.responseText;
    
    ClassicEditor.
        create( document.querySelector( "#content" ) )
        .catch( error => {
            console.error( error );
        } );
}

//Delete komunikat scripts

function selectDeleteKomunikat(id){
    let title = document.getElementById(id).innerText;
    let content = document.getElementById('content'+id).value;
    location.href="zatwierdzkomunikaty.php?id="+id+"&headingText="+title+"&komunikat="+content+"&action=delete";
}