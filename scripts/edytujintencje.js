/***********************************************************************************/

//Create default fields
let numberday = 1; 
let dayArr = ["Poniedziałek", "Wtorek", "Środa", "Czwartek", "Piątek", "Sobota", "Niedziela - kościół", "Niedziela - kaplice"];
let contentIntencje = document.getElementById("contentIntencje");

for(let i=0; i<dayArr.length; i++){
    //Create elements
    let intencjeday = document.createElement("div");
    intencjeday.setAttribute("class", "intencjeday");

    let headerday = document.createElement("h2");
    headerday.textContent = dayArr[numberday-1];

    let header = document.createElement("h3");
    header.textContent = "Nagłówek";

    let intencjeheading = document.createElement("textarea");
    intencjeheading.setAttribute("name", "intencjeheading" + numberday);
    intencjeheading.setAttribute("id", "intencjeheading" + numberday);
    intencjeheading.setAttribute("class", "intencjeheading");
    intencjeheading.setAttribute("placeholder", "Dzień i data, np. Poniedziałek 30.08.2021 r.");

    //Create elements headingcolor
    let headingcolor = document.createElement("div");
    headingcolor.setAttribute("class", "headingcolor");

    let headingcolortext = document.createElement("h4");
    headingcolortext.textContent = "Kolor nagłówka";

    let select = document.createElement("select");
    select.setAttribute("id", "select" + numberday);
    select.setAttribute("onclick", "selectColor(this.value, this.id)");

    let defaultcolor = document.createElement("option");
    defaultcolor.setAttribute("value", "#ffffff");
    defaultcolor.textContent = "Wybierz kolor";

    let greencolor = document.createElement("option");
    greencolor.setAttribute("value", "#92d050");
    greencolor.setAttribute("class", "green");
    let spangreen = document.createElement("span");
    spangreen.textContent = "Zielony";
    greencolor.append(spangreen);

    let redcolor = document.createElement("option");
    redcolor.setAttribute("value", "#ff0000");
    redcolor.setAttribute("class", "red");
    let spanred = document.createElement("span");
    spanred.textContent = "Czerwony";
    redcolor.append(spanred);

    let yellowcolor = document.createElement("option");
    yellowcolor.setAttribute("value", "#ffc000");
    yellowcolor.setAttribute("class", "yellow");
    let spanyellow = document.createElement("span");
    spanyellow.textContent = "Żółty";
    yellowcolor.append(spanyellow);

    let purplecolor = document.createElement("option");
    purplecolor.setAttribute("value", "#7030a0");
    purplecolor.setAttribute("class", "purple");
    let spanpurple = document.createElement("span");
    spanpurple.textContent = "Fioletowy";
    purplecolor.append(spanpurple);

    let bluecolor = document.createElement("option");
    bluecolor.setAttribute("value", "#00b0f0");
    bluecolor.setAttribute("class", "blue");
    let spanblue = document.createElement("span");
    spanblue.textContent = "Niebieski";
    bluecolor.append(spanblue);

    select.append(defaultcolor);
    select.append(greencolor);
    select.append(redcolor);
    select.append(yellowcolor);
    select.append(purplecolor);
    select.append(bluecolor);

    let inputcolor = document.createElement("input");
    inputcolor.setAttribute("type", "color");
    inputcolor.setAttribute("name", "selectheadingcolor" + numberday);
    inputcolor.setAttribute("id", "selectheadingcolor" + numberday);
    inputcolor.setAttribute("class", "selectheadingcolor");
    inputcolor.setAttribute("value", "#ffffff");
    inputcolor.setAttribute("ochange", "changeColor(this.value, this.name)");

    headingcolor.append(headingcolortext);
    headingcolor.append(select);
    headingcolor.append(inputcolor);

    //Create elements intencje content
    let intencjewrapper = document.createElement("div");
    intencjewrapper.setAttribute("id", "intencjecontent" + numberday);
    intencjewrapper.setAttribute("class", "intencjewrapper");

    let intencjecontent = document.createElement("div");
    intencjecontent.setAttribute("class", "intencjecontent");

    let hourwrapper = document.createElement("div");
    hourwrapper.setAttribute("class", "hourwrapper");

    let hourtext = document.createElement("h3");
    hourtext.textContent = "Godzina i treść intencji";

    let intencjahour = document.createElement("textarea");
    intencjahour.setAttribute("id", "intencjecontent" + numberday + "hour1");
    intencjahour.setAttribute("name", "intencjecontent" + numberday + "hour1");
    intencjahour.setAttribute("class", "hour");
    intencjahour.setAttribute("placeholder", "Godzina");

    hourwrapper.append(hourtext);
    hourwrapper.append(intencjahour);

    let contentwrapper = document.createElement("div");
    contentwrapper.setAttribute("class", "contentwrapper");

    let contenttextarea = document.createElement("textarea");
    contenttextarea.setAttribute("id", "intencjecontent" + numberday + "intencja1");
    contenttextarea.setAttribute("name", "intencjecontent" + numberday + "intencja1");
    contenttextarea.setAttribute("class", "intencja");
    contenttextarea.setAttribute("placeholder", "Treść intencji");

    contentwrapper.append(contenttextarea);

    intencjecontent.append(hourwrapper);
    intencjecontent.append(contentwrapper);

    intencjewrapper.append(intencjecontent);

    //Create elements buttons

    let buttonsintencje = document.createElement("div");
    buttonsintencje.setAttribute("class", "buttonsintencje");

    let buttoninsert = document.createElement("button");
    buttoninsert.setAttribute("type", "button");
    buttoninsert.setAttribute("onclick", "insertInput(this.id)");
    buttoninsert.setAttribute("id", "insertIntencje" + numberday);
    buttoninsert.setAttribute("class", "buttonintencje");

    let inserticon = document.createElement("i");
    inserticon.setAttribute("class", "fas fa-plus");

    buttoninsert.append(inserticon);

    let buttonremove = document.createElement("button");
    buttonremove.setAttribute("type", "button");
    buttonremove.setAttribute("onclick", "removeInput(this.id)");
    buttonremove.setAttribute("id", "removeIntencje" + numberday);
    buttonremove.setAttribute("class", "buttonintencje");

    let removeicon = document.createElement("i");
    removeicon.setAttribute("class", "fas fa-minus");

    buttonremove.append(removeicon);

    buttonsintencje.append(buttoninsert);
    buttonsintencje.append(buttonremove);

    let inputhidden = document.createElement("input");
    inputhidden.setAttribute("type", "hidden");
    inputhidden.setAttribute("name", "counter" + numberday);
    inputhidden.setAttribute("id", "counter" + numberday);
    inputhidden.setAttribute("value", "1");

    intencjeday.append(headerday);
    intencjeday.append(header);
    intencjeday.append(intencjeheading);
    intencjeday.append(headingcolor);
    intencjeday.append(intencjewrapper);
    intencjeday.append(buttonsintencje);
    intencjeday.append(inputhidden);

    contentIntencje.append(intencjeday);

    numberday++;
}

