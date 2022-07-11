//Show image

var kosciolNow = ["images/kiermasz/1.jpg" , "images/kiermasz/2.jpg","images/kiermasz/3.jpg"];

var modal = document.getElementById('modal-container');
var modalImg = document.getElementById("img-content");


function showImg(nr)
{
  modal.style.display = "block";
  var img = document.getElementById(nr);
  modalImg.src = img.src;
  moveImg(img.alt);
}

function moveImg(i)
{
  i--;
  checkImg(i);

  next.onclick = function()
  {
    i++;
    modalImg.src = kosciolNow[i];
    checkImg(i);
  }
  previous.onclick = function()
  {
    i--;
    modalImg.src = kosciolNow[i];
    checkImg(i);
  } 
}

function checkImg(i)
{
  let imgContent = document.getElementById("img-content");
  if(i==1)
  {
    imgContent.className = "modal-content-height";
    // imgContent.style.height="50%";
    // imgContent.style.width="60%";
  }
  else{
    imgContent.className = "modal-content";
  }

  if(i==0)
    previous.style.display="none";
  else if(i==2)
    next.style.display="none";
  else
  {
    previous.style.display="block";
    next.style.display="block";

  }
}

//Close    

var span = document.getElementsByClassName("close")[0];
        
span.onclick = function() 
{ 
  modal.style.display = "none";
  previous.style.display="block";
  next.style.display="block";
}        

//next image, previous image

var next = document.getElementById('right-img');  
var nextButton = document.getElementById('next');

var previous = document.getElementById('left-img');
var previousButton = document.getElementById('previous');


next.onpointermove = function()
{
  nextButton.style.display = "block";
  next.style.cursor = "pointer";
}
next.onpointerleave = function()
{
  nextButton.style.display = "none";
}
previous.onpointermove = function()
{
  previousButton.style.display = "block";
  previous.style.cursor = "pointer";
}
previous.onpointerleave = function()
{
  previousButton.style.display = "none";

}
