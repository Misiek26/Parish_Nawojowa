document.getElementById('komunikaty').addEventListener("click", ()=>{
    if(document.querySelector('.success')){
        document.querySelector('.success').style.display='none';
    }
    document.getElementById('posteditor').style.display='block';
    document.querySelector('article').style.display='none';
    document.querySelector('footer').style.display='none';
    document.querySelector('#designed').style.display='none';
    window.scrollTo(0,0);
    document.querySelector('body').style.overflow='hidden';
});

document.getElementById('editorclose').addEventListener("click", ()=>{
    document.getElementById('posteditor').style.display='none';
    document.querySelector('article').style.display='block';
    document.querySelector('footer').style.display='block';
    document.querySelector('#designed').style.display='block';
    document.querySelector('body').style.overflow='scroll';
})