//Create editor field for intencje headers

let intencjeHeadingArr = document.querySelectorAll('.intencjeheading');
intencjeHeadingArr.forEach(heading=>{
    ClassicEditor.
        create( document.getElementById( heading.id ) )
        .catch( error => {
            console.error( error );
        } );
})

//Create editor field for intencje hours

let intencjeHourArr = document.querySelectorAll('.hour');
intencjeHourArr.forEach(hour=>{
    ClassicEditor.
        create( document.getElementById( hour.id ) )
        .catch( error => {
            console.error( error );
        } );
})

//Create editor field for intencje content

let intencjeContentArr = document.querySelectorAll('.intencja');
intencjeContentArr.forEach(content=>{
    ClassicEditor.
        create( document.getElementById( content.id ) )
        .catch( error => {
            console.error( error );
        } );
})

/***********************************************************************************/
//Scripts using to work on the site

let counter = 1;
let editnumber = 1;
let intencjecounter = [1,1,1,1,1,1,1,1];

//Insert new intencja
function insertInput(id){
    //Number editing day
    editnumber = Number(id.slice(14));
    
    //Number intencje for day
    intencjecounter[editnumber-1]++;
    
    //Elements for intencja wrapper
    let div = document.getElementById('intencjecontent' + editnumber);
    let wrapper = document.createElement("div");
    wrapper.setAttribute("class", "intencjecontent");
    
    /*******Hour**********/
    let hourwrapper = document.createElement("div");
    hourwrapper.setAttribute("class", "hourwrapper");
    
    //Create textarea for hour field
    let hour = document.createElement("textarea");
    hour.setAttribute("name", "intencjecontent" + editnumber +  "hour" + intencjecounter[editnumber-1]);
    hour.setAttribute("id", "intencjecontent" + editnumber +  "hour" + intencjecounter[editnumber-1]);
    hour.setAttribute("class", "hour");
    hour.setAttribute("placeholder", "Godzina");
    hourwrapper.append(hour);
    wrapper.append(hourwrapper);
    div.append(wrapper);

    //Create editor field for hour
    ClassicEditor.
        create( document.getElementById( hour.id ) )
        .catch( error => {
            console.error( error );
        } );

    /*******Content**********/
    
    let contentwrapper = document.createElement("div");
    contentwrapper.setAttribute("class","contentwrapper");

    //Create textarea for content field
    let intencja = document.createElement("textarea");
    intencja.setAttribute("name", "intencjecontent"+ editnumber +  "intencja" + intencjecounter[editnumber-1]);
    intencja.setAttribute("id", "intencjecontent"+ editnumber +  "intencja" + intencjecounter[editnumber-1]);
    intencja.setAttribute("class", "intencja");
    intencja.setAttribute("placeholder", "Treść intencji");
    contentwrapper.append(intencja);
    wrapper.append(contentwrapper);
    div.append(wrapper);

     //Create editor field for content
     ClassicEditor.
     create( document.getElementById( intencja.id ) )
     .catch( error => {
         console.error( error );
     } );

    //Set number intencje for input counter
    document.getElementById("counter" + editnumber).value = intencjecounter[editnumber-1].toString();
}

//Remove last intencja
function removeInput(id){
    editnumber = Number(id.slice(14));
    if(intencjecounter[editnumber-1]>1){
        let decision = confirm("Czy na pewno chcesz usunąć ostatnią intencję?")
        if(decision == true){
            let div = document.getElementById('intencjecontent' + editnumber);
            div.lastChild.remove();
            intencjecounter[editnumber-1]--;

            //Set number intencje for input counter
            document.getElementById("counter" + editnumber).value = intencjecounter[editnumber-1].toString();
        }
    }
}

let selectedcolor = "Wybierz kolor"; 
function selectColor(color, id){
    if(selectedcolor != color)
        selectedcolor = color;

    editnumber = Number(id.slice(6));

    let intencjecontent = document.getElementById('contentIntencje');

    //Header intencjeday
    let intencjeheader = intencjecontent.childNodes[editnumber-1].childNodes[3].lastChild.firstChild;

    intencjeheader.style.backgroundColor = selectedcolor;
    
    document.getElementById("selectheadingcolor" + String(editnumber)).value = selectedcolor;

    //Set white color to header for dark backgrounds
    if(selectedcolor=="#ff0000" || selectedcolor=="#7030a0")
        intencjeheader.style.color = "#ffffff";
    else
        intencjeheader.style.color = "#000000";
}

function changeColor(color, name){
    editnumber = Number(name.slice(18));

    let intencjecontent = document.getElementById('contentIntencje');

    //Header intencjeday
    let intencjeheader = intencjecontent.childNodes[(editnumber-1)*2+1].childNodes[6].childNodes[2].firstChild;

    intencjeheader.style.backgroundColor = color;
}

